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

use WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy;

/**
 * Unit Tests for ContentKeyAuthorizationPolicy.
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
class ContentKeyAuthorizationPolicyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::fromArray
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::__construct
     */
    public function testCreateFromOptions()
    {

        // Setup
        $contentKeyAuthorizationPolicyId = 'content-key-authorization-policy-id-12563';
        $options = [
                'Id' => $contentKeyAuthorizationPolicyId,
                'Name' => 'testNameForContentKeyAuthorizationPolicy',
        ];

        // Test
        $contentKeyAuthorizationPolicy = ContentKeyAuthorizationPolicy::createFromOptions($options);

        // Assert
        $this->assertEquals($contentKeyAuthorizationPolicyId, $contentKeyAuthorizationPolicy->getId());
        $this->assertEquals($options['Name'], $contentKeyAuthorizationPolicy->getName());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::getName
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::setName
     */
    public function testGetSetName()
    {

        // Setup
        $testNameForContentKeyAuthorizationPolicy = 'testNameForContentKeyAuthorizationPolicy';
        $contentKeyAuthorizationPolicy = new ContentKeyAuthorizationPolicy();

        // Test
        $contentKeyAuthorizationPolicy->setName($testNameForContentKeyAuthorizationPolicy);
        $result = $contentKeyAuthorizationPolicy->getName();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicy, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::getId
     * @covers \WindowsAzure\MediaServices\Models\ContentKeyAuthorizationPolicy::setId
     */
    public function testGetSetId()
    {

        // Setup
        $testNameForContentKeyAuthorizationPolicyId = 'content-key-authorization-policy-id-312312';
        $contentKeyAuthorizationPolicy = new ContentKeyAuthorizationPolicy();

        // Test
        $contentKeyAuthorizationPolicy->setId($testNameForContentKeyAuthorizationPolicyId);
        $result = $contentKeyAuthorizationPolicy->getId();

        // Assert
        $this->assertEquals($testNameForContentKeyAuthorizationPolicyId, $result);
    }
}
