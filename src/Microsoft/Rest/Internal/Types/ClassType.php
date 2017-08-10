<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Swagger\DefinitionsObject;

final class ClassType extends SchemaObjectAbstract
{
    use NotConstTypeTrait;

    /**
     * @param string $name
     * @param SchemaObjectAbstract $type
     * @param array $value
     * @param string $result
     * @return string
     */
    private static function addJsonProperty($name, SchemaObjectAbstract $type, array $value, $result)
    {
        return $result .
            (strlen($result) > 1 ? ',' : '')
            . '"'
            . $name
            . '":'
            . $type->toJson($value[$name]);
    }


    /**
     * @param array $value
     * @return string
     */
    function toJson($value)
    {
        $result = '{';
        foreach ($this->requiredPropertyMap as $name => $type) {
            $result = self::addJsonProperty($name, $type, $value, $result);
        }
        foreach ($this->optionalPropertyMap as $name => $type) {
            if (isset($value[$name])) {
                $result = self::addJsonProperty($name, $type, $value, $result);
            }
        }
        return $result . '}';
    }

    /**
     * @param SchemaObjectAbstract[] $requiredPropertyMap
     * @param SchemaObjectAbstract[] $optionalPropertyMap
     * @param SchemaObjectAbstract|null $additionalProperties
     */
    function __construct(
        array $requiredPropertyMap,
        array $optionalPropertyMap,
        SchemaObjectAbstract $additionalProperties = null)
    {
        $this->requiredPropertyMap = $requiredPropertyMap;
        $this->optionalPropertyMap = $optionalPropertyMap;
        $this->additionalProperties = $additionalProperties;
    }

    /**
     * @param DataAbstract $propertiesData
     * @param DataAbstract $requiredData
     * @param DataAbstract|null $additionalPropertiesData
     * @return ClassType
     */
    static function createClassFromData(
        DataAbstract $propertiesData,
        DataAbstract $requiredData = null,
        DataAbstract $additionalPropertiesData = null)
    {
        /**
         * @var SchemaObjectAbstract[]
         */
        $requiredPropertyMap = [];
        /**
         * @var SchemaObjectAbstract[]
         */
        $optionalPropertyMap = [];
        /**
         * @var string[]
         */
        $required = $requiredData == null ? [] : $requiredData->getValue();
        foreach ($propertiesData->getChildren() as $child)
        {
            $name = $child->getKey();
            $type = SchemaObjectAbstract::createFromDataWithRefs($child);
            if (in_array($name, $required)) {
                $requiredPropertyMap[$name] = $type;
            } else {
                $optionalPropertyMap[$name] = $type;
            }
        }

        return new self(
            $requiredPropertyMap,
            $optionalPropertyMap,
            $additionalPropertiesData == null
                ? null
                : SchemaObjectAbstract::createFromDataWithRefs($additionalPropertiesData));
    }

    /**
     * @param DefinitionsObject $definitionsObject
     * @return $this
     */
    function removeRefTypes(DefinitionsObject $definitionsObject)
    {
        $this->requiredPropertyMap = $definitionsObject->removeRefTypesFromMap($this->requiredPropertyMap);
        $this->optionalPropertyMap = $definitionsObject->removeRefTypesFromMap($this->optionalPropertyMap);
        if ($this->additionalProperties != null) {
            $this->additionalProperties = $this->additionalProperties->removeRefTypes($definitionsObject);
        }
        return $this;
    }

    /**
     * @var SchemaObjectAbstract[]
     */
    private $requiredPropertyMap;

    /**
     * @var SchemaObjectAbstract[]
     */
    private $optionalPropertyMap;

    /**
     * @var SchemaObjectAbstract|null
     */
    private $additionalProperties;
}