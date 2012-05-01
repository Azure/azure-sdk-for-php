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
 * @package   Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace Tests\Framework;
use WindowsAzure\Resources;
use WindowsAzure\Core\Configuration;
use WindowsAzure\ServiceManagement\ServiceManagementSettings;
use WindowsAzure\ServiceManagement\ServiceManagementService;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\ServiceManagement\Models\CreateStorageAccountOptions;
use WindowsAzure\ServiceManagement\Models\OperationStatus;
use WindowsAzure\ServiceManagement\Models\Locations;

/**
 * Test base for ServiceManagementTest class.
 *
 * @category  Microsoft
 * @package   Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceManagementRestProxyTestBase extends RestProxyTestBase
{
    protected $createdStorageAccounts;
    protected $createdAffinityGroups;
    protected $storageCount;
    protected $affinityGroupCount;
    
    public static function setUpBeforeClass()
    {
        if (WindowsAzureUtilities::isEmulated()) {
            throw new \Exception(self::NOT_SUPPORTED);
        }
    }
    
    public function __construct()
    {
        $config = new Configuration();
        $config->setProperty(
            ServiceManagementSettings::SUBSCRIPTION_ID,
            TestResources::serviceManagementSubscriptionId()
        );
        $config->setProperty(
            ServiceManagementSettings::CERTIFICATE_PATH,
            TestResources::serviceManagementCertificatePath()
        );
        $serviceManagementWrapper = ServiceManagementService::create($config);
        
        parent::__construct($config, $serviceManagementWrapper);
        
        $this->createdStorageAccounts = array();
        $this->createdAffinityGroups = array();
        $this->storageCount = count($this->wrapper->listStorageAccounts()->getStorageAccounts());
        $this->affinityGroupCount = count($this->wrapper->listAffinityGroups()->getAffinityGroups());
    }

    public function createAffinityGroup($name)
    {
        $location = Locations::WEST_US;
        $label = base64_encode($name);
        
        $this->wrapper->createAffinityGroup($name, $label, $location);
        $this->createdAffinityGroups[] = $name;
    }
    
    public function affinityGroupExists($name)
    {
        return !is_null($this->getAffinityGroup($name));
    }
    
    public function getAffinityGroup($name)
    {
        $result = $this->wrapper->listAffinityGroups();
        $affinityGroups = $result->getAffinityGroups();
        
        foreach ($affinityGroups as $affinityGroup) {
            if ($affinityGroup->getName() == $name) {
                return $affinityGroup;
            }
        }
        
        return null;
    }
    
    public function deleteAffinityGroup($name)
    {
        $this->wrapper->deleteAffinityGroup($name);
    }
    
    public function safeDeleteAffinityGroup($name)
    {
        try
        {
            $this->deleteAffinityGroup($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this affinity group doesn't exist
            error_log($e->getMessage());
        }
    }
    
    public function createStorageAccount($name, $options = null)
    {
        $label = base64_encode($name);
        $options = new CreateStorageAccountOptions();
        $options->setLocation('West US');
        
        $result = $this->wrapper->createStorageAccount($name, $label, $options);
        $this->blockUntilAsyncSucceed($result->getRequestId());
        $this->createdStorageAccounts[] = $name;
    }
    
    protected function blockUntilAsyncSucceed($requestId)
    {
        $status = null;
        
        do {
            sleep(5);
            $result = $this->wrapper->getOperationStatus($requestId);
            $status = $result->getStatus();
        }while(OperationStatus::IN_PROGRESS == $status);
        
        $this->assertEquals(OperationStatus::SUCCEEDED, $status);
    }
    
    public function storageAccountExists($name)
    {
        $result = $this->wrapper->listStorageAccounts();
        $storageAccounts = $result->getStorageAccounts();
        
        foreach ($storageAccounts as $storageAccount) {
            if ($storageAccount->getServiceName() == $name) {
                return true;
            }
        }
        
        return false;
    }
    
    public function deleteStorageAccount($name)
    {
        $this->wrapper->deleteStorageAccount($name);
    }
    
    public function safeDeleteStorageAccount($name)
    {
        try
        {
            $this->deleteStorageAccount($name);
        }
        catch (\Exception $e)
        {
            // Ignore exception and continue, will assume that this storage account doesn't exist 
            error_log($e->getMessage());
        }
    }

    protected function tearDown()
    {
        parent::tearDown();
        
        foreach ($this->createdStorageAccounts as $value) {
            $this->safeDeleteStorageAccount($value);
        }
        
        foreach ($this->createdAffinityGroups as $value) {
            $this->safeDeleteAffinityGroup($value);
        }
    }
}

?>
