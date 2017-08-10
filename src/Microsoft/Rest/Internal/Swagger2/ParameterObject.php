<?php
namespace Microsoft\Rest\Internal\Swagger2;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#parameter-object
 */
class ParameterObject extends DataTypeObject
{
    /**
     * @return string
     */
    function name()
    {
        return $this->getChildValue('name');
    }

    /**
     * @return string
     */
    function in()
    {
        return $this->getChildValue('in');
    }

    /**
     * @return SchemaObject|null
     */
    function schema()
    {
        return $this->getChildOrNull('schema', SchemaObject::class);
    }

    /**
     * @return bool|null
     */
    function required()
    {
        return $this->getChildValueOrNull('required');
    }
}