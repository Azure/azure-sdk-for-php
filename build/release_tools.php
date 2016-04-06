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
 * @package   WindowsAzure
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

  
/**
 * Update the version number of PHP files, and generate class list
 *
 * 1. change the new_ver const to the correct new version string
 * 2. run php .\build\release_tools.php in the root directory
 *
 */
const ver_token = ' * @version';    
const new_ver = '   Release: 0.4.2_2016-04';
const start_dir = './';   //this will update SDK sources, test sources and examples.   

$updateVersion = true;
$listClass = false;
    
$files_changed = 0;
$output = '';

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(start_dir)) as $filename => $cur)
{
    if (is_dir($filename) || strpos($filename, 'release_tools.php') !== false)
    {
        continue;
    }

    if ($updateVersion)
    {
        $tempfile = $filename . '.tmp';        
        $rhandle = fopen($filename, 'r');
        $whandle = fopen($tempfile, 'w');
        $replaced = false;

        while ( ($buffer = fgets($rhandle, 4096)) !== false) 
        {
            if (strpos($buffer, ver_token) !== false)
            {
                $buffer = ver_token . new_ver . "\n";
                $replaced = true;
            }
            fputs($whandle, $buffer);
        }

        fclose($rhandle); 
        fclose($whandle);
    
        if ($replaced) 
        {
            rename($tempfile, $filename);
            $files_changed++;
        } 
        else 
        {
            unlink($tempfile);
        }
    }
    
    if ($listClass)
    {
        $path_parts = pathinfo($filename);
        if ($path_parts['extension'] == 'php')
        {
            //remove leading . or ..    
            if (strpos($filename, '.') !== false && strpos($filename, '.') == 0)
            {
                $filename = substr($filename, 1);
            }
            if (strpos($filename, '..') !== false && strpos($filename, '..') == 0)
            {    
                $filename = substr($filename, 2);
            }
            $filename = str_replace('/', '\\', $filename);    
            // remove leading \            
            if (strpos($filename, '\\') !== false && strpos($filename, '\\') == 0)
            {
                $filename = substr($filename, 1);
            }    
            $path_parts = pathinfo($filename);
                               
            $classname = $path_parts['dirname'] . '\\' .  $path_parts['filename'];
            $classname = strtolower(str_replace('\\', '\\\\', $classname)); 
                
            // remove the top directory from file name
            if (strpos($filename, '\\') !== false)
            {
                $filename = substr($filename, strpos($filename, '\\'));
            }
            $filename = str_replace('\\', '/', $filename);
              
            //'windowsazure\\table\\tablerestproxy' => '/Table/TableRestProxy.php'      
            $output = $output . "            '$classname' => '$filename',\n";            
        }
    }
}

if ($listClass)
{
    file_put_contents('output.txt', $output);
}
echo sprintf("\nNumber of files updated: %d.\n", $files_changed);