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
 * @package   WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure;

/**
 * Project resources.
 *
 * @category  Microsoft
 * @package   WindowsAzure
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Resources
{
    // Messages
    const INVALID_TYPE_MSG     = 'The provided variable should be of type: ';
    const INVALID_META_MSG     = 'Metadata cannot contain newline characters.';
    const AZURE_ERROR_MSG      = "Fail:\nCode: %s\nValue: %s\ndetails (if any): %s.";
    const NOT_IMPLEMENTED_MSG  = 'This method is not implemented.';
    const NULL_OR_EMPTY_MSG    = "'%s' can't be NULL or empty.";
    const NULL_MSG             = "'%s' can't be NULL.";
    const INVALID_URL_MSG      = 'Provided URL is invalid.';
    const INVALID_HT_MSG       = 'The header type provided is invalid.';
    const INVALID_EDM_MSG      = 'The provided EDM type is invalid.';
    const INVALID_PROP_MSG     = 'One of the provided properties is not an instance of class Property';
    const INVALID_ENTITY_MSG   = 'The provided entity object is invalid.';
    const INVALID_VERSION_MSG  = 'Server does not support any known protocol versions.';
    const INVALID_BO_TYPE_MSG  = 'Batch operation name is not supported or invalid.';
    const INVALID_BO_PN_MSG    = 'Batch operation parameter is not supported.';
    const INVALID_OC_COUNT_MSG = 'Operations and contexts must be of same size.';
    const INVALID_EXC_OBJ_MSG  = 'Exception object type should be ServiceException.';
    const NULL_TABLE_KEY_MSG   = 'Partition and row keys can\'t be NULL.';
    const BATCH_ENTITY_DEL_MSG = 'The entity was deleted successfully.';
    const INVALID_PROP_VAL_MSG = "'%s' property value must satisfy %s.";
    const INVALID_PARAM_MSG    = "The provided variable '%s' should be of type '%s'";
    const INVALID_BTE_MSG      = "The blob block type must exist in %s";
    const INVALID_BLOB_PAT_MSG = 'The provided access type is invalid.';
    const INVALID_SVC_PROP_MSG = 'The provided service properties is invalid.';
    const UNKNOWN_SRILZER_MSG  = 'The provided serializer type is unknown';

    // HTTP Headers
    const X_MS_HEADER_PREFIX                 = 'x-ms-';
    const X_MS_META_HEADER_PREFIX            = 'x-ms-meta-';
    const X_MS_APPROXIMATE_MESSAGES_COUNT    = 'x-ms-approximate-messages-count';
    const X_MS_POPRECEIPT                    = 'x-ms-popreceipt';
    const X_MS_TIME_NEXT_VISIBLE             = 'x-ms-time-next-visible';
    const X_MS_BLOB_PUBLIC_ACCESS            = 'x-ms-blob-public-access';
    const X_MS_VERSION                       = 'x-ms-version';
    const X_MS_DATE                          = 'x-ms-date';
    const X_MS_BLOB_SEQUENCE_NUMBER          = 'x-ms-blob-sequence-number';
    const X_MS_BLOB_SEQUENCE_NUMBER_ACTION   = 'x-ms-sequence-number-action';
    const X_MS_BLOB_TYPE                     = 'x-ms-blob-type';
    const X_MS_BLOB_CONTENT_TYPE             = 'x-ms-blob-content-type';
    const X_MS_BLOB_CONTENT_ENCODING         = 'x-ms-blob-content-encoding';
    const X_MS_BLOB_CONTENT_LANGUAGE         = 'x-ms-blob-content-language';
    const X_MS_BLOB_CONTENT_MD5              = 'x-ms-blob-content-md5';
    const X_MS_BLOB_CACHE_CONTROL            = 'x-ms-blob-cache-control';
    const X_MS_BLOB_CONTENT_LENGTH           = 'x-ms-blob-content-length';
    const X_MS_RANGE                         = 'x-ms-range';
    const X_MS_RANGE_GET_CONTENT_MD5         = 'x-ms-range-get-content-md5';
    const X_MS_LEASE_ID                      = 'x-ms-lease-id';
    const X_MS_LEASE_STATUS                  = 'x-ms-lease-status';
    const X_MS_LEASE_ACTION                  = 'x-ms-lease-action';
    const X_MS_DELETE_SNAPSHOTS              = 'x-ms-delete-snapshots';
    const X_MS_PAGE_WRITE                    = 'x-ms-page-write';
    const X_MS_CONTINUATION_NEXTTABLENAME    = 'x-ms-continuation-nexttablename';
    const X_MS_CONTINUATION_NEXTPARTITIONKEY = 'x-ms-continuation-nextpartitionkey';
    const X_MS_CONTINUATION_NEXTROWKEY       = 'x-ms-continuation-nextrowkey';
    const ETAG                               = 'etag';
    const LAST_MODIFIED                      = 'last-modified';
    const DATE                               = 'date';
    const AUTHENTICATION                     = 'authorization';
    const CONTENT_ENCODING                   = 'content-encoding';
    const CONTENT_LANGUAGE                   = 'content-language';
    const CONTENT_LENGTH                     = 'content-length';
    const CONTENT_MD5                        = 'content-md5';
    const CONTENT_TYPE                       = 'content-type';
    const CONTENT_ID                         = 'content-id';
    const CONTENT_RANGE                      = 'content-range';
    const CACHE_CONTROL                      = 'cache-control';
    const IF_MODIFIED_SINCE                  = 'if-modified-since';
    const IF_MATCH                           = 'if-match';
    const IF_NONE_MATCH                      = 'if-none-match';
    const IF_UNMODIFIED_SINCE                = 'if-unmodified-since';
    const RANGE                              = 'range';
    const DATA_SERVICE_VERSION               = 'dataserviceversion';
    const MAX_DATA_SERVICE_VERSION           = 'maxdataserviceversion';
    const ACCEPT_HEADER                      = 'accept';
    const ACCEPT_CHARSET                     = 'accept-charset';

    // Type
    const QUEUE_TYPE_NAME              = 'IQueue';
    const BLOB_TYPE_NAME               = 'IBlob';
    const TABLE_TYPE_NAME              = 'ITable';
    const SERVICE_MANAGEMENT_TYPE_NAME = 'IServiceManagement';
    
    // HTTP Methods
    const HTTP_GET    = 'GET';
    const HTTP_PUT    = 'PUT';
    const HTTP_POST   = 'POST';
    const HTTP_HEAD   = 'HEAD';
    const HTTP_DELETE = 'DELETE';
    const HTTP_MERGE  = 'MERGE';
    
    // Misc
    const EMPTY_STRING       = '';
    const SEPARATOR          = ',';
    const AZURE_DATE_FORMAT  = 'D, d M Y H:i:s T';
    const TIMESTAMP_FORMAT   = 'Y-m-d H:i:s';
    const EMULATED           = 'EMULATED';
    const DEV_STORE_NAME     = 'devstoreaccount1';
    const DEV_STORE_KEY      = 'Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==';
    const EMULATOR_BLOB_URI  = '127.0.0.1:10000';
    const EMULATOR_QUEUE_URI = '127.0.0.1:10001';
    const EMULATOR_TABLE_URI = '127.0.0.1:10002';
    const ASTERISK           = '*';
    const SM_URL             = 'https://management.core.windows.net';
    const WA_XML_NAMESPACE   = 'http://schemas.microsoft.com/windowsazure';

    // Header values
    const STORAGE_API_LATEST_VERSION     = '2011-08-18';
    const SM_API_LATEST_VERSION          = '2011-10-01';
    const DATA_SERVICE_VERSION_VALUE     = '1.0;NetFx';
    const MAX_DATA_SERVICE_VERSION_VALUE = '2.0;NetFx';
    const ACCEPT_HEADER_VALUE            = 'application/atom+xml,application/xml';
    const ACCEPT_CHARSET_VALUE           = 'utf-8';

    // Query parameter names
    const QP_PREFIX             = 'Prefix';
    const QP_MAX_RESULTS        = 'MaxResults';
    const QP_METADATA           = 'Metadata';
    const QP_MARKER             = 'Marker';
    const QP_NEXT_MARKER        = 'NextMarker';
    const QP_COMP               = 'comp';
    const QP_VISIBILITY_TIMEOUT = 'visibilitytimeout';
    const QP_POPRECEIPT         = 'popreceipt';
    const QP_NUM_OF_MESSAGES    = 'numofmessages';
    const QP_PEEK_ONLY          = 'peekonly';
    const QP_MESSAGE_TTL        = 'messagettl';
    const QP_INCLUDE            = 'include';
    const QP_TIMEOUT            = 'timeout';
    const QP_DELIMITER          = 'Delimiter';
    const QP_REST_TYPE          = 'restype';
    const QP_SNAPSHOT           = 'snapshot';
    const QP_BLOCKID            = 'blockid';
    const QP_BLOCK_LIST_TYPE    = 'blocklisttype';
    const QP_SELECT             = '$select';
    const QP_TOP                = '$top';
    const QP_FILTER             = '$filter';
    const QP_NEXT_TABLE_NAME    = 'NextTableName';
    const QP_NEXT_PK            = 'NextPartitionKey';
    const QP_NEXT_RK            = 'NextRowKey';
    
    // Request body content types
    const XML_CONTENT_TYPE      = 'application/x-www-form-urlencoded';
    const BINARY_FILE_TYPE      = 'application/octet-stream';
    const XML_ATOM_CONTENT_TYPE = 'application/atom+xml';
    const HTTP_TYPE             = 'application/http';
    const MULTIPART_MIXED_TYPE  = 'multipart/mixed';
    
    // Common used XML tags
    const XTAG_ATTRIBUTES     = '@attributes';
    const XTAG_NAMESPACE      = '@namespace';
    const XTAG_LABEL          = 'Label';
    const XTAG_NAME           = 'Name';
    const XTAG_DESCRIPTION    = 'Description';
    const XTAG_LOCATION       = 'Location';
    const XTAG_AFFINITY_GROUP = 'AffinityGroup';
    
    // Status Codes
    const STATUS_OK              = 200;
    const STATUS_CREATED         = 201;
    const STATUS_ACCEPTED        = 202;
    const STATUS_NO_CONTENT      = 204;
    const STATUS_PARTIAL_CONTENT = 206;
    
    // HTTP_Request2 config parameter names
    const USE_BRACKETS    = 'use_brackets';
    const SSL_VERIFY_PEER = 'ssl_verify_peer';
    const SSL_VERIFY_HOST = 'ssl_verify_host';
    const SSL_LOCAL_CERT  = 'ssl_local_cert';
    const CONNECT_TIMEOUT = 'connect_timeout';
}

?>
