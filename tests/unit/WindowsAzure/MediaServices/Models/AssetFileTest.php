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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices\Models;
use WindowsAzure\MediaServices\Models\AssetFile;

/**
 * Represents access policy object used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.3.1_2011-08
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

class AssetFileTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\AssetFile::__construct
     */
    public function test__construct(){

        // Setup
        $sample1 = 'Name';
        $sample2 = 'AssetId';

        // Test
        $result = new AssetFile('Name', 'AssetId');

        // Assert
        $this->assertEquals($sample1, $result->getName());
        $this->assertEquals($sample2, $result->getParentAssetId());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\AssetFile::getContentCheckSum
     * @covers WindowsAzure\MediaServices\Models\AssetFile::setContentCheckSum
     */
     public function testGetContentCheckSum(){

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $expected = 'CheckSum';
      $sample->setContentCheckSum($expected);

      // Test
      $actual = $sample->getContentCheckSum();

      // Assert
      $this->assertEquals($expected,$actual);
  }

     /**
     * @covers WindowsAzure\MediaServices\Models\AssetFile::getMimeType
     * @covers WindowsAzure\MediaServices\Models\AssetFile::setMimeType
     */
  public function testGetMimeType(){

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $expected = 'Type';
      $sample->setMimeType($expected);

      // Test
      $actual = $sample->getMimeType();

      // Assert
      $this->assertEquals($expected,$actual);
  }

   /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getLastModified
   */
  public function testGetLastModified() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');

      // Test
      $actual = $sample->getLastModified();

      // Assert
      $this->assertNull($actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getCreated
   */
  public function testGetCreated() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');

      // Test
      $actual = $sample->getCreated();

      // Assert
      $this->assertNull($actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getIsPrimary
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setIsPrimary
   */
  public function testGetIsPrimary() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $IsPrimary = true;
      $sample->setIsPrimary($IsPrimary);

      // Test
      $actual = $sample->getIsPrimary();

      // Assert
      $this->assertEquals($IsPrimary, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getInitializationVector
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setInitializationVector
   */
  public function testGetInitializationVector(){

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $vector = 'vector';
      $sample->setInitializationVector($vector);

      // Test
      $actual = $sample->getInitializationVector();

      // Assert
      $this->assertEquals($vector, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getEncryptionKeyId
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setEncryptionKeyId
   */
  public function testGetEncryptionKeyId(){

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $id = 'encrypted';
      $sample->setEncryptionKeyId($id);

      // Test
      $actual = $sample->getEncryptionKeyId();

      // Assert
      $this->assertEquals($id, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getIsEncrypted
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setIsEncrypted
   */
  public function testGetIsEncrypted() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $IsEncr = true;
      $sample->setIsEncrypted($IsEncr);

      // Test
      $actual = $sample->getIsEncrypted();

      // Assert
      $this->assertEquals($IsEncr, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getEncryptionScheme
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setEncryptionScheme
   */
  public function testGetEncryptionScheme() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $scheme = 'scheme';
      $sample->setEncryptionScheme($scheme);

      // Test
      $actual = $sample->getEncryptionScheme();

      // Assert
      $this->assertEquals($scheme, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getEncryptionVersion
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setEncryptionVersion
   */
  public function testGetEncryptionVersion() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $ver = '2.3.0';
      $sample->setEncryptionVersion($ver);

      // Test
      $actual = $sample->getEncryptionVersion();

      // Assert
      $this->assertEquals($ver, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getParentAssetId
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setParentAssetId
   */
  public function testGetParentAssetId() {

       // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $id = '256';
      $sample->setParentAssetId($id);

      // Test
      $actual = $sample->getParentAssetId();

      // Assert
      $this->assertEquals($id, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getContentFileSize
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setContentFileSize
   */
  public function testGetContentFileSize() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $size = 256;
      $sample->setContentFileSize($size);

      // Test
      $actual = $sample->getContentFileSize();

      // Assert
      $this->assertEquals($size, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getName
   * @covers WindowsAzure\MediaServices\Models\AssetFile::setName
   */
  public function testGetName() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');
      $name = 'NewName';
      $sample->setName($name);

      // Test
      $actual = $sample->getName();

      // Assert
      $this->assertEquals($name, $actual);
  }

  /**
   * @covers WindowsAzure\MediaServices\Models\AssetFile::getId
   */
  public function testGetId() {

      // Setup
      $sample = new AssetFile('Name', 'AssetId');

      // Test
      $actual = $sample->getId();

      // Assert
      $this->assertNull($actual);
  }
}