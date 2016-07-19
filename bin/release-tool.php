#!/usr/bin/env php

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

/**
 * Update the version number of PHP files, and generate class list.
 *
 * 1. change the NEW_VER const to the correct new version string
 * 2. run php .\bin\release-tool.php in the root directory
 */
//const VER_TOKEN = ' * @version';
//const NEW_VER = '   Release: 0.4.3_2016-05';
//$startDir = __DIR__.'/../'; //this will update SDK sources, test sources and examples.

const OLD_TOKEN = '';
const NEW_TOKEN = '';

 const OLD_TOKEN_MULTI_LINE =
'
  */';


 const NEW_TOKEN_MULTI_LINE =
'
 */';

$startDir = __DIR__.'/../src';



$updateVersion = false;
$listClass = false;

$files_changed = 0;
$output = '';

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($startDir)) as $filename => $cur) {
    if (is_dir($filename) || strpos($filename, 'release_tools.php') !== false) {
        continue;
    }

    $replaced = false;
    if (!empty(NEW_TOKEN_MULTI_LINE))
    {
        $content = file_get_contents($filename);
        if (strpos($content, OLD_TOKEN_MULTI_LINE) !== false)
        {
            $content = str_replace(OLD_TOKEN_MULTI_LINE, NEW_TOKEN_MULTI_LINE, $content);
            file_put_contents($filename, $content);
            $replaced = true;
        }
    }

    if ($updateVersion) {
        $tempfile = $filename.'.tmp';
        $rhandle = fopen($filename, 'r');
        $whandle = fopen($tempfile, 'w');

        while (($buffer = fgets($rhandle, 4096)) !== false) {
            if (strpos($buffer, OLD_TOKEN) !== false) {
                $buffer = str_replace(OLD_TOKEN, NEW_TOKEN, $buffer);
                $replaced = true;
            }
            fputs($whandle, $buffer);
        }

        fclose($rhandle);
        fclose($whandle);

        if ($replaced) {
            rename($tempfile, $filename);
        } else {
            unlink($tempfile);
        }
    }

    if ($replaced) {
       ++$files_changed;
    }

    if ($listClass) {
        $path_parts = pathinfo($filename);
        if (array_key_exists('extension', $path_parts) && $path_parts['extension'] == 'php') {
            //remove leading . or ..
            if (strpos($filename, '.') !== false && strpos($filename, '.') == 0) {
                $filename = substr($filename, 1);
            }
            if (strpos($filename, '..') !== false && strpos($filename, '..') == 0) {
                $filename = substr($filename, 2);
            }
            $filename = str_replace('/', '\\', $filename);
            // remove leading \
            if (strpos($filename, '\\') !== false && strpos($filename, '\\') == 0) {
                $filename = substr($filename, 1);
            }
            $path_parts = pathinfo($filename);

            $classname = $path_parts['dirname'].'\\'.$path_parts['filename'];
            $classname = strtolower(str_replace('\\', '\\\\', $classname));

            // remove the top directory from file name
            if (strpos($filename, '\\') !== false) {
                $filename = substr($filename, strpos($filename, '\\'));
            }
            $filename = str_replace('\\', '/', $filename);

            //'src\\table\\tablerestproxy' => '/Table/TableRestProxy.php'
            $output = $output."            '$classname' => '$filename',\n";
        }
    }
}

if ($listClass) {
    file_put_contents('output.txt', $output);
}
echo sprintf("\nNumber of files updated: %d.\n", $files_changed);
