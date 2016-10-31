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

use WindowsAzure\MediaServices\Models\ContentKey;
use WindowsAzure\MediaServices\Models\ContentKeyTypes;
use WindowsAzure\MediaServices\Models\ProtectionKeyTypes;

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
class ContentKeyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::fromArray
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $contentKeyId = 'content-key-id-12563';
        $aesKey = '7868CC14AE5FA7E974FAFFAF072DDE2D250334E9D647C086D088C621B28F9F28';
        $options = [
                'Id' => $contentKeyId,
                'Created' => '2013-02-26',
                'LastModified' => '2013-02-26',
                'ContentKeyType' => ContentKeyTypes::STORAGE_ENCRYPTION,
                'EncryptedContentKey' => $aesKey,
                'Name' => 'testNameForContentKey',
                'ProtectionKeyId' => 'protection-key-id-36589',
                'ProtectionKeyType' => ProtectionKeyTypes::X509_CERTIFICATE_THUMBPRINT,
                'Checksum' => 'checksum-of-content-key',
                'AuthorizationPolicyId' => 'authorization-policy-id',
        ];
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
        $this->assertEquals($options['AuthorizationPolicyId'], $contentKey->getAuthorizationPolicyId());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getChecksum
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setChecksum
     */
    public function testGetSetChecksum()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getProtectionKeyType
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setProtectionKeyType
     */
    public function testGetSetProtectionKeyType()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getProtectionKeyId
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setProtectionKeyId
     */
    public function testGetSetProtectionKeyId()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getName
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setName
     */
    public function testGetSetName()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getEncryptedContentKey
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setEncryptedContentKey
     */
    public function testGetSetEncryptedContentKey()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getContentKeyType
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setContentKeyType
     */
    public function testGetSetContentKeyType()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getCreated
     */
    public function testGetCreated()
    {

        // Setup
        $options = [
                'Created' => '2013-02-26',
        ];
        $created = new \Datetime($options['Created']);
        $contentKey = ContentKey::createFromOptions($options);

        // Test
        $result = $contentKey->getCreated();

        // Assert
        $this->assertEquals($created->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getLastModified
     */
    public function testGetLastModified()
    {

        // Setup
        $options = [
                'LastModified' => '2013-02-26',
        ];
        $modified = new \Datetime($options['LastModified']);
        $contentKey = ContentKey::createFromOptions($options);

        // Test
        $result = $contentKey->getLastModified();

        // Assert
        $this->assertEquals($modified->getTimestamp(), $result->getTimestamp());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getId
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setId
     */
    public function testGetSetId()
    {

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
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::getAuthorizationPolicyId
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setAuthorizationPolicyId
     */
    public function testGetSetAuthorizationPolicyId()
    {

        // Setup
        $newAuthorizationPolicyId = 'authorization-policy-id';
        $contentKey = new ContentKey();

        // Test
        $contentKey->setAuthorizationPolicyId($newAuthorizationPolicyId);
        $result = $contentKey->getAuthorizationPolicyId();

        // Assert
        $this->assertEquals($newAuthorizationPolicyId, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::setContentKey
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::_generateChecksum
     * @covers \WindowsAzure\MediaServices\Models\ContentKey::_generateEncryptedContentKey
     */
    public function testSetContentKey()
    {

        // Setup
$protectionKey = '-----BEGIN CERTIFICATE-----
MIICWDCCAcGgAwIBAgIJAMoW3Bym8NviMA0GCSqGSIb3DQEBBQUAMEUxCzAJBgNV
BAYTAkFVMRMwEQYDVQQIDApTb21lLVN0YXRlMSEwHwYDVQQKDBhJbnRlcm5ldCBX
aWRnaXRzIFB0eSBMdGQwHhcNMTQwMzA0MTExNTMxWhcNMTQwNDAzMTExNTMxWjBF
MQswCQYDVQQGEwJBVTETMBEGA1UECAwKU29tZS1TdGF0ZTEhMB8GA1UECgwYSW50
ZXJuZXQgV2lkZ2l0cyBQdHkgTHRkMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKB
gQCnUuC20WGTH8iBp/CcHOthHN/RodGDfiUmtGVAH60toze4lNkdy3xstHrdIkWY
YOc3bTtiOLcl78YXkslkRTwKERCwLYsSQgZZK+bUE17oYpKgxKvW3Zrni8eQVzue
KEjQGyGpdJw7C2RCtx31e941RVlXh2kda1KmF66EUrRywwIDAQABo1AwTjAdBgNV
HQ4EFgQUUeTVs4bfDo7Ap/nWHvBbaPlcMjIwHwYDVR0jBBgwFoAUUeTVs4bfDo7A
p/nWHvBbaPlcMjIwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCQvweb
V2mQn2pGNuquGkStf+AYEPB4kxqRBBcbxOiWtHZsr/K0zIe0fWEiMKE/7X6CAgtJ
JeryWs9JlCjCqU6O2WMxuOI2JRneprs78/3jieYbAAgpEK9LyhZC6QCT3WKrvh+j
3uVcuoKBfVUFTvVtpSVttL7cNULIGYpP/V1yVg==
-----END CERTIFICATE-----';

        $private = '-----BEGIN RSA PRIVATE KEY-----
MIICXAIBAAKBgQCnUuC20WGTH8iBp/CcHOthHN/RodGDfiUmtGVAH60toze4lNkd
y3xstHrdIkWYYOc3bTtiOLcl78YXkslkRTwKERCwLYsSQgZZK+bUE17oYpKgxKvW
3Zrni8eQVzueKEjQGyGpdJw7C2RCtx31e941RVlXh2kda1KmF66EUrRywwIDAQAB
AoGAJWAG3+9PO1zbHdMUlNqE3VFk0V+y/As+YzHid/tbZJlTxgBBqz0b0vBRjXmt
UAc9Po1AuYTvrCKt/fAE2kf4y+5dw6UeUpsfWbmDbFY1BPbgeETFXDE7DEXb7IJg
YlDKOq7XwdQBUe1s2P7yAhfLggyjnnJKi6i/ZSrWYmrvCGkCQQDTsof9FmFZkrNK
ZjoxFGOl5+2ZzW+3nZUKdiWKRHqZADMrajCtGJqSIFoZMuItiKxy8CXgTlNYxxXu
5wFjmxjFAkEAylcTCAruZ2T+/+2WBpJNRLHZh+ivrSV/9PWr0GUSKBSG4iN/f6w7
7MHCUqJlhLE95xq+TnpcDaFWKqQPTQRF5wJAEZhKEy/0AWTe//UFKyUdryFaryjS
+zjetVLihd5xLhxFJHub9hcQacrEkkmXYN92Lctl6oG4Da3mVcffZq7yXQJBAIYh
Oqh2Npurw658HJu2mCoVi5IgmXQ6C5yizoaSuXqAQPnfdkF4NzE3ME3/ATT5GYP9
onH7gtI2RRx3LP1s+7kCQDa5BheXwTt/yVachh3+eYlWszGbFxbOlFKn20wy68bZ
hfb0RVoAxC2qqoNJKMNuN2Rct/j1Gk8qKp5YtaW12+M=
-----END RSA PRIVATE KEY-----';

        $contentKey = new ContentKey();
        $contentKey->setId('content-key-id-156k');
        $aesKey = base64_decode('KbOoNIjrQONfuyU86hA8mCFNq0sFoZHx0tTFopo+/mg=');
        $checksum = '/IJUKYWw980=';

        // Test
        $contentKey->setContentKey($aesKey, $protectionKey);

        // Assert
        openssl_private_decrypt(
            base64_decode($contentKey->getEncryptedContentKey()),
            $decryptedContentKey,
            openssl_get_privatekey($private),
            OPENSSL_PKCS1_OAEP_PADDING
        );

        $this->assertEquals($decryptedContentKey, $aesKey);
        $this->assertEquals($checksum, $contentKey->getChecksum());
    }
}
