<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;

final class ArraySchema extends DataTypeSchema
{
    /**
     * @param Definitions $definitions
     * @param DataTypeObject $dataTypeObject
     */
    function updateDataType(Definitions $definitions, DataTypeObject $dataTypeObject)
    {
        $this->items = $definitions->get($dataTypeObject->items());
    }

    /**
     * @return bool
     */
    function isConst()
    {
        return false;
    }

    /**
     * @var SchemaAbstract
     */
    private $items;
}