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
require_once __DIR__.'/../../vendor/autoload.php';

spl_autoload_register(
   function ($class) {
      static $classes = null;
      if ($classes === null) {
          $classes = array(
            'client\\cloudstorageservice' => '/CloudStorageService.php',
            'client\\cloudsubscription' => '/CloudSubscription.php',
            'client\\cloudtable' => '/CloudTable.php',
            'client\\errormessages' => '/ErrorMessages.php',
            'client\\windowsazureerrorcodes' => '/WindowsAzureErrorCodes.php',
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
          require __DIR__.$classes[$cn];
      }
   }
);
