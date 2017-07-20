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
        return new Client(TypeAbstract::createMapFromData($definitionsData));
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