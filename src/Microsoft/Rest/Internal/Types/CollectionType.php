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
     * @param DataAbstract $schemaObjectData
     * @param string $itemsKey
     * @return TypeAbstract
     */
    static function createItemsFromData(DataAbstract $schemaObjectData, $itemsKey)
    {
        return TypeAbstract::createFromData($schemaObjectData->getChild($itemsKey));
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