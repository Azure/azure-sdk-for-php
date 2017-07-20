<?php
namespace Microsoft\Rest;

interface OperationInterface
{
    /**
     * @param array $parameters
     * @return OperationResultInterface
     */
    function call(array $parameters);
}