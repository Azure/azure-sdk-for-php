<?php
namespace Microsoft\Rest\Internal\Swagger2;

class ParameterObject extends DataTypeObject
{
    /**
     * @return SchemaObject|null
     */
    function schema()
    {
        return $this->getChildOrNull('schema', SchemaObject::class);
    }
}