<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger\Definitions;

abstract class CollectionType extends TypeAbstract
{
    use NotConstTypeTrait;

    /**
     * @param Definitions $definitionsObject
     * @return TypeAbstract
     */
    function removeRefTypes(Definitions $definitionsObject)
    {
        $this->items = $this->items->removeRefTypes($definitionsObject);
        return $this;
    }

    /**
     * @return TypeAbstract
     */
    function getItems()
    {
        return $this->items;
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