<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Swagger\DefinitionsObject;

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
     * @param TypeAbstract|null $additionalProperties
     */
    function __construct(
        array $requiredPropertyMap,
        array $optionalPropertyMap,
        TypeAbstract $additionalProperties = null)
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
        $required = $requiredData == null ? [] : $requiredData->getValue();
        foreach ($propertiesData->getChildren() as $child)
        {
            $name = $child->getKey();
            $type = TypeAbstract::createFromDataWithRefs($child);
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
                : TypeAbstract::createFromDataWithRefs($additionalPropertiesData));
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
     * @var TypeAbstract[]
     */
    private $requiredPropertyMap;

    /**
     * @var TypeAbstract[]
     */
    private $optionalPropertyMap;

    /**
     * @var TypeAbstract|null
     */
    private $additionalProperties;
}