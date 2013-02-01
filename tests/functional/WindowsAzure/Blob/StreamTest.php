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
 * @package   Tests\Framework
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use Tests\Framework\TestResources;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\DistributionBundle\Blob\Stream;

class BlobTest extends \PHPUnit_Framework_TestCase
{
    const CONTAINER_PREFIX = 'aztest';

    protected static $path;
    protected static $uniqId;
    protected static $uniqStart;

    protected function setUp()
    {
        self::$path = dirname(__FILE__).'/_files/';
        date_default_timezone_set('UTC');

        if (in_array('azure', stream_get_wrappers())) {
            stream_wrapper_unregister('azure');
        }
    }

    protected function tearDown()
    {
        $blobClient = $this->createBlobClient();
        for ($i = self::$uniqStart; $i <= self::$uniqId; $i++) {
            try {
                $blobClient->deleteContainer( self::CONTAINER_PREFIX . $i);
            } catch (\Exception $e) {
            }
        }
    }

    protected function createBlobClient()
    {
        $account = TestResources::accountName();
        $key = TestResources::accountKey();

        if (empty($account) || empty($key)) {
            $this->markTestSkipped("Configure <php><env name=\"AZURE_STORAGE_ACCOUNT\" value=\"\"><env name=\"AZURE_STORAGE_KEY\" value=\"\"></php> to run the blob  tests.");
        }

        $conn = sprintf('DefaultEndpointsProtocol=http;AccountName=%s;AccountKey=%s', $account, $key);
        $proxy = ServicesBuilder::getInstance()->createBlobService($conn);

        if (in_array('azure', stream_get_wrappers())) {
            stream_wrapper_unregister('azure');
        }

        Stream::register($proxy, 'azure');

        return $proxy;
    }

    protected function generateName()
    {
        if (self::$uniqId === null) {
            self::$uniqId = self::$uniqStart = time();
        }
        self::$uniqId++;
        return self::CONTAINER_PREFIX . self::$uniqId;
    }

    public function testGetUnknownClient()
    {
        $this->setExpectedException('WindowsAzure\DistributionBundle\Blob\BlobException');
        Stream::getClient('unknown');
    }

    /**
     * Test read file
     */
    public function testReadFile()
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . '/test.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($fileName, 'w');
        fwrite($fh, "Hello world!");
        $pos = ftell($fh);
        fseek($fh, 0);
        fwrite($fh, "Hello world!");
        fclose($fh);

        $result = file_get_contents($fileName);

        $this->assertEquals('Hello world!', $result);
        $this->assertEquals(12, $pos);
    }

    public function testReadUnknownFile()
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . '/test.txt';

        $blobClient = $this->createBlobClient();

        $this->setExpectedException('WindowsAzure\Common\ServiceException');
        $result = file_get_contents($fileName);
    }

    public function testWriteInvalidFile()
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . '/';

        $blobClient = $this->createBlobClient();

        $this->setExpectedException('WindowsAzure\DistributionBundle\Blob\BlobException', 'Empty blob path name given. Has to be a full filename.');
        $fh = fopen($fileName, 'w');
    }

    /**
     * Test write file
     */
    public function testWriteFile()
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . '/test.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($fileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        $instance = $blobClient->getBlobProperties($containerName, 'test.txt');
        $this->assertEquals(12, $instance->getProperties()->getContentLength());
    }

    /**
     * Test unlink file
     */
    public function testUnlinkFile()
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . '/test.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($fileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        unlink($fileName);

        $result = $blobClient->listBlobs($containerName);
        $this->assertEquals(0, count($result->getBlobs()));
    }

    /**
     * Test copy file
     */
    public function testCopyFile()
    {
        $containerName = $this->generateName();
        $sourceFileName = 'azure://' . $containerName . '/test.txt';
        $destinationFileName = 'azure://' . $containerName . '/test2.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($sourceFileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        copy($sourceFileName, $destinationFileName);

        $instance = $blobClient->getBlobProperties($containerName, 'test2.txt');
        $this->assertEquals(12, $instance->getProperties()->getContentLength());
    }

    public function testRenameChangeContainerInvalid()
    {
        $containerName = $this->generateName();
        $containerName2 = $this->generateName();

        $sourceFileName = 'azure://' . $containerName . '/test.txt';
        $destinationFileName = 'azure://' . $containerName2 . '/test2.txt';

        $blobClient = $this->createBlobClient();

        $this->setExpectedException('WindowsAzure\DistributionBundle\Blob\BlobException', 'Container name can not be changed.');
        rename($sourceFileName, $destinationFileName);
    }

    public function testRenameSameName()
    {
        $containerName = $this->generateName();
        $sourceFileName = 'azure://' . $containerName . '/test.txt';
        $destinationFileName = 'azure://' . $containerName . '/test.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($sourceFileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        rename($sourceFileName, $destinationFileName);

        $this->assertEquals('Hello world!', file_get_contents($destinationFileName));
    }

    /**
     * Test rename file
     */
    public function testRenameFile()
    {
        $containerName = $this->generateName();
        $sourceFileName = 'azure://' . $containerName . '/test.txt';
        $destinationFileName = 'azure://' . $containerName . '/test2.txt';

        $blobClient = $this->createBlobClient();

        $fh = fopen($sourceFileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        rename($sourceFileName, $destinationFileName);

        $this->assertEquals('Hello world!', file_get_contents($destinationFileName));
        $this->assertFalse(file_exists($sourceFileName));
    }

    /**
     * Test mkdir
     */
    public function testMkdir()
    {
        $containerName = $this->generateName();

        $blobClient = $this->createBlobClient();

        $current = count($blobClient->listContainers()->getContainers());

        mkdir('azure://' . $containerName);

        $after = count($blobClient->listContainers()->getContainers());

        $this->assertEquals($current + 1, $after, "One new container should exist");

        $options = new ListContainersOptions();
        $options->setPrefix($containerName);
        $this->assertEquals(1, count($blobClient->listContainers($options)->getContainers()));
    }

    public function testMkdirMulptileLevelsNotAllowed()
    {
        $containerName = $this->generateName();

        $blobClient = $this->createBlobClient();

        $current = count($blobClient->listContainers()->getContainers());

        $this->setExpectedException('WindowsAzure\DistributionBundle\Blob\BlobException', 'mkdir() with multiple levels is not supported on Windows Azure Blob Storage.');
        mkdir('azure://' . $containerName. '/foo');
    }

    /**
     * Test rmdir
     */
    public function testRmdir()
    {
        $containerName = $this->generateName();

        $blobClient = $this->createBlobClient();

        mkdir('azure://' . $containerName);
        rmdir('azure://' . $containerName);

        $options = new ListContainersOptions();
        $options->setPrefix($containerName);
        $result = $blobClient->listContainers($options);

        $this->assertEquals(0, count($result->getContainers()));
    }

    public function testRmdirWithMultipleLevelsNotAllowed()
    {
        $containerName = $this->generateName();

        $blobClient = $this->createBlobClient();

        $this->setExpectedException('WindowsAzure\DistributionBundle\Blob\BlobException', 'rmdir() with multiple levels is not supported on Windows Azure Blob Storage.');
        rmdir('azure://' . $containerName . '/foo');
    }

    /**
     * Test opendir
     */
    public function testOpendir()
    {
        $containerName = $this->generateName();
        $blobClient = $this->createBlobClient();
        $blobClient->createContainer($containerName);

        $blobClient->createBlockBlob($containerName, 'images/WindowsAzure1.gif', file_get_contents(self::$path . 'WindowsAzure.gif'));
        $blobClient->createBlockBlob($containerName, 'images/WindowsAzure2.gif', file_get_contents(self::$path . 'WindowsAzure.gif'));
        $blobClient->createBlockBlob($containerName, 'images/WindowsAzure3.gif', file_get_contents(self::$path . 'WindowsAzure.gif'));
        $blobClient->createBlockBlob($containerName, 'images/WindowsAzure4.gif', file_get_contents(self::$path . 'WindowsAzure.gif'));
        $blobClient->createBlockBlob($containerName, 'images/WindowsAzure5.gif', file_get_contents(self::$path . 'WindowsAzure.gif'));

        $result1 = $blobClient->listBlobs($containerName)->getBlobs();

        $result2 = array();
        if ($handle = opendir('azure://' . $containerName)) {
            while (false !== ($file = readdir($handle))) {
                $result2[] = $file;
            }
            closedir($handle);
        }

        $this->assertEquals(count($result1), count($result2));
    }

    static public function dataNestedDirectory()
    {
        return array(
            array('/nested/test.txt'),
            array('/nested1/nested2/test.txt'),
        );
    }

    /**
     * @dataProvider dataNestedDirectory
     */
    public function testNestedDirectory($file)
    {
        $containerName = $this->generateName();
        $fileName = 'azure://' . $containerName . $file;

        $blobClient = $this->createBlobClient();

        $fh = fopen($fileName, 'w');
        fwrite($fh, "Hello world!");
        fclose($fh);

        $result = file_get_contents($fileName);

        $this->assertEquals('Hello world!', $result);
    }
}

