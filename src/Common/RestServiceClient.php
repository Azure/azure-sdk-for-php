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

namespace MicrosoftAzure\Common;

use MicrosoftAzure\Internal\ServiceException;

/**
 * Base class for all service rest clients.
 */
class RestServiceClient
{
    /**
     * @var array
     */
    private $_filters;

    /**
     * @var MicrosoftAzure\Common\Internal\Serialization\ISerializer
     */
    protected $dataSerializer;

    /**
     * @var string
     */
    private $_uri;

    /**
     * Gets HTTP filters that will process each request.
     *
     * @return array
     */
    public function getFilters()
    {
        return $this->_filters;
    }

    /**
     * Gets the Uri of the service.
     *
     * @return string
     */
    public function getUri()
    {
        return $this->_uri;
    }

    /**
     * Sets the Uri of the service.
     *
     * @param string $uri The URI of the request.
     *
     * @return none
     */
    public function setUri($uri)
    {
        $this->_uri = $uri;
    }

    /**
     * Adds new filter to new service rest proxy object and returns that object back.
     *
     * @param MicrosoftAzure\Common\Internal\Filters\IServiceFilter $filter Filter to add for
     *                                                                      the pipeline.
     *
     * @return RestServiceClient.
     */
    public function withFilter($filter)
    {
        $serviceProxyWithFilter = clone $this;
        $serviceProxyWithFilter->_filters[] = $filter;

        return $serviceProxyWithFilter;
    }

    /**
     * Initializes new RestServiceClient object.
     *
     * @param string      $uri            The uri of the service.
     * @param ISerializer $dataSerializer The data serializer.
     */
    public function __construct($uri, $dataSerializer)
    {
        if ($uri[strlen($uri) - 1] != '/') {
            $uri = $uri.'/';
        }

        $this->_filters = array();
        $this->dataSerializer = $dataSerializer;
        $this->_uri = $uri;
    }

    /**
     * Throws ServiceException if the recieved status code is not expected.
     *
     * @param string $actual   The received status code.
     * @param string $reason   The reason phrase.
     * @param string $message  The detailed message (if any).
     * @param string $expected The expected status codes.
     *
     * @return none
     *
     * @static
     *
     * @throws ServiceException
     */
    public static function throwIfError($actual, $reason, $message, $expected)
    {
        $expectedStatusCodes = is_array($expected) ? $expected : array($expected);

        if (!in_array($actual, $expectedStatusCodes)) {
            throw new ServiceException($actual, $reason, $message);
        }
    }
}
