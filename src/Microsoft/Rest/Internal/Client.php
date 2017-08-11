<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Https\HttpsInterface;
use Microsoft\Rest\Internal\Path\PathStrPart;
use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Swagger2\SwaggerObject;
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
     * @param SwaggerObject $swaggerObjectData
     * @param array $sharedParameterMap
     * @return ClientInterface
     */
    static function createFromData(
        HttpsInterface $https,
        SwaggerObject $swaggerObjectData,
        array $sharedParameterMap)
    {
        $definitionsObject = Definitions::createFromData(
            $swaggerObjectData->definitions());

        $shared = new OperationShared(
            $https,
            $swaggerObjectData->host());

        /** @var OperationInterface[] */
        $operationMap = [];
        foreach ($swaggerObjectData->paths()->getChildren() as $pathItemObjectData) {
            $pathStr = $pathItemObjectData->getKey();
            $path = PathStrPart::parse($pathStr);
            foreach ($pathItemObjectData->getChildren() as $operationData) {
                $httpMethod = $operationData->getKey();
                $operation = Operation::createFromOperationData(
                    $shared,
                    $definitionsObject,
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