<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

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