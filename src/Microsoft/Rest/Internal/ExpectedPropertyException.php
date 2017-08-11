<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Data\DataException;

class ExpectedPropertyException extends DataException
{
    /**
     * ExpectedPropertyException constructor.
     * @param DataAbstract $data
     * @param string $propertyName
     */
    function __construct(DataAbstract $data, $propertyName)
    {
        parent::__construct($data, 'expected property: ' . $propertyName);
    }
}