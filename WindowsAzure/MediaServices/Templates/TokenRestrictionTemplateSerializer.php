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

namespace WindowsAzure\MediaServices\Templates;
use \Firebase\JWT\JWT;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate;
use WindowsAzure\MediaServices\Templates\SymmetricVerificationKey;
use WindowsAzure\MediaServices\Templates\X509CertTokenVerificationKey;

/**
 * Represents TokenRestrictionTemplate serializer helper class used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TokenRestrictionTemplateSerializer
{
    /**
     * Deserialize a TokenRestrictionTemplate xml into a TokenRestrictionTemplate object.
     *
     * @param string $options Array containing values for object properties
     *
     * @return TokenRestrictionTemplate
     */
    public static function deserialize($template)
    {
        $xml = simplexml_load_string($template);
        $result = new TokenRestrictionTemplate();

        // Validation
        if ($xml->getName() !== 'TokenRestrictionTemplate') {
            throw new \RuntimeException("This is not a TokenRestrictionTemplate, it is a '{$xml->getName()}'");
        }
        if (!isset($xml->Issuer)) {
            throw new \RuntimeException("The TokenRestrictionTemplate must contains an 'Issuer' element");
        }
        if (!isset($xml->Audience)) {
            throw new \RuntimeException("The TokenRestrictionTemplate must contains an 'Audience' element");
        }
        if (!isset($xml->PrimaryVerificationKey) &&
            !isset($xml->OpenIdConnectDiscoveryDocument)) {
            throw new \RuntimeException("Both PrimaryVerificationKey and OpenIdConnectDiscoveryDocument are undefined");
        }

        // decoding
        if (isset($xml->AlternateVerificationKeys)) {
            $result->setAlternateVerificationKeys(TokenRestrictionTemplateSerializer::deserializeAlternateVerificationKeys($xml->AlternateVerificationKeys));
        }

        $result->setAudience((string)$xml->Audience);
        $result->setIssuer((string)$xml->Issuer);

        if (isset($xml->PrimaryVerificationKey)) {
            $result->setPrimaryVerificationKey(TokenRestrictionTemplateSerializer::deserializeTokenVerificationKey($xml->PrimaryVerificationKey));
        }

        if (isset($xml->RequiredClaims)) {
            $result->setRequiredClaims(TokenRestrictionTemplateSerializer::deserializeRequiredClaims($xml->RequiredClaims));
        }

        if (isset($xml->TokenType)) {
            $result->setTokenType((string)$xml->TokenType);
        }

        if (isset($xml->OpenIdConnectDiscoveryDocument)) {
            $result->setOpenIdConnectDiscoveryDocument(TokenRestrictionTemplateSerializer::deserializeOpenIdConnectDiscoveryDocument($xml->OpenIdConnectDiscoveryDocument));
        }

        return $result;
    }

    /**
     * Serialize a TokenRestrictionTemplate object into a TokenRestrictionTemplate XML
     * @param TokenRestrictionTemplate $tokenRestriction
     * @return string The TokenRestrictionTemplate XML
     */
    public static function serialize($tokenRestriction) {

        if (empty($tokenRestriction->getPrimaryVerificationKey()) &&
            ($tokenRestriction->getOpenIdConnectDiscoveryDocument() == null ||
             empty($tokenRestriction->getOpenIdConnectDiscoveryDocument()->getOpenIdDiscoveryUri()))) {
            throw new \RuntimeException("Both PrimaryVerificationKey and OpenIdConnectDiscoveryDocument are null");
        }

        if (empty($tokenRestriction->getAudience())) {
            throw new \RuntimeException("TokenRestrictionTemplate Serialize: Audience is required");
        }

        if (empty($tokenRestriction->getIssuer())) {
            throw new \RuntimeException("TokenRestrictionTemplate Serialize: Issuer is required");
        }

        $writer = new \XMLWriter();

        $writer->openMemory();
        $writer->startElementNS(null, 'TokenRestrictionTemplate', Resources::TRT_XML_NAMESPACE);
        $writer->writeAttributeNS('xmlns','i', null, Resources::XSI_XML_NAMESPACE);

        if (!empty($tokenRestriction->getAlternateVerificationKeys())) {
            TokenRestrictionTemplateSerializer::serializeAlternateVerificationKeys($writer, $tokenRestriction->getAlternateVerificationKeys());
        }

        $writer->writeElement("Audience", $tokenRestriction->getAudience());
        $writer->writeElement("Issuer", $tokenRestriction->getIssuer());

        if (!empty($tokenRestriction->getPrimaryVerificationKey())) {
            $writer->startElement('PrimaryVerificationKey');
            TokenRestrictionTemplateSerializer::serializeTokenVerificationKey($writer, $tokenRestriction->getPrimaryVerificationKey());
            $writer->endElement();
        }

        if (!empty($tokenRestriction->getRequiredClaims())) {
            TokenRestrictionTemplateSerializer::serializeRequiredClaims($writer, $tokenRestriction->getRequiredClaims());
        }

        if (!empty($tokenRestriction->getTokenType())) {
            $writer->writeElement('TokenType', $tokenRestriction->getTokenType());
        }

        if (!empty($tokenRestriction->getOpenIdConnectDiscoveryDocument())) {
            TokenRestrictionTemplateSerializer::serializeOpenIdConnectDiscoveryDocument($writer, $tokenRestriction->getOpenIdConnectDiscoveryDocument());
        }

        $writer->endElement();
        return $writer->outputMemory();
    }

    public static function generateTestToken($template, $verificationKey, $contentKeyUUID, $tokenExpiration = null, $notBefore = null) {
        Validate::notNull($template, 'template');
        Validate::isA($template, 'WindowsAzure\MediaServices\Templates\TokenRestrictionTemplate', 'template');

        if ($verificationKey == null) {
            $verificationKey = $template->getPrimaryVerificationKey();
        }

        Validate::notNull($verificationKey, 'verificationKey');
        Validate::isA($verificationKey, 'WindowsAzure\MediaServices\Templates\SymmetricVerificationKey', 'verificationKey');

        if ($tokenExpiration == null) {
            $tokenExpiration = time() + 60 * 10;
        }

        if ($notBefore == null) {
            $notBefore = time() - 60 * 5;
        }

        if ($template->getTokenType() == TokenType::SWT) {
            return TokenRestrictionTemplateSerializer::generateTestTokenSWT($template, $verificationKey, $contentKeyUUID, $tokenExpiration);
        } else {
            return TokenRestrictionTemplateSerializer::generateTestTokenJWT($template, $verificationKey, $contentKeyUUID, $tokenExpiration, $notBefore);
        }

    }

    private static function generateTestTokenSWT($template, $verificationKey, $contentKeyUUID, $tokenExpiration) {
        $token = "";

        foreach($template->getRequiredClaims() as $claim) {
            $claimValue = $claim->getClaimValue();
            if ($claim->getClaimType() == TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE) {
                Validate::notNullOrEmpty($contentKeyUUID, 'contentKeyUUID');
                $claimValue = $contentKeyUUID;
            }
            $claimType = urlencode($claim->getClaimType());
            $claimValue = urlencode($claimValue);
            $token .= "{$claimType}={$claimValue}&";
        }

        $audience = urlencode($template->getAudience());
        $token .= "Audience={$audience}&";

        $token .= "ExpiresOn={$tokenExpiration}&";

        $issuer = urlencode($template->getIssuer());
        $token .= "Issuer={$issuer}";

        // Lowercase URL encode
        $token = preg_replace_callback('/%[0-9A-F]{2}/', function(array $matches) {
                        return strtolower($matches[0]);
                    }, $token);

        // sign the token
        $signature = urlencode(base64_encode(hash_hmac('sha256', $token, $verificationKey->getKeyValue(), true)));

        // Lowercase URL encode
        $signature = preg_replace_callback('/%[0-9A-F]{2}/', function(array $matches) {
                        return strtolower($matches[0]);
                    }, $signature);
        $token .= "&HMACSHA256={$signature}";

        return $token;

    }

    private static function generateTestTokenJWT($template, $verificationKey, $contentKeyUUID, $tokenExpiration, $notBefore) {
        $token = array();

        foreach($template->getRequiredClaims() as $claim) {
            $claimValue = $claim->getClaimValue();
            if ($claim->getClaimType() == TokenClaim::CONTENT_KEY_ID_CLAIM_TYPE) {
                Validate::notNullOrEmpty($contentKeyUUID, 'contentKeyUUID');
                $claimValue = $contentKeyUUID;
            }
            $token[$claim->getClaimType()] = $claimValue;
        }

        $token["iss"] = $template->getIssuer();
        $token["aud"] = $template->getAudience();
        $token["exp"] = $tokenExpiration;
        if (!empty($notBefore)) {
            $token["nbf"] = $notBefore;
        }

        return JWT::encode($token, $verificationKey->getKeyValue());
    }

    /**
     *
     * @param mixed $writer
     * @param mixed $key
     */
    private static function serializeTokenVerificationKey($writer, $key) {
        if ($key instanceof SymmetricVerificationKey) {
            $writer->writeAttributeNS('i', 'type', null, "SymmetricVerificationKey");
            $writer->writeElement("KeyValue", base64_encode($key->getKeyValue()));
        }

        if ($key instanceof X509CertTokenVerificationKey) {
            $writer->writeAttributeNS('i', 'type', null, "X509CertTokenVerificationKey");
            $writer->writeElement("RawBody", base64_encode($key->getRawBody()));
        }
    }

    /**
     *
     * @param \XMLWriter $writer XML writer
     * @param OpenIdConnectDiscoveryDocument $openid
     */
    private static function serializeOpenIdConnectDiscoveryDocument($writer, $openid) {
        if (empty($openid->getOpenIdDiscoveryUri())) {
            throw new \RuntimeException("OpenIdDiscoveryUri must not be empty.");
        }

        $writer->startElement('OpenIdConnectDiscoveryDocument');
        $writer->writeElement("OpenIdDiscoveryUri", $openid->getOpenIdDiscoveryUri());
        $writer->endElement();
    }

    /**
     *
     * @param \XMLWriter $writer XML writer
     * @param TokenVerificationKey[] $keys
     */
    private static function serializeAlternateVerificationKeys($writer, $keys) {
        $writer->startElement('AlternateVerificationKeys');
        foreach($keys as $key) {
            $writer->startElement('TokenVerificationKey');
            TokenRestrictionTemplateSerializer::serializeTokenVerificationKey($writer, $key);
            $writer->endElement();
        }
        $writer->endElement();
    }

    /**
     *
     * @param \XMLWriter $writer XML writer
     * @param TokenClaim[] $claims
     */
    private static function serializeRequiredClaims($writer, $claims) {
        $writer->startElement('RequiredClaims');
        foreach($claims as $claim) {
            $writer->startElement('TokenClaim');
            if (empty($claim->getClaimType())) {
                throw new \RuntimeException("ClaimType must not be empty.");
            }
            $writer->writeElement('ClaimType', $claim->getClaimType());
            if (!empty($claim->getClaimValue())) {
                $writer->writeElement('ClaimValue', $claim->getClaimValue());
            }
            $writer->endElement();
        }
        $writer->endElement();
    }

    /**
     * @param mixed $xmlElement
     * @return TokenVerificationKey[]
     */
    private static function deserializeAlternateVerificationKeys($xmlElement) {
        $result = array();

        foreach($xmlElement->children() as $child) {
            $result[] = TokenRestrictionTemplateSerializer::deserializeTokenVerificationKey($child);
        }

        return $result;
    }

    /**
     * @param mixed $xmlElement
     * @return TokenVerificationKey
     */
    private static function deserializeTokenVerificationKey($xmlElement) {
        if (!isset($xmlElement->attributes(Resources::XSI_XML_NAMESPACE)->type)) {
            throw new \RuntimeException("A TokenVerificationKey must contains a 'type' attribute");
        }

        $type = $xmlElement->attributes(Resources::XSI_XML_NAMESPACE)->type;

        if ($type == "SymmetricVerificationKey") {
            if (!isset($xmlElement->KeyValue)) {
                throw new \RuntimeException("The SymmetricVerificationKey must contains an 'KeyValue' element");
            }

            $key = new SymmetricVerificationKey();
            $key->setKeyValue(base64_decode($xmlElement->KeyValue));
            return $key;
        }

        if ($type == "X509CertTokenVerificationKey") {
            if (!isset($xmlElement->RawBody)) {
                throw new \RuntimeException("The X509CertTokenVerificationKey must contains a 'RawBody' element");
            }

            $key = new X509CertTokenVerificationKey();
            $key->setRawBody(base64_decode($xmlElement->RawBody));
            return $key;
        }

        throw new \RuntimeException("Unknown TokenVerificationKey type: type='{$type}'");
    }

    /**
     * @param mixed $xmlElement
     * @return TokenClaim[] Array of TokenClaim
     */
    private static function deserializeRequiredClaims($xmlElement) {
        $result = array();

        foreach($xmlElement->children() as $child) {
            if (!isset($child->ClaimType)) {
                throw new  \RuntimeException("The TokenClaim must contains a 'ClaimType' element");
            }

            $claim = new TokenClaim((string)$child->ClaimType);

            if (isset($child->ClaimValue)) {
                $claim->setClaimValue((string)$child->ClaimValue);
            }
            $result[] = $claim;
        }

        return $result;
    }

    /**
     * @param mixed $xmlElement
     * @return OpenIdConnectDiscoveryDocument OpenIdConnectDiscoveryDocument
     */
    private static function deserializeOpenIdConnectDiscoveryDocument($xmlElement) {
        if (!isset($xmlElement->OpenIdDiscoveryUri)) {
            throw new \RuntimeException("The OpenIdConnectDiscoveryDocument must contains a 'OpenIdDiscoveryUri' element");
        }

        $result = new OpenIdConnectDiscoveryDocument();
        $result->setOpenIdDiscoveryUri((string)$xmlElement->OpenIdDiscoveryUri);

        return $result;
    }
}


