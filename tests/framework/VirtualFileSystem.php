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
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\Tests\Framework;
require_once 'vfsStream/vfsStream.php';

/**
 * Represents virtual file system for testing purpose.
 *
 * @category  Microsoft
 * @package   PEAR2\Tests\Framework
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class VirtualFileSystem
{
    public static function newFile($contents, $fileName = null, $root = null)
    {
        $root = is_null($root) ? 'root' : $root;
        $fileName = is_null($fileName) ? 'test.txt' : $fileName;

        \vfsStreamWrapper::register();
        \vfsStreamWrapper::setRoot(new \vfsStreamDirectory($root));
        
        $file = \vfsStream::newFile($fileName);
        $file->setContent($contents);
        
        \vfsStreamWrapper::getRoot()->addChild($file);
        $virtualPath = \vfsStream::url($root . '/' . $fileName);
        
        return $virtualPath;
    }
}

?>
