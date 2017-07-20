<?php
namespace Microsoft\Rest;

use Closure;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Types\ArrayType;
use Microsoft\Rest\Internal\Types\Base64Type;
use Microsoft\Rest\Internal\Types\BinaryType;
use Microsoft\Rest\Internal\Types\BooleanType;
use Microsoft\Rest\Internal\Types\DateTimeType;
use Microsoft\Rest\Internal\Types\DateType;
use Microsoft\Rest\Internal\Types\DoubleType;
use Microsoft\Rest\Internal\Types\FloatType;
use Microsoft\Rest\Internal\Types\Int32Type;
use Microsoft\Rest\Internal\Types\Int64Type;
use Microsoft\Rest\Internal\Types\MapType;
use Microsoft\Rest\Internal\Types\PasswordType;
use Microsoft\Rest\Internal\Types\RefType;
use Microsoft\Rest\Internal\Types\StringType;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;
use Microsoft\Rest\Internal\UnknownTypeNameException;
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
        $client = ClientStatic::createFromData($definitionsData);
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
            ClientStatic::createFromData($definitionsData);
        } catch (InvalidSchemaObjectException $e) {
            $expected = "invalid schema object\n"
                . "Object: []\n"
                . "Path: \$definitionsData[\"Sku\"]";
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
            ClientStatic::createFromData($definitionsData);
        } catch (UnknownTypeException $e) {
            $expected = "unknown type\n"
                . "Object: {\"type\":\"unknown-type\"}\n"
                . "Path: \$definitionsData[\"Sku\"]";
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
        $client = ClientStatic::createFromData($definitionsData);
        $this->assertNotNull($client);

        // private fields:

        /**
         * @var TypeAbstract[]
         */
        $typeMap = self::getPrivate($client, "typeMap");
        $redisProperties = new MapType(["redisConfiguration" => new MapType([])]);
        $this->assertEquals(
            $typeMap,
            [
                "#/definitions/Sku" => new MapType([
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
                    "ref" => $redisProperties
                ]),
                "#/definitions/RedisProperties" => $redisProperties,
            ]);
    }

    function testCreateFromDataThrowsUnknownTypeNameException()
    {
        $definitionsData = [
            "Sku" => [
                '$ref' => "unknown-type"
            ]
        ];
        try {
            ClientStatic::createFromData($definitionsData);
        } catch (UnknownTypeNameException $e) {
            $expected = "unknown type name: unknown-type";
            $this->assertEquals($expected, $e->getMessage());
            return;
        }
        $this->fail();
    }
}