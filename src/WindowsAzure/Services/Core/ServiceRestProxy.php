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
 * @package   WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Core;
use WindowsAzure\Resources;
use WindowsAzure\Validate;
use WindowsAzure\Core\RestProxy;
use WindowsAzure\Core\WindowsAzureUtilities;
use WindowsAzure\Core\Http\Url;
use WindowsAzure\Core\Http\HttpCallContext;

/**
 * Base class for all services rest proxies.
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Core
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceRestProxy extends RestProxy
{
    private $_accountName;

    /**
     * Initializes new ServiceRestProxy object.
     *
     * @param IHttpClient $channel        The HTTP client used to send HTTP requests.
     * @param string      $uri            The storage account uri.
     * @param string      $accountName    The name of the account.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($channel, $uri, $accountName, $dataSerializer)
    {
        $this->_accountName = $accountName;
        parent::__construct($channel, $dataSerializer, $uri);
    }

    /**
     * Gets the account name. 
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->_accountName;
    }
    
    /**
     * Sends HTTP request with the specified HTTP call context.
     * 
     * @param WindowsAzure\Core\Http\HttpCallContext $context The HTTP call context.
     * 
     * @return \HTTP_Request2_Response
     */
    protected function sendContext($context)
    {
        $context->setUri($this->getUri());
        return parent::sendContext($context);
    }
    
    /**
     * Sends HTTP request with the specified parameters.
     * 
     * @param string $method         HTTP method used in the request
     * @param array  $headers        HTTP headers.
     * @param array  $queryParams    URL query parameters.
     * @param array  $postParameters The HTTP POST parameters.
     * @param string $path           URL path
     * @param int    $statusCode     Expected status code received in the response
     * @param string $body           Request body
     * 
     * @return \HTTP_Request2_Response
     */
    protected function send(
        $method, 
        $headers, 
        $queryParams, 
        $postParameters,
        $path, 
        $statusCode,
        $body = Resources::EMPTY_STRING
    ) {
        $context = new HttpCallContext();
        $context->setBody($body);
        $context->setHeaders($headers);
        $context->setMethod($method);
        $context->setPath($path);
        $context->setQueryParameters($queryParams);
        $context->setPostParameters($postParameters);
        
        if (is_array($statusCode)) {
            $context->setStatusCodes($statusCode);
        } else {
            $context->addStatusCode($statusCode);
        }
        
        return $this->sendContext($context);
    }

    
    /**
     * Adds optional header to headers if set
     * 
     * @param array           $headers         array of request headers
     * @param AccessCondition $accessCondition the access condition object
     * 
     * @return array
     */
    public function addOptionalAccessConditionHeader($headers, $accessCondition)
    {
        if (!is_null($accessCondition)) {
            $header = $accessCondition->getHeader();
            
            if ($header != Resources::EMPTY_STRING) {
                $headers[$header] = $accessCondition->getValue();
            }
        }
        
        return $headers;
    }
    
    /**
     * Adds optional header to headers if set
     * 
     * @param array                 $headers               array of request headers
     * @param SourceAccessCondition $sourceAccessCondition the access condition 
     * object
     * 
     * @return array
     */
    public function addOptionalSourceAccessConditionHeader(
        $headers, 
        $sourceAccessCondition
    ) {

        if (!is_null($sourceAccessCondition)) {
            $header = $sourceAccessCondition->getHeader();
            
            if ($header != Resources::EMPTY_STRING) {
                $headers[$header] = $sourceAccessCondition->getValue();
            }
        }
        
        return $headers;
    }
    
    /**
     * Adds HTTP POST parameter to the specified 
     * 
     * @param array  $postParameters An array of HTTP POST parameters.
     * @param string $key            The key of a HTTP POST parameter. 
     * @param string $value          the value of a HTTP POST parameter. 
     * 
     * @return array
     */
    public function addPostParameter(
        $postParameters,
        $key,
        $value
    ) {
        Validate::isArray($postParameters, 'postParameters');
        $postParameters[$key] = $value;
        return $postParameters; 
    }
    
    /**
     * Groups set of values into one value separated with Resources::SEPARATOR
     * 
     * @param array $values array of values to be grouped.
     * 
     * @return string
     */
    public function groupQueryValues($values)
    {
        Validate::isArray($values, 'values');
        $joined = Resources::EMPTY_STRING;
        
        foreach ($values as $value) {
            if (!is_null($value) && !empty($value)) {
                $joined .= $value . Resources::SEPARATOR;
            }
        }
        
        return trim($joined, Resources::SEPARATOR);
    }
    
    /**
     * Adds metadata elements to headers array
     * 
     * @param array $headers  HTTP request headers
     * @param array $metadata user specified metadata
     * 
     * @return array
     */
    protected function addMetadataHeaders($headers, $metadata)
    {
        WindowsAzureUtilities::validateMetadata($metadata);
        
        $metadata = WindowsAzureUtilities::generateMetadataHeaders($metadata);
        $headers  = array_merge($headers, $metadata);
        
        return $headers;
    }
}

?>
