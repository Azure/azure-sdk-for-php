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
        foreach ($this->propertyMap as $name => $type) {
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
     * @param TypeAbstract[] $propertyMap
     */
    function __construct($propertyMap)
    {
        $this->propertyMap = $propertyMap;
    }

    /**
     * @param DataAbstract $propertiesData
     * @return ClassType
     */
    static function createFromDataWithRefs(DataAbstract $propertiesData)
    {
        return new ClassType(TypeAbstract::createMapFromData($propertiesData));
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract
     */
    function removeRefTypes(array $typeMap)
    {
        $this->propertyMap = TypeAbstract::removeRefTypesFromMap($typeMap, $this->propertyMap);
        return $this;
    }

    /**
     * @var TypeAbstract[]
     */
    private $propertyMap;
}