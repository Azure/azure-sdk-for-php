<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\Common\Models;

use WindowsAzure\Common\Internal\Serialization\XmlSerializer;

/**
 * Encapsulates service properties.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ServiceProperties
{
    /**
     * @var Logging
     */
    private $_logging;

    /**
     * @var Metrics
     */
    private $_metrics;

    public static $xmlRootName = 'StorageServiceProperties';

    /**
     * Creates ServiceProperties object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array
     *
     * @return ServiceProperties
     */
    public static function create(array $parsedResponse)
    {
        $result = new self();
        $result->setLogging(Logging::create($parsedResponse['Logging']));
        $result->setMetrics(Metrics::create($parsedResponse['Metrics']));

        return $result;
    }

    /**
     * Gets logging element.
     *
     * @return Logging
     */
    public function getLogging()
    {
        return $this->_logging;
    }

    /**
     * Sets logging element.
     *
     * @param Logging $logging new element
     */
    public function setLogging(Logging $logging)
    {
        $this->_logging = clone $logging;
    }

    /**
     * Gets metrics element.
     *
     * @return Metrics
     */
    public function getMetrics()
    {
        return $this->_metrics;
    }

    /**
     * Sets metrics element.
     *
     * @param Metrics $metrics new element
     */
    public function setMetrics(Metrics $metrics)
    {
        $this->_metrics = clone $metrics;
    }

    /**
     * Converts this object to array with XML tags.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'Logging' => !empty($this->_logging) ? $this->_logging->toArray() : null,
            'Metrics' => !empty($this->_metrics) ? $this->_metrics->toArray() : null,
        ];
    }

    /**
     * Converts this current object to XML representation.
     *
     * @param XmlSerializer $xmlSerializer The XML serializer
     *
     * @return string
     */
    public function toXml($xmlSerializer)
    {
        $properties = [XmlSerializer::ROOT_NAME => self::$xmlRootName];

        return $xmlSerializer->serialize($this->toArray(), $properties);
    }
}
