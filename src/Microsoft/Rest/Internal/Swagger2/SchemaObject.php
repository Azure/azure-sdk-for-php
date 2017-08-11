<?php
namespace Microsoft\Rest\Internal\Swagger2;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#schemaObject
 */
class SchemaObject extends DataTypeObject
{
    /**
     * @return string|null
     */
    function ref()
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
     * @return string[]|null
     */
    function required()
    {
        return $this->getChildValueOrNull('required');
    }

    /**
     * @return AdditionalPropertiesObject|null
     */
    function additionalProperties()
    {
        return $this->getChildOrNull('additionalProperties', AdditionalPropertiesObject::class);
    }
}