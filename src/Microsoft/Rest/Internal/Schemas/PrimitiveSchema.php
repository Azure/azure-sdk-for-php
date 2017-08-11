<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;

final class PrimitiveSchema extends DataTypeSchema
{
    /**
     * @param Definitions $definitions
     * @param DataTypeObject $dataTypeObject
     */
    function updateDataType(Definitions $definitions, DataTypeObject $dataTypeObject)
    {
        $this->type = $dataTypeObject->type();
        $this->format = $dataTypeObject->format();
        $this->enum = $dataTypeObject->enum();
    }

    /**
     * @var string
     */
    private $type;

    /**
     * @var string|null
     */
    private $format;

    /**
     * @var string[]|null
     */
    private $enum;

    /**
     * @return bool
     */
    function isConst()
    {
        return $this->enum !== null && count($this->enum) == 1;
    }
}