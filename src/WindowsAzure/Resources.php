<?php

/**
 * Implementation of class Resources.
 *
 * PHP version 5
 *
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
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure;

/**
 * Project resources.
 *
 * @package    Azure-sdk-for-php
 * @author     Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */
class Resources
{
  // Messages
  const INVALID_TYPE_MESSAGE = 'The provided variable should be of type: ';
  
  // HTTP Headers
  const X_MS_VERSION        = 'x-ms-version';
  const X_MS_DATE           = 'x-ms-date';
  const AUTHENTICATION      = 'Authorization';
  const CONTENT_ENCODING    = 'content-encoding';
  const CONTENT_LANGUAGE    = 'content-language';
  const CONTENT_LENGTH      = 'content-length';
  const CONTENT_MD5         = 'content-md5';
  const CONTENT_TYPE        = 'content-type';
  const DATE                = 'date';
  const IF_MODIFIED_SINCE   = 'if-modified-since';
  const IF_MATCH            = 'if-match';
  const IF_NONE_MATCH       = 'if-none-match';
  const IF_UNMODIFIED_SINCE = 'if-unmodified-since';
  const RANGE               = 'range';
  const X_MS_HEADER_PREFIX  = 'x-ms-';
  
  // Misc
  const QUEUE_TYPE_NAME = 'IQueue';
  const STORAGE_URI     = 'http://%s.%s/';
  
  // Versioning
  const API_VERSION = '2011-08-18';
  
  // Query parameter names
  const PREFIX      = 'Prefix';
  const MAX_RESULTS = 'MaxResults';
  const METADATA    = 'Metadata';
  const MARKER      = 'Marker';
  const NEXT_MARKER = 'NextMarker';
}

?>
