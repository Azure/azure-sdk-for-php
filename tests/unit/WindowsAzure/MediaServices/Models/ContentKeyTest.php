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
use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;

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

class ContentKeyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::__construct
     */
    public function test__construct(){

        // Setup
        $contentKeyId = 'content-key-id-12563';

        // Test
        $contentKey = new ContentKey($contentKeyId);

        // Assert
        $this->assertEquals($contentKeyId, $contentKey->getId());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::createFromOptions
     * @covers WindowsAzure\MediaServices\Models\ContentKey::fromArray
     */
    public function testCreateFromOptions(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $aesKey = '7868CC14AE5FA7E974FAFFAF072DDE2D250334E9D647C086D088C621B28F9F28';
        $options = array(
                'Id'                       => $contentKeyId,
                'Created'                  => '2013-02-26',
                'LastModified'             => '2013-02-26',
                'ContentKeyType'           => ContentKeyTypes::STORAGE_ENCRYPTION,
                'EncryptedContentKey'      => $aesKey,
                'Name'                     => 'testNameForContentKey',
                'ProtectionKeyId'          => 'protection-key-id-36589',
                'ProtectionKeyType'        => ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT,
                'Checksum'                 => 'checksum-of-content-key'
        );
        $created = new \Datetime($options['Created']);
        $modified = new \Datetime($options['LastModified']);

        // Test
        $contentKey = ContentKey::createFromOptions($options);

        // Assert
        $this->assertEquals($contentKeyId, $contentKey->getId());
        $this->assertEquals($created->getTimestamp(), $contentKey->getCreated()->getTimestamp());
        $this->assertEquals($modified->getTimestamp(), $contentKey->getLastModified()->getTimestamp());
        $this->assertEquals($options['ContentKeyType'], $contentKey->getContentKeyType());
        $this->assertEquals($aesKey, $contentKey->getEncryptedContentKey());
        $this->assertEquals($options['Name'], $contentKey->getName());
        $this->assertEquals($options['ProtectionKeyId'], $contentKey->getProtectionKeyId());
        $this->assertEquals($options['ProtectionKeyType'], $contentKey->getProtectionKeyType());
        $this->assertEquals($options['Checksum'], $contentKey->getChecksum());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getChecksum
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setChecksum
     */
    public function testGetSetChecksum(){

        // Setup
        $checksum = 'checksum-of-content-key';
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);

        // Test
        $contentKey->setChecksum($checksum);
        $result = $contentKey->getChecksum();

        // Assert
        $this->assertEquals($checksum, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getProtectionKeyType
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setProtectionKeyType
     */
    public function testGetSetProtectionKeyType(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);
        $protectionKeyType = ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT;

        // Test
        $contentKey->setProtectionKeyType($protectionKeyType);
        $result = $contentKey->getProtectionKeyType();

        // Assert
        $this->assertEquals($protectionKeyType, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getProtectionKeyId
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setProtectionKeyId
     */
    public function testGetSetProtectionKeyId(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);
        $protectionKeyId = 'protection-key-id-36589';

        // Test
        $contentKey->setProtectionKeyId($protectionKeyId);
        $result = $contentKey->getProtectionKeyId();

        // Assert
        $this->assertEquals($protectionKeyId, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getName
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setName
     */
    public function testGetSetName(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);
        $name = 'test Name For Content Key';

        // Test
        $contentKey->setName($name);
        $result = $contentKey->getName();

        // Assert
        $this->assertEquals($name, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getEncryptedContentKey
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setEncryptedContentKey
     */
    public function testGetSetEncryptedContentKey(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);
        $aesKey = '7868CC14AE5FA7E974FAFFAF072DDE2D250334E9D647C086D088C621B28F9F28';

        // Test
        $contentKey->setEncryptedContentKey($aesKey);
        $result = $contentKey->getEncryptedContentKey();

        // Assert
        $this->assertEquals($aesKey, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getContentKeyType
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setContentKeyType
     */
    public function testGetSetContentKeyType(){

        // Setup
        $contentKeyType = ContentKeyTypes::STORAGE_ENCRYPTION;
        $contentKeyId = 'content-key-id-12563';
        $contentKey = new ContentKey($contentKeyId);

        // Test
        $contentKey->setContentKeyType($contentKeyType);
        $result = $contentKey->getContentKeyType();

        // Assert
        $this->assertEquals($contentKeyType, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getCreated
     */
    public function testGetCreated(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $options = array(
                'Id'                       => $contentKeyId,
                'Created'                  => '2013-02-26'
        );
        $created = new \Datetime($options['Created']);
        $contentKey = ContentKey::createFromOptions($options);

        // Test
        $result = $contentKey->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getLastModified
     */
    public function testGetLastModified(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $options = array(
                'Id'                       => $contentKeyId,
                'LastModified'             => '2013-02-26'
        );
        $modified = new \Datetime($options['LastModified']);
        $contentKey = ContentKey::createFromOptions($options);

        // Test
        $result = $contentKey->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::getId
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setId
     */
    public function testGetSetId(){

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $newContentKeyId = 'content-key-id-14569';
        $contentKey = new ContentKey($contentKeyId);

        // Test
        $contentKey->setId($newContentKeyId);
        $result = $contentKey->getId();

        // Assert
        $this->assertEquals($newContentKeyId, $result);
    }

}
