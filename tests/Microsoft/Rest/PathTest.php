<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\RunTime;
use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
    function testPath()
    {
        $schema = [
            'host' => 'somehost',
            'definitions' => [],
            'paths' => [
                '/a/{b}/c/{d}/e' => [
                    'get' => [
                        'operationId' => 'abcde',
                        'parameters' => [
                            [
                                'name' => 'b',
                                'in' => 'path',
                                'type' => 'string',
                                'enum' => ['YYY']
                            ],
                            [
                                'name' => 'd',
                                'in' => 'path',
                                'type' => 'string'
                            ]
                        ],
                        'responses' => []
                    ]
                ]
            ]
        ];
        $httpMock = new HttpMock();
        $runTime = new RunTime($httpMock);
        $client = $runTime->createClientFromData($schema);
        $operation = $client->createOperation('abcde');
        $operation->call(['d' => 'DDD']);
        $this->assertEquals($httpMock->url, 'https://somehost/a/YYY/c/DDD/e');
        print_r($httpMock);
    }
}