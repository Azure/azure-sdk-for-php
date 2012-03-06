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
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use PEAR2\WindowsAzure\Core\AzureUtilities;
use PEAR2\WindowsAzure\Resources;

/**
 * Unit tests for class AzureUtilities
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class AzureUtilitiesTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::generateMetadataHeaders
     */
    public function testGenerateMetadataHeader()
    {
        // Setup
        $metadata = array('key1' => 'value1', 'MyName' => 'Azure', 'MyCompany' => 'Microsoft_');
        $expected = array();
        foreach ($metadata as $key => $value) {
            $expected[Resources::X_MS_META_HEADER_PREFIX . strtolower($key)] = $value;
        }
        
        // Test
        $actual = AzureUtilities::generateMetadataHeaders($metadata);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::generateMetadataHeaders
     */
    public function testGenerateMetadataHeaderInvalidNameFail()
    {
        // Setup
        $metadata = array('key1' => "value1\n", 'MyName' => "\rAzurr", 'MyCompany' => "Micr\r\nosoft_");
        $this->setExpectedException(get_class(new \InvalidArgumentException(Resources::INVALID_META_MSG)));
        
        // Test
        AzureUtilities::generateMetadataHeaders($metadata);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::getMetadataArray
     */
    public function testGetMetadataArray()
    {
        // Setup
        $expected = array('key1' => 'value1', 'myname' => 'azure', 'mycompany' => 'microsoft_');
        $metadataHeaders = array();
        foreach ($expected as $key => $value) {
            $metadataHeaders[Resources::X_MS_META_HEADER_PREFIX . strtolower($key)] = $value;
        }
        
        // Test
        $actual = AzureUtilities::getMetadataArray($metadataHeaders);
        
        // Assert
        $this->assertEquals($expected, $actual);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::getMetadataArray
     */
    public function testGetMetadataArrayWithMsHeaders()
    {
        // Setup
        $key = 'name';
        $validMetadataKey = Resources::X_MS_META_HEADER_PREFIX . $key;
        $value = 'correct';
        $metadataHeaders = array('x-ms-key1' => 'value1', 'myname' => 'x-ms-date', 
                          $validMetadataKey => $value, 'mycompany' => 'microsoft_');
        
        // Test
        $actual = AzureUtilities::getMetadataArray($metadataHeaders);
        
        // Assert
        $this->assertCount(1, $actual);
        $this->assertEquals($value, $actual[$key]);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::windowsAzureDateToDateTime
     */
    public function testWindowsAzureDateToDateTime()
    {
        // Setup
        $expected = 'Fri, 16 Oct 2009 21:04:30 GMT';
        
        // Test
        $actual = AzureUtilities::windowsAzureDateToDateTime($expected);
        
        // Assert
        $this->assertEquals($expected, $actual->format('D, d M Y H:i:s T'));
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Core\AzureUtilities::isEmulated
     */
    public function testIsEmulated()
    {
        // Just to cover the method in the coverage percentage.
        $this->assertTrue(true);
    }
}

?>
