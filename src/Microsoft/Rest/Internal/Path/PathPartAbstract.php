<?php
namespace Microsoft\Rest\Internal\Path;

abstract class PathPartAbstract
{
    /**
     * @param array $parameters
     * @return string
     */
    abstract function getValue(array $parameters);
}