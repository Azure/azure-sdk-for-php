<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

class SchemaObjectException extends \Exception
{
    /**
     * @param DataAbstract $data
     * @param string $message
     */
    function __construct(DataAbstract $data, $message = '')
    {
        parent::__construct($message
            . "\nObject: "
            . $data->getPhpCode()
            . "\nPath: "
            . $data->getPath());
    }
}