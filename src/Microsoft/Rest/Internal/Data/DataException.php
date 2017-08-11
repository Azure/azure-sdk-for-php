<?php
namespace Microsoft\Rest\Internal\Data;

class DataException extends \Exception
{
    /**
     * @param DataAbstract $data
     * @param string $message
     */
    function __construct(DataAbstract $data, $message = '')
    {
        parent::__construct($message
            . "\nURI: "
            . $data->getPath());
    }
}