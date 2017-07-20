<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
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
     * @param Client $client
     * @return TypeAbstract
     */
    function updateRefs(Client $client)
    {
        $this->propertyMap = $client->updateMapRefs($this->propertyMap);
        return $this;
    }

    /**
     * @var TypeAbstract[]
     */
    private $propertyMap;
}