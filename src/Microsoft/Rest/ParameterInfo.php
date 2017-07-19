<?php
namespace Microsoft\Rest;

final class ParameterInfo
{
    /**
     * @param string   $name
     * @param string   $in   The location of the parameter. Possible values are
     *                       "query", "header", "path", "formData" or "body".
     * @param TypeInfo $type
     */
    public function __construct($name, $in, TypeInfo $type)
    {
        $this->name = $name;
        $this->in = $in;
        $this->type = $type;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $in;

    /**
     * @var TypeInfo
     */
    private $type;
}