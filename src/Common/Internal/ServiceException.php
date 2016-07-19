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

use MicrosoftAzure\Common\Internal\Resources;

/**
 * Fires when the response code is incorrect.
 */
class ServiceException extends \LogicException
{
    private $_error;
    private $_reason;

    /**
     * Constructor.
     *
     * @param string $errorCode status error code.
     * @param string $error     string value of the error code.
     * @param string $reason    detailed message for the error.
     *
     * @return MicrosoftAzure\Internal\ServiceException
     */
    public function __construct($errorCode, $error = null, $reason = null)
    {
        parent::__construct(
            sprintf(Resources::AZURE_ERROR_MSG, $errorCode, $error, $reason)
        );
        $this->code = $errorCode;
        $this->_error = $error;
        $this->_reason = $reason;
    }

    /**
     * Gets error text.
     *
     * @return string
     */
    public function getErrorText()
    {
        return $this->_error;
    }

    /**
     * Gets detailed error reason.
     *
     * @return string
     */
    public function getErrorReason()
    {
        return $this->_reason;
    }
}
