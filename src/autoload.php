<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'pear2\\windowsazure\\core\\ihttpproxy' => '/WindowsAzure/Core/IHttpProxy.php',
            'pear2\\windowsazure\\services\\configuration' => '/WindowsAzure/Services/Core/Configuration.php',
            'pear2\\windowsazure\\services\\core\\httpproxy' => '/WindowsAzure/Core/HttpProxy.php',
            'pear2\\windowsazure\\services\\queue\\iqueue' => '/WindowsAzure/Services/Queue/IQueue.php',
            'pear2\\windowsazure\\services\\queue\\queue' => '/WindowsAzure/Services/Queue/Queue.php',
            'pear2\\windowsazure\\services\\queue\\queueexceptionprocessor' => '/WindowsAzure/Services/Queue/QueueExceptionProcessor.php',
            'pear2\\windowsazure\\services\\queue\\queuerestproxy' => '/WindowsAzure/Services/Queue/QueueRestProxy.php',
            'pear2\\windowsazure\\services\\queue\\queueservice' => '/WindowsAzure/Services/Queue/QueueService.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
