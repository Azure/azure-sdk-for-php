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

use WindowsAzure\MediaServices\Models\IngestManifestStatistics;

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
class IngestManifestStatisticsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::createFromOptions
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::fromArray
     */
    public function testCreateFromOptions()
    {

        // Setup
        $pendingFilesCount = 0;
        $finishedFilesCount = 3;
        $errorFilesCount = 1;
        $errorFilesDetails = 'error Files Details';
        $options = [
                'PendingFilesCount' => $pendingFilesCount,
                'FinishedFilesCount' => $finishedFilesCount,
                'ErrorFilesCount' => $errorFilesCount,
                'ErrorFilesDetails' => $errorFilesDetails,
        ];

        // Test
        $manifestStatistics = IngestManifestStatistics::createFromOptions($options);

        // Assert
        $this->assertEquals($pendingFilesCount, $manifestStatistics->getPendingFilesCount());
        $this->assertEquals($finishedFilesCount, $manifestStatistics->getFinishedFilesCount());
        $this->assertEquals($errorFilesCount, $manifestStatistics->getErrorFilesCount());
        $this->assertEquals($errorFilesDetails, $manifestStatistics->getErrorFilesDetails());
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::getErrorFilesDetails
     */
    public function testGetErrorFilesDetails()
    {

        // Setup
        $errorFilesDetails = 'error Files Details';
        $options = [
                'ErrorFilesDetails' => $errorFilesDetails,
        ];
        $manifestStatistics = IngestManifestStatistics::createFromOptions($options);

        // Test
        $result = $manifestStatistics->getErrorFilesDetails();

        // Assert
        $this->assertEquals($errorFilesDetails, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::getErrorFilesCount
     */
    public function testGetErrorFilesCount()
    {

        // Setup
        $errorFilesCount = 2;
        $options = [
                'ErrorFilesCount' => $errorFilesCount,
        ];
        $manifestStatistics = IngestManifestStatistics::createFromOptions($options);

        // Test
        $result = $manifestStatistics->getErrorFilesCount();

        // Assert
        $this->assertEquals($errorFilesCount, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::getFinishedFilesCount
     */
    public function testGetFinishedFilesCount()
    {

        // Setup
        $finishedFilesCount = 2;
        $options = [
                'FinishedFilesCount' => $finishedFilesCount,
        ];
        $manifestStatistics = IngestManifestStatistics::createFromOptions($options);

        // Test
        $result = $manifestStatistics->getFinishedFilesCount();

        // Assert
        $this->assertEquals($finishedFilesCount, $result);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Models\IngestManifestStatistics::getPendingFilesCount
     */
    public function testGetPendingFilesCount()
    {

        // Setup
        $pendingFilesCount = 2;
        $options = [
                'PendingFilesCount' => $pendingFilesCount,
        ];
        $manifestStatistics = IngestManifestStatistics::createFromOptions($options);

        // Test
        $result = $manifestStatistics->getPendingFilesCount();

        // Assert
        $this->assertEquals($pendingFilesCount, $result);
    }
}
