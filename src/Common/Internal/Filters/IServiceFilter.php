<?php

/**
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/Azure/azure-sdk-for-php/blob/arm/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php/tree/arm
 *
 * @version     Release: 0.10.0_2016
 */

namespace MicrosoftAzure\Common\Internal\Filters;

/**
 * ServiceFilter is used for http requests and responses.
 */
interface IServiceFilter
{
    /**
     * Adds header to the request headers.
     *
     * @param $request HTTP channel object.
     *
     * @return $request HTTP channel object.
     */
    public function handleRequest($request);
}
