<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'pear2\\windowsazure\\core\\azureutilities' => '/WindowsAzure/Core/AzureUtilities.php',
            'pear2\\windowsazure\\core\\ihttpclient' => '/WindowsAzure/Core/IHttpClient.php',
            'pear2\\windowsazure\\core\\invalidargumenttypeexception' => '/WindowsAzure/Core/InvalidArgumentTypeException.php',
            'pear2\\windowsazure\\core\\iservicefilter' => '/WindowsAzure/Core/IServiceFilter.php',
            'pear2\\windowsazure\\core\\iurl' => '/WindowsAzure/Core/IUrl.php',
            'pear2\\windowsazure\\core\\serviceexception' => '/WindowsAzure/Core/ServiceException.php',
            'pear2\\windowsazure\\core\\url' => '/WindowsAzure/Core/Url.php',
            'pear2\\windowsazure\\logger' => '/WindowsAzure/Logger.php',
            'pear2\\windowsazure\\resources' => '/WindowsAzure/Resources.php',
            'pear2\\windowsazure\\services\\blob\\blobrestproxy' => '/WindowsAzure/Services/Blob/BlobRestProxy.php',
            'pear2\\windowsazure\\services\\blob\\blobservice' => '/WindowsAzure/Services/Blob/BlobService.php',
            'pear2\\windowsazure\\services\\blob\\blobsettings' => '/WindowsAzure/Services/Blob/BlobSettings.php',
            'pear2\\windowsazure\\services\\blob\\iblob' => '/WindowsAzure/Services/Blob/IBlob.php',
            'pear2\\windowsazure\\services\\blob\\models\\blobserviceoptions' => '/WindowsAzure/Services/Blob/Models/BlobServiceOptions.php',
            'pear2\\windowsazure\\services\\blob\\models\\container' => '/WindowsAzure/Services/Blob/Models/Container.php',
            'pear2\\windowsazure\\services\\blob\\models\\containerproperties' => '/WindowsAzure/Services/Blob/Models/ContainerProperties.php',
            'pear2\\windowsazure\\services\\blob\\models\\createcontaineroptions' => '/WindowsAzure/Services/Blob/Models/CreateContainerOptions.php',
            'pear2\\windowsazure\\services\\blob\\models\\getcontainerpropertiesresult' => '/WindowsAzure/Services/Blob/Models/GetContainerPropertiesResult.php',
            'pear2\\windowsazure\\services\\blob\\models\\listcontainersoptions' => '/WindowsAzure/Services/Blob/Models/ListContainersOptions.php',
            'pear2\\windowsazure\\services\\blob\\models\\listcontainersresult' => '/WindowsAzure/Services/Blob/Models/ListContainersResult.php',
            'pear2\\windowsazure\\services\\core\\authentication\\sharedkeyauthenticationscheme' => '/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationScheme.php',
            'pear2\\windowsazure\\services\\core\\authentication\\storageauthenticationscheme' => '/WindowsAzure/Services/Core/Authentication/StorageAuthenticationScheme.php',
            'pear2\\windowsazure\\services\\core\\configuration' => '/WindowsAzure/Services/Core/Configuration.php',
            'pear2\\windowsazure\\services\\core\\filters\\datefilter' => '/WindowsAzure/Services/Core/Filters/DateFilter.php',
            'pear2\\windowsazure\\services\\core\\filters\\sharedkeyfilter' => '/WindowsAzure/Services/Core/Filters/SharedKeyFilter.php',
            'pear2\\windowsazure\\services\\core\\httpclient' => '/WindowsAzure/Core/HttpClient.php',
            'pear2\\windowsazure\\services\\core\\iservicebuilder' => '/WindowsAzure/Services/Core/IServiceBuilder.php',
            'pear2\\windowsazure\\services\\core\\models\\azurequeuemessage' => '/WindowsAzure/Services/Queue/Models/AzureQueueMessage.php',
            'pear2\\windowsazure\\services\\core\\models\\createmessageoptions' => '/WindowsAzure/Services/Queue/Models/CreateMessageOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\createqueueoptions' => '/WindowsAzure/Services/Queue/Models/CreateQueueOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\getqueuemetadataresult' => '/WindowsAzure/Services/Queue/Models/GetQueueMetadataResult.php',
            'pear2\\windowsazure\\services\\core\\models\\getservicepropertiesresult' => '/WindowsAzure/Services/Queue/Models/GetServicePropertiesResult.php',
            'pear2\\windowsazure\\services\\core\\models\\listmessagesoptions' => '/WindowsAzure/Services/Queue/Models/ListMessagesOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\listmessagesresult' => '/WindowsAzure/Services/Queue/Models/ListMessagesResult.php',
            'pear2\\windowsazure\\services\\core\\models\\listqueuesoptions' => '/WindowsAzure/Services/Queue/Models/ListQueuesOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\listqueuesresult' => '/WindowsAzure/Services/Queue/Models/ListQueuesResult.php',
            'pear2\\windowsazure\\services\\core\\models\\logging' => '/WindowsAzure/Core/Models/Logging.php',
            'pear2\\windowsazure\\services\\core\\models\\metrics' => '/WindowsAzure/Core/Models/Metrics.php',
            'pear2\\windowsazure\\services\\core\\models\\peekmessagesoptions' => '/WindowsAzure/Services/Queue/Models/PeekMessagesOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\peekmessagesresult' => '/WindowsAzure/Services/Queue/Models/PeekMessagesResult.php',
            'pear2\\windowsazure\\services\\core\\models\\queue' => '/WindowsAzure/Services/Queue/Models/Queue.php',
            'pear2\\windowsazure\\services\\core\\models\\queuemessage' => '/WindowsAzure/Services/Queue/Models/QueueMessage.php',
            'pear2\\windowsazure\\services\\core\\models\\queueserviceoptions' => '/WindowsAzure/Services/Queue/Models/QueueServiceOptions.php',
            'pear2\\windowsazure\\services\\core\\models\\retentionpolicy' => '/WindowsAzure/Core/Models/RetentionPolicy.php',
            'pear2\\windowsazure\\services\\core\\models\\serviceproperties' => '/WindowsAzure/Core/Models/ServiceProperties.php',
            'pear2\\windowsazure\\services\\core\\models\\updatemessageresult' => '/WindowsAzure/Services/Queue/Models/UpdateMessageResult.php',
            'pear2\\windowsazure\\services\\core\\servicerestproxy' => '/WindowsAzure/Services/Core/ServiceRestProxy.php',
            'pear2\\windowsazure\\services\\core\\servicesbuilder' => '/WindowsAzure/Services/Core/ServicesBuilder.php',
            'pear2\\windowsazure\\services\\queue\\iqueue' => '/WindowsAzure/Services/Queue/IQueue.php',
            'pear2\\windowsazure\\services\\queue\\queuerestproxy' => '/WindowsAzure/Services/Queue/QueueRestProxy.php',
            'pear2\\windowsazure\\services\\queue\\queueservice' => '/WindowsAzure/Services/Queue/QueueService.php',
            'pear2\\windowsazure\\services\\queue\\queuesettings' => '/WindowsAzure/Services/Queue/QueueSettings.php',
            'pear2\\windowsazure\\utilities' => '/WindowsAzure/Utilities.php',
            'pear2\\windowsazure\\validate' => '/WindowsAzure/Validate.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
