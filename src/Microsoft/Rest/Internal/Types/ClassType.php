<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;

final class ClassType extends TypeAbstract
{
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