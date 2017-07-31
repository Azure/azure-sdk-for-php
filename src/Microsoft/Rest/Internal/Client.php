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
     * @param string $path see https://swagger.io/docs/specification/paths-and-operations/ for path templating.
     * @param string $httpMethod see https://swagger.io/specification/#pathItemObject for more details.
     * @param array $operationData see https://swagger.io/specification/#operationObject for more details.
     * @return OperationInterface
     */
    function createOperationFromData($path, $httpMethod, array $operationData)
    {
        return Operation::createFromOperationData(
            $this->typeMap,
            RootData::create(
                $operationData,
                MapData::appendPathKey(MapData::appendPathKey('$paths', $path), $httpMethod)));
    }

    /**
     * @param DataAbstract $definitionsData
     * @return ClientInterface
     */
    static function createFromData(DataAbstract $definitionsData)
    {
        $typeMap = TypeAbstract::createMapFromData(
            $definitionsData->getChild('definitions'),
            '#/definitions/');
        $typeMap = TypeAbstract::removeRefTypesFromMap($typeMap, $typeMap);
        $client =new Client(
            $definitionsData->getChildValue('host'),
            [],
            $typeMap);
        return $client;
    }

    /**
     * @param string $name
     * @return TypeAbstract|null
     */
    function getType($name)
    {
        return isset($this->typeMap[$name]) ? $this->typeMap[$name] : null;
    }

    /**
     * @var string
     */
    private $host;

    /**
     * @var OperationInterface
     */
    private $operations;

    /**
     * @var TypeAbstract[]
     */
    private $typeMap;

    /**
     * @param string $host
     * @param array $operations
     * @param TypeAbstract[] $typeMap
     */
    private function __construct(
        $host,
        array $operations,
        array $typeMap)
    {
        $this->host = $host;
        $this->operations = $operations;
        $this->typeMap = $typeMap;
    }
}