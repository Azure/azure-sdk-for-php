<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Automation\_2015_10_31\AutomationClient;

class AutomationTest extends TestInfo
{
    function test()
    {
        $client = new AutomationClient($this->runTime, $this->subscriptionId);
    }
}