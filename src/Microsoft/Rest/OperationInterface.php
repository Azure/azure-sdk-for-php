<?php
namespace Microsoft\Rest;

interface OperationInterface
{
    /**
     * @param array $parameters
     * @return mixed
     */
    function call(array $parameters);
}