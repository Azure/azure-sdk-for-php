<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

class UnknownTypeException extends SchemaObjectException
{
    /**
     * @param DataAbstract $data
     */
    function __construct(DataAbstract $data)
    {
        parent::__construct($data, "unknown type");

    }
}