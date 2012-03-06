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
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Queue\Models;
use PEAR2\WindowsAzure\Services\Queue\Models\Logging;
use PEAR2\WindowsAzure\Services\Queue\Models\Metrics;
use PEAR2\WindowsAzure\Utilities;

/**
 * Encapsulates service properties
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Queue\Models
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ServiceProperties
{
    private $_logging;
    private $_metrics;
    public static $xmlRootName = 'StorageServiceProperties';
    
    /**
     * Creates ServiceProperties object from parsed XML response.
     *
     * @param array $parsedResponse XML response parsed into array.
     * 
     * @return PEAR2\WindowsAzure\Services\Queue\Models\ServiceProperties.
     */
    public static function create($parsedResponse)
    {
        $result = new ServiceProperties();
        $result->setLogging(Logging::create($parsedResponse['Logging']));
        $result->setMetrics(Metrics::create($parsedResponse['Metrics']));
        
        return $result;
    }
    
    /**
     * Gets logging element.
     *
     * @return PEAR2\WindowsAzure\Services\Queue\Models\Logging.
     */
    public function getLogging()
    {
        return $this->_logging;
    }
    
    /**
     * Sets logging element.
     *
     * @param PEAR2\WindowsAzure\Services\Queue\Models\Logging $logging new element.
     * 
     * @return none.
     */
    public function setLogging($logging)
    {
        $this->_logging = clone $logging;
    }
    
    /**
     * Gets metrics element.
     *
     * @return PEAR2\WindowsAzure\Services\Queue\Models\Metrics.
     */
    public function getMetrics()
    {
        return $this->_metrics;
    }
    
    /**
     * Sets metrics element.
     *
     * @param PEAR2\WindowsAzure\Services\Queue\Models\Metrics $metrics new element.
     * 
     * @return none.
     */
    public function setMetrics($metrics)
    {
        $this->_metrics = clone $metrics;
    }
    
    /**
     * Converts this object to array with XML tags
     * 
     * @return array. 
     */
    public function toArray()
    {
        return array(
            'Logging' => $this->_logging->toArray(),
            'Metrics' => $this->_metrics->toArray(),
        );
    }
    
    /**
     * Converts this current object to XML representation.
     * 
     * @return string
     */
    public function toXml()
    {
        return Utilities::serialize($this->toArray(), self::$xmlRootName);
    }
}

?>
