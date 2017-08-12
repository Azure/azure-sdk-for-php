<?php
namespace Microsoft\Rest\Internal\Swagger2;

final class SchemaObject extends DataTypeObject
{
    /**
     * @return string|null
     */
    function _ref()
    {
        return $this->getChildValueOrNull('$ref');
    }

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
        return $this->getChildOrValueOrNull('additionalProperties', SchemaObject::class);
    }

    /**
     * @return string[]|null
     */
    function required()
    {
        return $this->getChildValueOrNull('required');
    }
}