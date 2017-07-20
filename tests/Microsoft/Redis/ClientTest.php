<?php
namespace Microsoft\Redis;

use Microsoft\Redis\_2017_02_01\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    function testConstructor()
    {
        $client = new Client();
    }
}