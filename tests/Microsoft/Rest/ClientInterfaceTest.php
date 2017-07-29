<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\ExpectedPropertyException;
use Microsoft\Rest\Internal\Operation;
use phpDocumentor\Reflection\Types\String_;
use PHPUnit\Framework\TestCase;

class ClientInterfaceTest extends TestCase
{
    function testCreateOperationFromData()
    {
        $operationData = [
            'operationId' => 'someOperation',
            'parameters' => [],
            'responses' => [
                '200' => [
                    'schema' => [
                        '$ref' => '#/definitions/A'
                    ]
                ]
            ]
        ];
        $client = ClientStatic::createFromData([
            'A' => [
                'type' => 'string'
            ]
        ]);
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
        $responses = ClientStaticTest::getPrivate($operation, 'responses');
        $this->assertEquals([200 => new String_()], $responses);
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