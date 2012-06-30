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
 * @package   Tests\Functional\WindowsAzure\Blob
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use Tests\Framework\FiddlerFilter;
use Tests\Framework\BlobServiceRestProxyTestBase;
use WindowsAzure\Blob\BlobService;
use WindowsAzure\Common\Configuration;

class IntegrationTestBase extends BlobServiceRestProxyTestBase
{
    public function __construct()
    {
        parent::__construct();
        $fiddlerFilter = new FiddlerFilter();
        $this->restProxy = $this->restProxy->withFilter($fiddlerFilter);
    }

    public static function tearDownAfterClass()
    {
        if (!Configuration::isEmulated()) {
            $tmp = new IntegrationTestBase();
            $serviceProperties = BlobServiceFunctionalTestData::getDefaultServiceProperties();
            $tmp->restProxy->setServiceProperties($serviceProperties);
        }
        parent::tearDownAfterClass();
    }
}
