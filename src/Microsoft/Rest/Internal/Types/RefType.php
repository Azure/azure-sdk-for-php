<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;

final class RefType extends TypeAbstract
{
    /**
     * @param string $ref
     */
    function __construct($ref)
    {
        $this->ref = $ref;
    }

    /**
     * @var string
     */
    private $ref;

    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function updateRefs(Client $client)
    {
        return $client->getType($this->ref);
    }
}