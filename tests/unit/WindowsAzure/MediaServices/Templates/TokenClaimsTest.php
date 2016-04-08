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
 * @package   Tests\Unit\WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\MediaServices\Templates;
use Tests\Framework\TestResources;
use WindowsAzure\MediaServices\Templates\TokenClaim;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Unit Tests for TokenClaim
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\MediaServices\Templates
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class TokenClaimTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers WindowsAzure\MediaServices\Templates\TokenClaim::__construct
     */
    public function testNullTypeShouldThrown() {
        // Setup
        $this->setExpectedException('InvalidArgumentException');
        new TokenClaim(null);                
    }

    /**
     * @covers WindowsAzure\MediaServices\Templates\TokenClaim::getClaimType
     * @covers WindowsAzure\MediaServices\Templates\TokenClaim::setClaimType
     */
    public function testGetSetClaimType() {
        // Setup
        $entity = new TokenClaim("");
        $payload = "payload string";

        // Test
        $entity->setClaimType($payload);
        $result = $entity->getClaimType();

        // Assert
        $this->assertEquals($payload, $result);
        
    }

    /**
     * @covers WindowsAzure\MediaServices\Templates\TokenClaim::getClaimValue
     * @covers WindowsAzure\MediaServices\Templates\TokenClaim::setClaimValue
     */
    public function testGetSetClaimValue() {
        // Setup
        $entity = new TokenClaim("");
        $payload = "payload string";

        // Test
        $entity->setClaimValue($payload);
        $result = $entity->getClaimValue();

        // Assert
        $this->assertEquals($payload, $result);
    }    
}
