<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\UnknownTypeException;

abstract class TypeAbstract
{
    /**
     * @param DataAbstract $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        //
        $type = $schemaObjectData->at("type");
        if ($type !== null) {
            /**
             * @var string
             */
            $typeStr = $type->getData();
            switch ($typeStr)
            {
                case "string":
                    return new StringType();
                default:
                    throw new UnknownTypeException($schemaObjectData, $typeStr);
            }
        }
        // MapType
        $properties = $schemaObjectData->at("properties");
        if ($properties !== null) {
            return MapType::createFromData($properties);
        }
        throw new InvalidSchemaObjectException($schemaObjectData);
    }

    /**
     * @param DataAbstract $schemaObjectMapData
     * @return TypeAbstract[]
     */
    static function createMapFromData(DataAbstract $schemaObjectMapData)
    {
        /**
         * @var TypeAbstract[]
         */
        $typeMap = [];
        foreach ($schemaObjectMapData->getChildren() as $child)
        {
            $typeMap[$child->getKey()] = TypeAbstract::createFromData($child);
        }
        return $typeMap;
    }
}