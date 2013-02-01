<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Blob;

use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\Common\ServiceException;
use Exception;

/**
 * Stream Wrapper implementation for Windows Azure Blob Storage
 *
 * Based on work of the Zend Amazon S3 Client and the old Windows Azure SDK
 * stream wrapper.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class Stream
{
    /**
     * Current file name
     *
     * @var string
     */
    private $fileName = null;

    /**
     * Temporary file name
     *
     * @var string
     */
    private $temporaryFileName = null;

    /**
     * Temporary file handle
     *
     * @var resource
     */
    private $temporaryFileHandle = null;

    /**
     * Blob storage client
     *
     * @var BlobClient
     */
    private $storageClient = null;

    /**
     * Write mode?
     *
     * @var boolean
     */
    private $writeMode = false;

    /**
     * List of blobs
     *
     * @var array
     */
    private $blobs = null;

    /**
     * @var array
     */
    private static $clients = array();

    /**
     * Register the given blob rest proxy as client for a stream wrapper.
     *
     * @param BlobRestProxy $proxy
     * @param string $name
     */
    static public function register(BlobRestProxy $proxy, $name = 'azure')
    {
        stream_register_wrapper($name, __CLASS__);
        self::$clients[$name] = $proxy;
    }

    /**
     * Unregister stream wrapper client
     *
     * @param string $name
     */
    static public function unregister($name)
    {
        stream_wrapper_unregister($name);
        unset(self::$clients[$name]);
    }

    /**
     * Get the client for an azure stream name.
     *
     * @param string $name
     * @return BlobRestProxy
     */
    static public function getClient($name)
    {
        if ( ! isset(self::$clients[$name])) {
            throw new BlobException("There is no client registered for stream type '" . $name . "://");
        }

        return self::$clients[$name];
    }

    /**
     * Retrieve storage client for this stream type
     *
     * @param string $path
     * @return BlobClient
     */
    private function getStorageClient($path = '')
    {
        if ($this->storageClient === null) {
            $url = explode(':', $path);

            if (!$url) {
                throw new BlobException('Could not parse path "' . $path . '".');
            }

            $this->storageClient = self::getClient($url[0]);

            if (!$this->storageClient) {
                throw new BlobException('No storage client registered for stream type "' . $url[0] . '://".');
            }
        }

        return $this->storageClient;
    }

    /**
     * Open the stream
     *
     * @param  string  $path
     * @param  string  $mode
     * @param  integer $options
     * @param  string  $opened_path
     * @return boolean
     */
    public function stream_open($path, $mode, $options, &$opened_path)
    {
        $this->fileName = $path;
        $blobName       = $this->getFileName($this->fileName);

        if (empty($blobName)) {
            throw new BlobException("Empty blob path name given. Has to be a full filename.");
        }

        // Write mode?
        if (strpbrk($mode, 'wax+')) {
            $this->writeMode = true;
        } else {
            $this->writeMode = false;
        }

        // If read/append, fetch the file
        if (!$this->writeMode || strpbrk($mode, 'ra+')) {
            $blobResult = $this->getStorageClient($this->fileName)->getBlob(
                $this->getContainerName($this->fileName),
                $this->getFileName($this->fileName)
            );
            $this->temporaryFileHandle = $blobResult->getContentStream();

            return true;
        }

        $this->temporaryFileName = tempnam(sys_get_temp_dir(), 'azure');

        // Check the file can be opened
        $fh = @fopen($this->temporaryFileName, $mode);
        if ($fh === false) {
            return false;
        }
        fclose($fh);

        // Open temporary file handle
        $this->temporaryFileHandle = fopen($this->temporaryFileName, $mode);

        // Ok!
        return true;
    }

    /**
     * Write to the stream
     *
     * @param  string $data
     * @return integer
     */
    public function stream_write($data)
    {
        if (!$this->temporaryFileHandle) {
            return 0;
        }

        $len = strlen($data);
        fwrite($this->temporaryFileHandle, $data, $len);
        return $len;
    }

    /**
     * Close the stream
     *
     * @return void
     */
    public function stream_close()
    {
        @fclose($this->temporaryFileHandle);

        // Upload the file?
        if ($this->writeMode) {
            // Make sure the container exists
            if ( ! $this->containerExists($this->fileName)) {
                $this->getStorageClient($this->fileName)->createContainer(
                    $this->getContainerName($this->fileName)
                );
            }

            // Upload the file
            try {
                $result = $this->getStorageClient($this->fileName)->createBlockBlob(
                    $this->getContainerName($this->fileName),
                    $this->getFileName($this->fileName),
                    fopen($this->temporaryFileName, "r")
                );
            } catch (Exception $ex) {
                $this->cleanup();

                throw $ex;
            }
        }

        $this->cleanup();
    }

    private function cleanup()
    {
        if ($this->temporaryFileName) {
            @unlink($this->temporaryFileName);
        }
        unset($this->storageClient);
    }

    /**
     * Read from the stream
     *
     * @param  integer $count
     * @return string
     */
    public function stream_read($count)
    {
        if (!$this->temporaryFileHandle) {
            return false;
        }

        return fread($this->temporaryFileHandle, $count);
    }

    /**
     * End of the stream?
     *
     * @return boolean
     */
    public function stream_eof()
    {
        if (!$this->temporaryFileHandle) {
            return true;
        }

        return feof($this->temporaryFileHandle);
    }

    /**
     * What is the current read/write position of the stream?
     *
     * @return integer
     */
    public function stream_tell()
    {
        return ftell($this->temporaryFileHandle);
    }

    /**
     * Update the read/write position of the stream
     *
     * @param  integer $offset
     * @param  integer $whence
     * @return boolean
     */
    public function stream_seek($offset, $whence)
    {
        if (!$this->temporaryFileHandle) {
            return false;
        }

        return (fseek($this->temporaryFileHandle, $offset, $whence) === 0);
    }

    /**
     * Flush current cached stream data to storage
     *
     * @return boolean
     */
    public function stream_flush()
    {
        $result = fflush($this->temporaryFileHandle);

         // Upload the file?
        if ($this->writeMode) {
            // Make sure the container exists
            if ( ! $this->containerExists($this->fileName)) {
                $this->getStorageClient($this->fileName)->createContainer(
                    $this->getContainerName($this->fileName)
                );
            }

            // Upload the file
            try {
                $this->getStorageClient($this->fileName)->createBlockBlob(
                    $this->getContainerName($this->fileName),
                    $this->getFileName($this->fileName),
                    $this->temporaryFileHandle
                );
            } catch (Exception $ex) {
                @unlink($this->temporaryFileName);
                unset($this->storageClient);

                throw $ex;
            }
        }

        return $result;
    }

    /**
     * Returns data array of stream variables
     *
     * @return array
     */
    public function stream_stat()
    {
        if (!$this->temporaryFileHandle) {
            return false;
        }

        return $this->url_stat($this->fileName, 0);
    }

    /**
     * Attempt to delete the item
     *
     * @param  string $path
     * @return boolean
     */
    public function unlink($path)
    {
        $this->getStorageClient($path)->deleteBlob(
            $this->getContainerName($path),
            $this->getFileName($path)
        );

        // Clear the stat cache for this path.
        clearstatcache(true, $path);
        return true;
    }

    /**
     * Attempt to rename the item
     *
     * @param  string  $path_from
     * @param  string  $path_to
     * @return boolean False
     */
    public function rename($path_from, $path_to)
    {
        if ($this->getContainerName($path_from) != $this->getContainerName($path_to)) {
            throw new BlobException('Container name can not be changed.');
        }

        if ($this->getFileName($path_from) == $this->getFileName($path_to)) {
            return true;
        }

        $this->getStorageClient($path_from)->copyBlob(
            $this->getContainerName($path_to),
            $this->getFileName($path_to),
            $this->getContainerName($path_from),
            $this->getFileName($path_from)
        );
        $this->getStorageClient($path_from)->deleteBlob(
            $this->getContainerName($path_from),
            $this->getFileName($path_from)
        );

        // Clear the stat cache for the affected paths.
        clearstatcache(true, $path_from);
        clearstatcache(true, $path_to);
        return true;
    }

    /**
     * Return array of URL variables
     *
     * @param  string $path
     * @param  integer $flags
     * @return array
     */
    public function url_stat($path, $flags)
    {
        $stat = array();
        $stat['dev'] = 0;
        $stat['ino'] = 0;
        $stat['mode'] = 0;
        $stat['nlink'] = 0;
        $stat['uid'] = 0;
        $stat['gid'] = 0;
        $stat['rdev'] = 0;
        $stat['size'] = 0;
        $stat['atime'] = 0;
        $stat['mtime'] = 0;
        $stat['ctime'] = 0;
        $stat['blksize'] = 0;
        $stat['blocks'] = 0;

        $info = null;
        try {
            $metadata = $this->getStorageClient($path)->getBlobProperties(
                        $this->getContainerName($path),
                        $this->getFileName($path)
                    );
            $stat['size']  = $metadata->getProperties()->getContentLength();

            // Set the modification time and last modified to the Last-Modified header.
            $lastmodified = $metadata->getProperties()->getLastModified()->format('U');
            $stat['mtime'] = $lastmodified;
            $stat['ctime'] = $lastmodified;

            // Entry is a regular file.
            $stat['mode'] = 0100000;

            return array_values($stat) + $stat;
        } catch (Exception $ex) {
            // Unexisting file...
            return false;
        }
    }

    /**
     * Create a new directory
     *
     * @param  string  $path
     * @param  integer $mode
     * @param  integer $options
     * @return boolean
     */
    public function mkdir($path, $mode, $options)
    {
        if ($this->getContainerName($path) != $this->getFileName($path)) {
            throw new BlobException('mkdir() with multiple levels is not supported on Windows Azure Blob Storage.');
        }

        // Create container
        try {
            $this->getStorageClient($path)->createContainer(
                $this->getContainerName($path)
            );
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Remove a directory
     *
     * @param  string  $path
     * @param  integer $options
     * @return boolean
     */
    public function rmdir($path, $options)
    {
        if ($this->getContainerName($path) != $this->getFileName($path)) {
            throw new BlobException('rmdir() with multiple levels is not supported on Windows Azure Blob Storage.');
        }

        // Delete container
        try {
            $this->getStorageClient($path)->deleteContainer(
                $this->getContainerName($path)
            );

            // Clear the stat cache so that affected paths are refreshed.
            clearstatcache();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    /**
     * Attempt to open a directory
     *
     * @param  string $path
     * @param  integer $options
     * @return boolean
     */
    public function dir_opendir($path, $options)
    {
        $this->blobs = $this->getStorageClient($path)->listBlobs(
            $this->getContainerName($path)
        )->getBlobs();

        return is_array($this->blobs);
    }

    /**
     * Return the next filename in the directory
     *
     * @return string
     */
    public function dir_readdir()
    {
        $object = current($this->blobs);
        if ($object !== false) {
            next($this->blobs);
            return $object->getName();
        }
        return false;
    }

    /**
     * Reset the directory pointer
     *
     * @return boolean True
     */
    public function dir_rewinddir()
    {
        reset($this->blobs);
        return true;
    }

    /**
     * Close a directory
     *
     * @return boolean True
     */
    public function dir_closedir()
    {
        $this->blobs = null;
        return true;
    }

    /**
     * Extract container name
     *
     * @param string $path
     * @return string
     */
    protected function getContainerName($path)
    {
        $url = parse_url($path);
        if ($url['host']) {
            return $url['host'];
        }

        return '';
    }

    /**
     * Extract file name
     *
     * @param string $path
     * @return string
     */
    protected function getFileName($path)
    {
        $url = parse_url($path);
        if ($url['host']) {
            $fileName = isset($url['path']) ? $url['path'] : $url['host'];
            if (strpos($fileName, '/') === 0) {
                $fileName = substr($fileName, 1);
            }
            return $fileName;
        }

        return '';
    }

    protected function containerExists($containerName)
    {
        // List containers
        $options = new ListContainersOptions();
        $options->setPrefix($this->getContainerName($containerName));

        $containers = $this->getStorageClient($containerName)->listContainers($options);

        return count($containers->getContainers());
    }
}

