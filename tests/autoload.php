<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'azureauthenticationtest' => '/unit/WindowsAzure/Services/Core/Authentication/AzureAuthenticationTest.php',
            'blobqueuesharedkeytest' => '/unit/WindowsAzure/Services/Core/Authentication/BlobQueueSharedKeyTest.php',
            'configurationtest' => '/unit/WindowsAzure/Services/Core/ConfigurationTest.php',
            'pear2\\tests\\mock\\windowsazure\\core\\httpclientmock' => '/mock/WindowsAzure/Core/HttpClientMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\azureauthenticationmock' => '/mock/WindowsAzure/Services/Core/Authentication/AzureAuthenticationMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\blobqueuesharedkeymock' => '/mock/WindowsAzure/Services/Core/Authentication/BlobQueueSharedKeyMock.php',
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
