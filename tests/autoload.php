<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'azurequeuemessagetest' => '/unit/WindowsAzure/Services/Queue/Models/AzureQueueMessageTest.php',
            'azureutilitiestest' => '/unit/WindowsAzure/Core/AzureUtilitiesTest.php',
            'blobrestproxytest' => '/unit/WindowsAzure/Services/Blob/BlobRestProxyTest.php',
            'blobserviceoptionstest' => '/unit/WindowsAzure/Services/Blob/Models/BlobServiceOptionsTest.php',
            'blobservicetest' => '/unit/WindowsAzure/Services/Blob/BlobServiceTest.php',
            'configurationtest' => '/unit/WindowsAzure/Services/Core/ConfigurationTest.php',
            'createmessageoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/CreateMessageOptionsTest.php',
            'createqueueoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/CreateQueueOptionsTest.php',
            'datefiltertest' => '/unit/WindowsAzure/Services/Core/Filters/DateFilterTest.php',
            'getqueuemetadataresulttest' => '/unit/WindowsAzure/Services/Queue/Models/GetQueueMetadataResultTest.php',
            'getservicepropertiesresulttest' => '/unit/WindowsAzure/Services/Queue/Models/GetServicePropertiesResultTest.php',
            'httpclienttest' => '/unit/WindowsAzure/Core/HttpClientTest.php',
            'invalidargumenttypeexceptiontest' => '/unit/WindowsAzure/Core/InvalidArgumentTypeExceptionTest.php',
            'listmessagesoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/ListMessagesOptionsTest.php',
            'listmessagesresulttest' => '/unit/WindowsAzure/Services/Queue/Models/ListMessagesResultTest.php',
            'listqueueoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/ListQueueOptionsTest.php',
            'listqueueresulttest' => '/unit/WindowsAzure/Services/Queue/Models/ListQueueResultTest.php',
            'loggingtest' => '/unit/WindowsAzure/Services/Queue/Models/LoggingTest.php',
            'metricstest' => '/unit/WindowsAzure/Services/Queue/Models/MetricsTest.php',
            'pear2\\tests\\framework\\testresources' => '/framework/TestResources.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\sharedkeyauthenticationschememock' => '/mock/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationSchemeMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\storageauthenticationschememock' => '/mock/WindowsAzure/Services/Core/Authentication/StorageAuthenticationSchemeMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\filters\\simplefiltermock' => '/mock/WindowsAzure/Services/Core/Filters/SimpleFilterMock.php',
            'peekmessagesoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/PeekMessagesOptionsTest.php',
            'peekmessagesresulttest' => '/unit/WindowsAzure/Services/Queue/Models/PeekMessagesResultTest.php',
            'queuemessagetest' => '/unit/WindowsAzure/Services/Queue/Models/QueueMessageTest.php',
            'queuerestproxytest' => '/unit/WindowsAzure/Services/Queue/QueueRestProxyTest.php',
            'queueserviceoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/QueueServiceOptionsTest.php',
            'queueservicetest' => '/unit/WindowsAzure/Services/Queue/QueueServiceTest.php',
            'queuetest' => '/unit/WindowsAzure/Services/Queue/Models/QueueTest.php',
            'retentionpolicytest' => '/unit/WindowsAzure/Services/Queue/Models/RetentionPolicyTest.php',
            'serviceexceptiontest' => '/unit/WindowsAzure/Core/ServiceExceptionTest.php',
            'servicepropertiestest' => '/unit/WindowsAzure/Services/Queue/Models/ServicePropertiesTest.php',
            'servicerestproxytest' => '/unit/WindowsAzure/Services/Core/ServiceRestProxyTest.php',
            'servicesbuildertest' => '/unit/WindowsAzure/Services/Core/ServicesBuilderTest.php',
            'sharedkeyauthenticationschemetest' => '/unit/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationSchemeTest.php',
            'sharedkeyfiltertest' => '/unit/WindowsAzure/Services/Core/Filters/SharedKeyFilterTest.php',
            'storageauthenticationschemetest' => '/unit/WindowsAzure/Services/Core/Authentication/StorageAuthenticationSchemeTest.php',
            'tests\\framework\\blobrestproxytestbase' => '/framework/BlobRestProxyTestBase.php',
            'tests\\framework\\queuerestproxytestbase' => '/framework/QueueRestProxyTestBase.php',
            'tests\\framework\\restproxytestbase' => '/framework/ServiceRestProxyTestBase.php',
            'updatemessageresulttest' => '/unit/WindowsAzure/Services/Queue/Models/UpdateMessageResultTest.php',
            'urltest' => '/unit/WindowsAzure/Core/UrlTest.php',
            'utilitiestest' => '/unit/WindowsAzure/UtilitiesTest.php',
            'validatetest' => '/unit/WindowsAzure/ValidateTest.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
