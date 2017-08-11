<?php
namespace Microsoft\Rest;

use Closure;
use GuzzleHttp\Client;
use Microsoft\Rest\Azure\AzureStatic;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Operation;
use Microsoft\Rest\Internal\Parameter;
use Microsoft\Rest\Internal\Types\ArrayType;
use Microsoft\Rest\Internal\Types\ClassType;
use Microsoft\Rest\Internal\Types\MapType;
use Microsoft\Rest\Internal\Types\Primitives\Base64Type;
use Microsoft\Rest\Internal\Types\Primitives\BinaryType;
use Microsoft\Rest\Internal\Types\Primitives\BooleanType;
use Microsoft\Rest\Internal\Types\Primitives\DateTimeType;
use Microsoft\Rest\Internal\Types\Primitives\DateType;
use Microsoft\Rest\Internal\Types\Primitives\DoubleType;
use Microsoft\Rest\Internal\Types\Primitives\FloatType;
use Microsoft\Rest\Internal\Types\Primitives\Int32Type;
use Microsoft\Rest\Internal\Types\Primitives\Int64Type;
use Microsoft\Rest\Internal\Types\Primitives\StringType;
use Microsoft\Rest\Internal\Types\Primitives\PasswordType;
use Microsoft\Rest\Internal\UnknownTypeException;
use PHPUnit\Framework\TestCase;

class ClientStaticTest extends TestCase
{
    static function getPrivate($object, $name)
    {
        $get = function ($object, $name) {
            return $object->$name;
        };
        $closure = Closure::bind($get, null, $object);
        return $closure($object, $name);
    }

    function testCreateFromData()
    {
        $swaggerObjectData = [
            'host' => 'example.com',
            'definitions' => [],
            'paths' => []
        ];
        $client = AzureStatic::create(null, null, null)
            ->createClientFromData($swaggerObjectData, []);
        $this->assertNotNull($client);

        // private fields:

        /**
         * @var Operation[]
         */
        $operationMap = self::getPrivate($client, "operationMap");
        $this->assertEquals($operationMap, []);
    }

    function testCreateFromDataThrowInvalidSchemaObjectException()
    {
        $swaggerObjectData = [
            'host' => 'example.com',
            'definitions' => [
                'Sku' => []
            ]
        ];
        try {
            AzureStatic::create(null, null, null)
                ->createClientFromData($swaggerObjectData, []);
        } catch (InvalidSchemaObjectException $e) {
            $expected = "invalid schema object\n"
                . "URI: #/definitions/Sku";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }

    function testCreateFromDataThrowUnknownTypeException()
    {
        $definitionsData = [
            'host' => 'example.com',
            'definitions' => [
                'Sku' => [
                    'type' => 'unknown-type'
                ]
            ]
        ];
        try {
            AzureStatic::create(null, null, null)
                ->createClientFromData($definitionsData, []);
        } catch (InvalidSchemaObjectException $e) {
            $expected = "invalid schema object\n"
                . "URI: #/definitions/Sku";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }

    function testPathParse()
    {
        $definitionsData = [
            'host' => 'example.com',
            'definitions' => [],
            'paths' => [
                'a{b}' => [
                    'get' => [
                        'operationId' => 'a',
                        'parameters' => [
                            [
                                'name' => 'b',
                                'in' => 'path',
                                'required' => TRUE,
                                'type' => 'string'
                            ]
                        ],
                        'responses' => []
                    ]
                ]
            ]
        ];
        AzureStatic::create(null, null, null)
            ->createClientFromData($definitionsData, []);
    }

    function testCreateFromData2()
    {
        $definitionsData = [
            "Sku" => [
                'required' => ['int32'],
                "properties" => [
                    "name" => [
                        "type" => "string"
                    ],
                    "int32" => [
                        "type" => "integer",
                        "format" => "int32"
                    ],
                    "int64" => [
                        "type" => "integer",
                        "format" => "int64"
                    ],
                    "float" => [
                        "type" => "number",
                        "format" => "float"
                    ],
                    "double" => [
                        "type" => "number",
                        "format" => "double"
                    ],
                    "base64" => [
                        "type" => "string",
                        "format" => "byte"
                    ],
                    "binary" => [
                        "type" => "string",
                        "format" => "binary"
                    ],
                    "boolean" => [
                        "type" => "boolean"
                    ],
                    "date" => [
                        "type" => "string",
                        "format" => "date"
                    ],
                    "dateTime" => [
                        "type" => "string",
                        "format" => "date-time"
                    ],
                    "password" => [
                        "type" => "string",
                        "format" => "password"
                    ],
                    "array" => [
                        "type" => "array",
                        "items" => [
                            "type" => "string"
                        ]
                    ],
                    "ref" => [
                        '$ref' => "#/definitions/RedisProperties"
                    ],
                    "map" => [
                        'type' => 'object',
                        'additionalProperties' => [ 'type' => 'integer', 'format' => 'int32' ]
                    ]
                ]
            ],
            'RedisProperties' => [
                'required' => ['redisConfiguration'],
                'properties' => [
                    'redisConfiguration' => [
                        'properties' => []
                    ]
                ]
            ]
        ];
        $client = AzureStatic::create(null, null, null)
            ->createClientFromData(
                [
                    'host' => 'localhost',
                    'definitions' => $definitionsData,
                    'paths' => [
                        'a' => [
                            'get' => [
                                'operationId' => 'someoperation',
                                'parameters' => [
                                    [
                                        'name' => 'a',
                                        'in' => 'query',
                                        'required' => TRUE,
                                        'schema' => [ '$ref' => '#/definitions/Sku' ]
                                    ]
                                ],
                                'responses' => []
                            ]
                        ]
                    ]
                ],
                []);
        $this->assertNotNull($client);

        // private fields:

        /**
         * @var Operation[]
         */
        $operationMap = self::getPrivate($client, 'operationMap');
        $operation = $operationMap['someoperation'];
        $parameters = self::getPrivate($operation, 'parameters');
        /**
         * @var Parameter[]
         */
        $queryParameters = self::getPrivate($parameters, 'query');
        $parameter = $queryParameters[0];
        $type = self::getPrivate($parameter, 'type');

        $redisProperties = new ClassType(['redisConfiguration' => new ClassType([], [])], []);
        $this->assertEquals(
            $type,
            new ClassType(
                ["int32" => new Int32Type()],
                [
                    "name" => new StringType(),
                    "int64" => new Int64Type(),
                    "float" => new FloatType(),
                    "double" => new DoubleType(),
                    "base64" => new Base64Type(),
                    "binary" => new BinaryType(),
                    "boolean" => new BooleanType(),
                    "date" => new DateType(),
                    "dateTime" => new DateTimeType(),
                    "password" => new PasswordType(),
                    "array" => new ArrayType(new StringType()),
                    "ref" => $redisProperties,
                    "map" => new MapType(new Int32Type())
                ]));
    }

    function testCreateFromDataThrowsUnknownNameException()
    {
        $swaggerObjectData = [
            'host' => 'localhost',
            'definitions' => [
                'Sku' => [
                    '$ref' => 'unknown-type'
                ]
            ]
        ];
        try {
            AzureStatic::create(null, null, null)
                ->createClientFromData($swaggerObjectData, []);
        } catch (UnknownTypeException $e) {
            $expected = "unknown type: unknown-type\n"
                . "URI: #/definitions/Sku";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }

    function testCredentials()
    {
        $json = json_decode(file_get_contents('C:/Users/sergey/Desktop/php-test.json'));
        $clientId = $json->applicationId;
        $clientSecret = $json->clientSecret;
        $client = new Client();
        $url = 'https://login.microsoftonline.com/common/oauth2/token';
        $response = $client->post(
            $url,
            [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret,
                    'resource' => 'https://management.core.windows.net/'
                ]
            ]);
        $body = json_decode($response->getBody()->getContents());
    }
}