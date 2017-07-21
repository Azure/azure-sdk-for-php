<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;

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