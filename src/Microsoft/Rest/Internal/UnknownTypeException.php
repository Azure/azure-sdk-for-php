<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Data\DataException;

class UnknownTypeException extends DataException
{
    /**
     * @param DataAbstract $data
     * @param string $ref
     */
    function __construct(DataAbstract $data, $ref)
    {
        parent::__construct($data, 'unknown type: ' . $ref);
    }
}