<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;
use Microsoft\Rest\Internal\Swagger2\SchemaObject;

abstract class DataTypeSchema extends SchemaAbstract
{
    function update(Definitions $definitions, SchemaObject $schemaObject)
    {
        $this->updateDataType($definitions, $schemaObject);
    }

    abstract function updateDataType(Definitions $definitions, DataTypeObject $schemaObject);
}