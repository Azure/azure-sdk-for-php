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
 * @package   Tests\Unit\WindowsAzure\Core\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace Tests\Unit\WindowsAzure\Common\Internal\Atom;
use WindowsAzure\Common\Internal\Atom\Entry;

/**
 * Unit tests for class WrapAccessTokenResult
 *
 * @category  Microsoft
 * @package   Tests\Unit\WindowsAzure\Core\Atom
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class EntryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers WindowsAzure\Services\ServiceBus\Models\Entry::__construct
     */
    public function testEntryConstructor()
    {
        // Setup
        
        // Test
        $entry = new Entry();
        
        // Assert
        $this->assertNotNull($entry);
    }

    public function testEntryGetSetAuthor()
    {
        // Setup 
        $expected = 'testAuthor';
        $entry = new Entry();   
        
        // Test
        $entry->setAuthor($expected);
        $actual = $entry->getAuthor();        
    

        // Assert 
        
    }
    
    public function testEntryGetSetCategory()
    {
    }

    public function testEntryGetSetContent()
    {
    }

    public function testEntryGetSetContributor()
    {
    }

    public function testEntryGetSetId()
    {
    }

    public function testEntryGetSetLink()
    {
    }

    public function testEntryGetSetPublished()
    {
    }

    public function testEntryGetSetRights()
    {
    }

    public function testEntryGetSetSource()
    {
    }

    public function testEntryGetSetSummary()
    {
    }

    public function testEntryGetSetTitle()
    {
    }

    public function testEntryGetSetUpdated()
    {
    }

    public function testEntryGetSetExtensionElement()
    {   
    }

    public function testEntryToXml()
    {
    }

}

?>
