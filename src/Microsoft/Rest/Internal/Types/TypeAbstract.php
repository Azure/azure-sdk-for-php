<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

abstract class TypeAbstract
{
    /**
     * @param DataAbstract $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        $properties = $schemaObjectData->at("properties");
        if ($properties !== null) {
            return MapType::createFromData($properties);
        }
        throw new \Exception("unknown schema object "
            . json_encode($schemaObjectData)
            . " at "
            . $schemaObjectData->getPath());
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