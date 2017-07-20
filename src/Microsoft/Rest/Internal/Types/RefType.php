<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

final class RefType extends TypeAbstract
{
    /**
     * @param string $ref
     * @param DataAbstract $data
     */
    function __construct($ref, DataAbstract $data)
    {
        $this->ref = $ref;
        $this->data = $data;
    }

    /**
     * @var string
     */
    private $ref;

    /**
     * @var DataAbstract
     */
    private $data;

    /**
     * @param Client $client
     * @return TypeAbstract
     * @throws UnknownTypeException
     */
    function removeRefTypes(Client $client)
    {
        $result = $client->getType($this->ref);
        if ($result === null) {
            throw new UnknownTypeException($this->data);
        }
        return $result;
    }
}