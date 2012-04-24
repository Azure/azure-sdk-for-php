<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License")
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
 * @package   PEAR2\WindowsAzure\Services\Blob\BlobRestProxy
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Blob;
use PEAR2\WindowsAzure\Utilities;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Core\WindowsAzureUtilities;
use PEAR2\WindowsAzure\Services\Core\ServiceRestProxy;
use PEAR2\WindowsAzure\Services\Blob\IBlob;
use PEAR2\WindowsAzure\Services\Blob\Models\BlobServiceOptions;
use PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\ListContainersOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListContainersResult;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateContainerOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\GetContainerPropertiesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\GetContainerAclResult;
use PEAR2\WindowsAzure\Services\Blob\Models\SetContainerMetadataOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListBlobsOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListBlobsResult;
use PEAR2\WindowsAzure\Services\Blob\Models\BlobType;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\BlobProperties;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobPropertiesOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobPropertiesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\SetBlobPropertiesOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\SetBlobPropertiesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobMetadataOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobMetadataResult;
use PEAR2\WindowsAzure\Services\Blob\Models\SetBlobMetadataOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\SetBlobMetadataResult;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\GetBlobResult;
use PEAR2\WindowsAzure\Services\Blob\Models\DeleteBlobOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\LeaseMode;
use PEAR2\WindowsAzure\Services\Blob\Models\AcquireLeaseOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\AcquireLeaseResult;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobPagesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\PageWriteOption;
use PEAR2\WindowsAzure\Services\Blob\Models\ListPageBlobRangesOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListPageBlobRangesResult;
use PEAR2\WindowsAzure\Services\Blob\Models\CreateBlobBlockOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\CommitBlobBlocksOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\BlockList;
use PEAR2\WindowsAzure\Services\Blob\Models\ListBlobBlocksOptions;
use PEAR2\WindowsAzure\Services\Blob\Models\ListBlobBlocksResult;

/**
 * This class constructs HTTP requests and receive HTTP responses for blob
 * service layer.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Blob\BlobRestProxy
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BlobRestProxy extends ServiceRestProxy implements IBlob
{
    /**
     * Creates GetBlobPropertiesResult from headers array
     * 
     * @param array $headers HTTP response headers array
     * 
     * @return GetBlobPropertiesResult
     */
    private function _getBlobPropertiesResultFromResponse($headers)
    {
        $result     = new GetBlobPropertiesResult();
        $properties = new BlobProperties();
        $d          = $headers[Resources::LAST_MODIFIED];
        $bType      = $headers[Resources::X_MS_BLOB_TYPE];
        $lStatus    = $headers[Resources::X_MS_LEASE_STATUS];
        $cLength    = intval($headers[Resources::CONTENT_LENGTH]);
        $cType      = Utilities::tryGetValue($headers, Resources::CONTENT_TYPE);
        $cMD5       = Utilities::tryGetValue($headers, Resources::CONTENT_MD5);
        $cEncoding  = Utilities::tryGetValue($headers, Resources::CONTENT_ENCODING);
        $cLanguage  = Utilities::tryGetValue($headers, Resources::CONTENT_LANGUAGE);
        $cControl   = Utilities::tryGetValue($headers, Resources::CACHE_CONTROL);
        $etag       = $headers[Resources::ETAG];
        $metadata   = WindowsAzureUtilities::getMetadataArray($headers);
        
        if (array_key_exists(Resources::X_MS_BLOB_SEQUENCE_NUMBER, $headers)) {
            $sNumber = intval($headers[Resources::X_MS_BLOB_SEQUENCE_NUMBER]);
            $properties->setSequenceNumber($sNumber);
        }
        
        $properties->setBlobType($bType);
        $properties->setCacheControl($cControl);
        $properties->setContentEncoding($cEncoding);
        $properties->setContentLanguage($cLanguage);
        $properties->setContentLength($cLength);
        $properties->setContentMD5($cMD5);
        $properties->setContentType($cType);
        $properties->setEtag($etag);
        $properties->setLastModified(WindowsAzureUtilities::rfc1123ToDateTime($d));
        $properties->setLeaseStatus($lStatus);
        
        $result->setProperties($properties);
        $result->setMetadata($metadata);
        
        return $result;
    }
    
    /**
     * Helper method for getContainerProperties and getContainerMetadata
     * 
     * @param string             $container name
     * @param BlobServiceOptions $options   optional parameters
     * @param string             $operation should be 'metadata' to get metadata
     * 
     * @return GetContainerPropertiesResult
     */
    private function _getContainerPropertiesImpl($container, $options = null,
        $operation = null
    ) {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'container';
        $queryParams[Resources::QP_COMP]      = $operation;
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $result   = new GetContainerPropertiesResult();
        $metadata = WindowsAzureUtilities::getMetadataArray($response->getHeader());
        $date     = $response->getHeader(Resources::LAST_MODIFIED);
        $date     = WindowsAzureUtilities::rfc1123ToDateTime($date);
        $result->setEtag($response->getHeader(Resources::ETAG));
        $result->setMetadata($metadata);
        $result->setLastModified($date);
        
        return $result;
    }
    
    /**
     * Adds optional create blob headers.
     * 
     * @param CreateBlobOptions $options optional parameters
     * @param array             $headers request headers
     * 
     * @return array
     */
    private function _addCreateBlobOptionalHeaders($options, $headers)
    {
        $contentType         = $options->getContentType();
        $metadata            = $options->getMetadata();
        $blobContentType     = $options->getBlobContentType();
        $blobContentEncoding = $options->getBlobContentEncoding();
        $blobContentLanguage = $options->getBlobContentLanguage();
        $blobContentMD5      = $options->getBlobContentMD5();
        $blobCacheControl    = $options->getBlobCacheControl();
        $leaseId             = $options->getLeaseId();
        
        if (!is_null($contentType)) {
            $headers[Resources::CONTENT_TYPE] = $options->getContentType();
        } else {
            $headers[Resources::CONTENT_TYPE] = Resources::BINARY_FILE_TYPE;
        }
        
        $headers = $this->addMetadataHeaders($headers, $metadata);
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::CONTENT_ENCODING] = $options->getContentEncoding();
        $headers[Resources::CONTENT_LANGUAGE] = $options->getContentLanguage();
        $headers[Resources::CONTENT_MD5]      = $options->getContentMD5();
        $headers[Resources::CACHE_CONTROL]    = $options->getCacheControl();
        $headers[Resources::X_MS_LEASE_ID]    = $leaseId;
        
        $headers[Resources::X_MS_BLOB_CONTENT_TYPE]     = $blobContentType;
        $headers[Resources::X_MS_BLOB_CONTENT_ENCODING] = $blobContentEncoding;
        $headers[Resources::X_MS_BLOB_CONTENT_LANGUAGE] = $blobContentLanguage;
        $headers[Resources::X_MS_BLOB_CONTENT_MD5]      = $blobContentMD5;
        $headers[Resources::X_MS_BLOB_CACHE_CONTROL]    = $blobCacheControl;
        
        return $headers;
    }
    
    /**
     * Adds Range header to the headers array
     * 
     * @param array   $headers HTTP request headers
     * @param integer $start   the start byte
     * @param integer $end     the end byte
     * 
     * @return array
     */
    private function _addOptionalRangeHeader($headers, $start, $end)
    {
        if (!is_null($start)) {
            $range = $start . '-';
            if (!is_null($end)) {
                $range .= $end;
            }
            $headers[Resources::RANGE] = 'bytes=' . $range;
        }
        
        return $headers;
    }

    /**
     * Does the actual work for leasing a blob
     * 
     * @param string             $leaseAction     the lease action string
     * @param string             $container       the container name
     * @param string             $blob            the blob to lease name
     * @param string             $leaseId         the existing lease id
     * @param BlobServiceOptions $options         optional parameters
     * @param AccessCondition    $accessCondition access conditions
     * 
     * @return AcquireLeaseResult
     */
    private function _putLeaseImpl($leaseAction, $container, $blob, $leaseId, 
        $options, $accessCondition = null
    ) {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::EMPTY_STRING;
        
        switch ($leaseAction) {
        case LeaseMode::ACQUIRE_ACTION:
            $statusCode = Resources::STATUS_CREATED;
            break;
        case LeaseMode::RENEW_ACTION:
            $statusCode = Resources::STATUS_OK;
            break;
        case LeaseMode::RELEASE_ACTION:
            $statusCode = Resources::STATUS_OK;
            break;
        case LeaseMode::BREAK_ACTION:
            $statusCode = Resources::STATUS_ACCEPTED;
            break;
        default:
            throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
        }
        
        if (!is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $accessCondition
        );

        $headers[Resources::X_MS_LEASE_ID]     = $leaseId;
        $headers[Resources::X_MS_LEASE_ACTION] = $leaseAction;
        $queryParams[Resources::QP_COMP]       = 'lease';
        $queryParams[Resources::QP_TIMEOUT]    = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return AcquireLeaseResult::create($response->getHeader());
    }
    
    /**
     * Does actual work for create and clear blob pages
     * 
     * @param string                 $action    either clear or create
     * @param string                 $container container name
     * @param string                 $blob      blob name
     * @param PageRange              $range     page ranges
     * @param string                 $content   the content stream
     * @param CreateBlobPagesOptions $options   optional parameters
     * 
     * @return CreateBlobPagesResult
     */
    private function _updatePageBlobPagesImpl($action, $container, $blob, $range,
        $content, $options = null
    ) {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_CREATED;
        $body        = $content;
        
        if (is_null($options)) {
            $options = new CreateBlobPagesOptions();
        }
        
        $headers = $this->_addOptionalRangeHeader(
            $headers, $range->getStart(), $range->getEnd()
        );
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]   = $options->getLeaseId();
        $headers[Resources::CONTENT_MD5]     = $options->getContentMD5();
        $headers[Resources::X_MS_PAGE_WRITE] = $action;
        $headers[Resources::CONTENT_TYPE]    = Resources::XML_CONTENT_TYPE;
        $queryParams[Resources::QP_COMP]     = 'page';
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        
        $response = $this->send(
            $method, $headers, $queryParams, $path, $statusCode, $body
        );
        
        return CreateBlobPagesResult::create($response->getHeader());
    }
    
    /**
     * Gets the properties of the Blob service.
     * 
     * @param Models\BlobServiceOptions $options optional blob service options.
     * 
     * @return PEAR2\WindowsAzure\Services\Core\Models\GetServicePropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452239.aspx
     */
    public function getServiceProperties($options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return GetServicePropertiesResult::create($parsed);
    }

    /**
     * Sets the properties of the Blob service.
     * 
     * @param ServiceProperties         $serviceProperties new service properties.
     * @param Models\BlobServiceOptions $options           optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/hh452235.aspx
     */
    public function setServiceProperties($serviceProperties, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $statusCode  = Resources::STATUS_ACCEPTED;
        $path        = Resources::EMPTY_STRING;
        $body        = Resources::EMPTY_STRING;
        
        if (!isset($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'service';
        $queryParams[Resources::QP_COMP]      = 'properties';
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        $body                                 = $serviceProperties->toXml();
        $headers[Resources::CONTENT_TYPE]     = Resources::XML_CONTENT_TYPE;
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * Lists all of the containers in the given storage account.
     * 
     * @param Models\ListContainersOptions $options optional parameters
     * 
     * @return PEAR2\WindowsAzure\Services\Blob\Models\ListContainersResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179352.aspx
     */
    public function listContainers($options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = Resources::EMPTY_STRING;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new ListContainersOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT]     = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]        = 'list';
        $queryParams[Resources::QP_PREFIX]      = $options->getPrefix();
        $queryParams[Resources::QP_MARKER]      = $options->getMarker();
        $queryParams[Resources::QP_MAX_RESULTS] = $options->getMaxResults();
        $isInclude                              = $options->getIncludeMetadata();
        $queryParams[Resources::QP_INCLUDE]     = $isInclude ? 'metadata' : null;
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListContainersResult::create($parsed);
    }
    
    /**
     * Creates a new container in the given storage account.
     * 
     * @param string                        $container name
     * @param Models\CreateContainerOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179468.aspx
     */
    public function createContainer($container, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array(Resources::QP_REST_TYPE => 'container');
        $path        = $container;
        $statusCode  = Resources::STATUS_CREATED;
        
        if (is_null($options)) {
            $options = new CreateContainerOptions();
        }

        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        
        $metadataHeaders = WindowsAzureUtilities::generateMetadataHeaders(
            $options->getMetadata()
        );
        
        $headers                                     = $metadataHeaders;
        $headers[Resources::X_MS_BLOB_PUBLIC_ACCESS] = $options->getPublicAccess();
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }
    
    /**
     * Creates a new container in the given storage account.
     * 
     * @param string                    $container name of the container
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179408.aspx
     */
    public function deleteContainer($container, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_DELETE;
        $headers     = array();
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_ACCEPTED;
        
        if (is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_REST_TYPE] = 'container';
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }
    
    /**
     * Returns all properties and metadata on the container.
     * 
     * @param string                    $container name
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return Models\GetContainerPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179370.aspx
     */
    public function getContainerProperties($container, $options = null)
    {
        return $this->_getContainerPropertiesImpl($container, $options);
    }
    
    /**
     * Returns only user-defined metadata for the specified container.
     * 
     * @param string                    $container name
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return Models\GetContainerPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691976.aspx 
     */
    public function getContainerMetadata($container, $options = null)
    {
        return $this->_getContainerPropertiesImpl($container, $options, 'metadata');
    }
    
    /**
     * Gets the access control list (ACL) and any container-level access policies 
     * for the container.
     * 
     * @param string                    $container name
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return Models\GetContainerAclResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179469.aspx
     */
    public function getContainerAcl($container, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        $queryParams[Resources::QP_REST_TYPE] = 'container';
        $queryParams[Resources::QP_COMP]      = 'acl';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        $access       = $response->getHeader(Resources::X_MS_BLOB_PUBLIC_ACCESS);
        $etag         = $response->getHeader(Resources::ETAG);
        $lastModified = $response->getHeader(Resources::LAST_MODIFIED);
        $parsed       = Utilities::unserialize($response->getBody());
                
        return GetContainerAclResult::create($access, $etag, $lastModified, $parsed);
    }
    
    /**
     * Sets the ACL and any container-level access policies for the container.
     * 
     * @param string                    $container name
     * @param Models\ContainerAcl       $acl       access control list for container
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179391.aspx
     */
    public function setContainerAcl($container, $acl, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_OK;
        $body        = $acl->toXml();
        
        if (is_null($options)) {
            $options = new BlobServiceOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        $queryParams[Resources::QP_REST_TYPE] = 'container';
        $queryParams[Resources::QP_COMP]      = 'acl';
        
        $headers[Resources::X_MS_BLOB_PUBLIC_ACCESS] = $acl->getPublicAccess();
        $headers[Resources::CONTENT_TYPE]            = Resources::XML_CONTENT_TYPE;

        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * Sets metadata headers on the container.
     * 
     * @param string                             $container name
     * @param array                              $metadata  metadata key/value pair.
     * @param Models\SetContainerMetadataOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179362.aspx
     */
    public function setContainerMetadata($container, $metadata, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = WindowsAzureUtilities::generateMetadataHeaders($metadata);
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new SetContainerMetadataOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT]   = strval($options->getTimeout());
        $queryParams[Resources::QP_REST_TYPE] = 'container';
        $queryParams[Resources::QP_COMP]      = 'metadata';
        
        $header           = $options->getAccessCondition()->getHeader();
        $value            = $options->getAccessCondition()->getValue();
        $headers[$header] = $value;

        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }
    
    /**
     * Lists all of the blobs in the given container.
     * 
     * @param string                  $container name
     * @param Models\ListBlobsOptions $options   optional parameters
     * 
     * @return Models\ListBlobsResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd135734.aspx
     */
    public function listBlobs($container, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new ListBlobsOptions();
        }
        
        $queryParams[Resources::QP_TIMEOUT]     = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]        = 'list';
        $queryParams[Resources::QP_REST_TYPE]   = 'container';
        $queryParams[Resources::QP_PREFIX]      = $options->getPrefix();
        $queryParams[Resources::QP_MARKER]      = $options->getMarker();
        $queryParams[Resources::QP_DELIMITER]   = $options->getDelimiter();
        $queryParams[Resources::QP_MAX_RESULTS] = strval($options->getMaxResults());
        
        $includeMetadata         = $options->getIncludeMetadata();
        $includeSnapshots        = $options->getIncludeSnapshots();
        $includeUncommittedBlobs = $options->getIncludeUncommittedBlobs();
        
        $includeValue = $this->groupQueryValues(
            array(
                $includeMetadata ? 'metadata' : null, 
                $includeSnapshots ? 'snapshots' : null, 
                $includeUncommittedBlobs ? 'uncommittedblobs' : null
            )
        );
        
        $queryParams[Resources::QP_INCLUDE] = $includeValue;
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListBlobsResult::create($parsed);
    }
    
    /**
     * Creates a new page blob. Note that calling createPageBlob to create a page
     * blob only initializes the blob.
     * To add content to a page blob, call createBlobPages method.
     * 
     * @param string                   $container name of the container
     * @param string                   $blob      name of the blob
     * @param integer                  $length    specifies the maximum size for the
     * page blob, up to 1 TB. The page blob size must be aligned to a 512-byte 
     * boundary.
     * @param Models\CreateBlobOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179451.aspx
     */
    public function createPageBlob($container, $blob, $length, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_CREATED;
        
        if (is_null($options)) {
            $options = new CreateBlobOptions();
        }
        
        $sequenceNumber = strval($options->getSequenceNumber());
        
        $headers[Resources::X_MS_BLOB_TYPE]            = BlobType::PAGE_BLOB;
        $headers[Resources::X_MS_BLOB_CONTENT_LENGTH]  = strval($length);
        $headers[Resources::X_MS_BLOB_SEQUENCE_NUMBER] = $sequenceNumber;
        
        $headers = $this->_addCreateBlobOptionalHeaders($options, $headers);
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }
    
    /**
     * Creates a new block blob or updates the content of an existing block blob.
     * Updating an existing block blob overwrites any existing metadata on the blob.
     * Partial updates are not supported with createBlockBlob the content of the
     * existing blob is overwritten with the content of the new blob. To perform a
     * partial update of the content of a block blob, use the createBlockList method.
     * Note that the default content type is application/octet-stream.
     * 
     * @param string                   $container name of the container
     * @param string                   $blob      name of the blob
     * @param string                   $content   content of the blob
     * @param Models\CreateBlobOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179451.aspx
     */
    public function createBlockBlob($container, $blob, $content, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_CREATED;
        $body        = $content;
        
        if (is_null($options)) {
            $options = new CreateBlobOptions();
        }
        
        $headers = $this->_addCreateBlobOptionalHeaders($options, $headers);
        
        $headers[Resources::X_MS_BLOB_TYPE] = BlobType::BLOCK_BLOB;
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * Clears a range of pages from the blob.
     * 
     * @param string                        $container name of the container
     * @param string                        $blob      name of the blob
     * @param Models\PageRange              $range     Can be up to the value of the
     * blob's full size. Note that ranges must be aligned to 512 (0-511, 512-1023)
     * @param Models\CreateBlobPagesOptions $options   optional parameters
     * 
     * @return Models\CreateBlobPagesResult.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691975.aspx
     */
    public function clearBlobPages($container, $blob, $range, $options = null)
    {
        return $this->_updatePageBlobPagesImpl(
            PageWriteOption::CLEAR_OPTION,
            $container,
            $blob,
            $range,
            Resources::EMPTY_STRING,
            $options
        );
    }
    
    /**
     * Creates a range of pages to a page blob.
     * 
     * @param string                        $container name of the container
     * @param string                        $blob      name of the blob
     * @param Models\PageRange              $range     Can be up to 4 MB in size
     * Note that ranges must be aligned to 512 (0-511, 512-1023)
     * @param string                        $content   the blob contents.
     * @param Models\CreateBlobPagesOptions $options   optional parameters
     * 
     * @return Models\CreateBlobPagesResult.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691975.aspx
     */
    public function createBlobPages($container, $blob, $range, $content,
        $options = null
    ) {
        return $this->_updatePageBlobPagesImpl(
            PageWriteOption::UPDATE_OPTION,
            $container,
            $blob,
            $range,
            $content,
            $options
        );
    }
    
    /**
     * Creates a new block to be committed as part of a block blob.
     * 
     * @param string                        $container name of the container
     * @param string                        $blob      name of the blob
     * @param string                        $blockId   must be less than or equal to 
     * 64 bytes in size. For a given blob, the length of the value specified for the
     * blockid parameter must be the same size for each block.
     * @param string                        $content   the blob block contents
     * @param Models\CreateBlobBlockOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd135726.aspx
     */
    public function createBlobBlock($container, $blob, $blockId, $content,
        $options = null
    ) {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_CREATED;
        $body        = $content;
        
        if (is_null($options)) {
            $options = new CreateBlobBlockOptions();
        }
        
        $headers[Resources::X_MS_LEASE_ID]  = $options->getLeaseId();
        $headers[Resources::CONTENT_MD5]    = $options->getContentMD5();
        $headers[Resources::CONTENT_TYPE]   = Resources::XML_CONTENT_TYPE;
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]    = 'block';
        $queryParams['blockid']             = base64_encode($blockId);
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * This method writes a blob by specifying the list of block IDs that make up the
     * blob. In order to be written as part of a blob, a block must have been 
     * successfully written to the server in a prior createBlobBlock method.
     * 
     * You can call Put Block List to update a blob by uploading only those blocks 
     * that have changed, then committing the new and existing blocks together. 
     * You can do this by specifying whether to commit a block from the committed 
     * block list or from the uncommitted block list, or to commit the most recently
     * uploaded version of the block, whichever list it may belong to.
     * 
     * @param string                         $container name of the container
     * @param string                         $blob      name of the blob
     * @param Models\BlockList               $blockList the block list entries
     * @param Models\CommitBlobBlocksOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179467.aspx 
     */
    public function commitBlobBlocks($container, $blob, $blockList, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_CREATED;
        $body        = $blockList->toXml();
        
        if (is_null($options)) {
            $options = new CommitBlobBlocksOptions();
        }
        
        $blobContentType     = $options->getBlobContentType();
        $blobContentEncoding = $options->getBlobContentEncoding();
        $blobContentLanguage = $options->getBlobContentLanguage();
        $blobContentMD5      = $options->getBlobContentMD5();
        $blobCacheControl    = $options->getBlobCacheControl();
        $leaseId             = $options->getLeaseId();
        $contentType         = Resources::XML_CONTENT_TYPE;
        
        $metadata        = $options->getMetadata();
        $metadataHeaders = WindowsAzureUtilities::generateMetadataHeaders($metadata);
        $headers         = array_merge($headers, $metadataHeaders);
        $headers         = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]              = $leaseId;
        $headers[Resources::X_MS_BLOB_CACHE_CONTROL]    = $blobCacheControl;
        $headers[Resources::X_MS_BLOB_CONTENT_TYPE]     = $blobContentType;
        $headers[Resources::X_MS_BLOB_CONTENT_ENCODING] = $blobContentEncoding;
        $headers[Resources::X_MS_BLOB_CONTENT_LANGUAGE] = $blobContentLanguage;
        $headers[Resources::X_MS_BLOB_CONTENT_MD5]      = $blobContentMD5;
        $headers[Resources::CONTENT_TYPE]               = $contentType;
        
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]    = 'blocklist';
        
        $this->send($method, $headers, $queryParams, $path, $statusCode, $body);
    }
    
    /**
     * Retrieves the list of blocks that have been uploaded as part of a block blob.
     * 
     * There are two block lists maintained for a blob:
     * 1) Committed Block List: The list of blocks that have been successfully 
     *    committed to a given blob with commitBlobBlocks.
     * 2) Uncommitted Block List: The list of blocks that have been uploaded for a 
     *    blob using Put Block (REST API), but that have not yet been committed. 
     *    These blocks are stored in Windows Azure in association with a blob, but do
     *    not yet form part of the blob.
     * 
     * @param string                       $container name of the container
     * @param string                       $blob      name of the blob
     * @param Models\ListBlobBlocksOptions $options   optional parameters
     * 
     * @return Models\ListBlobBlocksResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179400.aspx
     */
    public function listBlobBlocks($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new ListBlobBlocksOptions();
        }
        
        $headers[Resources::X_MS_LEASE_ID]   = $options->getLeaseId();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        $queryParams['blocklisttype']        = $options->getBlockListType();
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_COMP]     = 'blocklist';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListBlobBlocksResult::create($response->getHeader(), $parsed);
    }
    
    /**
     * Returns all properties and metadata on the blob.
     * 
     * @param string                          $container name of the container
     * @param string                          $blob      name of the blob
     * @param Models\GetBlobPropertiesOptions $options   optional parameters
     * 
     * @return Models\GetBlobPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179394.aspx
     */
    public function getBlobProperties($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_HEAD;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new GetBlobPropertiesOptions();
        }
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]   = $options->getLeaseId();
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return $this->_getBlobPropertiesResultFromResponse($response->getHeader());
    }
    
    /**
     * Returns all properties and metadata on the blob.
     * 
     * @param string                        $container name of the container
     * @param string                        $blob      name of the blob
     * @param Models\GetBlobMetadataOptions $options   optional parameters
     * 
     * @return Models\GetBlobMetadataResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179350.aspx
     */
    public function getBlobMetadata($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_HEAD;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new GetBlobMetadataOptions();
        }
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]   = $options->getLeaseId();
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]     = 'metadata';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return GetBlobMetadataResult::create($response->getHeader());
    }
    
    /**
     * Returns a list of active page ranges for a page blob. Active page ranges are 
     * those that have been populated with data.
     * 
     * @param string                           $container name of the container
     * @param string                           $blob      name of the blob
     * @param Models\ListPageBlobRangesOptions $options   optional parameters
     * 
     * @return Models\ListPageBlobRangesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691973.aspx
     */
    public function listPageBlobRanges($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new ListPageBlobRangesOptions();
        }
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers = $this->_addOptionalRangeHeader(
            $headers, $options->getRangeStart(), $options->getRangeEnd()
        );
        
        $headers[Resources::X_MS_LEASE_ID]   = $options->getLeaseId();
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]     = 'pagelist';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        $parsed   = Utilities::unserialize($response->getBody());
        
        return ListPageBlobRangesResult::create($response->getHeader(), $parsed);
    }
    
    /**
     * Sets system properties defined for a blob.
     * 
     * @param string                          $container name of the container
     * @param string                          $blob      name of the blob
     * @param Models\SetBlobPropertiesOptions $options   optional parameters
     * 
     * @return Models\SetBlobPropertiesResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691966.aspx
     */
    public function setBlobProperties($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new SetBlobPropertiesOptions();
        }
        
        $blobContentType     = $options->getBlobContentType();
        $blobContentEncoding = $options->getBlobContentEncoding();
        $blobContentLanguage = $options->getBlobContentLanguage();
        $blobContentLength   = strval($options->getBlobContentLength());
        $blobContentMD5      = $options->getBlobContentMD5();
        $blobCacheControl    = $options->getBlobCacheControl();
        $leaseId             = $options->getLeaseId();
        $sNumberAction       = $options->getSequenceNumberAction();
        $sNumber             = strval($options->getSequenceNumber());
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]                    = $leaseId;
        $headers[Resources::X_MS_BLOB_CONTENT_TYPE]           = $blobContentType;
        $headers[Resources::X_MS_BLOB_CONTENT_ENCODING]       = $blobContentEncoding;
        $headers[Resources::X_MS_BLOB_CONTENT_LANGUAGE]       = $blobContentLanguage;
        $headers[Resources::X_MS_BLOB_CONTENT_LENGTH]         = $blobContentLength;
        $headers[Resources::X_MS_BLOB_CONTENT_MD5]            = $blobContentMD5;
        $headers[Resources::X_MS_BLOB_CACHE_CONTROL]          = $blobCacheControl;
        $headers[Resources::X_MS_BLOB_SEQUENCE_NUMBER_ACTION] = $sNumberAction;
        $headers[Resources::X_MS_BLOB_SEQUENCE_NUMBER]        = $sNumber;

        $queryParams[Resources::QP_COMP] = 'properties';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return SetBlobPropertiesResult::create($response->getHeader());
    }
    
    /**
     * Sets metadata headers on the blob.
     * 
     * @param string                        $container name of the container
     * @param string                        $blob      name of the blob
     * @param array                         $metadata  key/value pair representation
     * @param Models\SetBlobMetadataOptions $options   optional parameters
     * 
     * @return Models\SetBlobMetadataResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179414.aspx
     */
    public function setBlobMetadata($container, $blob, $metadata, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_PUT;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new SetBlobMetadataOptions();
        }
        
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        $headers = $this->addMetadataHeaders($headers, $metadata);
        
        $headers[Resources::X_MS_LEASE_ID]  = $options->getLeaseId();
        $queryParams[Resources::QP_TIMEOUT] = strval($options->getTimeout());
        $queryParams[Resources::QP_COMP]    = 'metadata';
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return SetBlobMetadataResult::create($response->getHeader());
    }
    
    /**
     * Reads or downloads a blob from the system, including its metadata and 
     * properties.
     * 
     * @param string                $container name of the container
     * @param string                $blob      name of the blob
     * @param Models\GetBlobOptions $options   optional parameters
     * 
     * @return Models\GetBlobResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179440.aspx
     */
    public function getBlob($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_GET;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_OK;
        
        if (is_null($options)) {
            $options = new GetBlobOptions();
        }
        
        $getMD5  = $options->getComputeRangeMD5();
        $headers = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        $headers = $this->_addOptionalRangeHeader(
            $headers, $options->getRangeStart(), $options->getRangeEnd()
        );
        
        $headers[Resources::X_MS_RANGE_GET_CONTENT_MD5] = $getMD5 ? 'true' : null;
        $headers[Resources::X_MS_LEASE_ID]              = $options->getLeaseId();
        
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        
        $response = $this->send($method, $headers, $queryParams, $path, $statusCode);
        
        return GetBlobResult::create($response->getHeader(), $response->getBody());
    }
    
    /**
     * Deletes a blob.
     * 
     * @param string                   $container name of the container
     * @param string                   $blob      name of the blob
     * @param Models\DeleteBlobOptions $options   optional parameters
     * 
     * @return none.
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd179413.aspx
     */
    public function deleteBlob($container, $blob, $options = null)
    {
        $method      = \HTTP_Request2::METHOD_DELETE;
        $headers     = array();
        $queryParams = array();
        $path        = $container . '/' . $blob;
        $statusCode  = Resources::STATUS_ACCEPTED;
        
        if (is_null($options)) {
            $options = new DeleteBlobOptions();
        }
        
        $deleteSnapshots = $options->getDeleteSnaphotsOnly() ? 'only' : 'include';
        $headers         = $this->addOptionalAccessConditionHeader(
            $headers, $options->getAccessCondition()
        );
        
        $headers[Resources::X_MS_LEASE_ID]         = $options->getLeaseId();
        $headers[Resources::X_MS_DELETE_SNAPSHOTS] = $deleteSnapshots;
        
        $queryParams[Resources::QP_SNAPSHOT] = $options->getSnapshot();
        $queryParams[Resources::QP_TIMEOUT]  = strval($options->getTimeout());
        
        $this->send($method, $headers, $queryParams, $path, $statusCode);
    }
    
    /**
     * Creates a snapshot of a blob.
     * 
     * @param string                           $container name of the container
     * @param string                           $blob      name of the blob
     * @param Models\SnapshotBlobOptions $options   optional parameters
     * 
     * @return Models\SnapshotBlobResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691971.aspx
     */
    public function SnapshotBlob($container, $blob, $options = null)
    {
        $method              = \HTTP_Request2::METHOD_PUT;
        $header              = array();
        $queryParams         = array();
        $path                = $container . '/' . $blob;
        $expectedStatusCode  = Resources::STATUS_CREATED;
        
        if (is_null($options)) {
            $options = new SnapshotBlobOptions();
        }  
        
        $header[Resources::QP_TIMEOUT]            = $options->getTimeout();
        $header[Resources::X_MS_DATE]             = $options->getDate();
        $header[Resources::X_MS_VERSION]          = $options->getVersion();
        $metadata = $options->getMetaData();
        if (!is_null($metadata))
        {
            $metadataHeader = 
                WindowsAzureUtilities::generateMetadataHeaders($metadata);
            $header = \array_merge($header, $metadataHeader);
        }
        $header[Resources::IF_MODIFIED_SINCE]     = $options->getModifiedSince();
        $header[Resources::IF_UNMODIFIED_SINCE]   = $options->getIfUnmodifiedSince();
        $header[Resources::IF_MATCH]              = $options->getIfMatch();
        $header[Resources::IF_NONE_MATCH]         = $options->getIfNoneMatch();
        $header[Resources::X_MS_LEASE_ID]         = $options->getLeaseId();
        
        $this->send($method, $header, $queryParams, $path, $expectedStatusCode);
    }
    
    /**
     * Copies a source blob to a destination blob within the same storage account.
     * 
     * @param string                 $destinationContainer name of the destination container
     * @param string                 $destinationBlob      name of the destination blob
     * @param string                 $sourceContainer      name of the source container
     * @param string                 $sourceBlob           name of the source blob
     * @param Models\CopyBlobOptions $options              optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/dd894037.aspx
     */
    public function copyBlob(
        $destinationContainer, 
        $destinationBlob,
        $sourceContainer, 
        $sourceBlob, 
        $options = null) 
    {
        $method               = \HTTP_Request2::METHOD_PUT;
        $header               = array();
        $queryParams          = array();
        $destinationBlobPath  = $destinationContainer . '/' . $destinationBlob;
        $sourceBlobPath       = $sourceContainer . '/' . $sourceBlob;
        $statusCode           = Resources::STATUS_CREATED;
        
        if (is_null($options)) {
            $options = new CopyBlobOptions();
        }
        
        $header[Resources::QP_TIMEOUT]            = $options->getTimeout();
        $header[Resources::DATE]                  = $options->getDate();
        $header[Resources::X_MS_VERSION]          = $options->getVersion(); 
        $header[Resources::X_MS_COPY_SOURCE]      = $sourceBlobPath;
        
        $metadata = $options->getMetaData();
        if (!is_null($metadata))
        {
            $metadataHeader = 
                WindowsAzureUtilities::generateMetadataHeaders($metadata);
            $header = \array_merge($header, $metadataHeader);
        }
        
        $header[Resources::X_MS_SOURCE_IF_MODIFIED_SINCE] 
            = $options->getSourceIfModifiedSince();
        $header[Resources::X_MS_SOURCE_IF_UNMODIFIED_SINCE]
            = $options->getSourceIfUnmodifiedSince();
        $header[Resources::X_MS_SOURCE_IF_MATCH]
            = $options->getIfMatch(); 
        $header[Resources::X_MS_SOURCE_IF_NONE_MATCH]
            = $options->getIfNoneMatch(); 
        $header[Resources::IF_MODIFIED_SINCE] = $options->getIfModifiedSince(); 
        $header[Resources::IF_UNMODIFIED_SINCE] 
            = $options->getIfUnmodifiedSince();
        $header[Resources::If_MATCH]              = $options->getIfMatch();
        $header[Resources::If_NONE_MATCH]         = $options->getIfNoneMatch(); 
        $header[Resources::X_MS_LEASE_ID]         = $options->getLeaseId();
        $header[Resources::X_MS_SOURCE_LEASE_ID]  = $options->getSourceLeaseId();
        
        $this->send(
                $method, 
                $header, 
                $queryParams, 
                $destinationBlobPath, 
                $statusCode);
    }
        
    /**
     * Establishes an exclusive one-minute write lock on a blob. To write to a locked
     * blob, a client must provide a lease ID.
     * 
     * @param string                     $container name of the container
     * @param string                     $blob      name of the blob
     * @param Models\AcquireLeaseOptions $options   optional parameters
     * 
     * @return Models\AcquireLeaseResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691972.aspx
     */
    public function acquireLease($container, $blob, $options = null)
    {
        return $this->_putLeaseImpl(
            LeaseMode::ACQUIRE_ACTION,
            $container,
            $blob,
            null /* leaseId */,
            is_null($options) ? new AcquireLeaseOptions() : $options,
            is_null($options) ? null : $options->getAccessCondition()
        );
    }
    
    /**
     * Renews an existing lease
     * 
     * @param string                    $container name of the container
     * @param string                    $blob      name of the blob
     * @param string                    $leaseId   lease id when acquiring
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return Models\AcquireLeaseResult
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691972.aspx
     */
    public function renewLease($container, $blob, $leaseId, $options = null)
    {
        return $this->_putLeaseImpl(
            LeaseMode::RENEW_ACTION,
            $container,
            $blob,
            $leaseId,
            is_null($options) ? new BlobServiceOptions() : $options
        );
    }
    
    /**
     * Frees the lease if it is no longer needed so that another client may 
     * immediately acquire a lease against the blob.
     * 
     * @param string                    $container name of the container
     * @param string                    $blob      name of the blob
     * @param string                    $leaseId   lease id when acquiring
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691972.aspx
     */
    public function releaseLease($container, $blob, $leaseId, $options = null)
    {
        $this->_putLeaseImpl(
            LeaseMode::RELEASE_ACTION,
            $container,
            $blob,
            $leaseId,
            is_null($options) ? new BlobServiceOptions() : $options
        );
    }
    
    /**
     * Ends the lease but ensure that another client cannot acquire a new lease until
     * the current lease period has expired.
     * 
     * @param string                    $container name of the container
     * @param string                    $blob      name of the blob
     * @param string                    $leaseId   lease id when acquiring
     * @param Models\BlobServiceOptions $options   optional parameters
     * 
     * @return none
     * 
     * @see http://msdn.microsoft.com/en-us/library/windowsazure/ee691972.aspx
     */
    public function breakLease($container, $blob, $leaseId, $options = null)
    {
        $this->_putLeaseImpl(
            LeaseMode::BREAK_ACTION,
            $container,
            $blob,
            $leaseId,
            is_null($options) ? new BlobServiceOptions() : $options
        );
    }
}

?>
