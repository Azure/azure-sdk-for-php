<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\SchemaObjectAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#definitions-object
 */
final class DefinitionsObject
{
    /**
     * @param DataAbstract $source
     * @param string $ref
     * @return SchemaObjectAbstract
     * @throws UnknownTypeException
     */
    function getSchemaObject(DataAbstract $source, $ref)
    {
        if (!isset($this->schemaObjectMap[$ref])) {
            throw new UnknownTypeException($source, $ref);
        }
        return $this->schemaObjectMap[$ref];
    }

    /**
     * @param DataAbstract $schemaObjectData
     * @return SchemaObjectAbstract
     */
    function createSchemaObjectFromData(DataAbstract $schemaObjectData)
    {
        return SchemaObjectAbstract::createFromDataWithRefs($schemaObjectData)
            ->removeRefTypes($this);
    }

    /**
     * @param SchemaObjectAbstract[] $typeMap
     * @return SchemaObjectAbstract[]
     */
    function removeRefTypesFromMap(array $typeMap)
    {
        /**
         * @var SchemaObjectAbstract[]
         */
        $result = [];
        foreach ($typeMap as $name => $value) {
            $result[$name] = $value->removeRefTypes($this);
        }
        return $result;
    }

    /**
     * @param DataAbstract $definitionsObjectData
     * @return DefinitionsObject
     */
    static function createFromData(DataAbstract $definitionsObjectData)
    {
        /** @var SchemaObjectAbstract[] */
        $schemaObjectMap = [];
        foreach ($definitionsObjectData->getChildren() as $child) {
            $schemaObjectMap['#/definitions/' . $child->getKey()] =
                SchemaObjectAbstract::createFromDataWithRefs($child);
        }
        $result = new self($schemaObjectMap);
        $result->removeRefTypesFromMap($schemaObjectMap);
        return $result;
    }

    /**
     * @param SchemaObjectAbstract[] $schemaObjectMap
     */
    private function __construct(array $schemaObjectMap)
    {
        $this->schemaObjectMap = $schemaObjectMap;
    }

    /**
     * @var SchemaObjectAbstract[]
     */
    private $schemaObjectMap;
}