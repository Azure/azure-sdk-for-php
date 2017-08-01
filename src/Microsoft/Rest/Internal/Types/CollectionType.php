<?php
namespace Microsoft\Rest\Internal\Types;

abstract class CollectionType extends TypeAbstract
{
    /**
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract
     */
    function removeRefTypes(array $typeMap)
    {
        $this->items = $this->items->removeRefTypes($typeMap);
        return $this;
    }

    /**
     * @param TypeAbstract $items
     */
    protected function __construct(TypeAbstract $items)
    {
        $this->items = $items;
    }

    /**
     * @var TypeAbstract
     */
    private $items;
}