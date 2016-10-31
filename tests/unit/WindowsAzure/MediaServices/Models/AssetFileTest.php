<?php
/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\MediaServices\Models;

use WindowsAzure\MediaServices\Models\AssetFile;

/**
 * Represents access policy object used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class AssetFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\AssetFile::__construct
     */
    public function test__construct()
    {

        // Setup
        $name = 'Name';
        $assetId = 'AssetId';

        // Test
        $result = new AssetFile($name, $assetId);

        // Assert
        $this->assertEquals($name, $result->getName());
        $this->assertEquals($assetId, $result->getParentAssetId());
    }

     /**
      * @covers \WindowsAzure\MediaServices\Models\AssetFile::getContentCheckSum
      * @covers \WindowsAzure\MediaServices\Models\AssetFile::setContentCheckSum
      */
     public function testGetContentCheckSum()
     {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
         $expected = 'CheckSum';
         $assetFile->setContentCheckSum($expected);

      // Test
      $actual = $assetFile->getContentCheckSum();

      // Assert
      $this->assertEquals($expected, $actual);
     }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getMimeType
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setMimeType
   */
  public function testGetMimeType()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $expected = 'Type';
      $assetFile->setMimeType($expected);

      // Test
      $actual = $assetFile->getMimeType();

      // Assert
      $this->assertEquals($expected, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getLastModified
   */
  public function testGetLastModified()
  {

      // Setup
      $assetFileArray = [
          'Name' => 'NameName',
          'ParentAssetId' => 'ksfg78',
          'LastModified' => '2013-11-21',
      ];
      $modified = new \Datetime($assetFileArray['LastModified']);
      $result = AssetFile::createFromOptions($assetFileArray);

      // Test
      $actual = $result->getLastModified();

      // Assert
      $this->assertEquals($modified->getTimestamp(), $actual->getTimestamp());
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getCreated
   */
  public function testGetCreated()
  {

      // Setup
      $assetFileArray = [
          'Name' => 'NameName',
          'ParentAssetId' => 'ksfg78',
          'Created' => '2013-11-21',
      ];
      $created = new \Datetime($assetFileArray['Created']);
      $result = AssetFile::createFromOptions($assetFileArray);

      // Test
      $actual = $result->getCreated();

      // Assert
      $this->assertEquals($created->getTimestamp(), $actual->getTimestamp());
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getIsPrimary
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setIsPrimary
   */
  public function testGetIsPrimary()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $IsPrimary = true;
      $assetFile->setIsPrimary($IsPrimary);

      // Test
      $actual = $assetFile->getIsPrimary();

      // Assert
      $this->assertEquals($IsPrimary, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getInitializationVector
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setInitializationVector
   */
  public function testGetInitializationVector()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $vector = 'vector';
      $assetFile->setInitializationVector($vector);

      // Test
      $actual = $assetFile->getInitializationVector();

      // Assert
      $this->assertEquals($vector, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getEncryptionKeyId
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setEncryptionKeyId
   */
  public function testGetEncryptionKeyId()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $id = 'encrypted';
      $assetFile->setEncryptionKeyId($id);

      // Test
      $actual = $assetFile->getEncryptionKeyId();

      // Assert
      $this->assertEquals($id, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getIsEncrypted
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setIsEncrypted
   */
  public function testGetIsEncrypted()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $isEncr = true;
      $assetFile->setIsEncrypted($isEncr);

      // Test
      $actual = $assetFile->getIsEncrypted();

      // Assert
      $this->assertEquals($isEncr, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getEncryptionScheme
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setEncryptionScheme
   */
  public function testGetEncryptionScheme()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $scheme = 'scheme';
      $assetFile->setEncryptionScheme($scheme);

      // Test
      $actual = $assetFile->getEncryptionScheme();

      // Assert
      $this->assertEquals($scheme, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getEncryptionVersion
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setEncryptionVersion
   */
  public function testGetEncryptionVersion()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $ver = '2.3.0';
      $assetFile->setEncryptionVersion($ver);

      // Test
      $actual = $assetFile->getEncryptionVersion();

      // Assert
      $this->assertEquals($ver, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getParentAssetId
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setParentAssetId
   */
  public function testGetParentAssetId()
  {

       // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $id = '256';
      $assetFile->setParentAssetId($id);

      // Test
      $actual = $assetFile->getParentAssetId();

      // Assert
      $this->assertEquals($id, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getContentFileSize
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setContentFileSize
   */
  public function testGetContentFileSize()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $size = 256;
      $assetFile->setContentFileSize($size);

      // Test
      $actual = $assetFile->getContentFileSize();

      // Assert
      $this->assertEquals($size, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getName
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::setName
   */
  public function testGetName()
  {

      // Setup
      $assetFile = new AssetFile('Name', 'AssetId');
      $name = 'NewName';
      $assetFile->setName($name);

      // Test
      $actual = $assetFile->getName();

      // Assert
      $this->assertEquals($name, $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::getId
   */
  public function testGetId()
  {

     // Setup
      $assetFileArray = [
          'Id' => 'kjdfgh56',
          'Name' => 'NameName',
          'ParentAssetId' => 'ksfg78',
      ];
      $result = AssetFile::createFromOptions($assetFileArray);

      // Test
      $actual = $result->getId();

      // Assert
      $this->assertEquals($assetFileArray['Id'], $actual);
  }

  /**
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::createFromOptions
   * @covers \WindowsAzure\MediaServices\Models\AssetFile::fromArray
   */
  public function testAssetFileFromOptions()
  {

      // Setup
      $assetFileArray = [
          'Id' => 'dfhdgh56',
          'Name' => 'newAssetFile',
          'ContentFileSize' => '20 mb',
          'ParentAssetId' => 'kdjfg67',
          'EncryptionVersion' => 'EncryptionVersion',
          'EncryptionScheme' => 'EncryptionScheme',
          'IsEncrypted' => true,
          'EncryptionKeyId' => 'keyId896',
          'InitializationVector' => 'InitVector',
          'IsPrimary' => true,
          'LastModified' => '2013-11-19',
          'Created' => '2013-11-19',
          'MimeType' => 'type of mime',
          'ContentChecksum' => 'ContentChecksum',
      ];
      $created = new \Datetime($assetFileArray['Created']);
      $modified = new \Datetime($assetFileArray['LastModified']);

      // Test
      $resultAssetFile = AssetFile::createFromOptions($assetFileArray);

      // Assert
      $this->assertEquals($assetFileArray['Id'], $resultAssetFile->getId());
      $this->assertEquals($assetFileArray['Name'], $resultAssetFile->getName());
      $this->assertEquals($assetFileArray['ContentFileSize'], $resultAssetFile->getContentFileSize());
      $this->assertEquals($assetFileArray['ParentAssetId'], $resultAssetFile->getParentAssetId());
      $this->assertEquals($assetFileArray['EncryptionVersion'], $resultAssetFile->getEncryptionVersion());
      $this->assertEquals($assetFileArray['EncryptionScheme'], $resultAssetFile->getEncryptionScheme());
      $this->assertEquals($assetFileArray['IsEncrypted'], $resultAssetFile->getIsEncrypted());
      $this->assertEquals($assetFileArray['EncryptionKeyId'], $resultAssetFile->getEncryptionKeyId());
      $this->assertEquals($assetFileArray['InitializationVector'], $resultAssetFile->getInitializationVector());
      $this->assertEquals($assetFileArray['IsPrimary'], $resultAssetFile->getIsPrimary());
      $this->assertEquals($modified->getTimestamp(), $resultAssetFile->getLastModified()->getTimestamp());
      $this->assertEquals($created->getTimestamp(), $resultAssetFile->getCreated()->getTimestamp());
      $this->assertEquals($assetFileArray['MimeType'], $resultAssetFile->getMimeType());
      $this->assertEquals($assetFileArray['ContentChecksum'], $resultAssetFile->getContentCheckSum());
  }
}
