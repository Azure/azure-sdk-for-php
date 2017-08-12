<?php
namespace Microsoft\Rest\Internal\Swagger2;

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

    /**
     * @return bool|null
     */
    function x_ms_skip_url_encoding()
    {
        return $this->getChildValueOrNull('x-ms-skip-url-encoding');
    }
}