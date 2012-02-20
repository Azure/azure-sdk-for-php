<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'pear2\\windowsazure\\core\\exceptions\\invalidargumenttypeexception' => '/WindowsAzure/Core/Exceptions/InvalidArgumentTypeException.php',
            'pear2\\windowsazure\\core\\ihttpclient' => '/WindowsAzure/Core/IHttpClient.php',
            'pear2\\windowsazure\\core\\iservicefilter' => '/WindowsAzure/Core/IServiceFilter.php',
            'pear2\\windowsazure\\resources' => '/WindowsAzure/Resources.php',
            'pear2\\windowsazure\\services\\core\\authentication\\azureauthentication' => '/WindowsAzure/Services/Core/Authentication/AzureAuthentication.php',
            'pear2\\windowsazure\\services\\core\\authentication\\blobqueuesharedkey' => '/WindowsAzure/Services/Core/Authentication/BlobQueueSharedKey.php',
            'pear2\\windowsazure\\services\\core\\configuration' => '/WindowsAzure/Services/Core/Configuration.php',
            'pear2\\windowsazure\\services\\core\\filters\\datefilter' => '/WindowsAzure/Services/Core/Filters/DateFilter.php',
            'pear2\\windowsazure\\services\\core\\filters\\sharedkeyfilter' => '/WindowsAzure/Services/Core/Filters/SharedKeyFilter.php',
            'pear2\\windowsazure\\services\\core\\httpclient' => '/WindowsAzure/Core/HttpClient.php',
            'pear2\\windowsazure\\services\\core\\iservicebuilder' => '/WindowsAzure/Services/Core/IServiceBuilder.php',
            'pear2\\windowsazure\\services\\core\\servicesbuilder' => '/WindowsAzure/Services/Core/DefaultBuilder.php',
            'pear2\\windowsazure\\services\\queue\\iqueue' => '/WindowsAzure/Services/Queue/IQueue.php',
            'pear2\\windowsazure\\services\\queue\\queue' => '/WindowsAzure/Services/Queue/Queue.php',
            'pear2\\windowsazure\\services\\queue\\queueconfiguration' => '/WindowsAzure/Services/Queue/QueueConfiguration.php',
            'pear2\\windowsazure\\services\\queue\\queueexceptionprocessor' => '/WindowsAzure/Services/Queue/QueueExceptionProcessor.php',
            'pear2\\windowsazure\\services\\queue\\queuerestproxy' => '/WindowsAzure/Services/Queue/QueueRestProxy.php',
            'pear2\\windowsazure\\services\\queue\\queueservice' => '/WindowsAzure/Services/Queue/QueueService.php',
            'pear2\\windowsazure\\utilities\\logger' => '/WindowsAzure/Utilities/Logger.php',
            'pear2\\windowsazure\\utilities\\validate' => '/WindowsAzure/Utilities/Validate.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
