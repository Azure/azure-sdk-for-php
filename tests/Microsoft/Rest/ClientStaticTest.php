<?php
namespace Microsoft\Rest;

use Closure;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Types\MapType;
use Microsoft\Rest\Internal\Types\StringType;
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
                . "Path: [\"Sku\"]";
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
            $expected = "unknown type unknown-type\n"
                . "Object: {\"type\":\"unknown-type\"}\n"
                . "Path: [\"Sku\"]";
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
        $this->assertEquals(
            $typeMap,
            [
                "Sku" => new MapType(["name" => new StringType()]),
                "RedisProperties" => new MapType(["redisConfiguration" => new MapType([])]),
            ]);
    }
}