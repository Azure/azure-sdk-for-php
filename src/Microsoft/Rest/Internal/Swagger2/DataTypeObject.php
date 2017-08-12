<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

class DataTypeObject extends DataAbstract
{
    /**
     * @return string|null
     */
    function type()
    {
        return $this->getChildValueOrNull('type');
    }

    /**
     * @return string|null
     */
    function format()
    {
        return $this->getChildValueOrNull('format');
    }

    /**
     * @return SchemaObject|null
     */
    function items()
    {
        return $this->getChildOrNull('items', SchemaObject::class);
    }

    /**
     * @return string[]|null
     */
    function enum()
    {
        return $this->getChildValueOrNull('enum');
    }
}