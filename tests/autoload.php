<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'blobrestproxytest' => '/unit/WindowsAzure/Services/Blob/BlobRestProxyTest.php',
            'blobservicetest' => '/unit/WindowsAzure/Services/Blob/BlobServiceTest.php',
            'configurationtest' => '/unit/WindowsAzure/Services/Core/ConfigurationTest.php',
            'createmessageoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/CreateMessageOptionsTest.php',
            'createqueueoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/CreateQueueOptionsTest.php',
            'datefiltertest' => '/unit/WindowsAzure/Services/Core/Filters/DateFilterTest.php',
            'getqueuemetadataresulttest' => '/unit/WindowsAzure/Services/Queue/Models/GetQueueMetadataResultTest.php',
            'getservicepropertiesresulttest' => '/unit/WindowsAzure/Services/Core/Models/GetServicePropertiesResultTest.php',
            'httpclienttest' => '/unit/WindowsAzure/Core/HttpClientTest.php',
            'invalidargumenttypeexceptiontest' => '/unit/WindowsAzure/Core/InvalidArgumentTypeExceptionTest.php',
            'listmessagesoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/ListMessagesOptionsTest.php',
            'listmessagesresulttest' => '/unit/WindowsAzure/Services/Queue/Models/ListMessagesResultTest.php',
            'listqueueoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/ListQueuesOptionsTest.php',
            'listqueueresulttest' => '/unit/WindowsAzure/Services/Queue/Models/ListQueuesResultTest.php',
            'pear2\\tests\\framework\\queuerestproxytestbase' => '/framework/QueueRestProxyTestBase.php',
            'pear2\\tests\\framework\\restproxytestbase' => '/framework/ServiceRestProxyTestBase.php',
            'pear2\\tests\\framework\\testresources' => '/framework/TestResources.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\sharedkeyauthenticationschememock' => '/mock/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationSchemeMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\storageauthenticationschememock' => '/mock/WindowsAzure/Services/Core/Authentication/StorageAuthenticationSchemeMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\filters\\simplefiltermock' => '/mock/WindowsAzure/Services/Core/Filters/SimpleFilterMock.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\accessconditiontest' => '/unit/WindowsAzure/Services/Blob/Models/AccessConditionTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\accesspolicytest' => '/unit/WindowsAzure/Services/Blob/Models/AccessPolicyTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\blobserviceoptionstest' => '/unit/WindowsAzure/Services/Blob/Models/BlobServiceOptionsTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\containeracltest' => '/unit/WindowsAzure/Services/Blob/Models/ContainerACLTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\containerpropertiestest' => '/unit/WindowsAzure/Services/Blob/Models/ContainerPropertiesTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\containertest' => '/unit/WindowsAzure/Services/Blob/Models/ContainerTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\createcontaineroptionstest' => '/unit/WindowsAzure/Services/Blob/Models/CreateContainerOptionsTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\getcontaineraclresulttest' => '/unit/WindowsAzure/Services/Blob/Models/GetContainerACLResultTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\getcontainerpropertiesresulttest' => '/unit/WindowsAzure/Services/Blob/Models/GetContainerPropertiesResultTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\listcontainersoptionstest' => '/unit/WindowsAzure/Services/Blob/Models/ListContainersOptionsTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\listcontainersresulttest' => '/unit/WindowsAzure/Services/Blob/Models/ListContainersResultTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\publicaccesstypetest' => '/unit/WindowsAzure/Services/Blob/Models/PublicAccessTypeTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\setcontainermetadataoptionstest' => '/unit/WindowsAzure/Services/Blob/Models/SetContainerMetadataOptionsTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\blob\\models\\signedidentifiertest' => '/unit/WindowsAzure/Services/Blob/Models/SignedIdentifierTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\core\\models\\loggingtest' => '/unit/WindowsAzure/Services/Core/Models/LoggingTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\core\\models\\metricstest' => '/unit/WindowsAzure/Services/Core/Models/MetricsTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\core\\models\\retentionpolicytest' => '/unit/WindowsAzure/Services/Core/Models/RetentionPolicyTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\core\\models\\servicepropertiestest' => '/unit/WindowsAzure/Services/Core/Models/ServicePropertiesTest.php',
            'pear2\\tests\\unit\\windowsazure\\services\\queue\\queuerestproxy\\queuerestproxytest' => '/unit/WindowsAzure/Services/Queue/QueueRestProxyTest.php',
            'peekmessagesoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/PeekMessagesOptionsTest.php',
            'peekmessagesresulttest' => '/unit/WindowsAzure/Services/Queue/Models/PeekMessagesResultTest.php',
            'queuemessagetest' => '/unit/WindowsAzure/Services/Queue/Models/QueueMessageTest.php',
            'queueserviceoptionstest' => '/unit/WindowsAzure/Services/Queue/Models/QueueServiceOptionsTest.php',
            'queueservicetest' => '/unit/WindowsAzure/Services/Queue/QueueServiceTest.php',
            'queuetest' => '/unit/WindowsAzure/Services/Queue/Models/QueueTest.php',
            'serviceexceptiontest' => '/unit/WindowsAzure/Core/ServiceExceptionTest.php',
            'servicerestproxytest' => '/unit/WindowsAzure/Services/Core/ServiceRestProxyTest.php',
            'servicesbuildertest' => '/unit/WindowsAzure/Services/Core/ServicesBuilderTest.php',
            'sharedkeyauthenticationschemetest' => '/unit/WindowsAzure/Services/Core/Authentication/SharedKeyAuthenticationSchemeTest.php',
            'sharedkeyfiltertest' => '/unit/WindowsAzure/Services/Core/Filters/SharedKeyFilterTest.php',
            'storageauthenticationschemetest' => '/unit/WindowsAzure/Services/Core/Authentication/StorageAuthenticationSchemeTest.php',
            'tests\\framework\\blobrestproxytestbase' => '/framework/BlobRestProxyTestBase.php',
            'updatemessageresulttest' => '/unit/WindowsAzure/Services/Queue/Models/UpdateMessageResultTest.php',
            'urltest' => '/unit/WindowsAzure/Core/UrlTest.php',
            'utilitiestest' => '/unit/WindowsAzure/UtilitiesTest.php',
            'validatetest' => '/unit/WindowsAzure/ValidateTest.php',
            'windowsazurequeuemessagetest' => '/unit/WindowsAzure/Services/Queue/Models/WindowsAzureQueueMessageTest.php',
            'windowsazureutilitiestest' => '/unit/WindowsAzure/Core/WindowsAzureUtilitiesTest.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
