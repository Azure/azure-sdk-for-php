<?php
require_once 'autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'client\\cloudstorageservice' => '/CloudStorageService.php',
			'client\\cloudsubscription' => '/CloudSubscription.php',
			'client\\cloudtable' => '/CloudTable.php',
			'client\\errormessages' => '/ErrorMessages.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
