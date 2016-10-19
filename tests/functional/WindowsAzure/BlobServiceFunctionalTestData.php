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

namespace Tests\functional\WindowsAzure;

use DateTime;
use MicrosoftAzure\Storage\Blob\Models\AccessCondition;
use MicrosoftAzure\Storage\Blob\Models\ContainerAcl;
use MicrosoftAzure\Storage\Blob\Models\CopyBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateBlobSnapshotOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\DeleteBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\DeleteContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\GetBlobPropertiesOptions;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\ListContainersOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Blob\Models\SetBlobMetadataOptions;
use MicrosoftAzure\Storage\Blob\Models\SetBlobPropertiesOptions;
use MicrosoftAzure\Storage\Blob\Models\SetContainerMetadataOptions;
use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Models\Logging;
use MicrosoftAzure\Storage\Common\Models\Metrics;
use MicrosoftAzure\Storage\Common\Models\RetentionPolicy;
use MicrosoftAzure\Storage\Common\Models\ServiceProperties;

class BlobServiceFunctionalTestData
{
    public static $testUniqueId;
    public static $tempBlobCounter = 1;
    public static $nonExistContainerPrefix;
    public static $nonExistBlobPrefix;
    public static $testContainerNames;
    public static $testBlobNames;
    private static $_accountName;
    private static $badETag = '0x123456789ABCDEF';

    public static function setupData($accountName)
    {
        $rInt = mt_rand(0, 1000000);
        self::$_accountName = $accountName;
        self::$testUniqueId = 'qa-'.$rInt.'-';
        self::$nonExistContainerPrefix = 'qa-'.($rInt. 1).'-';
        self::$nonExistBlobPrefix = 'qa-'.($rInt. 2).'-';
        self::$testContainerNames = [self::$testUniqueId.'a1', self::$testUniqueId.'a2', self::$testUniqueId.'b1'];
        self::$testBlobNames = ['b'.self::$testUniqueId.'a1', 'b'.self::$testUniqueId.'a2', 'b'.self::$testUniqueId.'b1'];
    }

    public static function getInterestingContainerName()
    {
        // http://msdn.microsoft.com/en-us/library/windowsazure/dd135715.aspx
        // 1. Container names must start with a letter or number, and can
        //    contain only letters, numbers, and the dash (-) character.
        // 2. Consecutive dashes are not permitted in container names.
        // 3. All letters in a container name must be lowercase.
        // 4. Container names must be from 3 through 63 characters long.
        // 5. Container names cannot contain control characters: 0x00 to 0x1F

        return self::$testUniqueId.'con-'.(self::$tempBlobCounter++);
    }

    public static function getInterestingBlobName($container)
    {
        // http://msdn.microsoft.com/en-us/library/windowsazure/dd135715.aspx
        // 1. A blob name cannot contain control characters: 0x00 to 0x1F
        // 2. A blob name can contain any combination of characters, but
        //    reserved URL characters must be properly escaped.
        // 3. A blob name must be at least one character long and cannot be
        //    more than 1,024 characters long.
        // 4. Blob names are case-sensitive.
        // 5. Avoid blob names that end with a dot (.) or a forward slash (/);
        //    they are removed by the server
        // 6. Avoid blob names containing a dot-slash sequence (./);
        //    the dot is removed by the server.

        $uB2E4 = chr(0xEB).chr(0x8B).chr(0xA4); // UTF8 encoding of \uB2E4
        $blobName = self::$testUniqueId.'/*\"\'&.({[<+ '.chr(0x7D).$uB2E4.'_'.(self::$tempBlobCounter++);
        if (empty($container) || $container == '$root') {
            $blobName = str_replace('/', 'X', $blobName);
            $blobName = str_replace('\\', 'X', $blobName);
        }

        return $blobName;
    }

    public static function getSimpleMessageText()
    {
        return 'simple message text #'.(self::$tempBlobCounter++);
    }

    public static function getInterestingTimeoutValues()
    {
        $ret = [];
        array_push($ret, null);
        array_push($ret, -1);
        array_push($ret,  0);
        array_push($ret,  1);
        array_push($ret, -2147483648);
        array_push($ret, 2147483647);

        return $ret;
    }

    public static function diffInTotalSeconds(DateTime $date1, DateTime $date2)
    {
        $diff = $date1->diff($date2);
        $sec = $diff->s
                + 60 * ($diff->i
                + 60 * ($diff->h
                + 24 * ($diff->d
                + 30 * ($diff->m
                + 12 * ($diff->y)))));

        return abs($sec);
    }

    public static function passTemporalAccessCondition(AccessCondition $ac = null)
    {
        if (is_null($ac)) {
            return true;
        }

        $now = new \DateTime();

        if ($ac->getHeader() == Resources::IF_UNMODIFIED_SINCE) {
            return $ac->getValue() > $now;
        } elseif ($ac->getHeader() == Resources::IF_MODIFIED_SINCE) {
            return $ac->getValue() < $now;
        } else {
            return true;
        }
    }

    public static function passETagAccessCondition(AccessCondition $ac = null)
    {
        if (is_null($ac)) {
            return true;
        } elseif ($ac->getHeader() == Resources::IF_MATCH) {
            return self::$badETag != $ac->getValue();
        } elseif ($ac->getHeader() == Resources::IF_NONE_MATCH) {
            return self::$badETag == $ac->getValue();
        } else {
            return true;
        }
    }

    public static function fixETagAccessCondition(AccessCondition $ac = null, $etag)
    {
        if (!is_null($ac)) {
            if ($ac->getHeader() == Resources::IF_MATCH || $ac->getHeader() == Resources::IF_NONE_MATCH) {
                if (is_null($ac->getValue()) || self::$badETag != $ac->getValue()) {
                    $ac->setValue($etag);
                }
            }
        }
    }

    private static function getTemporalAccessConditions()
    {
        $ret = [];

        $past = new \DateTime('01/01/2010');
        $future = new \DateTime('01/01/2020');

        array_push($ret, AccessCondition::ifModifiedSince($past));
        array_push($ret, AccessCondition::ifNotModifiedSince($past));
        array_push($ret, AccessCondition::ifModifiedSince($future));
        array_push($ret, AccessCondition::ifNotModifiedSince($future));

        return $ret;
    }

    private static function getAllAccessConditions()
    {
        $ret = self::getTemporalAccessConditions();

        array_push($ret, AccessCondition::ifMatch(null));
        array_push($ret, AccessCondition::ifMatch(self::$badETag));
        array_push($ret, AccessCondition::ifNoneMatch(null));
        array_push($ret, AccessCondition::ifNoneMatch(self::$badETag));

        return $ret;
    }

    public static function getDefaultServiceProperties()
    {
        // This is the default that comes from the server.
        $rp = new RetentionPolicy();
        $l = new Logging();
        $l->setRetentionPolicy($rp);
        $l->setVersion('1.0');
        $l->setDelete(false);
        $l->setRead(false);
        $l->setWrite(false);

        $m = new Metrics();
        $m->setRetentionPolicy($rp);
        $m->setVersion('1.0');
        $m->setEnabled(false);
        $m->setIncludeAPIs(null);

        $sp = new ServiceProperties();
        $sp->setLogging($l);
        $sp->setMetrics($m);

        return $sp;
    }

    public static function getContainerName()
    {
        return self::$testContainerNames[0];
    }

    public static function getInterestingServiceProperties()
    {
        $ret = [];

        {
            // This is the default that comes from the server.
            array_push($ret, self::getDefaultServiceProperties());
        }

        {
            $rp = new RetentionPolicy();
            $rp->setEnabled(true);
            $rp->setDays(10);

            $l = new Logging();
            $l->setRetentionPolicy($rp);
            // Note: looks like only v1.0 is available now.
            // http://msdn.microsoft.com/en-us/library/windowsazure/hh360996.aspx
            $l->setVersion('1.0');
            $l->setDelete(true);
            $l->setRead(true);
            $l->setWrite(true);

            $m = new Metrics();
            $m->setRetentionPolicy($rp);
            $m->setVersion('1.0');
            $m->setEnabled(true);
            $m->setIncludeAPIs(true);

            $sp = new ServiceProperties();
            $sp->setLogging($l);
            $sp->setMetrics($m);

            array_push($ret, $sp);
        }

        {
            $rp = new RetentionPolicy();
            // The service does not accept setting days when enabled is false.
            $rp->setEnabled(false);
            $rp->setDays(null);

            $l = new Logging();
            $l->setRetentionPolicy($rp);
            // Note: looks like only v1.0 is available now.
            // http://msdn.microsoft.com/en-us/library/windowsazure/hh360996.aspx
            $l->setVersion('1.0');
            $l->setDelete(false);
            $l->setRead(false);
            $l->setWrite(false);

            $m = new Metrics();
            $m->setRetentionPolicy($rp);
            $m->setVersion('1.0');
            $m->setEnabled(true);
            $m->setIncludeAPIs(true);

            $sp = new ServiceProperties();
            $sp->setLogging($l);
            $sp->setMetrics($m);

            array_push($ret, $sp);
        }

        {
            $rp = new RetentionPolicy();
            $rp->setEnabled(true);
            // Days has to be 0 < days <= 365
            $rp->setDays(364);

            $l = new Logging();
            $l->setRetentionPolicy($rp);
            // Note: looks like only v1.0 is available now.
            // http://msdn.microsoft.com/en-us/library/windowsazure/hh360996.aspx
            $l->setVersion('1.0');
            $l->setDelete(false);
            $l->setRead(false);
            $l->setWrite(false);

            $m = new Metrics();
            $m->setVersion('1.0');
            $m->setEnabled(false);
            $m->setIncludeAPIs(null);
            $m->setRetentionPolicy($rp);

            $sp = new ServiceProperties();
            $sp->setLogging($l);
            $sp->setMetrics($m);

            array_push($ret, $sp);
        }

        return $ret;
    }

    public static function getInterestingListContainersOptions()
    {
        $ret = [];

        $options = new ListContainersOptions();
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $marker = '/'.self::$_accountName.'/'.self::$testContainerNames[1];
        $options->setMarker($marker);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $marker = '/'.self::$_accountName.'/'.self::$nonExistContainerPrefix;
        $options->setMarker($marker);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $maxResults = 2;
        $options->setMaxResults($maxResults);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $prefix = self::$testUniqueId;
        $options->setPrefix($prefix);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $prefix = self::$nonExistContainerPrefix;
        $options->setPrefix($prefix);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $prefix = self::$testContainerNames[1];
        $options->setPrefix($prefix);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $timeout = -1;
        $options->setTimeout($timeout);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $timeout = 60;
        $options->setTimeout($timeout);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $includeMetadata = true;
        $options->setIncludeMetadata($includeMetadata);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $marker = '/'.self::$_accountName.'/'.self::$testContainerNames[1];
        $maxResults = 2;
        $prefix = self::$testUniqueId;
        $timeout = 60;
        $includeMetadata = true;
        $options->setMarker($marker);
        $options->setMaxResults($maxResults);
        $options->setPrefix($prefix);
        $options->setTimeout($timeout);
        $options->setIncludeMetadata($includeMetadata);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingMetadata()
    {
        $ret = [];

        $metadata = [];
        array_push($ret, $metadata);

        array_push($ret, self::getNiceMetadata());

        // Some metadata that HTTP will not like.
        $metadata = ['<>000' => '::::value'];
        array_push($ret, $metadata);

        return $ret;
    }

    public static function getNiceMetadata()
    {
        return [
            'key' => 'value',
            'foo' => 'bar',
            'baz' => 'boo',];
    }

    public static function getInterestingCreateBlobOptions()
    {
        $ret = [];

        $options = new CreateBlobOptions();
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $metadata = [
            'foo' => 'bar',
            'foo2' => 'bar2',
            'foo3' => 'bar3',];
        $options->setMetadata($metadata);
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $metadata = ['foo' => 'bar'];
        $options->setMetadata($metadata);
        $options->setTimeout(-10);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingListBlobsOptions()
    {
        $ret = [];

        $options = new ListBlobsOptions();
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setMaxResults(2);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setPrefix(self::$nonExistBlobPrefix);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setPrefix(self::$testUniqueId);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        // Cannot set Marker to arbitrary values. Must only use if the previous request returns a NextMarker.
        //            $options->setMarker('abc');
        // So, add logic in listBlobsWorker to loop and setMarker if there is a NextMarker.
        $options->setMaxResults(2);
        $options->setPrefix(self::$testUniqueId);
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setMaxResults(3);
        $options->setPrefix(self::$testUniqueId);
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new ListBlobsOptions();
        $options->setMaxResults(4);
        $options->setPrefix(self::$testUniqueId);
        $options->setTimeout(10);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingCreateContainerOptions()
    {
        $ret = [];

        $options = new CreateContainerOptions();
        array_push($ret, $options);

        $options = new CreateContainerOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateContainerOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new CreateContainerOptions();
        $options->setPublicAccess('container');
        array_push($ret, $options);

        $options = new CreateContainerOptions();
        $options->setPublicAccess('blob');
        array_push($ret, $options);

        $options = new CreateContainerOptions();
        $metadata = [
            'foo' => 'bar',
            'boo' => 'baz',
        ];
        $options->setMetadata($metadata);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingDeleteContainerOptions()
    {
        $ret = [];

        $past = new \DateTime('01/01/2010');
        $future = new \DateTime('01/01/2020');

        $options = new DeleteContainerOptions();
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setAccessCondition(AccessCondition::ifModifiedSince($past));
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setAccessCondition(AccessCondition::ifNotModifiedSince($past));
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setAccessCondition(AccessCondition::ifModifiedSince($future));
        array_push($ret, $options);

        $options = new DeleteContainerOptions();
        $options->setAccessCondition(AccessCondition::ifNotModifiedSince($future));
        array_push($ret, $options);

        return $ret;
    }

    public static function getSetContainerMetadataOptions()
    {
        $ret = [];

        $options = new SetContainerMetadataOptions();
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        // Set Container Metadata only supports the If-Modified-Since access condition.
        // But easier to special-case If-Unmodified-Since in the test.
        foreach (self::getTemporalAccessConditions() as $ac) {
            $options = new SetContainerMetadataOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        return $ret;
    }

    public static function getSetBlobMetadataOptions()
    {
        $ret = [];

        $options = new SetBlobMetadataOptions();
        array_push($ret, $options);

        $options = new SetBlobMetadataOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new SetBlobMetadataOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        foreach (self::getAllAccessConditions() as $ac) {
            $options = new SetBlobMetadataOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        // TODO: Make sure the lease id part is tested in the leasing part.
        //        $options = new SetBlobMetadataOptions();
        //        $options->setLeaseId(leaseId)
        //        array_push($ret, $options);

        return $ret;
    }

    public static function getGetBlobPropertiesOptions()
    {
        $ret = [];

        $options = new GetBlobPropertiesOptions();
        array_push($ret, $options);

        $options = new GetBlobPropertiesOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new GetBlobPropertiesOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        // Get Blob Properties only supports the temporal access conditions.
        foreach (self::getTemporalAccessConditions() as $ac) {
            $options = new GetBlobPropertiesOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        return $ret;
    }

    public static function getSetBlobPropertiesOptions()
    {
        $ret = [];

        $options = new SetBlobPropertiesOptions();
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        // Get Blob Properties only supports the temporal access conditions.
        foreach (self::getTemporalAccessConditions() as $ac) {
            $options = new SetBlobPropertiesOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        $options = new SetBlobPropertiesOptions();
        $options->setBlobCacheControl('setBlobCacheControl');
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentEncoding('setBlobContentEncoding');
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentLanguage('setBlobContentLanguage');
        array_push($ret, $options);

        // Note: This is not allowed on block blobs
        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentLength(2048);
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentMD5('d41d8cd98f00b204e9800998ecf8427e');
        array_push($ret, $options);

        $options = new SetBlobPropertiesOptions();
        $options->setBlobContentType('setContentType');
        array_push($ret, $options);

        // TODO: Handle Lease ID
        //        $options = new SetBlobPropertiesOptions();
        //        $options->setLeaseId('setLeaseId');
        //        array_push($ret, $options);

        // Note: This is not allowed on block blobs
        $options = new SetBlobPropertiesOptions();
        $options->setSequenceNumber(0);
        $options->setSequenceNumberAction('update');
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingACL()
    {
        $ret = [];

        $past = new \DateTime('01/01/2010');
        $future = new \DateTime('01/01/2020');

        $acl = new ContainerAcl();
        array_push($ret, $acl);

        $acl = new ContainerAcl();
        $acl->setPublicAccess(PublicAccessType::NONE);
        array_push($ret, $acl);

        $acl = new ContainerAcl();
        $acl->setPublicAccess(PublicAccessType::BLOBS_ONLY);
        array_push($ret, $acl);

        $acl = new ContainerAcl();
        $acl->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
        array_push($ret, $acl);

        $acl = new ContainerAcl();
        $acl->addSignedIdentifier('123', $past, $future, 'rw');
        array_push($ret, $acl);

        return $ret;
    }

    public static function getGetBlobOptions()
    {
        $ret = [];

        $options = new GetBlobOptions();
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        // Get Blob only supports the temporal access conditions.
        foreach (self::getTemporalAccessConditions() as $ac) {
            $options = new GetBlobOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        $options = new GetBlobOptions();
        $options->setRangeStart(50);
        $options->setRangeEnd(200);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setRangeStart(50);
        $options->setRangeEnd(200);
        $options->setComputeRangeMD5(true);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setRangeStart(50);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setComputeRangeMD5(true);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setRangeEnd(200);
        $options->setComputeRangeMD5(true);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setRangeEnd(200);
        array_push($ret, $options);

        $options = new GetBlobOptions();
        $options->setSnapshot('placeholder');
        array_push($ret, $options);

        // TODO: Handle Lease ID
        //        $options = new GetBlobOptions();
        //        $options->setLeaseId('setLeaseId');
        //        array_push($ret, $options);

        return $ret;
    }

    public static function getDeleteBlobOptions()
    {
        $ret = [];

        $options = new DeleteBlobOptions();
        array_push($ret, $options);

        $options = new DeleteBlobOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new DeleteBlobOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        foreach (self::getAllAccessConditions() as $ac) {
            $options = new DeleteBlobOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        $options = new DeleteBlobOptions();
        $options->setDeleteSnaphotsOnly(true);
        array_push($ret, $options);

        $options = new DeleteBlobOptions();
        $options->setDeleteSnaphotsOnly(false);
        array_push($ret, $options);

        $options = new DeleteBlobOptions();
        $options->setSnapshot('placeholder');
        array_push($ret, $options);

        // TODO: Handle Lease ID
        //        $options = new DeleteBlobOptions();
        //        $options->setLeaseId('setLeaseId');
        //        array_push($ret, $options);

        return $ret;
    }

    public static function getCreateBlobSnapshotOptions()
    {
        $ret = [];

        $options = new CreateBlobSnapshotOptions();
        array_push($ret, $options);

        $options = new CreateBlobSnapshotOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateBlobSnapshotOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        foreach (self::getAllAccessConditions() as $ac) {
            $options = new CreateBlobSnapshotOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        $options = new CreateBlobSnapshotOptions();
        $options->setMetadata(self::getNiceMetadata());
        array_push($ret, $options);

        // TODO: Handle Lease ID
        //        $options = new CreateBlobSnapshotOptions();
        //        $options->setLeaseId('setLeaseId');
        //        array_push($ret, $options);

        return $ret;
    }

    public static function getCopyBlobOptions()
    {
        $ret = [];

        $options = new CopyBlobOptions();
        array_push($ret, $options);

        $options = new CopyBlobOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CopyBlobOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        foreach (self::getAllAccessConditions() as $ac) {
            $options = new CopyBlobOptions();
            $options->setSourceAccessCondition($ac);
            array_push($ret, $options);
        }

        foreach (self::getAllAccessConditions() as $ac) {
            $options = new CopyBlobOptions();
            $options->setAccessCondition($ac);
            array_push($ret, $options);
        }

        $options = new CopyBlobOptions();
        $metadata = [
            'Xkey' => 'Avalue',
            'Yfoo' => 'Bbar',
            'Zbaz' => 'Cboo',];
        $options->setMetadata($metadata);
        array_push($ret, $options);

        $options = new CopyBlobOptions();
        $options->setSourceSnapshot('placeholder');
        array_push($ret, $options);

        // TODO: Handle Lease ID
        //        $options = new CopyBlobOptions();
        //        $options->setLeaseId('setLeaseId');
        //        array_push($ret, $options);
        //
        //        $options = new CopyBlobOptions();
        //        $options->setSourceLeaseId('setSourceLeaseId');
        //        array_push($ret, $options);

        return $ret;
    }
}
