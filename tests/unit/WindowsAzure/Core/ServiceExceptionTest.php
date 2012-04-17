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
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

use WindowsAzure\Core\ServiceException;

/**
 * Unit tests for class ServiceException
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceExceptionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Core\ServiceException::__construct
     */
    public function test__construct()
    {
        // Setup
        $code = '210';
        $error = 'Invalid value provided';
        $reason = 'Value can\'t be null';
        
        // Test
        $e = new ServiceException($code, $error, $reason);
        
        // Assert
        $this->assertEquals($code, $e->getCode());
        $this->assertEquals($error, $e->getErrorText());
        $this->assertEquals($reason, $e->getErrorReason());
    }
    
    /**
     * @covers WindowsAzure\Core\ServiceException::getErrorText
     */
    public function testGetErrorText()
    {
        // Setup
        $code = '210';
        $error = 'Invalid value provided';
        $reason = 'Value can\'t be null';
        $e = new ServiceException($code, $error, $reason);
        
        // Test
        $actualError = $e->getErrorText();
        // Assert
        $this->assertEquals($error, $actualError);
    }
    
    /**
     * @covers WindowsAzure\Core\ServiceException::getErrorReason
     */
    public function testGetErrorReason()
    {
        // Setup
        $code = '210';
        $error = 'Invalid value provided';
        $reason = 'Value can\'t be null';
        $e = new ServiceException($code, $error, $reason);

        // Test
        $actualErrorReason = $e->getErrorReason();
        
        // Assert
        $this->assertEquals($reason, $actualErrorReason);
    }
}

?>
