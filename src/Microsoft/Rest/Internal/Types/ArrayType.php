<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * type: array
 * items: { }
 */
final class ArrayType extends CollectionType
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
     * @return ArrayType
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        return new self(CollectionType::createItemsFromData(
            $schemaObjectData, 'items'));
    }
}
