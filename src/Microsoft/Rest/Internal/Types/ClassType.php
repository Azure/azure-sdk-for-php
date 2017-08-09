<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

final class ClassType extends TypeAbstract
{
    use NotConstTypeTrait;

    /**
     * @param array $value
     * @return string
     */
    function toJson($value)
    {
        $result = '{';
        foreach ($this->requiredPropertyMap as $name => $type) {
            $result .= (strlen($result) > 1 ? ',' : '')
                . '"'
                . $name
                . '":'
                . $type->toJson($value[$name]);
        }
        foreach ($this->optionalPropertyMap as $name => $type) {
            if (isset($value[$name])) {
                $result .= (strlen($result) > 1 ? ',' : '')
                    . '"'
                    . $name
                    . '":'
                    . $type->toJson($value[$name]);
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

        return new ClassType(
            $requiredPropertyMap,
            $optionalPropertyMap,
            $additionalPropertiesData == null
                ? null
                : TypeAbstract::createFromDataWithRefs($additionalPropertiesData));
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @return $this
     */
    function removeRefTypes(array $typeMap)
    {
        $this->requiredPropertyMap = TypeAbstract::removeRefTypesFromMap($typeMap, $this->requiredPropertyMap);
        $this->optionalPropertyMap = TypeAbstract::removeRefTypesFromMap($typeMap, $this->optionalPropertyMap);
        if ($this->additionalProperties != null) {
            $this->additionalProperties = $this->additionalProperties->removeRefTypes($typeMap);
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