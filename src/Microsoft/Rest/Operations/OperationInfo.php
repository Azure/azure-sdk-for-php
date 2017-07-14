<?php
namespace Microsoft\Rest\Operations;

use Microsoft\Rest\Parameters\ParameterInfo;

final class OperationInfo
{
    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $operationId
     * @return OperationInfo
     */
    public static function create($operationId)
    {
        $result = new self;
        $result->operationId = $operationId;
        return $result;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function addParameter($name)
    {
        $this->parameters[] = ParameterInfo::create($name);
        return $this;
    }

    private function __construct()
    {
    }

    /**
     * @var string $operationId
     */
    private $operationId;

    /**
     * @var ParameterInfo[]
     */
    private $parameters;
}
