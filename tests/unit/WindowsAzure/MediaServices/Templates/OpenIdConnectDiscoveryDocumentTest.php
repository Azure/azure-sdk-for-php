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

use WindowsAzure\MediaServices\Templates\OpenIdConnectDiscoveryDocument;

/**
 * Unit Tests for OpenIdConnectDiscoveryDocument.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.4.5_2016-09
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class OpenIdConnectDiscoveryDocumentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\MediaServices\Templates\OpenIdConnectDiscoveryDocument::getOpenIdDiscoveryUri
     * @covers WindowsAzure\MediaServices\Templates\OpenIdConnectDiscoveryDocument::setOpenIdDiscoveryUri
     */
    public function testGetSetOpenIdDiscoveryUri()
    {
        // Setup
        $entity = new OpenIdConnectDiscoveryDocument();
        $payload = 'payload string';

        // Test
        $entity->setOpenIdDiscoveryUri($payload);
        $result = $entity->getOpenIdDiscoveryUri();

        // Assert
        $this->assertEquals($payload, $result);
    }
}
