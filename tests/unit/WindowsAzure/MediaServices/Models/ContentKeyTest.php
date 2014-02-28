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
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

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
     * @covers WindowsAzure\MediaServices\Models\ContentKey::createFromOptions
     * @covers WindowsAzure\MediaServices\Models\ContentKey::fromArray
     * @covers WindowsAzure\MediaServices\Models\ContentKey::__construct
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
        $contentKey = new ContentKey();

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
        $contentKey = new ContentKey();
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
        $contentKey = new ContentKey();
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
        $contentKey = new ContentKey();
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
        $contentKey = new ContentKey();
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
        $contentKey = new ContentKey();

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
        $options = array(
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
        $options = array(
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
        $newContentKeyId = 'content-key-id-14569';
        $contentKey = new ContentKey();

        // Test
        $contentKey->setId($newContentKeyId);
        $result = $contentKey->getId();

        // Assert
        $this->assertEquals($newContentKeyId, $result);
    }

    /**
     * @covers WindowsAzure\MediaServices\Models\ContentKey::setContentKey
     * @covers WindowsAzure\MediaServices\Models\ContentKey::generateChecksum
     * @covers WindowsAzure\MediaServices\Models\ContentKey::generateEncryptedContentKey
     *
     */
    public function testSetContentKey(){

        // Setup
        $protectionKey = '-----BEGIN CERTIFICATE-----
MIIDSTCCAjGgAwIBAgIQqf92wku/HLJGCbMAU8GEnDANBgkqhkiG9w0BAQQFADAuMSwwKgYDVQQD
EyN3YW1zYmx1cmVnMDAxZW5jcnlwdGFsbHNlY3JldHMtY2VydDAeFw0xMjA1MjkwNzAwMDBaFw0z
MjA1MjkwNzAwMDBaMC4xLDAqBgNVBAMTI3dhbXNibHVyZWcwMDFlbmNyeXB0YWxsc2VjcmV0cy1j
ZXJ0MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzR0SEbXefvUjb9wCUfkEiKtGQ5Gc
328qFPrhMjSo+YHe0AVviZ9YaxPPb0m1AaaRV4dqWpST2+JtDhLOmGpWmmA60tbATJDdmRzKi2eY
AyhhE76MgJgL3myCQLP42jDusWXWSMabui3/tMDQs+zfi1sJ4Ch/lm5EvksYsu6o8sCv29VRwxfD
LJPBy2NlbV4GbWz5Qxp2tAmHoROnfaRhwp6WIbquk69tEtu2U50CpPN2goLAqx2PpXAqA+prxCZY
GTHqfmFJEKtZHhizVBTFPGS3ncfnQC9QIEwFbPw6E5PO5yNaB68radWsp5uvDg33G1i8IT39GstM
W6zaaG7cNQIDAQABo2MwYTBfBgNVHQEEWDBWgBCOGT2hPhsvQioZimw8M+jOoTAwLjEsMCoGA1UE
AxMjd2Ftc2JsdXJlZzAwMWVuY3J5cHRhbGxzZWNyZXRzLWNlcnSCEKn/dsJLvxyyRgmzAFPBhJww
DQYJKoZIhvcNAQEEBQADggEBABcrQPma2ekNS3Wc5wGXL/aHyQaQRwFGymnUJ+VR8jVUZaC/U/f6
lR98eTlwycjVwRL7D15BfClGEHw66QdHejaViJCjbEIJJ3p2c9fzBKhjLhzB3VVNiLIaH6RSI1bM
Pd2eddSCqhDIn3VBN605GcYXMzhYp+YA6g9+YMNeS1b+LxX3fqixMQIxSHOLFZ1G/H2xfNawv0Vi
kH3djNui3EKT1w/8aRkUv/AAV0b3rYkP/jA1I0CPn0XFk7STYoiJ3gJoKq9EMXhit+Iwfz0sMkfh
WG12/XO+TAWqsK1ZxEjuC9OzrY7pFnNxs4Mu4S8iinehduSpY+9mDd3dHynNwT4=
-----END CERTIFICATE-----';
        $contentKey = new ContentKey();
        $aesKey = base64_decode('KbOoNIjrQONfuyU86hA8mCFNq0sFoZHx0tTFopo+/mg=');

        // Test
        $contentKey->setContentKey($aesKey, $protectionKey);
        $result = $contentKey->getEncryptedContentKey();

        // Assert
        $this->assertEquals(base64_encode(base64_decode($result)), $result);
        $this->assertNotNull($contentKey->getChecksum());
    }

}
