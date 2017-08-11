<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\SchemaObject;

abstract class SchemaAbstract
{
    /**
     * @param Definitions $definitions
     * @param SchemaObject $schemaObject
     */
    abstract function update(Definitions $definitions, SchemaObject $schemaObject);

    /**
     * @return bool
     */
    abstract function isConst();
}