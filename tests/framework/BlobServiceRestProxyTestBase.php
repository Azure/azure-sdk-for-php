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
<<<<<<< HEAD:tests/framework/BlobRestProxyTestBase.php
 * @package   PEAR2\Tests\Framework
=======
 * @package   Tests\Framework
>>>>>>> 5bf9d542a690f36c0ba8e4b231b52097cbdda19e:tests/framework/BlobServiceRestProxyTestBase.php
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
<<<<<<< HEAD:tests/framework/BlobRestProxyTestBase.php
namespace PEAR2\Tests\Framework;
use PEAR2\Tests\Framework\RestProxyTestBase;
use PEAR2\WindowsAzure\Services\Core\Configuration;
use PEAR2\WindowsAzure\Services\Blob\BlobSettings;
use PEAR2\WindowsAzure\Services\Blob\BlobService;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateContainerOptions;
=======
namespace Tests\Framework;
use Tests\Framework\ServiceRestProxyTestBase;
use WindowsAzure\Services\Core\Configuration;
use WindowsAzure\Services\Blob\BlobSettings;
use WindowsAzure\Services\Blob\BlobService;
use Tests\Framework\TestResources;
use WindowsAzure\Services\Blob\Models\CreateContainerOptions;
>>>>>>> 5bf9d542a690f36c0ba8e4b231b52097cbdda19e:tests/framework/BlobServiceRestProxyTestBase.php

/**
 * TestBase class for each unit test class.
 *
 * @category  Microsoft
<<<<<<< HEAD:tests/framework/BlobRestProxyTestBase.php
 * @package   PEAR2\Tests\Framework
=======
 * @package   Tests\Framework
>>>>>>> 5bf9d542a690f36c0ba8e4b231b52097cbdda19e:tests/framework/BlobServiceRestProxyTestBase.php
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobServiceRestProxyTestBase extends ServiceRestProxyTestBase
{
    protected $_createdContainers;
    
    public function __construct()
    {
        $config = new Configuration();
        $blobUri = 'http://' . TestResources::accountName() . '.blob.core.windows.net';
        $config->setProperty(BlobSettings::ACCOUNT_KEY, TestResources::accountKey());
        $config->setProperty(BlobSettings::ACCOUNT_NAME, TestResources::accountName());        
        $config->setProperty(BlobSettings::URI, $blobUri);
        $blobWrapper = BlobService::create($config);
        parent::__construct($config, $blobWrapper);
        $this->_createdContainers = array();
    }
    
    public function createContainer($containerName, $options = null)
    {
        if (is_null($options)) {
            $options = new CreateContainerOptions();
            $options->setPublicAccess('container');
        }
        
        $this->wrapper->createContainer($containerName, $options);
        $this->_createdContainers[] = $containerName;
    }
    
    public function deleteContainer($containerName)
    {
        $this->wrapper->deleteContainer($containerName);
    }
    
    protected function tearDown()
    {
        parent::tearDown();
        
        foreach ($this->_createdContainers as $value) {
            try
            {
                $this->deleteContainer($value);
            }
            catch (\Exception $e)
            {
                // Ignore exception and continue, will assume that this container doesn't exist in the sotrage account
                error_log($e->getMessage());
            }
        }
    }
}

?>
