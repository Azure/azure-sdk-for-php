<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'configurationtesttest' => '/unit/WindowsAzure/Services/Core/ConfigurationTest.php',
            'pear2\\tests\\unit\\testresources' => '/unit/TestResources.php',
            'queuerestproxytest' => '/unit/WindowsAzure/Services/Queue/QueueRestProxyTest.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
