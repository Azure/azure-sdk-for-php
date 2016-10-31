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

use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\MediaServices\Templates\TokenType;
use WindowsAzure\MediaServices\Templates\OpenIdConnectDiscoveryDocument;

/**
 * Unit Tests for TokenRestrictionTemplate.
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
class TokenRestrictionTemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getAlternateVerificationKeys
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setAlternateVerificationKeys
     */
    public function testGetSetAlternateVerificationKeys()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = [];
        $payload[] = new SymmetricVerificationKey();

        // Test
        $entity->setAlternateVerificationKeys($payload);
        $result = $entity->getAlternateVerificationKeys();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getAudience
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setAudience
     */
    public function testGetSetAudience()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = 'payload string';

        // Test
        $entity->setAudience($payload);
        $result = $entity->getAudience();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getIssuer
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setIssuer
     */
    public function testGetSetIssuer()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = 'payload string';

        // Test
        $entity->setIssuer($payload);
        $result = $entity->getIssuer();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getPrimaryVerificationKey
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setPrimaryVerificationKey
     */
    public function testGetSetPrimaryVerificationKey()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = new SymmetricVerificationKey();

        // Test
        $entity->setPrimaryVerificationKey($payload);
        $result = $entity->getPrimaryVerificationKey();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getRequiredClaims
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setRequiredClaims
     */
    public function testGetSetRequiredClaims()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = [];
        $payload[] = new TokenClaim(TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE);

        // Test
        $entity->setRequiredClaims($payload);
        $result = $entity->getRequiredClaims();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getTokenType
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setTokenType
     */
    public function testGetSetTokenType()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = TokenType::JWT;

        // Test
        $entity->setTokenType($payload);
        $result = $entity->getTokenType();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::getOpenIdConnectDiscoveryDocument
     * @covers \WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate::setOpenIdConnectDiscoveryDocument
     */
    public function testGetSetOpenIdConnectDiscoveryDocument()
    {
        // Setup
        $entity = new TokenRestrictionTemplate();
        $payload = new OpenIdConnectDiscoveryDocument();

        // Test
        $entity->setOpenIdConnectDiscoveryDocument($payload);
        $result = $entity->getOpenIdConnectDiscoveryDocument();

        // Assert
        $this->assertEquals($payload, $result);
    }
}
