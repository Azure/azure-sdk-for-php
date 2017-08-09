<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\HdInsight\HDInsightManagementClient;

class HDInsightTest extends TestInfo
{
    function test()
    {
        $client = new HDInsightManagementClient($this->runTime, $this->subscriptionId);
    }
}