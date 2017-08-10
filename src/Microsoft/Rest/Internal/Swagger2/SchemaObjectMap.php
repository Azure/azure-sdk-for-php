<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

final class SchemaObjectMap extends DataRef
{
    /**
     * @return SchemaObject[]
     */
    function children()
    {
        return $this->getChildren(SchemaObject::class);
    }
}