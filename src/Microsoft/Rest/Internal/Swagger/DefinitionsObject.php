<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#definitions-object
 */
final class DefinitionsObject
{
    /**
     * @param DataAbstract $source
     * @param string $ref
     * @return TypeAbstract
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
     * @return TypeAbstract
     */
    function createSchemaObjectFromData(DataAbstract $schemaObjectData)
    {
        return TypeAbstract::createFromDataWithRefs($schemaObjectData)
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
     * @param DataAbstract $definitionsObjectData
     * @return DefinitionsObject
     */
    static function createFromData(DataAbstract $definitionsObjectData)
    {
        /** @var TypeAbstract[] */
        $schemaObjectMap = [];
        foreach ($definitionsObjectData->getChildren() as $child) {
            $schemaObjectMap['#/definitions/' . $child->getKey()] =
                TypeAbstract::createFromDataWithRefs($child);
        }
        $result = new self($schemaObjectMap);
        $result->removeRefTypesFromMap($schemaObjectMap);
        return $result;
    }

    /**
     * @param TypeAbstract[] $schemaObjectMap
     */
    private function __construct(array $schemaObjectMap)
    {
        $this->schemaObjectMap = $schemaObjectMap;
    }

    /**
     * @var TypeAbstract[]
     */
    private $schemaObjectMap;
}