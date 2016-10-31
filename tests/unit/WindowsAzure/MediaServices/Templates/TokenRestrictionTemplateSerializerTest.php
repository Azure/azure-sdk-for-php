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

namespace Tests\unit\WindowsAzure\MediaServices\Templates;

use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\TokenType;
use WindowsAzure\MediaServices\Templates\TokenClaim;

use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\TokenVerificationKey;
use WindowsAzure\MediaServices\Templates\X509CertTokenVerificationKey;

/**
 * Unit Tests for TokenRestrictionTemplateSerializer.
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
class TokenRestrictionTemplateSerializerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testKnownGoodInputForSWT()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><AlternateVerificationKeys /><Audience>http://sampleaudience/</Audience><Issuer>http://sampleissuerurl/</Issuer><PrimaryVerificationKey i:type="SymmetricVerificationKey"><KeyValue>2OvxltHKwILn5PCRD8H+63sK98LBs1yF+ZdZbwzmToWYm29pLyqIMuCvMRGpLOv5DYh3NmpzWMAciu4ncW8VTg==</KeyValue></PrimaryVerificationKey><RequiredClaims><TokenClaim><ClaimType>urn:microsoft:azure:mediaservices:contentkeyidentifier</ClaimType><ClaimValue i:nil="true" /></TokenClaim><TokenClaim><ClaimType>urn:myservice:claims:rental</ClaimType><ClaimValue>true</ClaimValue></TokenClaim></RequiredClaims><TokenType>SWT</TokenType></TokenRestrictionTemplate>';

        // Test
        $tokenRestriction = TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);

        // Assert
        $this->assertNotNull($tokenRestriction);
        $this->assertEquals(TokenType::SWT, $tokenRestriction->getTokenType());
        $this->assertEquals('http://sampleaudience/', $tokenRestriction->getAudience());
        $this->assertEquals('http://sampleissuerurl/', $tokenRestriction->getIssuer());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testKnownGoodInputForJWT()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><AlternateVerificationKeys /><Audience>http://sampleaudience/</Audience><Issuer>http://sampleissuerurl/</Issuer><PrimaryVerificationKey i:type="X509CertTokenVerificationKey"><RawBody>MIIDAzCCAeugAwIBAgIQ2cl0q8oGkaFG+ZTZYsilhDANBgkqhkiG9w0BAQ0FADARMQ8wDQYDVQQDEwZDQVJvb3QwHhcNMTQxMjAxMTg0NzI5WhcNMzkxMjMxMjM1OTU5WjARMQ8wDQYDVQQDEwZDQVJvb3QwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDjgMbtZcLtKNdJXHSGQ7l6xJBtNCVhjF4+BLZq+D2RmubKTAnGXhNGY4FO2LrPjfkWumdnv5DOlFuwHy2qrsZu1TFZxxQzU9/Yp3VAD1Afk7ShUOxniPpIO9vfkUH+FEX1Taq4ncR/TkiwnIZLy+bBa0DlF2MsPGC62KbiN4xJqvSIuecxQvcN8MZ78NDejtj1/XHF7VBmVjWi5B79GpTvY9ap39BU8nM0Q8vWb9DwmpWLz8j7hm25f+8laHIE6U8CpeeD/OrZT8ncCD0hbhR3ZGGoFqJbyv2CLPVGeaIhIxBH41zgrBYR53NjkRLTB4IEUCgeTGvSzweqlb+4totdAgMBAAGjVzBVMA8GA1UdEwEB/wQFMAMBAf8wQgYDVR0BBDswOYAQSHiCUWtQlUe79thqsTDbbqETMBExDzANBgNVBAMTBkNBUm9vdIIQ2cl0q8oGkaFG+ZTZYsilhDANBgkqhkiG9w0BAQ0FAAOCAQEABa/2D+Rxo6tp63sDFRViikNkDa5GFZscQLn4Rm35NmUt35Wc/AugLaTJ7iP5zJTYIBUI9DDhHbgFqmYpW0p14NebJlBzrRFIaoHBOsHhy4VYrxIB8Q/OvSGPgbI2c39ni/odyTYKVtJacxPrIt+MqeiFMjJ19cJSOkKT2AFoPMa/L0++znMcEObSAHYMy1U51J1njpQvNJ+MQiR8y2gvmMbGEcMgicIJxbLB2imqJWCQkFUlsrxwuuzSvNaLkdd/HyhsR1JXc+kOREO8gWjhT6MAdgGKC9+neamR7sqwJHPNfcLYTDFOhi6cJH10z74mU1Xa5uLsX+aZp2YYHUFw4Q==</RawBody></PrimaryVerificationKey><RequiredClaims /><TokenType>JWT</TokenType></TokenRestrictionTemplate>';

        // Test
        $tokenRestriction = TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);

        // Assert
        $this->assertNotNull($tokenRestriction);
        $this->assertEquals(TokenType::JWT, $tokenRestriction->getTokenType());
        $this->assertEquals('http://sampleaudience/', $tokenRestriction->getAudience());
        $this->assertEquals('http://sampleissuerurl/', $tokenRestriction->getIssuer());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testKnownGoodInputForOpenIdConnectDiscoveryDocumentJWT()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><AlternateVerificationKeys /><Audience>http://sampleaudience/</Audience><Issuer>http://sampleissuerurl/</Issuer><TokenType>JWT</TokenType><OpenIdConnectDiscoveryDocument><OpenIdDiscoveryUri>https://openconnectIddiscoveryUri</OpenIdDiscoveryUri></OpenIdConnectDiscoveryDocument></TokenRestrictionTemplate>';

        // Test
        $tokenRestriction = TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);

        // Assert
        $this->assertNotNull($tokenRestriction);
        $this->assertEquals(TokenType::JWT, $tokenRestriction->getTokenType());
        $this->assertEquals('http://sampleaudience/', $tokenRestriction->getAudience());
        $this->assertEquals('http://sampleissuerurl/', $tokenRestriction->getIssuer());
        $this->assertEquals('https://openconnectIddiscoveryUri', $tokenRestriction->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testInputMissingIssuerShouldThrow()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><AlternateVerificationKeys><TokenVerificationKey i:type="SymmetricVerificationKey"><KeyValue>GG07fDPZ+HMD2vcoknMqYjEJMb7LSq8zUmdCYMvRCevnQK//ilbhODO/FydMrHiwZGmI6XywvOOU7SSzRPlI3Q==</KeyValue></TokenVerificationKey></AlternateVerificationKeys><Audience>http://sampleaudience/</Audience><PrimaryVerificationKey i:type="SymmetricVerificationKey"><KeyValue>2OvxltHKwILn5PCRD8H+63sK98LBs1yF+ZdZbwzmToWYm29pLyqIMuCvMRGpLOv5DYh3NmpzWMAciu4ncW8VTg==</KeyValue></PrimaryVerificationKey><RequiredClaims><TokenClaim><ClaimType>urn:microsoft:azure:mediaservices:contentkeyidentifier</ClaimType><ClaimValue i:nil="true" /></TokenClaim><TokenClaim><ClaimType>urn:myservice:claims:rental</ClaimType><ClaimValue>true</ClaimValue></TokenClaim></RequiredClaims></TokenRestrictionTemplate>';
        $this->setExpectedException('RuntimeException', "The TokenRestrictionTemplate must contains an 'Issuer' element");

        // Test
        TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testInputMissingAudienceShouldThrow()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><AlternateVerificationKeys><TokenVerificationKey i:type="SymmetricVerificationKey"><KeyValue>GG07fDPZ+HMD2vcoknMqYjEJMb7LSq8zUmdCYMvRCevnQK//ilbhODO/FydMrHiwZGmI6XywvOOU7SSzRPlI3Q==</KeyValue></TokenVerificationKey></AlternateVerificationKeys><Issuer>http://sampleissuerurl/</Issuer><PrimaryVerificationKey i:type="SymmetricVerificationKey"><KeyValue>2OvxltHKwILn5PCRD8H+63sK98LBs1yF+ZdZbwzmToWYm29pLyqIMuCvMRGpLOv5DYh3NmpzWMAciu4ncW8VTg==</KeyValue></PrimaryVerificationKey><RequiredClaims><TokenClaim><ClaimType>urn:microsoft:azure:mediaservices:contentkeyidentifier</ClaimType><ClaimValue i:nil="true" /></TokenClaim><TokenClaim><ClaimType>urn:myservice:claims:rental</ClaimType><ClaimValue>true</ClaimValue></TokenClaim></RequiredClaims></TokenRestrictionTemplate>';
        $this->setExpectedException('RuntimeException', "The TokenRestrictionTemplate must contains an 'Audience' element");

        // Test
        TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testBothPrimaryVerificationKeyAndOpenIdConnectDiscoveryDocumentAreUndefinedShouldThrow()
    {
        // Setup
        $tokenTemplate = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><Audience>http://sampleaudience/</Audience><Issuer>http://sampleissuerurl/</Issuer></TokenRestrictionTemplate>';
        $this->setExpectedException('RuntimeException', 'Both PrimaryVerificationKey and OpenIdConnectDiscoveryDocument are undefined');

        // Test
        TokenRestrictionTemplateSerializer::deserialize($tokenTemplate);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::serialize
     */
    public function testSerializerSWT()
    {
        // Setup
        $fixture = '<TokenRestrictionTemplate xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://schemas.microsoft.com/Azure/MediaServices/KeyDelivery/TokenRestrictionTemplate/v1"><Audience>http://sampleaudience/</Audience><Issuer>http://sampleissuerurl/</Issuer><PrimaryVerificationKey i:type="SymmetricVerificationKey"><KeyValue>dGVzdGtleXZhbHVlMQ==</KeyValue></PrimaryVerificationKey><TokenType>JWT</TokenType></TokenRestrictionTemplate>';
        $tokenRestriction = new TokenRestrictionTemplate();
        $tokenRestriction->setTokenType(TokenType::JWT);
        $tokenRestriction->setAudience('http://sampleaudience/');
        $tokenRestriction->setIssuer('http://sampleissuerurl/');
        $key = new SymmetricVerificationKey();
        $key->setKeyValue('testkeyvalue1');
        $tokenRestriction->setPrimaryVerificationKey($key);

        // Test
        $result = TokenRestrictionTemplateSerializer::serialize($tokenRestriction);

        // Assert
        $this->assertEquals($fixture, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplateSerializer::deserialize
     */
    public function testRoundTripTest()
    {
        $template = new TokenRestrictionTemplate(TokenType::SWT);

        $template->setPrimaryVerificationKey(new SymmetricVerificationKey());
        $template->setAlternateVerificationKeys([new SymmetricVerificationKey()]);
        $template->setAudience('http://sampleaudience/');
        $template->setIssuer('http://sampleissuerurl/');

        $claims = [];
        $claims[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);
        $claims[] = new TokenClaim('Rental', 'true');

        $template->setRequiredClaims($claims);

        $serializedTemplate = TokenRestrictionTemplateSerializer::serialize($template);

        $template2 = TokenRestrictionTemplateSerializer::deserialize($serializedTemplate);
        self::assertEqualsTokenRestrictionTemplate($this, $template, $template2);
    }

    public function testKnownGoodGenerateTestTokenSWT()
    {
        // Arrange
        $expectedToken = 'urn%3amicrosoft%3aazure%3amediaservices%3acontentkeyidentifier=24734598-f050-4cbb-8b98-2dad6eaa260a&Audience=http%3a%2f%2faudience.com&ExpiresOn=1451606400&Issuer=http%3a%2f%2fissuer.com&HMACSHA256=2XrNjMo1EIZflJOovHxt9dekEhb2DhqG9fU5MjQy9vI%3d';
        $knownSymetricKey = '64bytes6RNhi8EsxcYsdYQ9zpFuNR1Ks9milykbxYWGILaK0LKzd5dCtYonsr456';
        $knownGuid = '24734598-f050-4cbb-8b98-2dad6eaa260a';
        $knownExpireOn = 1451606400; // 2016-01-01 as Unix Epoch;
        $knownAudience = 'http://audience.com';
        $knownIssuer = 'http://issuer.com';
        $template = new TokenRestrictionTemplate(TokenType::SWT);
        $key = new SymmetricVerificationKey();
        $key->setKeyValue($knownSymetricKey);
        $template->setPrimaryVerificationKey($key);
        $template->setAudience($knownAudience);
        $template->setIssuer($knownIssuer);
        $template->setRequiredClaims([new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE)]);

        // Act
        $resultsToken = TokenRestrictionTemplateSerializer::generateTestToken($template,
                $key, $knownGuid, $knownExpireOn);

        // Assert
        $this->assertEquals($expectedToken, $resultsToken);
    }

    public function testKnownGoodGenerateTestTokenJWT()
    {

        // Arrange
        $expectedToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1cm46bWljcm9zb2Z0OmF6dXJlOm1lZGlhc2VydmljZXM6Y29udGVudGtleWlkZW50aWZpZXIiOiIwOTE0NDM1ZC0xNTAwLTgwYzQtNmMyYi1mMWU1MmZkYTQ3YWUiLCJpc3MiOiJodHRwczpcL1wvdHN0LmNvbnRvc28uY29tIiwiYXVkIjoidXJuOmNvbnRvc28iLCJleHAiOjE0NTE2MDY0MDAsIm5iZiI6MTQ1MTYwNjQwMH0.voBCckYtSgVq6Z1Y8gwOBJO8DfH4-dX9ACmvSSHADso';
        $knownSymetricKey = '64bytes6RNhi8EsxcYsdYQ9zpFuNR1Ks9milykbxYWGILaK0LKzd5dCtYonsr456';
        $knownGuid = '0914435d-1500-80c4-6c2b-f1e52fda47ae';
        $knownExpireOn = 1451606400; // 2016-01-01 as Unix Epoch;
        $knownNotBefore = 1451606400; // 2016-01-01 as Unix Epoch;
        $knownAudience = 'urn:contoso';
        $knownIssuer = 'https://tst.contoso.com';
        $template = new TokenRestrictionTemplate(TokenType::JWT);
        $key = new SymmetricVerificationKey();
        $key->setKeyValue($knownSymetricKey);
        $template->setPrimaryVerificationKey($key);
        $template->setAudience($knownAudience);
        $template->setIssuer($knownIssuer);
        $template->setRequiredClaims([new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE)]);

        // Act
        $resultsToken = TokenRestrictionTemplateSerializer::generateTestToken($template,
                $key, $knownGuid, $knownExpireOn, $knownNotBefore);

        // Assert
        $this->assertEquals($expectedToken, $resultsToken);
    }

    /// Assertion

    /**
     * @param TokenRestrictionTemplateSerializerTest $test
     * @param TokenRestrictionTemplate               $expected
     * @param TokenRestrictionTemplate               $actual
     */
    public static function assertEqualsTokenRestrictionTemplate(
        TokenRestrictionTemplateSerializerTest $test,
        TokenRestrictionTemplate $expected,
        $actual)
    {
        // Assert
        $test->assertNotNull($expected);
        $test->assertNotNull($actual);
        $test->assertEquals($expected->getTokenType(), $actual->getTokenType());
        $test->assertEquals($expected->getAudience(), $actual->getAudience());
        $test->assertEquals($expected->getIssuer(), $actual->getIssuer());
        $test->assertEqualsVerificationKey(
            $test,
            $expected->getPrimaryVerificationKey(),
            $actual->getPrimaryVerificationKey());
        $test->assertEquals(count($expected->getAlternateVerificationKeys()), count($actual->getAlternateVerificationKeys()));
        for ($i = 0; $i < count($expected->getAlternateVerificationKeys()); ++$i) {
            self::assertEqualsVerificationKey(
                $test,
                $expected->getAlternateVerificationKeys()[$i],
                $actual->getAlternateVerificationKeys()[$i]);
        }
        $test->assertEquals(count($expected->getRequiredClaims()), count($actual->getRequiredClaims()));
        for ($i = 0; $i < count($expected->getRequiredClaims()); ++$i) {
            self::assertEqualsRequiredClaim(
                $test,
                $expected->getRequiredClaims()[$i],
                $actual->getRequiredClaims()[$i]);
        }
        if ($expected->getOpenIdConnectDiscoveryDocument() != null) {
            $test->assertNotNull($actual->getOpenIdConnectDiscoveryDocument());
            $test->assertEquals($expected->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri(), $actual->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri());
        } else {
            $test->assertNull($actual->getOpenIdConnectDiscoveryDocument());
        }
    }

    public static function assertEqualsVerificationKey(
        TokenRestrictionTemplateSerializerTest $test,
        TokenVerificationKey $expected,
        TokenVerificationKey $actual)
    {
        if ($expected instanceof SymmetricVerificationKey) {
            if ($actual instanceof SymmetricVerificationKey) {
                $test->assertEquals($expected->getKeyValue(), $actual->getKeyValue());
            } else {
                $test->fail();
            }
        }

        if ($expected instanceof X509CertTokenVerificationKey) {
            if ($actual instanceof X509CertTokenVerificationKey) {
                $test->assertEquals($expected->getRawBody(), $actual->getRawBody());
            } else {
                $test->fail();
            }
        }
    }

    public static function assertEqualsRequiredClaim(
        TokenRestrictionTemplateSerializerTest $test,
        TokenClaim $expected,
        TokenClaim $actual)
    {
        $test->assertEquals($expected->getClaimType(), $actual->getClaimType());
        $test->assertEquals($expected->getClaimValue(), $actual->getClaimValue());
    }
}
