<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Core\Exceptions
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Core\Exceptions;
use PEAR2\WindowsAzure\Resources;

/**
 * Fires when the response code is incorrect
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Core\Exceptions
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceException extends \LogicException
{
    private $stringValue;
    private $message;
    
    /**
     * Constructor
     *
     * @param string $errorCode   status error code.
     * @param string $stringValue the string value of the error code.
     * @param string $message     the detailed message for the error.
     * 
     * @return PEAR2\WindowsAzure\Core\Exceptions\ServiceException
     */
    public function __construct($errorCode, $stringValue = null, $message = null)
    {
        parent::__construct(
            sprintf(Resources::AZURE_ERROR_MSG, $errorCode, $stringValue, $message)
        );
        $this->code        = $errorCode;
        $this->stringValue = $stringValue;
        // Need to improve message parsing issue #32
        $this->message     = $message;
    }
}

?>
