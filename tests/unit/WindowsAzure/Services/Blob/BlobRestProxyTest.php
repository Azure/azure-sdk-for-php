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

use Tests\Framework\BlobRestProxyTestBase;
use PEAR2\WindowsAzure\Core\AzureUtilities;
use PEAR2\WindowsAzure\Core\ServiceException;
use PEAR2\Tests\Framework\TestResources;
use PEAR2\WindowsAzure\Services\Core\Models\ServiceProperties;
use PEAR2\WindowsAzure\Services\Blob\Models\ListContainersOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListContainersResult;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateContainerOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\ContainerACL;

/**
 * Unit tests for class BlobRestProxy
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Unit\WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobRestProxyTest extends BlobRestProxyTestBase
{
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::getServiceProperties
    */
    public function testGetServiceProperties()
    {
        if (AzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Test
        $result = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($this->defaultProperties->toArray(), $result->getValue()->toArray());
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::setServiceProperties
    */
    public function testSetServiceProperties()
    {
        if (AzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $expected = ServiceProperties::create(TestResources::setServicePropertiesSample());
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml(), $actual->getValue()->toXml());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
     * @covers PEAR2\WindowsAzure\Services\Core\ServiceRestProxy::send
     */
    public function testListContainersSimple()
    {
        // Setup
        $container1 = 'listcontainersimple1';
        $container2 = 'listcontainersimple2';
        $container3 = 'listcontainersimple3';

        parent::createContainer($container1);
        parent::createContainer($container2);
        parent::createContainer($container3);
        
        // Test
        $result = $this->wrapper->listContainers();

        // Assert
        $containers = $result->getContainers();
        $this->assertEquals($container1, $containers[0]->getName());
        $this->assertEquals($container2, $containers[1]->getName());
        $this->assertEquals($container3, $containers[2]->getName());
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
    */
    public function testListContainersWithOptions()
    {
        // Setup
        $container1        = 'listcontainerwithoptions1';
        $container2        = 'listcontainerwithoptions2';
        $container3        = 'mlistcontainerwithoptions3';
        $metadataName  = 'Mymetadataname';
        $metadataValue = 'MetadataValue';
        $options = new CreateContainerOptions();
        $options->addMetadata($metadataName, $metadataValue);
        parent::createContainer($container1);
        parent::createContainer($container2, $options);
        parent::createContainer($container3);
        $options = new ListContainersOptions();
        $options->setPrefix('list');
        $options->setIncludeMetadata(true);
        
        // Test
        $result = $this->wrapper->listContainers($options);
        
        // Assert
        $containers   = $result->getContainers();
        $metadata = $containers[1]->getMetadata();
        $this->assertEquals(2, count($containers));
        $this->assertEquals($container1, $containers[0]->getName());
        $this->assertEquals($container2, $containers[1]->getName());
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
    */
    public function testListContainersWithNextMarker()
    {
        // Setup
        $container1 = 'listcontainerswithnextmarker1';
        $container2 = 'listcontainerswithnextmarker2';
        $container3 = 'listcontainerswithnextmarker3';
        parent::createContainer($container1);
        parent::createContainer($container2);
        parent::createContainer($container3);
        $options = new ListContainersOptions();
        $options->setMaxResults('2');
        
        // Test
        $result = $this->wrapper->listContainers($options);
        
        // Assert
        $containers = $result->getContainers();
        $this->assertEquals(2, count($containers));
        $this->assertEquals($container1, $containers[0]->getName());
        $this->assertEquals($container2, $containers[1]->getName());
        
        // Test
        $options->setMarker($result->getNextMarker());
        $result = $this->wrapper->listContainers($options);
        $containers = $result->getContainers();

        // Assert
        $this->assertEquals(1, count($containers));
        $this->assertEquals($container3, $containers[0]->getName());
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
    */
    public function testListContainersWithInvalidNextMarkerFail()
    {
        if (\PEAR2\WindowsAzure\Core\AzureUtilities::isEmulated()) {
            $this->markTestSkipped(self::NOT_SUPPORTED);
        }
        
        // Setup
        $container1 = 'listcontainerswithinvalidnextmarker1';
        $container2 = 'listcontainerswithinvalidnextmarker2';
        $container3 = 'listcontainerswithinvalidnextmarker3';
        parent::createContainer($container1);
        parent::createContainer($container2);
        parent::createContainer($container3);
        $options = new ListContainersOptions();
        $options->setMaxResults('2');
        $this->setExpectedException(get_class(new ServiceException('409')));
        
        // Test
        $this->wrapper->listContainers($options);
        $options->setMarker('wrong marker');
        $this->wrapper->listContainers($options);
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
    */
    public function testListContainersWithNoContainers()
    {
        // Test
        $result = $this->wrapper->listContainers();
        
        // Assert
        $containers = $result->getContainers();
        $this->assertTrue(empty($containers));
    }

    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::listContainers
    */
    public function testListContainersWithOneResult()
    {
        // Setup
        $containerName = 'listcontainerswithoneresult';
        parent::createContainer($containerName);
        
        // Test
        $result = $this->wrapper->listContainers();
        $containers = $result->getContainers();

        // Assert
        $this->assertEquals(1, count($containers));
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::createContainer
    */
    public function testCreateContainerSimple()
    {
        // Setup
        $containerName = 'createcontainersimple';
        
        // Test
        $this->createContainer($containerName);
        
        // Assert
        $result = $this->wrapper->listContainers();
        $containers = $result->getContainers();
        $this->assertEquals(1, count($containers));
        $this->assertEquals($containers[0]->getName(), $containerName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::createContainer
    */
    public function testCreateContainerWithoutOptions()
    {
        // Setup
        $containerName = 'createcontainerwithoutoptions';
        
        // Test
        $this->wrapper->createContainer($containerName);
        $this->_createdContainers[] = $containerName;
        
        // Assert
        $result = $this->wrapper->listContainers();
        $containers = $result->getContainers();
        $this->assertEquals(1, count($containers));
        $this->assertEquals($containers[0]->getName(), $containerName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::createContainer
    */
    public function testCreateContainerWithMetadata()
    {
        $containerName = 'createcontainerwithmetadata';
        $metadataName  = 'Name';
        $metadataValue = 'MyName';
        $options = new CreateContainerOptions();
        $options->addMetadata($metadataName, $metadataValue);
        $options->setPublicAccess('blob');
        
        // Test
        $this->createContainer($containerName, $options);

        // Assert
        $options = new ListContainersOptions();
        $options->setIncludeMetadata(true);
        $result   = $this->wrapper->listContainers($options);
        $containers   = $result->getContainers();
        $metadata = $containers[0]->getMetadata();
        $this->assertEquals($metadataValue, $metadata[$metadataName]);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::createContainer
    */
    public function testCreateContainerInvalidNameFail()
    {
        // Setup
        $containerName = 'CreateContainerInvalidNameFail';
        $this->setExpectedException(get_class(new ServiceException('400')));
        
        // Test
        $this->createContainer($containerName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::createContainer
    */
    public function testCreateContainerAlreadyExitsFail()
    {
        // Setup
        $containerName = 'createcontaineralreadyexitsfail';
        $this->setExpectedException(get_class(new ServiceException('204')));
        $this->createContainer($containerName);

        // Test
        $this->createContainer($containerName);
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::deleteContainer
    */
    public function testDeleteContainer()
    {
        // Setup
        $containerName = 'deletecontainer';
        $this->wrapper->createContainer($containerName);
        
        // Test
        $this->wrapper->deleteContainer($containerName);
        
        // Assert
        $result = $this->wrapper->listContainers();
        $containers = $result->getContainers();
        $this->assertTrue(empty($containers));
    }
    
    /**
    * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::deleteContainer
    */
    public function testDeleteContainerFail()
    {
        // Setup
        $containerName = 'deletecontainerfail';
        $this->setExpectedException(get_class(new ServiceException('404')));
        
        // Test
        $this->wrapper->deleteContainer($containerName);
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::getContainerProperties
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::_getContainerPropertiesImpl
     */
    public function testGetContainerProperties()
    {
        // Setup
        $name = 'getcontainerproperties';
        $this->createContainer($name);
        
        // Test
        $result = $this->wrapper->getContainerProperties($name);
        
        // Assert
        $this->assertNotNull($result->getEtag());
        $this->assertNotNull($result->getLastModified());
        $this->assertCount(0, $result->getMetadata());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::getContainerMetadata
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::_getContainerPropertiesImpl
     */
    public function testGetContainerMetadata()
    {
        // Setup
        $name     = 'getcontainermetadata';
        $options  = new CreateContainerOptions();
        $expected = array ('name1' => 'MyName1', 'mymetaname' => '12345', 'values' => 'Microsoft_');
        $options->setMetadata($expected);
        $this->createContainer($name, $options);
        $result = $this->wrapper->getContainerProperties($name);
        $expectedEtag = $result->getEtag();
        $expectedLastModified = $result->getLastModified();
        
        // Test
        $result = $this->wrapper->getContainerMetadata($name);
        
        // Assert
        $this->assertEquals($expectedEtag, $result->getEtag());
        $this->assertEquals($expectedLastModified, $result->getLastModified());
        $this->assertEquals($expected, $result->getMetadata());
    }

    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::getContainerACL
     */
    public function testGetContainerACL()
    {
        // Setup
        $name = 'getcontaineracl';
        $expectedAccess = 'container';
        $this->createContainer($name);
        
        // Test
        $result = $this->wrapper->getContainerACL($name);
        
        // Assert
        $this->assertEquals($expectedAccess, $result->getContainerACL()->getPublicAccess());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::setContainerACL
     */
    public function testSetContainerACL()
    {
        // Setup
        $name = 'setcontaineracl';
        $this->createContainer($name);
        $sample = TestResources::getContainerACLMultipleEntriesSample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = 'Sun, 25 Sep 2011 19:42:18 GMT';
        $expectedPublicAccess = 'container';
        $acl = ContainerACL::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample['SignedIdentifiers']);
        
        // Test
        $this->wrapper->setContainerACL($name, $acl);
        
        // Assert
        $actual = $this->wrapper->getContainerACL($name);
        $this->assertEquals($acl->getPublicAccess(), $actual->getContainerACL()->getPublicAccess());
        $this->assertEquals($acl->getSignedIdentifiers(), $actual->getContainerACL()->getSignedIdentifiers());
    }
    
    /**
     * @covers PEAR2\WindowsAzure\Services\Blob\BlobRestProxy::setContainerMetadata
     */
    public function testSetContainerMetadata()
    {
        // Setup
        $name     = 'setcontainermetadata';
        $expected = array ('name1' => 'MyName1', 'mymetaname' => '12345', 'values' => 'Microsoft_');
        $this->createContainer($name);
        
        // Test
        $this->wrapper->setContainerMetadata($name, $expected);
        
        // Assert
        $result = $this->wrapper->getContainerProperties($name);
        $expectedEtag = $result->getEtag();
        $expectedLastModified = $result->getLastModified();
        $this->assertEquals($expectedEtag, $result->getEtag());
        $this->assertEquals($expectedLastModified, $result->getLastModified());
        $this->assertEquals($expected, $result->getMetadata());
    }
}

?>
