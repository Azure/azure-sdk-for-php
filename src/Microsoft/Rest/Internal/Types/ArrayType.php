<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * type: array
 * items: { }
 */
final class ArrayType extends TypeAbstract
{
    /**
     * @param TypeAbstract $items
     */
    function __construct(TypeAbstract $items)
    {
        $this->items = $items;
    }

    /**
     * @param DataAbstract $schemaObjectData
     * @return ArrayType
     */
    static function createFromData(DataAbstract $schemaObjectData)
    {
        $items = TypeAbstract::createFromData($schemaObjectData->getChild("items"));
        return new ArrayType($items);
    }

    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function updateRefs(Client $client)
    {
        $this->items = $this->items->updateRefs($client);
        return $this;
    }

    /**
     * @var TypeAbstract
     */
    private $items;
}
