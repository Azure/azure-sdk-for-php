<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;

abstract class PrimitiveType extends TypeAbstract
{
    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function updateRefs(Client $client)
    {
        return $this;
    }
}