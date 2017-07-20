<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\DataAbstract;
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
    function createOperation($path, $httpMethod, array $operationData)
    {
        return Operation::create($this);
    }

    /**
     * @param DataAbstract $definitionsData
     * @return ClientInterface
     */
    static function createFromData(DataAbstract $definitionsData)
    {
        $client =new Client(TypeAbstract::createMapFromData(
            $definitionsData, '#/definitions/'));
        $client->updateMapRefs($client->typeMap);
        return $client;
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract[]
     */
    function updateMapRefs(array $typeMap)
    {
        /**
         * @var TypeAbstract[]
         */
        $result = [];
        foreach ($typeMap as $name => $value) {
            $result[$name] = $value->updateRefs($this);
        }
        return $result;
    }

    /**
     * @param string $name
     * @return TypeAbstract
     */
    function getType($name)
    {
        if (!isset($this->typeMap[$name])) {
            throw new UnknownTypeNameException($name);
        }
        return $this->typeMap[$name];
    }

    /**
     * @var TypeAbstract[]
     */
    private $typeMap;

    /**
     * @param TypeAbstract[] $typeMap
     */
    private function __construct(array $typeMap)
    {
        $this->typeMap = $typeMap;
    }
}