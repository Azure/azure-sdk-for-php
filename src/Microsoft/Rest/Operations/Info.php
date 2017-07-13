<?php
namespace Microsoft\Rest\Operations;

final class Info
{
    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     * @return Info
     */
    public static function create($operationId)
    {
        $result = new self;
        $result->operationId = $operationId;
        return $result;
    }

    private function __construct()
    {
    }

    /**
     * @var string $operationId
     */
    private $operationId;
}
