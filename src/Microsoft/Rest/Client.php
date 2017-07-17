<?php
namespace Microsoft\Rest;

final class Client
{
    /**
     * @param string $operationId
     * @param string $httpMethod
     * @return Operation
     */
    function createOperation($operationId, $httpMethod)
    {
        return new Operation($this, $operationId, $httpMethod);
    }

    function createOperationFromData($path, $httpMethod, array $data)
    {
        return new Operation($this, $data["operationId"], )
    }
}
