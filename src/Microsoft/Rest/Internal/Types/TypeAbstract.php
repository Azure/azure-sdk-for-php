<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Swagger2\SchemaObject;
use Microsoft\Rest\Internal\Types\Primitives\ObjectType;

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
     * @param SchemaObject $schemaObjectData see https://swagger.io/specification/#schemaObject
     * @return TypeAbstract
     * @throws \Exception
     */
    public static function createFromDataWithRefs(SchemaObject $schemaObjectData)
    {
        // https://swagger.io/specification/#data-types-12
        /**
         * @var string
         */
        $ref = $schemaObjectData->_ref();
        if ($ref !== null) {
            return new RefType($ref, $schemaObjectData);
        }

        /**
         * @var string
         */
        $type = $schemaObjectData->type();
        switch ($type) {
            case 'object':
            case null:
                $additionalPropertiesData = $schemaObjectData->additionalProperties();
                // ClassSchemaObject
                $properties = $schemaObjectData->properties();
                if ($properties !== null) {
                    return ClassType::createClassFromData(
                        $properties,
                        $schemaObjectData->required(),
                        $additionalPropertiesData);
                }
                return $additionalPropertiesData === null
                    ? new ObjectType()
                    : MapType::createFromItemData($additionalPropertiesData);
            default:
                return SimpleTypeAbstract::createSimpleFromDataWithRefs($schemaObjectData);
        }
    }
}