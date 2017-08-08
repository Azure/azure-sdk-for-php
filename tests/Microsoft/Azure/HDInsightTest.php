<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\HDInsightManagementClient;

class HDInsightTest extends TestInfo
{
    function test()
    {
        $client = new HDInsightManagementClient($this->runTime, $this->subscriptionId);
    }
}