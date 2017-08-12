<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Swagger2\SchemaObject;
use Microsoft\Rest\Internal\Types\TypeAbstract;

final class Schema
{
    function removeRefs(Definitions $definitionsObject)
    {
        $this->dataType = $this->dataType->removeRefTypes($definitionsObject);
    }

    /**
     * @return TypeAbstract
     */
    function getDataType()
    {
        return $this->dataType;
    }

    /**
     * @param SchemaObject $schemaObjectData
     * @return Schema
     */
    static function createFromData(SchemaObject $schemaObjectData)
    {
        return new Schema(TypeAbstract::createFromDataWithRefs($schemaObjectData));
    }

    /**
     * @param TypeAbstract $dataType
     */
    private function __construct(TypeAbstract $dataType)
    {
        $this->dataType = $dataType;
    }

    /**
     * @var TypeAbstract
     */
    private $dataType;
}