<?php
namespace Microsoft\Rest;

interface ClientInterface
{
    /**
     * @param string $operationId
     * @return OperationInterface
     */
    function createOperation($operationId);
}