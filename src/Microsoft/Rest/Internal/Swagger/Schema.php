<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Data\DataAbstract;
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

    static function createFromData(DataAbstract $schemaObjectData)
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