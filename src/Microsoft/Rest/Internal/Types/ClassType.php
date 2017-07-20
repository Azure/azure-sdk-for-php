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
    static function createFromData(DataAbstract $propertiesData)
    {
        return new ClassType(TypeAbstract::createMapFromData($propertiesData));
    }

    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function removeRefTypes(Client $client)
    {
        $this->propertyMap = $client->removeRefTypesFromMap($this->propertyMap);
        return $this;
    }

    /**
     * @var TypeAbstract[]
     */
    private $propertyMap;
}