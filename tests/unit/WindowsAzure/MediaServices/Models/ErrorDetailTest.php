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

use WindowsAzure\MediaServices\Models\ErrorDetail;

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
class ErrorDetailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\ErrorDetail::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\ErrorDetail::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $options = [
                'Code' => 404,
                'Message' => 'Not found',
        ];

        // Test
        $error = ErrorDetail::createFromOptions($options);

        //Assert
        $this->assertEquals($options['Code'], $error->getCode());
        $this->assertEquals($options['Message'], $error->getMessage());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ErrorDetail::getCode
     */
    public function testGetCode()
    {

        // Setup
        $options = [
                'Code' => 404,
                'Message' => 'Not found',
        ];
        $error = ErrorDetail::createFromOptions($options);

        // Test
        $result = $error->getCode();

        // Assert
        $this->assertEquals($options['Code'], $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\ErrorDetail::getMessage
     */
    public function testGetMessage()
    {

        // Setup
        $options = [
                'Code' => 404,
                'Message' => 'Not found',
        ];
        $error = ErrorDetail::createFromOptions($options);

        // Test
        $result = $error->getMessage();

        // Assert
        $this->assertEquals($options['Message'], $result);
    }
}
