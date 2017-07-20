<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

class UnknownTypeException extends SchemaObjectException
{
    /**
     * @param DataAbstract $data
     * @param string $type
     */
    function __construct(DataAbstract $data, $type)
    {
        parent::__construct($data, "unknown type " . $type);
    }
}