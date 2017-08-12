<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger2\SchemaObject;

final class MapType extends CollectionType
{
    use NotConstTypeTrait;

    /**
     * @param array $value
     * @return string
     */
    function toJson($value)
    {
        $items = $this->getItems();
        $result = '{';
        foreach ($value as $name => $item) {
            $result .= (strlen($result) > 1 ? ',' : '')
                . '"'
                . $name
                . '":'
                . $items->toJson($item);
        }
        return $result . '}';
    }

    /**
     * @param TypeAbstract $items
     */
    function __construct(TypeAbstract $items)
    {
        parent::__construct($items);
    }

    /**
     * @param SchemaObject $additionalPropertiesData
     * @return MapType
     */
    static function createFromItemData(SchemaObject $additionalPropertiesData)
    {
        return new self(TypeAbstract::createFromDataWithRefs($additionalPropertiesData));
    }
}