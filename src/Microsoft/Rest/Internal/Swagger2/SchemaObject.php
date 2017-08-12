<?php
namespace Microsoft\Rest\Internal\Swagger2;

final class SchemaObject extends DataTypeObject
{
    /**
     * @return SchemaObjectMap|null
     */
    function properties()
    {
        return $this->getChildOrNull('properties', SchemaObjectMap::class);
    }

    /**
     * @return SchemaObject|null
     */
    function additionalProperties()
    {
        return $this->getChildOrNull('additionalProperties', SchemaObject::class);
    }
}