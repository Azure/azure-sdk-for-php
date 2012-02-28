<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'pear2\\windowsazure\\core\\ihttpclient' => '/WindowsAzure/Core/IHttpClient.php',
            'pear2\\windowsazure\\core\\invalidargumenttypeexception' => '/WindowsAzure/Core/InvalidArgumentTypeException.php',
            'pear2\\windowsazure\\core\\iservicefilter' => '/WindowsAzure/Core/IServiceFilter.php',
            'pear2\\windowsazure\\core\\iurl' => '/WindowsAzure/Core/IUrl.php',
            'pear2\\windowsazure\\core\\url' => '/WindowsAzure/Core/Url.php',
            'pear2\\windowsazure\\resources' => '/WindowsAzure/Resources.php',
            'pear2\\windowsazure\\services\\core\\authentication\\sharedkeyauthenticationscheme' => '/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationScheme.php',
            'pear2\\windowsazure\\services\\core\\authentication\\storageauthenticationscheme' => '/WindowsAzure/Services/Core/Authentication/StorageAuthenticationScheme.php',
            'pear2\\windowsazure\\services\\core\\configuration' => '/WindowsAzure/Services/Core/Configuration.php',
            'pear2\\windowsazure\\services\\core\\filters\\datefilter' => '/WindowsAzure/Services/Core/Filters/DateFilter.php',
            'pear2\\windowsazure\\services\\core\\filters\\sharedkeyfilter' => '/WindowsAzure/Services/Core/Filters/SharedKeyFilter.php',
            'pear2\\windowsazure\\services\\core\\httpclient' => '/WindowsAzure/Core/HttpClient.php',
            'pear2\\windowsazure\\services\\core\\iservicebuilder' => '/WindowsAzure/Services/Core/IServiceBuilder.php',
            'pear2\\windowsazure\\services\\core\\servicesbuilder' => '/WindowsAzure/Services/Core/ServicesBuilder.php',
            'pear2\\windowsazure\\services\\queue\\iqueue' => '/WindowsAzure/Services/Queue/IQueue.php',
            'pear2\\windowsazure\\services\\queue\\models\\listqueueoptions' => '/WindowsAzure/Services/Queue/Models/ListQueueOptions.php',
            'pear2\\windowsazure\\services\\queue\\models\\listqueueresult' => '/WindowsAzure/Services/Queue/Models/ListQueueResult.php',
            'pear2\\windowsazure\\services\\queue\\models\\queue' => '/WindowsAzure/Services/Queue/Models/Queue.php',
            'pear2\\windowsazure\\services\\queue\\models\\queueserviceoptions' => '/WindowsAzure/Services/Queue/Models/QueueServiceOptions.php',
            'pear2\\windowsazure\\services\\queue\\queueexceptionprocessor' => '/WindowsAzure/Services/Queue/QueueExceptionProcessor.php',
            'pear2\\windowsazure\\services\\queue\\queuerestproxy' => '/WindowsAzure/Services/Queue/QueueRestProxy.php',
            'pear2\\windowsazure\\services\\queue\\queueservice' => '/WindowsAzure/Services/Queue/QueueService.php',
            'pear2\\windowsazure\\services\\queue\\queuesettings' => '/WindowsAzure/Services/Queue/QueueSettings.php',
            'pear2\\windowsazure\\utilities\\logger' => '/WindowsAzure/Utilities/Logger.php',
            'pear2\\windowsazure\\utilities\\utilities' => '/WindowsAzure/Utilities/Utilities.php',
            'pear2\\windowsazure\\utilities\\validate' => '/WindowsAzure/Utilities/Validate.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
