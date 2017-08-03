<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Azure\AzureStatic;
use Microsoft\Rest\Internal\ExpectedPropertyException;
use Microsoft\Rest\Internal\Operation;
use Microsoft\Rest\Internal\Parameter;
use Microsoft\Rest\Internal\Parameters;
use Microsoft\Rest\Internal\Path\ConstPathPart;
use Microsoft\Rest\Internal\Path\ParameterPathPart;
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
                    'required' => TRUE,
                    'type' => 'string'
                ],
                [
                    'name' => 'b',
                    'in' => 'path',
                    'required' => TRUE,
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
        $client = AzureStatic::create(null, null, null)
            ->createClientFromData(
                [
                    'host' => 'example.com',
                    'paths' => [
                        'somepath/{b}' => [
                            'get' => $operationData
                        ]
                    ],
                    'definitions' => [
                        'A' => [
                            'type' => 'string'
                        ]
                    ]
                ],
                []);
        /**
         * @var Operation
         */
        $operation = $client->createOperation('someOperation');

        // private
        $operationId = ClientStaticTest::getPrivate($operation, 'operationId');
        $this->assertEquals('someOperation', $operationId);
        /**
         * @var Parameters
         */
        $parameters = ClientStaticTest::getPrivate($operation, 'parameters');
        $queryParameters = ClientStaticTest::getPrivate($parameters, 'query');
        $this->assertEquals(
            [
                new Parameter('a', 'query', TRUE, FALSE, new StringType())
            ],
            $queryParameters);
        $path = ClientStaticTest::getPrivate($parameters, 'path');
        $this->assertEquals(
            [
                new ConstPathPart('somepath/'),
                new ParameterPathPart(
                    new Parameter('b', 'path', TRUE, FALSE, new StringType()))
            ],
            $path);
        $responses = ClientStaticTest::getPrivate($operation, 'responses');
        $this->assertEquals([200 => new StringType()], $responses);
    }

    function testCreateOperationFromDataThrowsException()
    {
        /**
         * @var Operation
         */
        try {
            $client = AzureStatic::create(null, null, null)
                ->createClientFromData(
                    [
                        'host' => 'example.com',
                        'definitions' => [],
                        'paths' => [
                            'somepath' => [
                                'get' => []
                            ]
                        ]
                    ],
                    []);
        } catch (ExpectedPropertyException $e) {
            $this->assertEquals(
                'expected property: operationId'
                    . "\nObject: []"
                    . "\nPath: ['paths']['somepath']['get']",
                $e->getMessage());
            return;
        }

        $this->fail();
    }
}