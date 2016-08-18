<?php
spl_autoload_register(
   function($class) {
      static $classes = null;
      if ($classes === null) {
         $classes = array(
             'ext\\microsoft\\windowsazure\\services\\queue\\queueserviceintegrationtest' => '/QueueServiceIntegrationTest.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\integrationtestbase' => '/IntegrationTestBase.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\functionaltestbase' => '/FunctionalTestBase.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\assert' => '/Assert.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\queueservicefunctionaltestclasses' => '/QueueServiceFunctionalTestClasses.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\queueservicefunctionaltest' => '/QueueServiceFunctionalTest.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\queueservicefunctionaltestdata' => '/QueueServiceFunctionalTestData.php',
             'ext\\microsoft\\windowsazure\\services\\queue\\queueservicefunctionaltestparameters' => '/QueueServiceFunctionalTestParameters.php',
          );
      }
      $cn = strtolower($class);
      // echo $cn . "<br/>\n";
      if (isset($classes[$cn])) {
         // echo __DIR__ . $classes[$cn] . "<br/>\n";
         require __DIR__ . $classes[$cn];
      }
   }
);
