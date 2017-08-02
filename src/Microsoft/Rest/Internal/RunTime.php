<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Https\HttpsInterface;
use Microsoft\Rest\RunTimeInterface;
use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\RootData;

final class RunTime implements RunTimeInterface
{
    /**
     * @param HttpsInterface $https
     */
    function __construct(HttpsInterface $https)
    {
        $this->https = $https;
    }

    /**
     * @param array $schemaObjectData see https://swagger.io/specification/#definitionsObject for more information.
     * @return ClientInterface
     */
    function createClientFromData(array $schemaObjectData)
    {
        return Client::createFromData($this->https, RootData::create($schemaObjectData, ''));
    }

    /**
     * @var HttpsInterface
     */
    private $https;
}