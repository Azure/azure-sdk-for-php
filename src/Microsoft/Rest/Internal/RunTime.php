<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\RunTimeInterface;
use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\RootData;

final class RunTime implements RunTimeInterface
{

    /**
     * @param array $schemaObjectData see https://swagger.io/specification/#definitionsObject for more information.
     * @return ClientInterface
     */
    function createClientFromData(array $schemaObjectData)
    {
        return Client::createFromData(RootData::create($schemaObjectData, ''));
    }
}