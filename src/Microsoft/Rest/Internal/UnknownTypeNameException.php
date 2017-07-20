<?php
namespace Microsoft\Rest\Internal;

final class UnknownTypeNameException extends \Exception
{
    /**
     * @param string $name
     */
    function __construct($name)
    {
        parent::__construct("unknown type name: " . $name);
    }
}