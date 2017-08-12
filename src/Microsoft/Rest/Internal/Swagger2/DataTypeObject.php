<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

class DataTypeObject extends DataAbstract
{
    /**
     * @return SchemaObject|null
     */
    function items()
    {
        return $this->getChildOrNull('items', SchemaObject::class);
    }
}