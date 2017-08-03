<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Https\HttpsInterface;
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
     * @param HttpsInterface $https
     * @param DataAbstract $swaggerObjectData
     * @param array $sharedParameterMap
     * @return ClientInterface
     */
    static function createFromData(
        HttpsInterface $https,
        DataAbstract $swaggerObjectData,
        array $sharedParameterMap)
    {
        $typeMap = TypeAbstract::createMapFromData(
            $swaggerObjectData->getChild('definitions'),
            '#/definitions/');
        $typeMap = TypeAbstract::removeRefTypesFromMap($typeMap, $typeMap);

        $shared = new OperationShared(
            $https,
            $swaggerObjectData->getChildValue('host'));

        /** @var OperationInterface[] */
        $operationMap = [];
        foreach ($swaggerObjectData->getChild('paths')->getChildren() as $pathItemObjectData) {
            $pathStr = $pathItemObjectData->getKey();
            $path = PathStrPart::parse($pathStr);
            foreach ($pathItemObjectData->getChildren() as $operationData) {
                $httpMethod = $operationData->getKey();
                $operation = Operation::createFromOperationData(
                    $shared,
                    $typeMap,
                    $sharedParameterMap,
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