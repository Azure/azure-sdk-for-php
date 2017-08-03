<?php
namespace Microsoft\Rest;

interface RunTimeInterface
{
    /**
     * @param array $schemaObjectData see https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#swagger-object
     *                                for more information.
     * @param array $sharedParameterMap
     * @return ClientInterface
     */
    function createClientFromData(array $schemaObjectData, array $sharedParameterMap);
}