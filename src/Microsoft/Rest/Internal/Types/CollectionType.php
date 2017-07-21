<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;

abstract class CollectionType extends TypeAbstract
{
    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function removeRefTypes(Client $client)
    {
        $this->items = $this->items->removeRefTypes($client);
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