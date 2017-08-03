<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

final class MapType extends CollectionType
{
    use NotConstTypeTrait;

    /**
     * @param TypeAbstract $items
     */
    function __construct(TypeAbstract $items)
    {
        parent::__construct($items);
    }

    /**
     * @param DataAbstract $additionalPropertiesData
     * @return MapType
     */
    static function createFromItemData(DataAbstract $additionalPropertiesData)
    {
        return new self(TypeAbstract::createFromDataWithRefs($additionalPropertiesData));
    }
}