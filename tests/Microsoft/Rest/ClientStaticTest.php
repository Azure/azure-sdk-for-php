<?php
namespace Microsoft\Rest;

use Closure;
use Microsoft\Rest\Internal\Types\MapType;
use Microsoft\Rest\Internal\Types\TypeAbstract;
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

    function testCreateFromData2()
    {
        $definitionsData = [
            "Sku" => [
                "properties" => []
            ],
            "RedisProperties" => [
                "properties" => [
                    "redisConfiguration" => []
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
                "Sku" => new MapType([]),
                "RedisProperties" => new MapType([]),
            ]);
    }
}