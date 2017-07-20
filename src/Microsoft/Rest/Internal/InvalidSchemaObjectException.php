<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

class InvalidSchemaObjectException extends SchemaObjectException
{
    /**
     * @param DataAbstract $data
     */
    function __construct(DataAbstract $data)
    {
        parent::__construct($data, "invalid schema object");
    }
}