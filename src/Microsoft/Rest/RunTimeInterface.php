<?php
namespace Microsoft\Rest;

interface RunTimeInterface
{
    /**
     * @param array $definitionsData see https://swagger.io/specification/#definitionsObject for more information.
     * @return ClientInterface
     */
    function createClientFromData(array $definitionsData);
}