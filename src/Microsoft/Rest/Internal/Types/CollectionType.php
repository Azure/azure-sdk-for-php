<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;

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