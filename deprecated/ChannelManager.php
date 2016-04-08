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
 * @package   WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure;

require_once 'WindowsAzure/WindowsAzure.php';
require_once 'defaults.php';
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Serialization\XmlSerializer;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\PublicAccessType;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Blob\Models\CreateBlobOptions;
use WindowsAzure\Common\ServicesBuilder;

/**
 * Manages a PEAR channel.
 *
 * @category  Microsoft
 * @package   WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ChannelManager
{
    /**
     * @var BlobRestProxy
     */
    private static $_blobRestProxy;

    /**
     * Creates new blob REST proxy.
     *
     * @return BlobRestProxy
     */
    private static function _createBlobRestProxy()
    {
		$accountKey       = getenv('CHANNEL_STORAGE_SERVICE_KEY');
		$accountName      = CHANNEL_STORAGE_SERVICE_NAME;
		$blobEndpointUri  = CHANNEL_URL;
		$connectionString = "BlobEndpoint=$blobEndpointUri;AccountName=$accountName;AccountKey=$accountKey";

        return ServicesBuilder::getInstance()->createBlobService($connectionString);
    }

    /**
     * Channel manager main entry.
     *
     * @return none
     */
    public static function main()
    {
        self::$_blobRestProxy = self::_createBlobRestProxy();

        if (   isset($_GET['release'])
            || (isset($_SERVER['argv'])
            && @$_SERVER['argv'][1] == 'release')
        ) {
            // Ship a new release
            self::_downloadChannel();
            self::_addPackage();
            self::_uploadChannel();
            self::_verifyInstall();
        } else {
            // Prompt user to manage channel
            self::_manageChannel();
        }
    }

    /**
     * Command line interaction with user to manage the channel by letting user to:
     * 1) Get the channel (either by creation of new one or download existing one).
     * 2) Prompt user to remove old package.
     * 3) Prompt user to add current package.
     * 4) Upload the channel back.
     * 5) Verify that latest package is installable.
     *
     * @return none
     */
    private static function _manageChannel()
    {
        $answer = self::_promptMsg('Create new channel? [n]:', true);
        switch ($answer) {
        case 'y':
            self::_createNewChannel();
            self::_uploadChannel();
            self::_executeCommand('pear channel-discover ' . CHANNEL_NAME);
            break;
        case 'n':
        case '':
            self::_downloadChannel();
            break;
        }

        do {
        $answer = self::_promptMsg('Want to remove exisitng package? [n]:', true);
        switch ($answer) {
        case 'y':
            self::_removePackage();
            break;
        }
        } while ($answer == 'y');

        $answer = self::_promptMsg('Want to add current package? [y]:', true);
        switch ($answer) {
        case 'y':
        case '':
            self::_addPackage();
            break;
        }

        self::_uploadChannel();

        self::_verifyInstall();
    }

    /**
     * Creates new channel and removes existing channel files by:
     * 1) Removes existing channel files on the cloud.
     * 2) Constructs pirum.xml contents.
     * 3) Cleans previous files if any and create new channel directory.
     * 4) Writes pirum.xml.
     * 5) Generates the channel files.
     *
     * @return none
     */
    private static function _createNewChannel()
    {
        echo "Removing old channel files if any...\n";
        self::_clearContainer(CHANNEL_MAIN_CONTAINER, self::$_blobRestProxy);
        self::_clearContainer(CHANNEL_GET_CONTAINER, self::$_blobRestProxy);
        self::_clearContainer(CHANNEL_REST_CONTAINER, self::$_blobRestProxy);

        $xmlSerializer = new XmlSerializer();
        $properties    = array(XmlSerializer::ROOT_NAME => 'server');
        $fileArray     = array(
            'name'    => CHANNEL_NAME,
            'summary' => CHANNEL_SUMMARY,
            'alias'   => CHANNEL_ALIAS,
            'url'     => CHANNEL_URL
        );
        $fileContents  = $xmlSerializer->serialize($fileArray, $properties);
        $dirName       = CHANNEL_DIR_NAME;

        self::_createDir(CHANNEL_DIR_NAME);

        $filePath  = dirname(__FILE__) . DIRECTORY_SEPARATOR  . $dirName;
        $filePath .= DIRECTORY_SEPARATOR . 'pirum.xml';
        file_put_contents($filePath, $fileContents);

        self::_executeCommand("pirum build $dirName/");
    }

    /**
     * Tries to install the new released package.
     *
     * @return none
     */
    private static function _verifyInstall()
    {
        echo "Test installing the package...\n";
        self::_executeCommand('pear uninstall WindowsAzure/WindowsAzure');
        self::_executeCommand('pear channel-update WindowsAzure');
        self::_executeCommand('pear clear-cache');
        self::_executeCommand('pear install WindowsAzure/WindowsAzure');
    }

    /**
     * Deletes all the Blobs in a specified container.
     *
     * @param string $container The container name.
     *
     * @return none
     */
    private static function _clearContainer($container)
    {
        $blobs = self::$_blobRestProxy->listBlobs($container);
        $blobs = $blobs->getBlobs();
        foreach ($blobs as $blob) {
            self::$_blobRestProxy->deleteBlob($container, $blob->getName());
        }
    }

    /**
     * Downloads all the Blobs in a container to a specified directory.
     *
     * @param string $containerName The container name.
     * @param string $dirName       The directory name.
     *
     * @return none
     */
    private static function _downloadContainerInDir($containerName, $dirName)
    {
        self::_createDir($dirName);
        $blobs = self::$_blobRestProxy->listBlobs($containerName);
        $blobs = $blobs->getBlobs();
        foreach ($blobs as $blob) {
            $name    = $blob->getName();
            $blob    = self::$_blobRestProxy->getBlob($containerName, $name);
            $file    = $dirName . '/' . $name;
            $dir     = dirname($file);
            if (!is_dir($dir)) {
                mkdir($dir, 0777, true);
            }
            file_put_contents($file, stream_get_contents($blob->getContentStream()));
        }
    }

    /**
     * Downloads the channel files.
     *
     * @return none
     */
    private static function _downloadChannel()
    {
        echo "Downloading the channel files...\n";
        self::_downloadContainerInDir(CHANNEL_MAIN_CONTAINER, CHANNEL_DIR_NAME);
        self::_downloadContainerInDir(CHANNEL_GET_CONTAINER, CHANNEL_DIR_NAME . '/get');
        self::_downloadContainerInDir(CHANNEL_REST_CONTAINER, CHANNEL_DIR_NAME . '/rest');
    }

    /**
     * Uploads the channel files to blob storage.
     *
     * @return none
     *
     * @throws \Exception
     */
    private static function _uploadChannel()
    {
        $names = array();
        self::_rscandir('channel', $names);
        $contents = array_map('file_get_contents', $names);

        echo "Uploading channel files to the cloud...\n";
        self::_tryCreateContainer(CHANNEL_MAIN_CONTAINER);
        self::_tryCreateContainer(CHANNEL_GET_CONTAINER);
        self::_tryCreateContainer(CHANNEL_REST_CONTAINER);

        $channelDir = 'channel/';
        $getDir     = $channelDir . 'get/';
        $restDir    = $channelDir . 'rest/';

        for ($i = 0; $i < count($names); $i++) {
            $options = new CreateBlobOptions();
            $finfo   = finfo_open(FILEINFO_MIME_TYPE);
            $options->setContentType(finfo_file($finfo, $names[$i]));

            if (strpos($names[$i], $getDir) !== false) {
                $names[$i] = str_replace($getDir, '', $names[$i]);
                $container = CHANNEL_GET_CONTAINER;
            } else if (strpos($names[$i], $restDir) !== false) {
                $names[$i] = str_replace($restDir, '', $names[$i]);
                $container = CHANNEL_REST_CONTAINER;
            } else if (strpos($names[$i], $channelDir) !== false) {
                $names[$i] = str_replace($channelDir, '', $names[$i]);
                $container = CHANNEL_MAIN_CONTAINER;
            } else {
                throw new \Exception('incorrect file path.');
            }

            self::$_blobRestProxy->createBlockBlob(
                $container,
                $names[$i],
                $contents[$i],
                $options
            );
        }
    }
    /**
     * Scans a directory and returns all files under it recursively.
     *
     * @param string $dir    The directory path.
     * @param array  &$files The directory files.
     *
     * @return none
     */
    private static function _rscandir($dir, &$files) {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file)) {
                self::_rscandir($file, $files);
            } else {
                $files[] = $file;
			}
        }
    }

    /**
     * Tries to create new container if it does not exist.
     *
     * @param string $container The container name.
     *
     * @return none
     */
    private static function _tryCreateContainer($container)
    {
        try {
            $options = new CreateContainerOptions();
            $options->setPublicAccess(PublicAccessType::BLOBS_ONLY);
            self::$_blobRestProxy->createContainer($container, $options);
        } catch (ServiceException $e) {
            if ($e->getCode() != 409) {
                print_r($e);
                exit();
            }
        }
    }

    /**
     * Adds new package.
     *
     * @return none
     */
    private static function _addPackage()
    {
        self::_executeCommand('php package.php make');
        self::_executeCommand('pear package package.xml');
        $files = glob('*.tgz');
        $name  = $files[count($files) - 1];
        self::_executeCommand("pirum add channel $name");
    }

    /**
     * Removes existing package.
     *
     * @return none
     */
    private static function _removePackage()
    {
        $files = glob('channel/get/*.tgz');
        if (empty($files)) {
            echo "No packages to remove.\n";
        } else {
            $files = array_map('basename', $files);
            $msg   = '';
            for ($i = 0; $i < count($files); $i++) {
                $msg .= ($i + 1) . '. ' . $files[$i] . "\n";
            }
            $answer = self::_promptMsg($msg . 'Choose package to remove:');
            $name   = $files[$answer - 1];
            self::_executeCommand("pirum remove channel $name");
        }
    }

    /**
     * Creates new directory and removes existing one.
     *
     * @param string $dirName The directory name.
     *
     * @return none
     */
    private static function _createDir($dirName)
    {
        // Clear previous files if any
        self::_rrmdir($dirName);

        // Create new directory
        mkdir($dirName);
    }

    /**
     * Executes cmdline command.
     *
     * @param string $command The command to execute.
     *
     * @return none
     */
    private static function _executeCommand($command)
    {
        exec($command, $output, $failed);
        echo implode("\n", $output) . "\n";
        if ($failed) {
            echo "Something went wrong. Exit\n";
            exit();
        }
    }

    /**
     * Removes a whole directory with all files inside it.
     *
     * @param string $dir The directory path.
     *
     * @return none
     */
    private static function _rrmdir($dir)
    {
        foreach(glob($dir . '/*') as $file) {
            if(is_dir($file)) {
                self::_rrmdir($file);
            } else {
                unlink($file);
            }
        }

        if (is_dir($dir)) {
            rmdir($dir);
        }
    }

    /**
     * Prompts message to the uers and return back the input.
     *
     * @param string  $msg        The message to display.
     * @param boolean $isYesNoMsg Flag to indicate if this is Y/N question.
     *
     * @return string
     */
    private static function _promptMsg($msg, $isYesNoMsg = false)
    {
        if ($isYesNoMsg) {
            do {
                echo $msg;
                $line = trim(fgets(STDIN));
                $line = strtolower($line);
                $line = empty($line) ? $line : $line[0];
                if ($line == '' || $line == 'y' || $line == 'n') {
                    break;
                }
            } while (true);
        } else {
            echo $msg;
            $line = trim(fgets(STDIN));
        }

        return $line;
    }
}

ChannelManager::main();

