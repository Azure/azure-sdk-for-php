<?php
namespace Microsoft\Rest;

use Closure;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
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
use Microsoft\Rest\Internal\Types\TypeAbstract;
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
        $definitionsData = [];
        $client = RunTimeStatic::create()->createClientFromData($definitionsData);
        $this->assertNotNull($client);

        // private fields:

        /**
         * @var TypeAbstract[]
         */
        $typeMap = self::getPrivate($client, "typeMap");
        $this->assertEquals($typeMap, []);
    }

    function testCreateFromDataThrowInvalidSchemaObjectException()
    {
        $definitionsData = [
            "Sku" => []
        ];
        try {
            RunTimeStatic::create()->createClientFromData($definitionsData);
        } catch (InvalidSchemaObjectException $e) {
            $expected = "invalid schema object\n"
                . "Object: []\n"
                . "Path: \$definitions['Sku']";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }

    function testCreateFromDataThrowUnknownTypeException()
    {
        $definitionsData = [
            "Sku" => [
                "type" => "unknown-type"
            ]
        ];
        try {
            RunTimeStatic::create()->createClientFromData($definitionsData);
        } catch (UnknownTypeException $e) {
            $expected = "unknown type\n"
                . "Object: ['type'=>'unknown-type']\n"
                . "Path: \$definitions['Sku']";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }

    function testCreateFromData2()
    {
        $definitionsData = [
            "Sku" => [
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
            "RedisProperties" => [
                "properties" => [
                    "redisConfiguration" => [
                        "properties" => []
                    ]
                ]
            ]
        ];
        $client = RunTimeStatic::create()->createClientFromData($definitionsData);
        $this->assertNotNull($client);

        // private fields:

        /**
         * @var TypeAbstract[]
         */
        $typeMap = self::getPrivate($client, "typeMap");
        $redisProperties = new ClassType(["redisConfiguration" => new ClassType([])]);
        $this->assertEquals(
            $typeMap,
            [
                "#/definitions/Sku" => new ClassType([
                    "name" => new StringType(),
                    "int32" => new Int32Type(),
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
                ]),
                "#/definitions/RedisProperties" => $redisProperties,
            ]);
    }

    function testCreateFromDataThrowsUnknownNameException()
    {
        $definitionsData = [
            "Sku" => [
                '$ref' => "unknown-type"
            ]
        ];
        try {
            RunTimeStatic::create()->createClientFromData($definitionsData);
        } catch (UnknownTypeException $e) {
            $expected = "unknown type\n"
                . "Object: ['\$ref'=>'unknown-type']\n"
                . "Path: \$definitions['Sku']";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }
}