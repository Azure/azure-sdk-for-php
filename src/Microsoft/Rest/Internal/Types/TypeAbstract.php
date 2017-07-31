<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Types\Primitives\ObjectType;
use Microsoft\Rest\Internal\Types\Primitives\PrimitiveTypeAbstract;

abstract class TypeAbstract
{
    /**
     * @param Client $client
     * @return TypeAbstract
     */
    abstract function removeRefTypes(Client $client);

    /**
     * @param DataAbstract $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    protected static function createFromDataWithRefs(DataAbstract $schemaObjectData)
    {
        // https://swagger.io/specification/#data-types-12
        /**
         * @var string
         */
        $ref = $schemaObjectData->getChildValueOrNull('$ref');
        if ($ref !== null) {
            return new RefType($ref, $schemaObjectData);
        }

        /**
         * @var string
         */
        $type = $schemaObjectData->getChildValueOrNull('type');
        if ($type !== null) {
            switch ($type) {
                case 'array':
                    return ArrayType::createFromDataWithRefs($schemaObjectData);
                case 'object':
                    $additionalPropertiesData = $schemaObjectData->getChildOrNull('additionalProperties');
                    return $additionalPropertiesData === null
                        ? new ObjectType()
                        : MapType::createFromItemData($additionalPropertiesData);
                default:
                    return PrimitiveTypeAbstract::createFromDataWithRefs($schemaObjectData);
            }
        }

        // ClassType
        $properties = $schemaObjectData->getChildOrNull('properties');
        if ($properties !== null) {
            return ClassType::createFromDataWithRefs($properties);
        }

        throw new InvalidSchemaObjectException($schemaObjectData);
    }

    static function createFromData(Client $client, DataAbstract $schemaObjectData)
    {
        return self::createFromDataWithRefs($schemaObjectData)->removeRefTypes($client);
    }

    /**
     * @param DataAbstract $schemaObjectMapData
     * @param string $prefix
     * @return TypeAbstract[]
     */
    static function createMapFromData(DataAbstract $schemaObjectMapData, $prefix = '')
    {
        /**
         * @var TypeAbstract[]
         */
        $typeMap = [];
        foreach ($schemaObjectMapData->getChildren() as $child)
        {
            $typeMap[$prefix . $child->getKey()] = TypeAbstract::createFromDataWithRefs($child);
        }
        return $typeMap;
    }
}