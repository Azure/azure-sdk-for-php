<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\UnknownTypeException;

abstract class TypeAbstract
{
    /**
     * @param Client $client
     * @return TypeAbstract
     */
    abstract function updateRefs(Client $client);

    /**
     * @param DataAbstract $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        // https://swagger.io/specification/#data-types-12
        /**
         * @var string
         */
        $ref = $schemaObjectData->getChildValue('$ref');
        if ($ref !== null) {
            return new RefType($ref, $schemaObjectData);
        }
        /**
         * @var string
         */
        $type = $schemaObjectData->getChildValue("type");
        if ($type !== null) {
            /**
             * @var string
             */
            $format = $schemaObjectData->getChildValue("format");
            switch ($type) {
                case "array":
                    return ArrayType::createFromData($schemaObjectData);
                case "boolean":
                    switch ($format) {
                        case null: return new BooleanType();
                    }
                    break;
                case "string":
                    switch ($format) {
                        case null: return new StringType();
                        case "byte": return new Base64Type();
                        case "binary": return new BinaryType();
                        case "date": return new DateType();
                        case "date-time": return new DateTimeType();
                        case "password": return new PasswordType();
                    }
                    break;
                case "integer":
                    switch ($format) {
                        case "int32": return new Int32Type();
                        case "int64": return new Int64Type();
                    }
                    break;
                case "number":
                    switch ($format) {
                        case "float": return new FloatType();
                        case "double": return new DoubleType();
                    }
                    break;
            }
            throw new UnknownTypeException($schemaObjectData);
        }

        // MapType
        $properties = $schemaObjectData->getChild("properties");
        if ($properties !== null) {
            return MapType::createFromData($properties);
        }

        throw new InvalidSchemaObjectException($schemaObjectData);
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
            $typeMap[$prefix . $child->getKey()] = TypeAbstract::createFromData($child);
        }
        return $typeMap;
    }
}