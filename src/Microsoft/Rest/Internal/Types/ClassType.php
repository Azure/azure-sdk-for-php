<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Swagger2\SchemaObject;
use Microsoft\Rest\Internal\Swagger2\SchemaObjectMap;

final class ClassType extends TypeAbstract
{
    use NotConstTypeTrait;

    /**
     * @param string $name
     * @param TypeAbstract $type
     * @param array $value
     * @param string $result
     * @return string
     */
    private static function addJsonProperty($name, TypeAbstract $type, array $value, $result)
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
     * @param TypeAbstract[] $requiredPropertyMap
     * @param TypeAbstract[] $optionalPropertyMap
     * @param bool $allowAdditionalProperties
     * @param TypeAbstract|null $additionalProperties
     */
    function __construct(
        array $requiredPropertyMap,
        array $optionalPropertyMap,
        $allowAdditionalProperties = true,
        TypeAbstract $additionalProperties = null)
    {
        $this->requiredPropertyMap = $requiredPropertyMap;
        $this->optionalPropertyMap = $optionalPropertyMap;
        $this->allowAdditionalProperties = $allowAdditionalProperties;
        $this->additionalProperties = $additionalProperties;
    }

    /**
     * @param SchemaObjectMap $propertiesData
     * @param string[] $required
     * @param SchemaObject|bool|null $additionalPropertiesData
     * @return ClassType
     */
    static function createClassFromData(
        SchemaObjectMap $propertiesData,
        array $required = null,
        $additionalPropertiesData = null)
    {
        /**
         * @var TypeAbstract[]
         */
        $requiredPropertyMap = [];
        /**
         * @var TypeAbstract[]
         */
        $optionalPropertyMap = [];
        /**
         * @var string[]
         */
        if ($required === null) {
            $required = [];
        }
        foreach ($propertiesData->children() as $name => $child)
        {
            $type = TypeAbstract::createFromDataWithRefs($child);
            if (in_array($name, $required)) {
                $requiredPropertyMap[$name] = $type;
            } else {
                $optionalPropertyMap[$name] = $type;
            }
        }

        $allowAdditionalProperties = true;
        $additionalProperties = null;
        if ($additionalPropertiesData !== null) {
            if (is_bool($additionalPropertiesData)) {
                $allowAdditionalProperties = $additionalPropertiesData;
            } else {
                $additionalProperties = TypeAbstract::createFromDataWithRefs($additionalPropertiesData);
            }
        }

        return new self(
            $requiredPropertyMap,
            $optionalPropertyMap,
            $allowAdditionalProperties,
            $additionalProperties);
    }

    /**
     * @param Definitions $definitionsObject
     * @return $this
     */
    function removeRefTypes(Definitions $definitionsObject)
    {
        $this->requiredPropertyMap = $definitionsObject->removeRefTypesFromMap($this->requiredPropertyMap);
        $this->optionalPropertyMap = $definitionsObject->removeRefTypesFromMap($this->optionalPropertyMap);
        if ($this->additionalProperties != null) {
            $this->additionalProperties = $this->additionalProperties->removeRefTypes($definitionsObject);
        }
        return $this;
    }

    /**
     * @var TypeAbstract[]
     */
    private $requiredPropertyMap;

    /**
     * @var TypeAbstract[]
     */
    private $optionalPropertyMap;

    /**
     * @var bool
     */
    private $allowAdditionalProperties;

    /**
     * @var TypeAbstract|null
     */
    private $additionalProperties;
}