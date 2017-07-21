<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\ExpectedPropertyException;
use Microsoft\Rest\Internal\Operation;
use PHPUnit\Framework\TestCase;

class ClientInterfaceTest extends TestCase
{
    function testCreateOperationFromData()
    {
        $operationData = [
            'operationId' => 'someOperation',
            'parameters' => []
        ];
        $client = ClientStatic::createFromData([]);
        /**
         * @var Operation
         */
        $operation = $client->createOperationFromData(
            'somepath', 'get', $operationData);

        // private
        $operationId = ClientStaticTest::getPrivate($operation, 'operationId');
        $this->assertEquals('someOperation', $operationId);
        $parameters = ClientStaticTest::getPrivate($operation, 'parameters');
        $this->assertEquals([], $parameters);
    }

    function testCreateOperationFromDataThrowsException()
    {
        $client = ClientStatic::createFromData([]);
        /**
         * @var Operation
         */
        try {
            $operation = $client->createOperationFromData('somepath', 'get', []);
        } catch (ExpectedPropertyException $e) {
            $this->assertEquals(
                'expected property: operationId'
                    . "\nObject: []"
                    . "\nPath: \$paths['somepath']['get']",
                $e->getMessage());
            return;
        }

        $this->fail();
    }
}