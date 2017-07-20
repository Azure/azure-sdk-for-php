<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;

abstract class PrimitiveTypeAbstract extends TypeAbstract
{
    /**
     * @param Client $client
     * @return TypeAbstract
     */
    function removeRefTypes(Client $client)
    {
        return $this;
    }
}