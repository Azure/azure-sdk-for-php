<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Automation\AutomationClient;

class AutomationTest extends TestInfo
{
    function test()
    {
        $client = new AutomationClient($this->runTime, $this->subscriptionId);
    }
}