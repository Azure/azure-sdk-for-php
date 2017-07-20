<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

final class MapType extends TypeAbstract
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
     * @return MapType
     */
    static function createFromData(DataAbstract $propertiesData)
    {
        return new MapType(TypeAbstract::createMapFromData($propertiesData));
    }

    /**
     * @var TypeAbstract[]
     */
    private $propertyMap;
}