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
 * @package   PEAR2\WindowsAzure\Services\Table\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Utilities;
use PEAR2\WindowsAzure\Resources;
require_once 'PEAR.php';
require_once 'Mail/mimePart.php';

/**
 * Reads and writes MIME for batch API.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Utilities
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class MimeReaderWriter implements IMimeReaderWriter
{
    public function getMimeMultipart($bodyPartContents)
    {
        $mimeType      = Resources::MULTIPART_MIXED_TYPE;
        $batchGuid     = strtolower(trim(com_create_guid(), '{}'));
        $batchId       = sprintf('batch_%s', $batchGuid);
        $contentType1  = array('content_type' => "$mimeType");
        $changeSetGuid = strtolower(trim(com_create_guid(), '{}'));
        $changeSetId   = sprintf('changeset_%s', $changeSetGuid);
        $contentType2  = array('content_type' => "$mimeType; boundary=$changeSetId");
        $options       = array(
            'encoding'     => 'binary',
            'content_type' => Resources::HTTP_TYPE
        );

        // Create changeset MIME part
        $changeSet = new \Mail_mimePart();
        
        for ($i = 0; $i < count($bodyPartContents); $i++) {
            $changeSet->addSubpart($bodyPartContents[$i], $options);
        }
        
        // Encode the changeset MIME part
        $changeSetEncoded = $changeSet->encode($changeSetId);
        
        // Create the batch MIME part
        $batch = new \Mail_mimePart(Resources::EMPTY_STRING, $contentType1);
        
        // Add changeset encoded to batch MIME part
        $batch->addSubpart($changeSetEncoded['body'], $contentType2);
        
        // Encode batch MIME part
        $batchEncoded = $batch->encode($batchId);
        $headers = $batchEncoded['headers'];
        $ct = $headers['Content-Type'];
        $ct = str_replace('"', '', $ct);
        $batchEncoded['headers']['Content-Type'] = $ct;
        return $batchEncoded;
    }
}

?>
