<?php

/**
 * TestResources class implementation.
 *
 * PHP version 5
 *
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\Tests\Unit;

/**
 * Resources for testing framework.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class TestResources
{
    const QUEUE1_NAME   = 'Queue1';
    const QUEUE2_NAME   = 'Queue2';
    const QUEUE3_NAME   = 'Queue3';
    const KEY1          = 'key1';
    const KEY2          = 'key2';
    const KEY3          = 'key3';
    const KEY4          = 'AhlzsbLRkjfwObuqff3xrhB2yWJNh1EMptmcmxFJ6fvPTVX3PZXwrG2YtYWf5DPMVgNsteKStM5iBLlknYFVoA==';
    const VALUE1        = 'value1';
    const VALUE2        = 'value2';
    const VALUE3        = 'value3';
    const ACCOUNT_NAME  = 'myaccount';
    const QUEUE_URI     = 'queue.core.windows.net';
    const URI1          = "http://myaccount.queue.core.windows.net/myqueue";
    const URI2          = "http://myaccount.queue.core.windows.net/?comp=list";
    const DATE1         = 'Sat, 18 Feb 2012 16:25:21 GMT';
    const DATE2         = 'Mon, 20 Feb 2012 17:12:31 GMT';
    const VALID_URL     = 'http://www.example.com/';
    const HEADER1       = 'testheader1';
    const HEADER2       = 'testheader2';
    const HEADER1_VALUE = 'HeaderValue1';
    const HEADER2_VALUE = 'HeaderValue2';

    public static function accountName()
    {
        return getenv('AZURE_ACCOUNT');
    }
    
    public static function accountKey()
    {
        return getenv('AZURE_KEY');
    }
    
    public static function getServicePropertiesSample()
    {
        $sample = array();
        $sample['Logging']['Version'] = '1.0';
        $sample['Logging']['Delete'] = 'true';
        $sample['Logging']['Read'] = 'false';
        $sample['Logging']['Write'] = 'true';
        $sample['Logging']['RetentionPolicy']['Enabled'] = 'true';
        $sample['Logging']['RetentionPolicy']['Days'] = '20';
        $sample['Metrics']['Version'] = '1.0';
        $sample['Metrics']['Enabled'] = 'true';
        $sample['Metrics']['IncludeAPIs'] = 'false';
        $sample['Metrics']['RetentionPolicy']['Enabled'] = 'true';
        $sample['Metrics']['RetentionPolicy']['Days'] = '20';
        
        return $sample;
    }
    
    public static function setServicePropertiesSample()
    {
        $sample = array();
        $sample['Logging']['Version'] = '1.0';
        $sample['Logging']['Delete'] = 'true';
        $sample['Logging']['Read'] = 'false';
        $sample['Logging']['Write'] = 'true';
        $sample['Logging']['RetentionPolicy']['Enabled'] = 'true';
        $sample['Logging']['RetentionPolicy']['Days'] = '10';
        $sample['Metrics']['Version'] = '1.0';
        $sample['Metrics']['Enabled'] = 'true';
        $sample['Metrics']['IncludeAPIs'] = 'false';
        $sample['Metrics']['RetentionPolicy']['Enabled'] = 'true';
        $sample['Metrics']['RetentionPolicy']['Days'] = '10';
        
        return $sample;
    }
}

?>
