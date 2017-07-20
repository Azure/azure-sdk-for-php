<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

final class MapType extends CollectionType
{
    /**
     * @param TypeAbstract $items
     */
    function __construct(TypeAbstract $items)
    {
        parent::__construct($items);
    }

    /**
     * @param DataAbstract $schemaObjectData
     * @return MapType
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        return new self(CollectionType::createItemsFromData(
            $schemaObjectData, 'additionalProperties'));
    }
}