<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

final class ResponseObject extends DataRef
{
    /**
     * @return SchemaObject
     */
    function schema()
    {
        return new SchemaObject($this, 'schema');
    }
}