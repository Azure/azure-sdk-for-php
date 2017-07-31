<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\ExpectedPropertyException;
use Microsoft\Rest\Internal\Operation;
use Microsoft\Rest\Internal\Parameter;
use Microsoft\Rest\Internal\Types\Primitives\StringType;
use PHPUnit\Framework\TestCase;

class ClientInterfaceTest extends TestCase
{
    function testCreateOperationFromData()
    {
        $operationData = [
            'operationId' => 'someOperation',
            'parameters' => [
                [
                    'name' => 'a',
                    'in' => 'query',
                    'type' => 'string'
                ],
                [
                    'name' => 'b',
                    'in' => 'path',
                    '$ref' => '#/definitions/A'
                ]
            ],
            'responses' => [
                '200' => [
                    'schema' => [
                        '$ref' => '#/definitions/A'
                    ]
                ]
            ]
        ];
        $client = RunTimeStatic::create()->createClientFromData([
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
        $this->assertEquals(
            [
                new Parameter('a', 'query', new StringType()),
                new Parameter('b', 'path', new StringType())
            ],
            $parameters);
        $responses = ClientStaticTest::getPrivate($operation, 'responses');
        $this->assertEquals([200 => new StringType()], $responses);
    }

    function testCreateOperationFromDataThrowsException()
    {
        $client = RunTimeStatic::create()->createClientFromData([]);
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