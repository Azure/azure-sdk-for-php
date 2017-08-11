<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Schemas\Definitions;
use Microsoft\Rest\Internal\Schemas\SchemaAbstract;
use Microsoft\Rest\Internal\Swagger2\ParameterObject;

class Parameter2
{
    function __construct(Definitions $definitions, ParameterObject $parameterObject)
    {
        $this->name = $parameterObject->name();
        $this->in = $parameterObject->in();

        $schemaObject = $parameterObject->schema();
        $this->schema = $schemaObject === null
            ? $definitions->getDataType($parameterObject)
            : $definitions->get($schemaObject);
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
     * @var SchemaAbstract
     */
    private $schema;
}