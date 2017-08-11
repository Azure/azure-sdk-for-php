<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Types\Primitives\ObjectType;
use Microsoft\Rest\Internal\Types\Primitives\PrimitiveTypeAbstract;

abstract class TypeAbstract
{
    /**
     * @param mixed $value
     * @return string
     */
    abstract function toJson($value);

    /**
     * @return bool
     */
    abstract function isConst();

    /**
     * @return string
     */
    abstract function getConstValue();

    /**
     * @param Definitions $definitionsObject
     * @return TypeAbstract
     */
    abstract function removeRefTypes(Definitions $definitionsObject);

    /**
     * @param DataAbstract $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    public static function createFromDataWithRefs(DataAbstract $schemaObjectData)
    {
        // https://swagger.io/specification/#data-types-12
        /**
         * @var string
         */
        $ref = $schemaObjectData->getChildValueOrNull('$ref');
        if ($ref !== null) {
            return new RefType($ref, $schemaObjectData);
        }

        $additionalPropertiesData = $schemaObjectData->getChildOrNull('additionalProperties');

        /**
         * @var string
         */
        $type = $schemaObjectData->getChildValueOrNull('type');
        if ($type !== null) {
            switch ($type) {
                case 'array':
                    return ArrayType::createFromDataWithRefs($schemaObjectData);
                case 'object':
                    return $additionalPropertiesData === null
                        ? new ObjectType()
                        : MapType::createFromItemData($additionalPropertiesData);
                default:
                    return PrimitiveTypeAbstract::createFromDataWithRefs($schemaObjectData);
            }
        }

        // ClassSchemaObject
        $properties = $schemaObjectData->getChildOrNull('properties');
        if ($properties !== null) {
            return ClassType::createClassFromData(
                $properties,
                $schemaObjectData->getChildOrNull('required'),
                $additionalPropertiesData);
        }

        throw new InvalidSchemaObjectException($schemaObjectData);
    }
}