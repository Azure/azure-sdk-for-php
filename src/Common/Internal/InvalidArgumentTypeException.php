<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/yaqiyang/php-sdk-dev/blob/master/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal;

/**
 * Exception thrown if an argument type does not match with the expected type.
 */
class InvalidArgumentTypeException extends \InvalidArgumentException
{
    /**
     * Constructor.
     *
     * @param string $validType The valid type that should be provided by the user.
     * @param string $name      The parameter name.
     *
     * @return MicrosoftAzure\Common\Internal\InvalidArgumentTypeException
     */
    public function __construct($validType, $name = null)
    {
        parent::__construct(
            sprintf(Resources::INVALID_PARAM_MSG, $name, $validType)
        );
    }
}
