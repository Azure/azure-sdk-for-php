<?php
require_once 'autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'client\\cloudstorageservice' => '/Client/CloudStorageService.php',
			'client\\cloudsubscription' => '/Client/CloudSubscription.php',
			'client\\cloudtable' => '/Client/CloudTable.php',
			'client\\errormessages' => '/Client/ErrorMessages.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
