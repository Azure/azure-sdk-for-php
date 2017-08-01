<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\OperationInterface;

final class Client implements ClientInterface
{
    /**
     * @param string $operationId
     * @return OperationInterface
     */
    function createOperation($operationId)
    {
        return $this->operationMap[$operationId];
    }

    /**
     * @param DataAbstract $swaggerObjectData
     * @return ClientInterface
     */
    static function createFromData(DataAbstract $swaggerObjectData)
    {
        $typeMap = TypeAbstract::createMapFromData(
            $swaggerObjectData->getChild('definitions'),
            '#/definitions/');
        $typeMap = TypeAbstract::removeRefTypesFromMap($typeMap, $typeMap);

        /** @var string */
        $host = $swaggerObjectData->getChildValue('host');

        /** @var OperationInterface[] */
        $operationMap = [];
        foreach ($swaggerObjectData->getChild('paths')->getChildren() as $pathItemObjectData) {
            $pathStr = $pathItemObjectData->getKey();
            $path = PathStrPart::parse($pathStr);
            foreach ($pathItemObjectData->getChildren() as $operationData) {
                $httpMethod = $operationData->getKey();
                $operation = Operation::createFromOperationData(
                    $typeMap,
                    $host,
                    $operationData,
                    $path,
                    $httpMethod);
                $operationMap[$operation->getId()] = $operation;
            }
        }

        return new Client($operationMap);
    }

    /**
     * @var OperationInterface[]
     */
    private $operationMap;

    /**
     * @param OperationInterface[] $operationMap
     */
    private function __construct(array $operationMap)
    {
        $this->operationMap = $operationMap;
    }
}