<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;

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
     * @param DataTypeObject $dataTypeObject
     * @return ArrayType
     */
    static function createArrayFromDataWithRefs(DataTypeObject $dataTypeObject)
    {
        return new self(TypeAbstract::createFromDataWithRefs($dataTypeObject->items()));
    }
}
