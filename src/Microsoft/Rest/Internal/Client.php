<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Data\MapData;
use Microsoft\Rest\Internal\Data\RootData;
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

        /**
         * @var OperationInterface[]
         */
        $operationMap = [];
        foreach ($swaggerObjectData->getChild('paths')->getChildren() as $pathItemObjectData) {
            $path = $pathItemObjectData->getKey();
            foreach ($pathItemObjectData->getChildren() as $operationData) {
                $httpMethod = $operationData->getKey();
                $operation = Operation::createFromOperationData($typeMap, $operationData, $path, $httpMethod);
                $operationMap[$operation->getId()] = $operation;
            }
        }

        $client =new Client(
            $swaggerObjectData->getChildValue('host'),
            $operationMap);

        return $client;
    }

    /**
     * @param string $name
     * @return TypeAbstract|null
     */
    //function getType($name)
    //{
    //    return isset($this->typeMap[$name]) ? $this->typeMap[$name] : null;
    //}

    /**
     * @var string
     */
    private $host;

    /**
     * @var OperationInterface[]
     */
    private $operationMap;

    /**
     * @param string $host
     * @param OperationInterface[] $operationMap
     */
    private function __construct(
        $host,
        array $operationMap)
    {
        $this->host = $host;
        $this->operationMap = $operationMap;
    }
}