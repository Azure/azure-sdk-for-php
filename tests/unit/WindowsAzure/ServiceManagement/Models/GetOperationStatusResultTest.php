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
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\unit\WindowsAzure\ServiceManagement\Models;

use WindowsAzure\ServiceManagement\Models\GetOperationStatusResult;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceManagement\Models\OperationStatus;

/**
 * Unit tests for class GetOperationStatusResult.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class GetOperationStatusResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::create
     */
    public function testCreateWithError()
    {
        // Setup
        $expected = new ServiceException('400', 'error message');
        $input = [
          'Error' => [
              'Code' => '400',
              'Message' => 'error message',
          ],
        ];

        // Test
        $result = GetOperationStatusResult::create($input);

        // Assert
        $this->assertEquals($expected, $result->getError());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::setId
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::getId
     */
    public function testSetId()
    {
        // Setup
        $expected = 'rsqasqoni12';
        $result = new GetOperationStatusResult();

        // Test
        $result->setId($expected);

        // Assert
        $this->assertEquals($expected, $result->getId());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::setStatus
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::getStatus
     */
    public function testSetStatus()
    {
        // Setup
        $expected = OperationStatus::FAILED;
        $result = new GetOperationStatusResult();

        // Test
        $result->setStatus($expected);

        // Assert
        $this->assertEquals($expected, $result->getStatus());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::setHttpStatusCode
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::getHttpStatusCode
     */
    public function testSetHttpStatusCode()
    {
        // Setup
        $expected = '200';
        $result = new GetOperationStatusResult();

        // Test
        $result->setHttpStatusCode($expected);

        // Assert
        $this->assertEquals($expected, $result->getHttpStatusCode());
    }

    /**
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::setError
     * @covers \WindowsAzure\ServiceManagement\Models\GetOperationStatusResult::getError
     */
    public function testSetError()
    {
        // Setup
        $expected = new ServiceException('200');
        $result = new GetOperationStatusResult();

        // Test
        $result->setError($expected);

        // Assert
        $this->assertEquals($expected, $result->getError());
    }
}
