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
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace Tests\Framework;
use WindowsAzure\Table\Models\EdmType;
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Common\Internal\Utilities;

/**
 * Resources for testing framework.
 *
 * @package    Tests\Framework
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       https://github.com/windowsazure/azure-sdk-for-php
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
    const QUEUE_URI     = '.queue.core.windows.net';
    const URI1          = "http://myaccount.queue.core.windows.net/myqueue";
    const URI2          = "http://myaccount.queue.core.windows.net/?comp=list";
    const DATE1         = 'Sat, 18 Feb 2012 16:25:21 GMT';
    const DATE2         = 'Mon, 20 Feb 2012 17:12:31 GMT';
    const VALID_URL     = 'http://www.example.com';
    const HEADER1       = 'testheader1';
    const HEADER2       = 'testheader2';
    const HEADER1_VALUE = 'HeaderValue1';
    const HEADER2_VALUE = 'HeaderValue2';

    // See https://tools.ietf.org/html/rfc2616
    const STATUS_NOT_MODIFIED          = 304;
    const STATUS_BAD_REQUEST           = 400;
    const STATUS_UNAUTHORIZED          = 401;
    const STATUS_FORBIDDEN             = 403;
    const STATUS_NOT_FOUND             = 404;
    const STATUS_CONFLICT              = 409;
    const STATUS_PRECONDITION_FAILED   = 412;
    const STATUS_INTERNAL_SERVER_ERROR = 500;

    public static function getWindowsAzureStorageServicesConnectionString()
    {
        $accountName = self::accountName();
        $accountKey = self::accountKey();
        $azureServiceConnectionString = "DefaultEndpointsProtocol=http;AccountName=$accountName;AccountKey=$accountKey";
        
        return $azureServiceConnectionString;
    }
    
    public static function getEmulatorStorageServicesConnectionString()
    {
        $developmentStorageConnectionString = 'UseDevelopmentStorage=true';
        
        return $developmentStorageConnectionString;
    }
    
    public static function getServiceManagementConnectionString()
    {
        $subscriptionId = self::serviceManagementSubscriptionId();
        $certPath = self::serviceManagementCertificatePath();
        $connectionString = "SubscriptionID=$subscriptionId;CertificatePath=$certPath";
        
        return $connectionString;
    }
    
    public static function getServiceBusConnectionString()
    {
        $namespace = self::serviceBusNamespace();
        $endpoint = "https://$namespace.servicebus.windows.net";
        $wrapName = self::wrapAuthenticationName();
        $wrapPassword = self::wrapPassword();
        $connectionString = "Endpoint=$endpoint;SharedSecretIssuer=$wrapName;SharedSecretValue=$wrapPassword";
        
        return $connectionString;
    }
    
    public static function accountName()
    {
        $name = getenv('AZURE_STORAGE_ACCOUNT');
        
        if (empty($name)) {
            throw new \Exception('AZURE_STORAGE_ACCOUNT envionment variable is missing');
        }
        
        return $name;
    }
    
    public static function accountKey()
    {
        $key = getenv('AZURE_STORAGE_KEY');
        
        if (empty($key)) {
            throw new \Exception('AZURE_STORAGE_KEY envionment variable is missing');
        }
        
        return $key;
    }

    public static function serviceManagementSubscriptionId()
    {
        $subscriptionId = getenv('SERVICE_MANAGEMENT_SUBSCRIPTION_ID');
        
        if (empty($subscriptionId)) {
            throw new \Exception('SERVICE_MANAGEMENT_SUBSCRIPTION_ID envionment variable is missing');
        }
        
        return $subscriptionId;
    }
    
    public static function serviceManagementCertificatePath()
    {
        $path = getenv('SERVICE_MANAGEMENT_CERTIFICATE_PATH');
        
        if (empty($path)) {
            throw new \Exception('SERVICE_MANAGEMENT_CERTIFICATE_PATH envionment variable is missing');
        }
        
        return $path;
    }

    public static function serviceBusCertificatePath()
    {
        return getenv('SERVICE_BUS_CERTIFICATE_PATH');
    }

    public static function sslCertificateAuthorityPath()
    {
        return getenv('SSL_CERTIFICATE_AUTHORITY_PATH');
    }

    public static function serviceBusNamespace()
    {
        $namespace = getenv('SERVICE_BUS_NAMESPACE');
        
        if (empty($namespace)) {
            throw new \Exception('SERVICE_BUS_NAMESPACE enviroment variable is missing.');
        }
        
        return $namespace;
    }

    public static function wrapAuthenticationName()
    {
        $wrapAuthenticationName = getenv('WRAP_AUTHENTICATION_NAME');
        
        if (empty($wrapAuthenticationName)) {
            throw new \Exception('WRAP_AUTHENTICATION_NAME enviroment variable is missing.');
        }
        
        return $wrapAuthenticationName;
    }

    public static function wrapPassword()
    {
        $wrapPassword = getenv('WRAP_PASSWORD');
        
        if (empty($wrapPassword)) {
            throw new \Exception('WRAP_PASSWORD enviroment variable is missing.');
        }
        
        return $wrapPassword;
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
    
    public static function listMessagesSample()
    {
        $sample = array();
        $sample['QueueMessage']['MessageId']       = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage']['InsertionTime']   = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage']['ExpirationTime']  = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage']['PopReceipt']      = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage']['TimeNextVisible'] = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage']['DequeueCount']    = '1';
        $sample['QueueMessage']['MessageText']     = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';
        
        return $sample;
    }
    
    public static function listMessagesMultipleMessagesSample()
    {
        $sample = array();
        $sample['QueueMessage'][0]['MessageId']       = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage'][0]['InsertionTime']   = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage'][0]['ExpirationTime']  = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage'][0]['PopReceipt']      = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage'][0]['TimeNextVisible'] = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage'][0]['DequeueCount']    = '1';
        $sample['QueueMessage'][0]['MessageText']     = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';
        
        $sample['QueueMessage'][1]['MessageId']       = '1234c20-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage'][1]['InsertionTime']   = 'Sat, 10 Feb 2010 21:04:30 GMT';
        $sample['QueueMessage'][1]['ExpirationTime']  = 'Sat, 05 Jun 2010 21:04:30 GMT';
        $sample['QueueMessage'][1]['PopReceipt']      = 'QzW4Szf1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage'][1]['TimeNextVisible'] = 'Sun, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage'][1]['DequeueCount']    = '4';
        $sample['QueueMessage'][1]['MessageText']     = 'QWEFGlsc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';
        
        return $sample;
    }
    
    public static function listQueuesEmpty()
    {
        $sample = array();
        $sample['Queues'] = '';
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listQueuesOneEntry()
    {
        $sample = array();
        $sample['Marker'] = '/account/listqueueswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Queues'] = array('Queue' => array('Name' => 'myqueue', 'Url' => 'http://account.queue.core.windows.net/myqueue'));
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listQueuesMultipleEntries()
    {
        $sample = array();
        $sample['MaxResults'] = '2';
        $sample['Queues'] = array ('Queue' => array(
          0 => array('Name' => 'myqueue1', 'Url' => 'http://account.queue.core.windows.net/myqueue1'),
          1 => array('Name' => 'myqueue2', 'Url' => 'http://account.queue.core.windows.net/myqueue2')
        ));
        $sample['NextMarker'] = '/account/myqueue3';
        
        return $sample;
    }
    
    public static function listContainersEmpty()
    {
        $sample = array();
        $sample['Containers'] = '';
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listContainersOneEntry()
    {
        $sample = array();
        $sample['Marker'] = '/account/listqueueswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Containers'] = array('Container' => array(
            'Name' => 'audio',
            'Url' => 'http://myaccount.blob.core.windows.net/audio',
            'Properties' => array(
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C6B1B2'
            )
            ));
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listContainersMultipleEntries()
    {
        $sample = array();
        $sample['MaxResults'] = '3';
        $sample['Containers'] = array ('Container' => array(
          0 => array(
            'Name' => 'audio',
            'Url' => 'http://myaccount.blob.core.windows.net/audio',
            'Properties' => array(
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C6B1B2'
            )
            ),
          1 => array(
            'Name' => 'images',
            'Url' => 'http://myaccount.blob.core.windows.net/images',
            'Properties' => array(
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C1EEEC'
            )
            )
        ));
        $sample['NextMarker'] = 'video';
        
        return $sample;
    }
    
    public static function getContainerAclOneEntrySample()
    {
        $sample = array();
        $sample['SignedIdentifiers'] = array('SignedIdentifier' => array (
            'Id' => 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => array(
                'Start' => '2009-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2009-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'rwd')
            ));
        
        return $sample;
    }
    
    public static function getContainerAclMultipleEntriesSample()
    {
        $sample = array();
        $sample['SignedIdentifiers'] = array( 'SignedIdentifier' => array (
            0 => array ('Id' => 'HYQzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => array(
                'Start' => '2010-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2010-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'wd')),
            1 => array ('Id' => 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => array(
                'Start' => '2009-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2009-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'rwd'))
            ));
        
        return $sample;
    }
    
    public static function listBlobsEmpty()
    {
        $sample = array();
        $sample['Blobs'] = '';
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listBlobsOneEntry()
    {
        $sample = array();
        $sample['Marker'] = '/account/listblobswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Delimiter'] = 'mydelimiter';
        $sample['Prefix'] = 'myprefix';
        $sample['Blobs'] = array(
            'BlobPrefix' => array('Name' => 'myblobprefix'),
            'Blob' => array(
                'Name' => 'myblob', 
                'Url' => 'http://account.blob.core.windows.net/myblob',
                'Snapshot' => '10-12-2011',
                'Metadata' => array('Name1' => 'Value1', 'Name2' => 'Value2'),
                'Properties' => array(
                    'Last-Modified' => 'Sat, 04 Sep 2011 12:43:08 GMT',
                    'Etag' => '0x8CAFB82EFF70C46',
                    'Content-Length' => '10',
                    'Content-Type' => 'type',
                    'Content-Encoding' => 'encoding',
                    'Content-Language' => 'language',
                    'Content-MD5' => 'md5',
                    'Cache-Control' => 'cachecontrol',
                    'x-ms-blob-sequence-number' => '0',
                    'BlobType' => 'BlockBlob',
                    'LeaseStatus' => 'locked'
                )
            )
        );
        
        $sample['NextMarker'] = '';
        
        return $sample;
    }
    
    public static function listBlobsMultipleEntries()
    {
        $sample = array();
        $sample['Marker'] = '/account/listblobswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Blobs'] = array(
            'BlobPrefix' => array(
                0 => array('Name' => 'myblobprefix'),
                1 => array('Name' => 'myblobprefix2')),
            'Blob' => array( 0 => array(
                'Name' => 'myblob', 
                'Url' => 'http://account.blob.core.windows.net/myblob',
                'Snapshot' => '10-12-2011',
                'Metadata' => array('Name1' => 'Value1', 'Name2' => 'Value2'),
                'Properties' => array(
                    'Last-Modified' => 'Sat, 04 Sep 2011 12:43:08 GMT',
                    'Etag' => '0x8CAFB82EFF70C46',
                    'Content-Length' => '10',
                    'Content-Type' => 'type',
                    'Content-Encoding' => 'encoding',
                    'Content-Language' => 'language',
                    'Content-MD5' => 'md5',
                    'Cache-Control' => 'cachecontrol',
                    'x-ms-blob-sequence-number' => '0',
                    'BlobType' => 'BlockBlob',
                    'LeaseStatus' => 'locked'
                )
            ),
            
            1 => array(
                'Name' => 'myblob2', 
                'Url' => 'http://account.blob.core.windows.net/myblob2',
                'Snapshot' => '10-12-2011',
                'Metadata' => array('Name1' => 'Value1', 'Name2' => 'Value2'),
                'Properties' => array(
                    'Last-Modified' => 'Sun, 26 Feb 2010 12:43:08 GMT',
                    'Etag' => '0x7CQWER2EFF70C46',
                    'Content-Length' => '20',
                    'Content-Type' => 'type2',
                    'Content-Encoding' => 'encoding2',
                    'Content-Language' => 'language2',
                    'Content-MD5' => 'md52',
                    'Cache-Control' => 'cachecontrol2',
                    'x-ms-blob-sequence-number' => '1',
                    'BlobType' => 'PageBlob',
                    'LeaseStatus' => 'unlocked'
                )
            )));
        
        $sample['NextMarker'] = 'value';
        
        return $sample;
    }
    
    public static function getTestEntity($partitionKey, $rowKey)
    {
        $entity = new Entity();
        $entity->setPartitionKey($partitionKey);
        $entity->setRowKey($rowKey);
        $entity->addProperty('CustomerId', EdmType::INT32, 890);
        $entity->addProperty('CustomerName', null, 'John');
        $entity->addProperty('IsNew', EdmType::BOOLEAN, true);
        $entity->addProperty('JoinDate', EdmType::DATETIME, Utilities::convertToDateTime('2012-01-26T18:26:19.0000473Z'));
        
        return $entity;
    }
}


