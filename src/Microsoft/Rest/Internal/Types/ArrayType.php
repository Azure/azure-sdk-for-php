<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * type: array
 * items: { }
 */
final class ArrayType extends CollectionType
{
    use NotConstTypeTrait;

    /**
     * @param array $value
     * @return string
     */
    function toJson($value)
    {
        $items = $this->getItems();
        $result = '[';
        foreach ($value as $item) {
            $result .= (strlen($result) > 1 ? ',' : '') . $items->toJson($item);
        }
        return $result . ']';
    }

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
    static function createFromDataWithRefs(DataAbstract $schemaObjectData)
    {
        return new self(TypeAbstract::createFromDataWithRefs($schemaObjectData->getChild('items')));
    }
}
