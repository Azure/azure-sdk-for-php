<?php
namespace Microsoft\Rest;

interface ClientInterface
{
    /**
     * @param string $path see https://swagger.io/docs/specification/paths-and-operations/ for path templating.
     * @param string $httpMethod see https://swagger.io/specification/#pathItemObject for more details.
     * @param array $operationData see https://swagger.io/specification/#operationObject for more details.
     * @return OperationInterface
     */
    function createOperationFromData($path, $httpMethod, array $operationData);
}