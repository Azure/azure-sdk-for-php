<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\Client;
use Microsoft\Rest\Internal\Data\RootData;

final class ClientStatic
{
    /**
     * @param array $definitionsData
     * @return ClientInterface
     */
    static function createFromData(array $definitionsData)
    {
        return Client::createFromData(RootData::create($definitionsData, "\$definitions"));
    }

    private function __construct() { }
}