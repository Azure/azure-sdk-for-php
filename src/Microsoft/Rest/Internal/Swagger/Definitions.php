<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Swagger2\DataTypeObject;
use Microsoft\Rest\Internal\Swagger2\SchemaObject;
use Microsoft\Rest\Internal\Swagger2\SchemaObjectMap;
use Microsoft\Rest\Internal\Types\SimpleTypeAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#definitions-object
 */
final class Definitions
{
    /**
     * @param DataAbstract $source
     * @param string $ref
     * @return Schema
     * @throws UnknownTypeException
     */
    function getSchemaObject(DataAbstract $source, $ref)
    {
        if (!isset($this->schemaObjectMap[$ref])) {
            print_r($this->schemaObjectMap);
            throw new UnknownTypeException($source, $ref);
        }
        return $this->schemaObjectMap[$ref];
    }

    /**
     * @param SchemaObject $schemaObjectData
     * @return TypeAbstract
     */
    function createSchemaObjectFromData(SchemaObject $schemaObjectData)
    {
        return TypeAbstract::createFromDataWithRefs($schemaObjectData)
            ->removeRefTypes($this);
    }

    /**
     * @param DataTypeObject $dataTypeObject
     * @return TypeAbstract
     */
    function createSchemaObjectFromDataType(DataTypeObject $dataTypeObject)
    {
        return SimpleTypeAbstract::createSimpleFromDataWithRefs($dataTypeObject)
            ->removeRefTypes($this);
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract[]
     */
    function removeRefTypesFromMap(array $typeMap)
    {
        /**
         * @var TypeAbstract[]
         */
        $result = [];
        foreach ($typeMap as $name => $value) {
            $result[$name] = $value->removeRefTypes($this);
        }
        return $result;
    }

    /**
     * @param SchemaObjectMap $definitionsObjectData
     * @return Definitions
     */
    static function createFromData(SchemaObjectMap $definitionsObjectData)
    {
        /** @var Schema[] */
        $schemaObjectMap = [];
        foreach ($definitionsObjectData->children() as $key => $child) {
            $schemaObjectMap['#/definitions/' . $key] =
                Schema::createFromData($child);
        }
        $result = new self($schemaObjectMap);
        // remove refs
        foreach ($schemaObjectMap as $value) {
            $value->removeRefs($result);
        }
        return $result;
    }

    /**
     * @param Schema[] $schemaObjectMap
     */
    private function __construct(array $schemaObjectMap)
    {
        $this->schemaObjectMap = $schemaObjectMap;
    }

    /**
     * @var Schema[]
     */
    private $schemaObjectMap;
}