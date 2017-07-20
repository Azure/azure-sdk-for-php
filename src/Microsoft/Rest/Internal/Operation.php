<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\OperationInterface;
use Microsoft\Rest\OperationResultInterface;

final class Operation implements OperationInterface
{
    /**
     * @param array $parameters
     * @return OperationResultInterface
     */
    function call(array $parameters)
    {
        return new OperationResult();
    }

    /**
     * @param Client $client
     * @return OperationInterface
     */
    static function create(Client $client)
    {
        return new Operation($client);
    }

    /**
     * @var Client
     */
    private $client;

    private function __construct(Client $client)
    {
        $this->client = $client;
    }
}