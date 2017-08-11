<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Data\MapData;
use Microsoft\Rest\Internal\Https\HttpsInterface;
use Microsoft\Rest\Internal\Swagger2\SwaggerObject;
use Microsoft\Rest\RunTimeInterface;
use Microsoft\Rest\ClientInterface;

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
     * @param array $schemaObjectData see https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#swagger-object
     *                                for more information.
     * @param array $shareParameterMap
     * @return ClientInterface
     */
    function createClientFromData(array $schemaObjectData, array $shareParameterMap)
    {
        return Client::createFromData(
            $this->https,
            new SwaggerObject($schemaObjectData),
            $shareParameterMap);
    }

    /**
     * @var HttpsInterface
     */
    private $https;
}