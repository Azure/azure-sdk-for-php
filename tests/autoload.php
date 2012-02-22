<?php
require dirname(__DIR__) . '/src/autoload.php';

spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
            'azureauthenticationtest' => '/Unit/WindowsAzure/Services/Core/Authentication/AzureAuthenticationTest.php',
            'blobqueuesharedkeytest' => '/Unit/WindowsAzure/Services/Core/Authentication/BlobQueueSharedKeyTest.php',
            'configurationtest' => '/Unit/WindowsAzure/Services/Core/ConfigurationTest.php',
            'pear2\\tests\\mock\\windowsazure\\core\\httpclientmock' => '/Mock/WindowsAzure/Core/HttpClientMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\azureauthenticationmock' => '/Mock/WindowsAzure/Services/Core/Authentication/AzureAuthenticationMock.php',
            'pear2\\tests\\mock\\windowsazure\\services\\core\\authentication\\blobqueuesharedkeymock' => '/Mock/WindowsAzure/Services/Core/Authentication/BlobQueueSharedKeyMock.php',
            'pear2\\tests\\unit\\testresources' => '/Unit/TestResources.php',
            'queuerestproxytest' => '/Unit/WindowsAzure/Services/Queue/QueueRestProxyTest.php'
          );
      }
      $cn = strtolower($class);
      if (isset($classes[$cn])) {
         require __DIR__ . $classes[$cn];
      }
   }
);
