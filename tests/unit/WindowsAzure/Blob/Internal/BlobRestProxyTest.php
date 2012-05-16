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
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 *            Albert Cheng <gongchen at the largest software company>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Blob;
use Tests\Framework\VirtualFileSystem;
use Tests\Framework\BlobServiceRestProxyTestBase;
use Tests\Framework\TestResources;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\Blob\Models\ListContainersResult;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\GetContainerPropertiesResult;
use WindowsAzure\Blob\Models\ContainerAcl;
use WindowsAzure\Blob\Models\ListBlobsResult;
use WindowsAzure\Blob\Models\ListBlobsOptions;
use WindowsAzure\Blob\Models\CreateBlobOptions;
use WindowsAzure\Blob\Models\SetBlobPropertiesOptions;
use WindowsAzure\Blob\Models\GetBlobMetadataResult;
use WindowsAzure\Blob\Models\SetBlobMetadataResult;
use WindowsAzure\Blob\Models\GetBlobResult;
use WindowsAzure\Blob\Models\BlobType;
use WindowsAzure\Blob\Models\PageRange;
use WindowsAzure\Blob\Models\CreateBlobPagesResult;
use WindowsAzure\Blob\Models\BlockList;
use WindowsAzure\Blob\Models\BlobBlockType;
use WindowsAzure\Blob\Models\GetBlobOptions;
use WindowsAzure\Blob\Models\Block;
use WindowsAzure\Blob\Models\CopyBlobOptions;
use WindowsAzure\Blob\Models\CreateBlobSnapshotOptions;
use WindowsAzure\Blob\Models\CreateBlobSnapshotResult;

/**
 * Unit tests for class BlobRestProxy
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Blob
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobRestProxyTest extends BlobServiceRestProxyTestBase
{
    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getServiceProperties
    */
    public function testGetServiceProperties()
    {
        $this->skipIfEmulated();
        
        // Test
        $result = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($this->defaultProperties->toArray(), $result->getValue()->toArray());
    }
    
    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setServiceProperties
    */
    public function testSetServiceProperties()
    {
        $this->skipIfEmulated();
        
        // Setup
        $expected = ServiceProperties::create(TestResources::setServicePropertiesSample());
        
        // Test
        $this->setServiceProperties($expected);
        $actual = $this->wrapper->getServiceProperties();
        
        // Assert
        $this->assertEquals($expected->toXml($this->xmlSerializer), $actual->getValue()->toXml($this->xmlSerializer));
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::send
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
    */
    public function testListContainersWithOptions()
    {
        // Setup
        $container1    = 'listcontainerwithoptions1';
        $container2    = 'listcontainerwithoptions2';
        $container3    = 'mlistcontainerwithoptions3';
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
    */
    public function testListContainersWithInvalidNextMarkerFail()
    {
        $this->skipIfEmulated();
        
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listContainers
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
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
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteContainer
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
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getContainerPropertiesImpl
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
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerMetadata
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getContainerPropertiesImpl
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
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getContainerAcl
     */
    public function testGetContainerAcl()
    {
        // Setup
        $name = 'getcontaineracl';
        $expectedAccess = 'container';
        $this->createContainer($name);
        
        // Test
        $result = $this->wrapper->getContainerAcl($name);
        
        // Assert
        $this->assertEquals($expectedAccess, $result->getContainerAcl()->getPublicAccess());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerAcl
     */
    public function testSetContainerAcl()
    {
        // Setup
        $name = 'setcontaineracl';
        $this->createContainer($name);
        $sample = TestResources::getContainerAclMultipleEntriesSample();
        $expectedEtag = '0x8CAFB82EFF70C46';
        $expectedLastModified = new \DateTime('Sun, 25 Sep 2011 19:42:18 GMT');
        $expectedPublicAccess = 'container';
        $acl = ContainerAcl::create($expectedPublicAccess, $expectedEtag, 
            $expectedLastModified, $sample['SignedIdentifiers']);
        
        // Test
        $this->wrapper->setContainerAcl($name, $acl);
        
        // Assert
        $actual = $this->wrapper->getContainerAcl($name);
        $this->assertEquals($acl->getPublicAccess(), $actual->getContainerAcl()->getPublicAccess());
        $this->assertEquals($acl->getSignedIdentifiers(), $actual->getContainerAcl()->getSignedIdentifiers());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setContainerMetadata
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
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::send
     */
    public function testListBlobsSimple()
    {
        // Setup
        $name  = 'listblobssimple';
        $blob1 = 'blob1';
        $blob2 = 'blob2';
        $blob3 = 'blob3';
        $length = 512;

        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob1, $length);
        $this->wrapper->createPageBlob($name, $blob2, $length);
        $this->wrapper->createPageBlob($name, $blob3, $length);
        
        // Test
        $result = $this->wrapper->listBlobs($name);

        // Assert
        $blobs = $result->getBlobs();
        $this->assertEquals($blob1, $blobs[0]->getName());
        $this->assertEquals($blob2, $blobs[1]->getName());
        $this->assertEquals($blob3, $blobs[2]->getName());
        $this->assertNull($blobs[2]->getSnapshot());
        $this->assertNotNull($blobs[2]->getUrl());
        $this->assertCount(0, $blobs[2]->getMetadata());
        $this->assertInstanceOf('WindowsAzure\Blob\Models\BlobProperties', $blobs[2]->getProperties());
    }

    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
    */
    public function testListBlobsWithOptions()
    {
        // Setup
        $name  = 'listblobswithoptions';
        $blob1 = 'blob1';
        $blob2 = 'blob2';
        $blob3 = 'blob3';
        $blob4 = 'lblob1';
        $blob5 = 'lblob2';
        $blob6 = 'lblob3';
        $length = 512;
        $options = new ListBlobsOptions();
        $options->setIncludeMetadata(true);
        $options->setIncludeSnapshots(true);
        $options->setIncludeUncommittedBlobs(true);
        $options->setMaxResults(10);
        $options->setPrefix('lb');

        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob1, $length);
        $this->wrapper->createPageBlob($name, $blob2, $length);
        $this->wrapper->createPageBlob($name, $blob3, $length);
        $this->wrapper->createPageBlob($name, $blob4, $length);
        $this->wrapper->createPageBlob($name, $blob5, $length);
        $this->wrapper->createPageBlob($name, $blob6, $length);
        
        // Test
        $result = $this->wrapper->listBlobs($name, $options);

        // Assert
        $this->assertCount(3, $result->getBlobs());
        $this->assertCount(0, $result->getBlobPrefixes());
    }
    
    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
    */
    public function testListBlobsWithOptionsWithDelimiter()
    {
        $this->skipIfEmulated();
        
        // Setup
        $name  = 'listblobswithoptionswithdelimiter';
        $blob1 = 'blob1';
        $blob2 = 'blob2';
        $blob3 = 'blob3';
        $blob4 = 'lblob1';
        $blob5 = 'lblob2';
        $blob6 = 'lblob3';
        $length = 512;
        $options = new ListBlobsOptions();
        $options->setDelimiter('b');
        $options->setIncludeMetadata(true);
        $options->setIncludeUncommittedBlobs(true);
        $options->setMaxResults(10);
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob1, $length);
        $this->wrapper->createPageBlob($name, $blob2, $length);
        $this->wrapper->createPageBlob($name, $blob3, $length);
        $this->wrapper->createPageBlob($name, $blob4, $length);
        $this->wrapper->createPageBlob($name, $blob5, $length);
        $this->wrapper->createPageBlob($name, $blob6, $length);
        
        // Test
        $result = $this->wrapper->listBlobs($name, $options);

        // Assert
        $this->assertCount(0, $result->getBlobs());
        $this->assertCount(2, $result->getBlobPrefixes());
    }

    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
    */
    public function testListBlobsWithNextMarker()
    {
        // Setup
        $name  = 'listblobswithnextmarker';
        $blob1 = 'blob1';
        $blob2 = 'blob2';
        $blob3 = 'blob3';
        $length = 512;
        $options = new ListBlobsOptions();
        $options->setMaxResults(2);

        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob1, $length);
        $this->wrapper->createPageBlob($name, $blob2, $length);
        $this->wrapper->createPageBlob($name, $blob3, $length);
        
        // Test
        $result = $this->wrapper->listBlobs($name, $options);
        
        // Assert
        $this->assertCount(2, $result->getBlobs());
        
        // Setup
        $options->setMarker($result->getNextMarker());
        
        $result = $this->wrapper->listBlobs($name, $options);

        // Assert
        $this->assertCount(1, $result->getBlobs());
    }

    /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
    */
    public function testListBlobsWithNoBlobs()
    {
        // Test
        $name = 'listblobswithnoblobs';
        $this->createContainer($name);
        $result = $this->wrapper->listBlobs($name);
        
        // Assert
        $this->assertCount(0, $result->getBlobs());
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobs
     */
    public function testListBlobsWithOneResult()
    {
        // Test
        $name = 'listblobswithoneresult';
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, 'myblob', 512);
        $result = $this->wrapper->listBlobs($name);
        
        // Assert
        $this->assertCount(1, $result->getBlobs());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addCreateBlobOptionalHeaders
     */
    public function testCreatePageBlob()
    {
        // Setup
        $name = 'createpageblob';
        $this->createContainer($name);
        
        // Test
        $this->wrapper->createPageBlob($name, 'myblob', 512);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $this->assertCount(1, $result->getBlobs());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createPageBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addCreateBlobOptionalHeaders
     */
    public function testCreatePageBlobWithExtraOptions()
    {
        // Setup
        $name = 'createpageblobwithextraoptions';
        $this->createContainer($name);
        $metadata = array('Name1' => 'Value1', 'Name2' => 'Value2');
        $contentType = Resources::BINARY_FILE_TYPE;
        $options = new CreateBlobOptions();
        $options->setMetadata($metadata);
        $options->setContentType($contentType);
        
        // Test
        $this->wrapper->createPageBlob($name, 'myblob', 512, $options);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $this->assertCount(1, $result->getBlobs());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addCreateBlobOptionalHeaders
     */
    public function testCreateBlockBlobWithBinary()
    {
        // Setup
        $name = 'createblockblobwithbinary';
        $this->createContainer($name);
        
        // Test
        $this->wrapper->createBlockBlob($name, 'myblob', '123455');
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $blobs = $result->getBlobs();
        $blob = $blobs[0];
        $this->assertCount(1, $result->getBlobs());
        $this->assertEquals(Resources::BINARY_FILE_TYPE, $blob->getProperties()->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addCreateBlobOptionalHeaders
     */
    public function testCreateBlockBlobWithPlainText()
    {
        // Setup
        $name = 'createblockblobwithplaintext';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        
        // Test
        $this->wrapper->createBlockBlob($name, 'myblob', 'Hello world', $options);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $blobs = $result->getBlobs();
        $blob = $blobs[0];
        $this->assertCount(1, $result->getBlobs());
        $this->assertEquals($contentType, $blob->getProperties()->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlockBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addCreateBlobOptionalHeaders
     */
    public function testCreateBlockBlobWithStream()
    {
        // Setup
        $name = 'createblockblobwithstream';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $fileContents = 'Hello world, I\'m a file';
        $stream = fopen(VirtualFileSystem::newFile($fileContents), 'r');
        
        // Test
        $this->wrapper->createBlockBlob($name, 'myblob', $stream, $options);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $blobs = $result->getBlobs();
        $blob = $blobs[0];
        $this->assertCount(1, $result->getBlobs());
        $this->assertEquals($contentType, $blob->getProperties()->getContentType());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getBlobPropertiesResultFromResponse
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::create
     */
    public function testGetBlobProperties()
    {
        // Setup
        $name = 'getblobproperties';
        $contentLength = 512;
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, 'myblob', $contentLength);
        
        // Test
        $result = $this->wrapper->getBlobProperties($name, 'myblob');
        
        // Assert
        $this->assertEquals($contentLength, $result->getProperties()->getContentLength());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlobProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setBlobProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getBlobPropertiesResultFromResponse
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::create
     */
    public function testSetBlobProperties()
    {
        // Setup
        $name = 'setblobproperties';
        $contentLength = 1024;
        $blob = 'myblob';
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, 'myblob', 512);
        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentLength($contentLength);
        
        // Test
        $this->wrapper->setBlobProperties($name, $blob, $options);
        
        // Assert
        $result = $this->wrapper->getBlobProperties($name, $blob);
        $this->assertEquals($contentLength, $result->getProperties()->getContentLength());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setBlobProperties
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getBlobPropertiesResultFromResponse
     * @covers WindowsAzure\Blob\Models\SetBlobPropertiesResult::create
     */
    public function testSetBlobPropertiesWithNoOptions()
    {
        // Setup
        $name = 'setblobpropertieswithnooptions';
        $blob = 'myblob';
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, 512);
        
        // Test
        $result = $this->wrapper->setBlobProperties($name, $blob);
        
        // Assert
        $this->assertInstanceOf('\DateTime', $result->getLastModified());
        $this->assertTrue(!is_null($result->getEtag()));
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlobMetadata
     * @covers WindowsAzure\Blob\Models\GetBlobMetadataResult::create
     */
    public function testGetBlobMetadata()
    {
        // Setup
        $name = 'getblobmetadata';
        $metadata = array('m1' => 'v1', 'm2' => 'v2');
        $blob = 'myblob';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setMetadata($metadata);
        $this->wrapper->createPageBlob($name, $blob, 512, $options);
        
        // Test
        $result = $this->wrapper->getBlobMetadata($name, $blob);
        
        // Assert
        $this->assertEquals($metadata, $result->getMetadata());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::setBlobMetadata
     * @covers WindowsAzure\Blob\Models\SetBlobMetadataResult::create
     * @covers WindowsAzure\Common\Internal\ServiceRestProxy::addMetadataHeaders
     */
    public function testSetBlobMetadata()
    {
        // Setup
        $name = 'setblobmetadata';
        $metadata = array('m1' => 'v1', 'm2' => 'v2');
        $blob = 'myblob';
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, 512);
        
        // Test
        $this->wrapper->setBlobMetadata($name, $blob, $metadata);
        
        // Assert
        $result = $this->wrapper->getBlobMetadata($name, $blob);
        $this->assertEquals($metadata, $result->getMetadata());
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addOptionalRangeHeader
     * @covers WindowsAzure\Blob\Models\GetBlobResult::create
     */
    public function testGetBlob()
    {
        // Setup
        $name = 'getblob';
        $blob = 'myblob';
        $metadata = array('m1' => 'v1', 'm2' => 'v2');
        $contentType = 'text/plain; charset=UTF-8';
        $contentStream = 'Hello world';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $options->setMetadata($metadata);
        $this->wrapper->createBlockBlob($name, $blob, $contentStream, $options);
        
        // Test
        $result = $this->wrapper->getBlob($name, $blob);
        
        // Assert
        $this->assertEquals(BlobType::BLOCK_BLOB, $result->getProperties()->getBlobType());
        $this->assertEquals($metadata, $result->getMetadata());
        $this->assertEquals($contentStream, stream_get_contents($result->getContentStream()));
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addOptionalRangeHeader
     * @covers WindowsAzure\Blob\Models\GetBlobResult::create
     */
    public function testGetBlobWithRange()
    {
        // Setup
        $name = '$root';
        $blob = 'myblob';
        $this->wrapper->createContainer($name);
        $this->_createdContainers[] = '$root';
        $length = 512;
        $range = new PageRange(0, 511);
        $contentStream = Resources::EMPTY_STRING;
        $this->wrapper->createPageBlob('', $blob, $length);
        for ($i = 0; $i < 512; $i++) {
            $contentStream .= 'A';
        }
        $this->wrapper->createBlobPages('', $blob, $range, $contentStream);
        $options = new GetBlobOptions();
        $options->setRangeStart(0);
        $options->setRangeEnd(511);
        
        // Test
        $result = $this->wrapper->getBlob('', $blob, $options);
        
        // Assert
        $this->assertEquals(BlobType::PAGE_BLOB, $result->getProperties()->getBlobType());
        $this->assertEquals($contentStream, stream_get_contents($result->getContentStream()));
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::getBlob
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addOptionalRangeHeader
     * @covers WindowsAzure\Blob\Models\GetBlobResult::create
     */
    public function testGetBlobGarbage()
    {
        // Setup
        $name = 'getblobwithgarbage';
        $blob = 'myblob';
        $metadata = array('m1' => 'v1', 'm2' => 'v2');
        $contentType = 'text/plain; charset=UTF-8';
        $contentStream = chr(0);
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $options->setMetadata($metadata);
        $this->wrapper->createBlockBlob($name, $blob, $contentStream, $options);
        
        // Test
        $result = $this->wrapper->getBlob($name, $blob);
        
        // Assert
        $this->assertEquals(BlobType::BLOCK_BLOB, $result->getProperties()->getBlobType());
        $this->assertEquals($metadata, $result->getMetadata());
        $this->assertEquals($contentStream, stream_get_contents($result->getContentStream()));
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::deleteBlob
     */
    public function testDeleteBlob()
    {
        // Setup
        $name = 'deleteblob';
        $blob = 'myblob';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $this->wrapper->createBlockBlob($name, $blob, 'Hello world', $options);
        
        // Test
        $this->wrapper->deleteBlob($name, $blob);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $this->assertCount(0, $result->getBlobs());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::acquireLease
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_putLeaseImpl
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_createPath
     */
    public function testAcquireLease()
    {
        // Setup
        $name = 'acquirelease';
        $blob = 'myblob';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $this->wrapper->createBlockBlob($name, $blob, 'Hello world', $options);
        
        // Test
        $result = $this->wrapper->acquireLease($name, $blob);
        
        // Assert
        $this->assertNotNull($result->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::renewLease
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_putLeaseImpl
     */
    public function testRenewLease()
    {
        // Setup
        $name = 'renewlease';
        $blob = 'myblob';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $this->wrapper->createBlockBlob($name, $blob, 'Hello world', $options);
        $result = $this->wrapper->acquireLease($name, $blob);
        
        // Test
        $result = $this->wrapper->renewLease($name, $blob, $result->getLeaseId());
        
        // Assert
        $this->assertNotNull($result->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::releaseLease
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_putLeaseImpl
     */
    public function testReleaseLease()
    {
        // Setup
        $name = 'releaselease';
        $blob = 'myblob';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $this->wrapper->createBlockBlob($name, $blob, 'Hello world', $options);
        $result = $this->wrapper->acquireLease($name, $blob);
        
        // Test
        $this->wrapper->releaseLease($name, $blob, $result->getLeaseId());
        
        // Assert
        $result = $this->wrapper->acquireLease($name, $blob);
        $this->assertNotNull($result->getLeaseId());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::breakLease
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_putLeaseImpl
     */
    public function testBreakLease()
    {
        // Setup
        $name = 'breaklease';
        $blob = 'myblob';
        $contentType = 'text/plain; charset=UTF-8';
        $this->createContainer($name);
        $options = new CreateBlobOptions();
        $options->setContentType($contentType);
        $this->wrapper->createBlockBlob($name, $blob, 'Hello world', $options);
        $result = $this->wrapper->acquireLease($name, $blob);
        
        // Test
        $this->wrapper->breakLease($name, $blob, $result->getLeaseId());
        
        // Assert
        $this->setExpectedException(get_class(new ServiceException('')));
        $result = $this->wrapper->acquireLease($name, $blob);
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlobPages
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_updatePageBlobPagesImpl
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addOptionalRangeHeader
     */
    public function testCreateBlobPages()
    {
        // Setup
        $name = 'createblobpages';
        $blob = 'myblob';
        $length = 512;
        $range = new PageRange(0, 511);
        $content = Resources::EMPTY_STRING;
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, $length);
        for ($i = 0; $i < 512; $i++) {
            $content .= 'A';
        }
        
        // Test
        $actual = $this->wrapper->createBlobPages($name, $blob, $range, $content);
        
        // Assert
        $this->assertNotNull($actual->getEtag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::clearBlobPages
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_updatePageBlobPagesImpl
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_addOptionalRangeHeader
     */
    public function testClearBlobPages()
    {
        // Setup
        $name = 'clearblobpages';
        $blob = 'myblob';
        $length = 512;
        $range = new PageRange(0, 511);
        $content = Resources::EMPTY_STRING;
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, $length);
        for ($i = 0; $i < 512; $i++) {
            $content .= 'A';
        }
        $this->wrapper->createBlobPages($name, $blob, $range, $content);
        
        // Test
        $actual = $this->wrapper->clearBlobPages($name, $blob, $range);
        
        // Assert
        $this->assertNotNull($actual->getEtag());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listPageBlobRanges
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::create
     */
    public function testListPageBlobRanges()
    {
        // Setup
        $name = 'listpageblobranges';
        $blob = 'myblob';
        $length = 512;
        $range = new PageRange(0, 511);
        $content = Resources::EMPTY_STRING;
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, $length);
        for ($i = 0; $i < 512; $i++) {
            $content .= 'A';
        }
        $this->wrapper->createBlobPages($name, $blob, $range, $content);
        
        // Test
        $result = $this->wrapper->listPageBlobRanges($name, $blob);
        
        // Assert
        $this->assertNotNull($result->getEtag());
        $this->assertCount(1, $result->getPageRanges());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listPageBlobRanges
     * @covers WindowsAzure\Blob\Models\ListPageBlobRangesResult::create
     */
    public function testListPageBlobRangesEmpty()
    {
        // Setup
        $name = 'listpageblobrangesempty';
        $blob = 'myblob';
        $length = 512;
        $this->createContainer($name);
        $this->wrapper->createPageBlob($name, $blob, $length);
        
        // Test
        $result = $this->wrapper->listPageBlobRanges($name, $blob);
        
        // Assert
        $this->assertNotNull($result->getEtag());
        $this->assertCount(0, $result->getPageRanges());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlobBlock
     */
    public function testCreateBlobBlock()
    {
        // Setup
        $name = 'createblobblock';
        $this->createContainer($name);
        $options = new ListBlobsOptions();
        $options->setIncludeUncommittedBlobs(true);

        // Test
        $this->wrapper->createBlobBlock($name, 'myblob', 'AAAAAA==', 'Hello world');

        // Assert
        $result = $this->wrapper->listBlobs($name, $options);
        $this->assertCount(1, $result->getBlobs());
    }

    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::commitBlobBlocks
     * @covers WindowsAzure\Blob\Models\BlockList::toXml
     */
    public function testCommitBlobBlocks()
    {
        // Setup
        $name = 'commitblobblocks';
        $blob = 'myblob';
        $id1 = 'AAAAAA==';
        $id2 = 'ANAAAA==';
        $this->createContainer($name);
        $this->wrapper->createBlobBlock($name, $blob, $id1, 'Hello world');
        $this->wrapper->createBlobBlock($name, $blob, $id2, 'Hello world');
        $blockList = new BlockList();
        
        $blockList->addEntry($id1, BlobBlockType::LATEST_TYPE);
        $blockList->addEntry($id2, BlobBlockType::LATEST_TYPE);
        
        // Test
        $this->wrapper->commitBlobBlocks($name, $blob, $blockList);
        
        // Assert
        $result = $this->wrapper->listBlobs($name);
        $this->assertCount(1, $result->getBlobs());
    }
    
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::commitBlobBlocks
     * @covers WindowsAzure\Blob\Models\BlockList::toXml
     */
    public function testCommitBlobBlocksWithArray()
    {
        // Setup
        $name = 'commitblobblockswitharray';
        $blob = 'myblob';
        $id1 = 'AAAAAA==';
        $id2 = 'ANAAAA==';
        $block1 = new Block();
        $block1->setBlockId($id1);
        $block1->setType(BlobBlockType::LATEST_TYPE);
        $block2 = new Block();
        $block2->setBlockId($id2);
        $block2->setType(BlobBlockType::LATEST_TYPE);
        $blockList = array($block1, $block2);
        $this->createContainer($name);
        $this->wrapper->createBlobBlock($name, $blob, $id1, 'Hello world');
        $this->wrapper->createBlobBlock($name, $blob, $id2, 'Hello world');
        
        // Test
        $this->wrapper->commitBlobBlocks($name, $blob, $blockList);

        // Assert
        $result = $this->wrapper->listBlobs($name);
        $this->assertCount(1, $result->getBlobs());
    }
     
   /**
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobBlocks
    * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::create
    * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getContentLength     
    * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getUncommittedBlocks
    * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::getCommittedBlocks
    */
   public function testListBlobBlocks()
   {
       // Setup
       $name = 'listblobblocks';
       $blob = 'myblob';
       $id1 = 'AAAAAA==';
       $id2 = 'ANAAAA==';
       $this->createContainer($name);
       $this->wrapper->createBlobBlock($name, $blob, $id1, 'Hello world');
       $this->wrapper->createBlobBlock($name, $blob, $id2, 'Hello world');

       // Test
       $result = $this->wrapper->listBlobBlocks($name, $blob);

       // Assert
       $this->assertNull($result->getEtag());
       $this->assertEquals(0, $result->getContentLength());
       $this->assertCount(2, $result->getUncommittedBlocks());
       $this->assertCount(0, $result->getCommittedBlocks());
    }
      
    /**
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::listBlobBlocks
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::create
     * @covers WindowsAzure\Blob\Models\ListBlobBlocksResult::_getEntries
     */
    public function testListBlobBlocksEmpty()
    {
        // Setup
        $name = 'listblobblocksempty';
        $blob = 'myblob';
        $content = 'Hello world';
        $this->createContainer($name);
        $this->wrapper->createBlockBlob($name, $blob, $content);
        
        // Test
        $result = $this->wrapper->listBlobBlocks($name, $blob);
        
        // Assert
        $this->assertNotNull($result->getEtag());
        $this->assertEquals(strlen($content), $result->getContentLength());
        $this->assertCount(0, $result->getUncommittedBlocks());
        $this->assertCount(0, $result->getCommittedBlocks());

    }

    /** 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::copyBlob 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getCopyBlobSourceName
     */ 
    public function testCopyBlobDifferentContainer()
    {
        // Setup
        $sourceContainerName = 'copyblobdiffcontainerssource';
        $sourceBlobName = 'sourceblob';
        $blobValue = 'testBlobValue'; 
        $destinationContainerName = 'copyblobdiffcontainersdestination'; 
        $destinationBlobName = 'destinationblob';
        $this->createContainer($sourceContainerName);
        $this->createContainer($destinationContainerName); 
        $this->wrapper->createBlockBlob($sourceContainerName, $sourceBlobName, $blobValue); 
        
        // Test
        $result = $this->wrapper->copyBlob( 
            $destinationContainerName, 
            $destinationBlobName, 
            $sourceContainerName, 
            $sourceBlobName
        ); 
        
        // Assert
        $sourceBlob = $this->wrapper->getBlob($sourceContainerName, $sourceBlobName);
        $destinationBlob = $this->wrapper->getBlob($destinationContainerName, $destinationBlobName);
        $sourceBlobContent = stream_get_contents($sourceBlob->getContentStream());
        $destinationBlobContent = stream_get_contents($destinationBlob->getContentStream());
        
        $this->assertEquals($sourceBlobContent, $destinationBlobContent);
        $this->assertNotNull($result->getEtag());
        $this->assertInstanceOf('\DateTime', $result->getlastModified());
    }
    
    /** 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::copyBlob 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getCopyBlobSourceName
     */ 
    public function testCopyBlobSameContainer()
    {
        // Setup
        $containerName = 'copyblobsamecontainer';
        $sourceBlobName = 'sourceblob';
        $blobValue = 'testBlobValue'; 
        $destinationBlobName = 'destinationblob';
        $this->createContainer($containerName);
        $this->wrapper->createBlockBlob($containerName, $sourceBlobName, $blobValue); 
        
        // Test
        $this->wrapper->copyBlob( 
            $containerName, 
            $destinationBlobName, 
            $containerName, 
            $sourceBlobName
        ); 
        
        // Assert
        $sourceBlob = $this->wrapper->getBlob($containerName, $sourceBlobName);
        $destinationBlob = $this->wrapper->getBlob($containerName, $destinationBlobName);

        $sourceBlobContent = stream_get_contents($sourceBlob->getContentStream());
        $destinationBlobContent = stream_get_contents($destinationBlob->getContentStream());
        $this->assertEquals($sourceBlobContent, $destinationBlobContent);
    }
    
    /** 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::copyBlob 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getCopyBlobSourceName
     */ 
    public function testCopyBlobExistingBlob()
    {
        // Setup
        $containerName = 'copyblobexistingblob';
        $sourceBlobName = 'sourceblob';
        $blobValue = 'testBlobValue'; 
        $oldBlobValue = 'oldBlobValue';
        $destinationBlobName = 'destinationblob';
        $this->createContainer($containerName);
        $this->wrapper->createBlockBlob($containerName, $sourceBlobName, $blobValue); 
        $this->wrapper->createBlockBlob($containerName, $destinationBlobName, $oldBlobValue); 
        
        // Test
        $this->wrapper->copyBlob( 
            $containerName, 
            $destinationBlobName, 
            $containerName, 
            $sourceBlobName
        ); 
        
        // Assert
        $sourceBlob = $this->wrapper->getBlob($containerName, $sourceBlobName);
        $destinationBlob = $this->wrapper->getBlob($containerName, $destinationBlobName);
        $sourceBlobContent = stream_get_contents($sourceBlob->getContentStream());
        $destinationBlobContent = stream_get_contents($destinationBlob->getContentStream());
        
        $this->assertEquals($sourceBlobContent, $destinationBlobContent);
        $this->assertNotEquals($destinationBlobContent, $oldBlobValue);
    }
    
    /** 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::copyBlob 
     * @covers WindowsAzure\Blob\Internal\BlobRestProxy::_getCopyBlobSourceName
     */ 
    public function testCopyBlobSnapshot()
    {
        // Setup
        $containerName = 'copyblobsnapshot';
        $sourceBlobName = 'sourceblob';
        $blobValue = 'testBlobValue'; 
        $destinationBlobName = 'destinationblob';
        $this->createContainer($containerName);
        $this->wrapper->createBlockBlob($containerName, $sourceBlobName, $blobValue);
        $snapshotResult = $this->wrapper->createBlobSnapshot($containerName, $sourceBlobName);
        $options = new CopyBlobOptions();
        $options->setSourceSnapshot($snapshotResult->getSnapshot());
        
        // Test
        $this->wrapper->copyBlob(
            $containerName, 
            $destinationBlobName, 
            $containerName, 
            $sourceBlobName,
            $options
        ); 
        
        // Assert
        $sourceBlob = $this->wrapper->getBlob($containerName, $sourceBlobName);
        $destinationBlob = $this->wrapper->getBlob($containerName, $destinationBlobName);
        $sourceBlobContent = stream_get_contents($sourceBlob->getContentStream());
        $destinationBlobContent = stream_get_contents($destinationBlob->getContentStream());
        
        $this->assertEquals($sourceBlobContent, $destinationBlobContent);
    }
    
   /**  
    * @covers WindowsAzure\Blob\Internal\BlobRestProxy::createBlobSnapshot 
    * @covers WindowsAzure\Blob\Models\createBlobSnapshotResult::create 
    */ 
    public function testCreateBlobSnapshot()
    { 
        // Setup
        $containerName = 'createblobsnapshot'; 
        $blobName = 'testBlob'; 
        $blobValue = 'TestBlobValue'; 
        $this->createContainer($containerName);
        $this->wrapper->createBlockBlob($containerName, $blobName, $blobValue);
        
        // Test
        $snapshotResult = $this->wrapper->createBlobSnapshot($containerName, $blobName);
        
        // Assert
        $listOptions = new ListBlobsOptions();
        $listOptions->setIncludeSnapshots(true);
        $blobsResult = $this->wrapper->listBlobs($containerName, $listOptions);
        $blobs = $blobsResult->getBlobs();
        $actualBlob = $blobs[0];
        $this->assertNotNull($snapshotResult->getEtag());
        $this->assertNotNull($snapshotResult->getLastModified());
        $this->assertNotNull($snapshotResult->getSnapshot());
        $this->assertEquals($snapshotResult->getSnapshot(), $actualBlob->getSnapshot());
    }    
}

