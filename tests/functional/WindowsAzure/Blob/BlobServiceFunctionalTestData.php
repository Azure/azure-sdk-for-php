<?php

/**
 * Functional tests for the SDK
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
 * @category   Microsoft
 * @package    Tests\Functional\WindowsAzure\Blob
 * @author     Jason Cooke <jcooke@microsoft.com>
 * @copyright  2012 Microsoft Corporation
 * @license    http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link       http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Functional\WindowsAzure\Blob;

use WindowsAzure\Common\Models\Logging;
use WindowsAzure\Common\Models\Metrics;
use WindowsAzure\Common\Models\RetentionPolicy;
use WindowsAzure\Common\Models\ServiceProperties;
use WindowsAzure\Blob\Models\BlobServiceOptions;
use WindowsAzure\Blob\Models\GetServicePropertiesResult;
use WindowsAzure\Blob\Models\ListBlobsOptions;
use WindowsAzure\Blob\Models\ListBlobsResult;
use WindowsAzure\Blob\Models\ListContainersOptions;
use WindowsAzure\Blob\Models\ListContainersResult;
use WindowsAzure\Blob\Models\CreateContainerOptions;
use WindowsAzure\Blob\Models\DeleteContainerOptions;
use WindowsAzure\Blob\Models\AccessCondition;
use WindowsAzure\Blob\Models\SetContainerMetadataOptions;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Blob\Models\ContainerAcl;
use WindowsAzure\Blob\Models\PublicAccessType;

class BlobServiceFunctionalTestData
{
    public static $INTERESTING_TTL = 4;
    public static $testUniqueId;
    public static $tempBlobCounter = 1;
    public static $nonExistContainerPrefix;
    public static $nonExistBlobPrefix;
    public static $TEST_CONTAINER_NAMES;
    public static $TEST_BLOB_NAMES;
    private static $_accountName;

    public static function setupData($accountName)
    {
        $rint = mt_rand(0, 1000000);
        self::$_accountName = $accountName;
        self::$testUniqueId = 'qa-' . $rint . '-';
        self::$nonExistContainerPrefix = 'qa-' . ($rint . 1) . '-';
        self::$nonExistBlobPrefix = 'qa-' . ($rint . 2) . '-';
        self::$TEST_CONTAINER_NAMES = array( self::$testUniqueId . 'a1', self::$testUniqueId . 'a2', self::$testUniqueId . 'b1' );
        self::$TEST_BLOB_NAMES = array( 'b' . self::$testUniqueId . 'a1', 'b' . self::$testUniqueId . 'a2', 'b' . self::$testUniqueId . 'b1' );
    }

    public static function getInterestingContainerName()
    {
        return self::$testUniqueId . 'con-' . (self::$tempBlobCounter++);
    }

    public static function getInterestingBlobName()
    {
        return self::$testUniqueId . 'int-' . (self::$tempBlobCounter++);
    }

    public static function getSimpleMessageText()
    {
        return 'foo bar' . (self::$tempBlobCounter++);
    }

    public static function diffInTotalSeconds($date1, $date2)
    {
        $diff = $date1->diff($date2);
        $sec = $diff->s
                + 60 * ( $diff->i
                + 60 * ( $diff->h
                + 24 * ( $diff->d
                + 30 * ( $diff->m
                + 12 * ( $diff->y )))));
        return abs($sec);
    }


    public static function passTemporalAccessCondition($ac)
    {
        if ($ac == null) {
            return true;
        }

        $now = new \DateTime();

        if ($ac->getHeader() == Resources::IF_UNMODIFIED_SINCE) {
            return $ac->getValue() > $now;
        } else if ($ac->getHeader() == Resources::IF_MODIFIED_SINCE) {
            return $ac->getValue() < $now;
        } else {
            return true;
        }
    }

    public static function getInterestingTimeoutValues()
    {
        $ret = array();
        array_push($ret, null);
        array_push($ret, -1);
        array_push($ret,  0);
        array_push($ret,  1);
        array_push($ret,-2147483648);
        array_push($ret, 2147483647);
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
        $l->setRead(true);
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
        return self::$TEST_CONTAINER_NAMES[0];
    }

    public static function getInterestingServiceProperties()
    {
        $ret = array();

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

            array_push($ret,$sp);
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

            array_push($ret,$sp);
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

            array_push($ret,$sp);
        }

        return $ret;
    }

    public static function getInterestingListContainersOptions()
    {
        $ret = array();


        $options = new ListContainersOptions();
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $marker = '/' . self::$_accountName . '/' . self::$TEST_CONTAINER_NAMES[1];
        $options->setMarker($marker);
        array_push($ret, $options);

        $options = new ListContainersOptions();
        $marker = '/' . self::$_accountName . '/' . self::$nonExistContainerPrefix;
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
        $prefix = self::$TEST_CONTAINER_NAMES[1];
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
        $marker = '/' . self::$_accountName . '/' . self::$TEST_CONTAINER_NAMES[1];
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
        $ret = self::getNiceMetadata();

        // Some metadata that HTTP will not like.
        $metadata = array('<>000' => '::::value');
        array_push($ret, $metadata);

        return $ret;
    }

    public static function getNiceMetadata()
    {
        $ret = array();

        $metadata = array();
        array_push($ret, $metadata);

        $metadata = array(
            'key' => 'value',
            'foo' => 'bar',
            'baz' => 'boo');
        array_push($ret, $metadata);

        return $ret;
    }

    public static function getInterestingCreateBlobOptions()
    {
        $ret = array();

        $options = new CreateBlobOptions();
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $metadata = array(
            'foo' => 'bar',
            'foo2' => 'bar2',
            'foo3' => 'bar3');
        $options->setMetadata($metadata);
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new CreateBlobOptions();
        $metadata = array('foo' => 'bar');
        $options->setMetadata($metadata);
        $options->setTimeout(-10);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingListBlobsOptions()
    {
        $ret = array();

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
        $ret = array();

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
        $metadata = array(
            'foo' => 'bar',
            'boo' => 'baz',
        );
        $options->setMetadata($metadata);
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingDeleteContainerOptions()
    {
        $ret = array();

             $past = new \DateTime("01/01/2010");
        $future = new \DateTime("01/01/2020");

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
        $ret = array();

          $past = new \DateTime("01/01/2010");
        $future = new \DateTime("01/01/2020");

        $options = new SetContainerMetadataOptions();
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setTimeout(10);
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setTimeout(-10);
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setAccessCondition(AccessCondition::ifModifiedSince($past));
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setAccessCondition(AccessCondition::ifNotModifiedSince($past));
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setAccessCondition(AccessCondition::ifModifiedSince($future));
        array_push($ret, $options);

        $options = new SetContainerMetadataOptions();
        $options->setAccessCondition(AccessCondition::ifNotModifiedSince($future));
        array_push($ret, $options);

        return $ret;
    }

    public static function getInterestingACL()
    {
        $ret = array();

        $past = new \DateTime("01/01/2010");
        $future = new \DateTime("01/01/2020");

        $acl = new ContainerACL();
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setEtag('bogus etag');
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setLastModified($past);
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setLastModified($future);
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setPublicAccess(PublicAccessType::NONE);
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setPublicAccess(PublicAccessType::BLOBS_ONLY);
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);
        array_push($ret, $acl);

        $acl = new ContainerACL();
        $acl->addSignedIdentifier('123', $past, $future, 'rw');
        array_push($ret, $acl);

        return $ret;
    }
}
?>
