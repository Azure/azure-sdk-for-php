<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace Tests\framework;

use MicrosoftAzure\Storage\Table\Models\EdmType;
use MicrosoftAzure\Storage\Table\Models\Entity;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

/**
 * Resources for testing framework.
 *
 * @author     Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link       https://github.com/windowsazure/azure-sdk-for-php
 */
class TestResources
{
    const QUEUE1_NAME = 'Queue1';
    const QUEUE2_NAME = 'Queue2';
    const QUEUE3_NAME = 'Queue3';
    const KEY1 = 'key1';
    const KEY2 = 'key2';
    const KEY3 = 'key3';
    const KEY4 = 'AhlzsbLRkjfwObuqff3xrhB2yWJNh1EMptmcmxFJ6fvPTVX3PZXwrG2YtYWf5DPMVgNsteKStM5iBLlknYFVoA==';
    const VALUE1 = 'value1';
    const VALUE2 = 'value2';
    const VALUE3 = 'value3';
    const ACCOUNT_NAME = 'myaccount';
    const QUEUE_URI = '.queue.core.windows.net';
    const URI1 = 'http://myaccount.queue.core.windows.net/myqueue';
    const URI2 = 'http://myaccount.queue.core.windows.net/?comp=list';
    const DATE1 = 'Sat, 18 Feb 2012 16:25:21 GMT';
    const DATE2 = 'Mon, 20 Feb 2012 17:12:31 GMT';
    const VALID_URL = 'http://www.example.com';
    const HEADER1 = 'testheader1';
    const HEADER2 = 'testheader2';
    const HEADER1_VALUE = 'HeaderValue1';
    const HEADER2_VALUE = 'HeaderValue2';

    // Media services
    const MEDIA_SERVICES_ASSET_NAME = 'TestAsset';
    const MEDIA_SERVICES_OUTPUT_ASSET_NAME = 'TestOutputAsset';
    const MEDIA_SERVICES_ACCESS_POLICY_NAME = 'TestAccessPolicy';
    const MEDIA_SERVICES_LOCATOR_NAME = 'TestLocator';
    const MEDIA_SERVICES_JOB_NAME = 'TestJob';
    const MEDIA_SERVICES_JOB_ID_PREFIX = 'nb:jid:UUID:';
    const MEDIA_SERVICES_JOB_TEMPLATE_NAME = 'TestJobTemplate';
    const MEDIA_SERVICES_JOB_TEMPLATE_ID_PREFIX = 'nb:jtid:UUID:';
    const MEDIA_SERVICES_TASK_CONFIGURATION = 'H.264 HD 720p VBR';
    const MEDIA_SERVICES_PROCESSOR_NAME = 'Media Encoder Standard';
    const MEDIA_SERVICES_DECODE_PROCESSOR_NAME = 'Storage Decryption';
    const MEDIA_SERVICES_PROCESSOR_ID_PREFIX = 'nb:mpid:UUID:';
    const MEDIA_SERVICES_DUMMY_FILE_NAME = 'simple.avi';
    const MEDIA_SERVICES_DUMMY_FILE_CONTENT = 'test file content';
    const MEDIA_SERVICES_DUMMY_FILE_NAME_1 = 'other.avi';
    const MEDIA_SERVICES_DUMMY_FILE_CONTENT_1 = 'other file content';
    const MEDIA_SERVICES_ISM_FILE_NAME = 'small.ism';
    const MEDIA_SERVICES_ISMC_FILE_NAME = 'small.ismc';
    const MEDIA_SERVICES_STREAM_APPEND = 'Manifest';
    const MEDIA_SERVICES_INGEST_MANIFEST = 'TestIngestManifest';
    const MEDIA_SERVICES_INGEST_MANIFEST_ASSET = 'TestIngestManifestAsset';
    const MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_NAME = 'TestContentKeyAuthorizationPolicy';
    const MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_OPTIONS_NAME = 'TestContentKeyAuthorizationPolicyOption';
    const MEDIA_SERVICES_CONTENT_KEY_AUTHORIZATION_POLICY_RESTRICTION_NAME = 'TestContentKeyAuthorizationPolicyRestriction';
    const MEDIA_SERVICES_ASSET_DELIVERY_POLICY_NAME = 'AssetDeliveryPolicyName';
    const MEDIA_SERVICES_CHANNEL_NAME = 'PHPSDK-CHANNEL-UNITTEST';

    // See https://tools.ietf.org/html/rfc2616
    const STATUS_NOT_MODIFIED = 304;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_FORBIDDEN = 403;
    const STATUS_NOT_FOUND = 404;
    const STATUS_CONFLICT = 409;
    const STATUS_PRECONDITION_FAILED = 412;
    const STATUS_INTERNAL_SERVER_ERROR = 500;

    public static function getWindowsAzureStorageServicesConnectionString()
    {
        $connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');

        if (empty($connectionString)) {
            throw new \Exception('AZURE_STORAGE_CONNECTION_STRING environment variable is missing');
        }

        return $connectionString;
    }

    public static function getMediaStorageServicesConnectionString()
    {
        $connectionString = getenv('AZURE_MEDIA_STORAGE_CONNECTION_STRING');

        if (empty($connectionString)) {
            throw new \Exception('AZURE_MEDIA_STORAGE_CONNECTION_STRING environment variable is missing');
        }

        return $connectionString;
    }

    public static function getEmulatorStorageServicesConnectionString()
    {
        $developmentStorageConnectionString = 'UseDevelopmentStorage=true';

        return $developmentStorageConnectionString;
    }

    public static function getServiceManagementConnectionString()
    {
        $connectionString = getenv('AZURE_SERVICE_MANAGEMENT_CONNECTION_STRING');

        if (empty($connectionString)) {
            throw new \Exception('AZURE_SERVICE_MANAGEMENT_CONNECTION_STRING environment variable is missing');
        }

        return $connectionString;
    }

    public static function getServiceBusConnectionString()
    {
        $connectionString = getenv('AZURE_SERVICE_BUS_CONNECTION_STRING');

        if (empty($connectionString)) {
            throw new \Exception('AZURE_SERVICE_BUS_CONNECTION_STRING environment variable is missing.');
        }

        return $connectionString;
    }

    public static function simplePackageUrl()
    {
        $name = getenv('SERVICE_MANAGEMENT_SIMPLE_PACKAGE_URL');

        if (empty($name)) {
            throw new \Exception('SERVICE_MANAGEMENT_SIMPLE_PACKAGE_URL environment variable is missing');
        }

        return $name;
    }

    public static function simplePackageConfiguration()
    {
        $name = getenv('SERVICE_MANAGEMENT_SIMPLE_PACKAGE_CONFIGURATION');

        if (empty($name)) {
            throw new \Exception('SERVICE_MANAGEMENT_SIMPLE_PACKAGE_CONFIGURATION environment variable is missing');
        }

        return $name;
    }

    public static function complexPackageUrl()
    {
        $name = getenv('SERVICE_MANAGEMENT_COMPLEX_PACKAGE_URL');

        if (empty($name)) {
            throw new \Exception('SERVICE_MANAGEMENT_COMPLEX_PACKAGE_URL environment variable is missing');
        }

        return $name;
    }

    public static function complexPackageConfiguration()
    {
        $name = getenv('SERVICE_MANAGEMENT_COMPLEX_PACKAGE_CONFIGURATION');

        if (empty($name)) {
            throw new \Exception('SERVICE_MANAGEMENT_COMPLEX_PACKAGE_CONFIGURATION environment variable is missing');
        }

        return $name;
    }

    public static function getMediaServicesConnectionParameters()
    {
        return [
            'tenant' => self::getEnvironmentVariable('AZURE_MEDIA_SERVICES_TENANT'),
            'clientId' => self::getEnvironmentVariable('AZURE_MEDIA_SERVICES_CLIENT_ID'),
            'clientKey' => self::getEnvironmentVariable('AZURE_MEDIA_SERVICES_CLIENT_KEY'),
            'restApiEndpoint' => self::getEnvironmentVariable('AZURE_MEDIA_SERVICES_REST_API_ENDPOINT'),
            'environment' => self::getEnvironmentVariable('AZURE_MEDIA_SERVICES_ENVIRONMENT'),
        ];
    }

    private static function getEnvironmentVariable($name, $required = true)
    {
        $value = getenv($name);

        if (empty($value) && $required) {
            throw new \Exception("{$name} environment variable is missing.");
        }

        return $value;
    }

    public static function getServicePropertiesSample()
    {
        $sample = [];
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
        $sample = [];
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
        $sample = [];
        $sample['QueueMessage']['MessageId'] = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage']['InsertionTime'] = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage']['ExpirationTime'] = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage']['PopReceipt'] = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage']['TimeNextVisible'] = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage']['DequeueCount'] = '1';
        $sample['QueueMessage']['MessageText'] = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';

        return $sample;
    }

    public static function listMessagesMultipleMessagesSample()
    {
        $sample = [];
        $sample['QueueMessage'][0]['MessageId'] = '5974b586-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage'][0]['InsertionTime'] = 'Fri, 09 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage'][0]['ExpirationTime'] = 'Fri, 16 Oct 2009 21:04:30 GMT';
        $sample['QueueMessage'][0]['PopReceipt'] = 'YzQ4Yzg1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage'][0]['TimeNextVisible'] = 'Fri, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage'][0]['DequeueCount'] = '1';
        $sample['QueueMessage'][0]['MessageText'] = 'PHRlc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';

        $sample['QueueMessage'][1]['MessageId'] = '1234c20-0df3-4e2d-ad0c-18e3892bfca2';
        $sample['QueueMessage'][1]['InsertionTime'] = 'Sat, 10 Feb 2010 21:04:30 GMT';
        $sample['QueueMessage'][1]['ExpirationTime'] = 'Sat, 05 Jun 2010 21:04:30 GMT';
        $sample['QueueMessage'][1]['PopReceipt'] = 'QzW4Szf1MDItYTc0Ny00OWNjLTkxYTUtZGM0MDFiZDAwYzEw';
        $sample['QueueMessage'][1]['TimeNextVisible'] = 'Sun, 09 Oct 2009 23:29:20 GMT';
        $sample['QueueMessage'][1]['DequeueCount'] = '4';
        $sample['QueueMessage'][1]['MessageText'] = 'QWEFGlsc3Q+dGhpcyBpcyBhIHRlc3QgbWVzc2FnZTwvdGVzdD4=';

        return $sample;
    }

    public static function listQueuesEmpty()
    {
        $sample = [];
        $sample['Queues'] = '';
        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listQueuesOneEntry()
    {
        $sample = [];
        $sample['Marker'] = '/account/listqueueswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Queues'] = ['Queue' => ['Name' => 'myqueue', 'Url' => 'http://account.queue.core.windows.net/myqueue']];
        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listQueuesMultipleEntries()
    {
        $sample = [];
        $sample['MaxResults'] = '2';
        $sample['Queues'] = ['Queue' => [
          0 => ['Name' => 'myqueue1', 'Url' => 'http://account.queue.core.windows.net/myqueue1'],
          1 => ['Name' => 'myqueue2', 'Url' => 'http://account.queue.core.windows.net/myqueue2'],
        ]];
        $sample['NextMarker'] = '/account/myqueue3';

        return $sample;
    }

    public static function listContainersEmpty()
    {
        $sample = [];
        $sample['Containers'] = '';
        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listContainersOneEntry()
    {
        $sample = [];
        $sample['Marker'] = '/account/listqueueswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Containers'] = ['Container' => [
            'Name' => 'audio',
            'Url' => 'http://myaccount.blob.core.windows.net/audio',
            'Properties' => [
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C6B1B2',
            ],
        ]];
        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listContainersMultipleEntries()
    {
        $sample = [];
        $sample['MaxResults'] = '3';
        $sample['Containers'] = ['Container' => [
          0 => [
            'Name' => 'audio',
            'Url' => 'http://myaccount.blob.core.windows.net/audio',
            'Properties' => [
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C6B1B2',
            ],
          ],
          1 => [
            'Name' => 'images',
            'Url' => 'http://myaccount.blob.core.windows.net/images',
            'Properties' => [
                'Last-Modified' => 'Wed, 12 Aug 2009 20:39:39 GMT',
                'Etag' => '0x8CACB9BD7C1EEEC',
            ],
          ],
        ]];
        $sample['NextMarker'] = 'video';

        return $sample;
    }

    public static function getContainerAclOneEntrySample()
    {
        $sample = [];
        $sample['SignedIdentifiers'] = ['SignedIdentifier' => [
            'Id' => 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => [
                'Start' => '2009-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2009-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'rwd',],
        ]];

        return $sample;
    }

    public static function getContainerAclMultipleEntriesSample()
    {
        $sample = [];
        $sample['SignedIdentifiers'] = ['SignedIdentifier' => [
            0 => ['Id' => 'HYQzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => [
                'Start' => '2010-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2010-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'wd',],],
            1 => ['Id' => 'MTIzNDU2Nzg5MDEyMzQ1Njc4OTAxMjM0NTY3ODkwMTI=',
            'AccessPolicy' => [
                'Start' => '2009-09-28T08%3A49%3A37.0000000Z',
                'Expiry' => '2009-09-29T08%3A49%3A37.0000000Z',
                'Permission' => 'rwd',],],
        ]];

        return $sample;
    }

    public static function listBlobsEmpty()
    {
        $sample = [];
        $sample['Blobs'] = '';
        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listBlobsOneEntry()
    {
        $sample = [];
        $sample['Marker'] = '/account/listblobswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Delimiter'] = 'mydelimiter';
        $sample['Prefix'] = 'myprefix';
        $sample['Blobs'] = [
            'BlobPrefix' => ['Name' => 'myblobprefix'],
            'Blob' => [
                'Name' => 'myblob',
                'Url' => 'http://account.blob.core.windows.net/myblob',
                'Snapshot' => '10-12-2011',
                'Metadata' => ['Name1' => 'Value1', 'Name2' => 'Value2'],
                'Properties' => [
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
                    'LeaseStatus' => 'locked',
                ],
            ],
        ];

        $sample['NextMarker'] = '';

        return $sample;
    }

    public static function listBlobsMultipleEntries()
    {
        $sample = [];
        $sample['Marker'] = '/account/listblobswithnextmarker3';
        $sample['MaxResults'] = '2';
        $sample['Blobs'] = [
            'BlobPrefix' => [
                0 => ['Name' => 'myblobprefix'],
                1 => ['Name' => 'myblobprefix2'],],
            'Blob' => [0 => [
                'Name' => 'myblob',
                'Url' => 'http://account.blob.core.windows.net/myblob',
                'Snapshot' => '10-12-2011',
                'Metadata' => ['Name1' => 'Value1', 'Name2' => 'Value2'],
                'Properties' => [
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
                    'LeaseStatus' => 'locked',
                ],
            ],

            1 => [
                'Name' => 'myblob2',
                'Url' => 'http://account.blob.core.windows.net/myblob2',
                'Snapshot' => '10-12-2011',
                'Metadata' => ['Name1' => 'Value1', 'Name2' => 'Value2'],
                'Properties' => [
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
                    'LeaseStatus' => 'unlocked',
                ],
            ],],];

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

    public static function getTestOAuthAccessToken()
    {
        $token = [
            Resources::OAUTH_ACCESS_TOKEN => 'http%3a%2f%2fschemas.xmlsoap.org%2fws%2f2005%2f05%2fidentity%2fclaims%2fnameidentifier=client_id&http%3a%2f%2fschemas.microsoft.com%2f'
                .'accesscontrolservice%2f2010%2f07%2fclaims%2fidentityprovider=https%3a%2f%2fwamsprodglobal001acs.accesscontrol.windows.net%2f&Audience=urn%3aWindows'
                .'AzureMediaServices&ExpiresOn=1326498007&Issuer=https%3a%2f%2f wamsprodglobal001acs.accesscontrol.windows.net%2f&HMACSHA256=hV1WF7sTe%2ffoHqzK%2ftm'
                .'nwQY22NRPaDytcOOpC9Nv4DA%3d","token_type":"http://schemas.xmlsoap.org/ws/2009/11/swt-token-profile-1.0',
            Resources::OAUTH_EXPIRES_IN => '3599',
            Resources::OAUTH_SCOPE => 'urn:WindowsAzureMediaServices',
        ];

        return $token;
    }

    public static function getSimpleJson()
    {
        $data['dataArray'] = ['test1', 'test2', 'test3'];
        $data['jsonArray'] = '["test1","test2","test3"]';

        $data['dataObject'] = ['k1' => 'test1', 'k2' => 'test2', 'k3' => 'test3'];
        $data['jsonObject'] = '{"k1":"test1","k2":"test2","k3":"test3"}';

        return $data;
    }

    public static function getMediaServicesTask($outputAssetName)
    {
        return '<?xml version="1.0" encoding="utf-8"?><taskBody><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody>';
    }

    public static function getMediaServicesJobTemplate($taskTemplateId, $outputAssetName)
    {
        return '<?xml version="1.0" encoding="utf-8"?><jobTemplate><taskBody taskTemplateId="'.$taskTemplateId.'"><inputAsset>JobInputAsset(0)</inputAsset><outputAsset assetCreationOptions="0" assetName="'.$outputAssetName.'">JobOutputAsset(0)</outputAsset></taskBody></jobTemplate>';
    }

    public static function getSmallIsm()
    {
        return '<?xml version="1.0" encoding="utf-8"?><smil xmlns="http://www.w3.org/2001/SMIL20/Language"><head><meta name="clientManifestRelativePath" content="small.ismc"/></head><body><switch><video src="small.ismv" systemBitrate="952962"><param name="trackID" value="1" valuetype="data" /></video></switch></body></smil>';
    }

    public static function getSmallIsmc()
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
                <SmoothStreamingMedia MajorVersion="2" MinorVersion="1" Duration="20429600">
                <StreamIndex Type="video" Url="QualityLevels({bitrate})/Fragments(video={start time})" Name="video" Chunks="1" QualityLevels="1">
                <QualityLevel Index="0" Bitrate="952962" FourCC="AVC1" MaxWidth="512" MaxHeight="288" CodecPrivateData="0000000167640015ac2ca5020096ffc1000100148303032000000300200000064c08001fe40000ff20fe31c604000ff200007f907f18e1da1225160000000168e9093525"/>
                <c t="0" d="20429600"/>
                </StreamIndex>
                </SmoothStreamingMedia>';
    }

    public static function getClientAccessPolicy()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
                <access-policy>
                <cross-domain-access>
                    <policy>
                    <allow-from http-request-headers="*">
                        <domain uri="http://*" />
                    </allow-from>
                    <grant-to>
                        <resource path="/" include-subpaths="false" />
                    </grant-to>
                    </policy>
                </cross-domain-access>
                </access-policy>';
    }

    public static function getCrossDomainPolicy()
    {
        return '<?xml version="1.0" ?>
                <!DOCTYPE cross-domain-policy SYSTEM "http://www.macromedia.com/xml/dtds/cross-domain-policy.dtd">
                <cross-domain-policy>
                <allow-access-from domain="*" />
                </cross-domain-policy>';
    }
}
