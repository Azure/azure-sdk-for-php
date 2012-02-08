<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'pear2\\services\\queue\\listqueuesresult' => '/Services/Queue/ListQueuesResult.php',
            'pear2\\services\\queue\\queue' => '/Services/Queue/Queue.php',
            'pear2\\services\\queue\\queuecontract' => '/Services/Queue/QueueContract.php',
            'pear2\\services\\queue\\queuerestproxy' => '/Services/Queue/QueueRestProxy.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
