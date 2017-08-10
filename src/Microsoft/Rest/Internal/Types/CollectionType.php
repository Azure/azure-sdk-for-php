<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger\DefinitionsObject;

abstract class CollectionType extends SchemaObjectAbstract
{
    use NotConstTypeTrait;

    /**
     * @param DefinitionsObject $definitionsObject
     * @return SchemaObjectAbstract
     */
    function removeRefTypes(DefinitionsObject $definitionsObject)
    {
        $this->items = $this->items->removeRefTypes($definitionsObject);
        return $this;
    }

    /**
     * @return SchemaObjectAbstract
     */
    function getItems()
    {
        return $this->items;
    }

    /**
     * @param SchemaObjectAbstract $items
     */
    protected function __construct(SchemaObjectAbstract $items)
    {
        $this->items = $items;
    }

    /**
     * @var SchemaObjectAbstract
     */
    private $items;
}