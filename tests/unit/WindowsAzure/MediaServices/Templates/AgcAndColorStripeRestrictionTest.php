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

use WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction;
use WindowsAzure\MediaServices\Templates\ErrorMessages;

/**
 * Unit Tests for AgcAndColorStripeRestriction.
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
class AgcAndColorStripeRestrictionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction::__construct
     * @covers \WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction::getConfigurationData
     */
    public function testCreateAgcAndColorStripeRestriction()
    {
        // Setup
        $payload = 1;
        $entity = new AgcAndColorStripeRestriction($payload);

        // Test
        $result = $entity->getConfigurationData();

        // Assert
        $this->assertEquals($payload, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction::__construct
     */
    public function testCreateAgcAndColorStripeRestrictionWithBadConfDataShouldThrown()
    {
        // Setup
        $payload = 5;
        $this->setExpectedException('InvalidArgumentException', ErrorMessages::INVALID_TWO_BIT_CONFIGURATION_DATA);
        new AgcAndColorStripeRestriction($payload);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction::getConfigurationData
     * @covers \WindowsAzure\MediaServices\Templates\AgcAndColorStripeRestriction::setConfigurationData
     */
    public function testGetSetConfigurationData()
    {
        // Setup
        $payload = 1;
        $entity = new AgcAndColorStripeRestriction($payload);
        $payload2 = 2;

        // Test
        $entity->setConfigurationData($payload2);
        $result = $entity->getConfigurationData();

        // Assert
        $this->assertEquals($payload2, $result);
    }
}
