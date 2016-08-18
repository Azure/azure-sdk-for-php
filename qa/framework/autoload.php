<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
             'ext\\microsoft\\windowsazure\\services\\queue\\assert' => '/Assert.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\fiddlerfilter' => '/FiddlerFilter.php',
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
