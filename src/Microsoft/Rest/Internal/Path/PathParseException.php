<?php
namespace Microsoft\Rest\Internal\Path;

final class PathParseException extends \Exception
{
    /**
     * @param string $message
     * @param string $path
     */
    function __construct($message, $path)
    {
        parent::__construct($message . ': \'' . $path . '\'');
    }
}