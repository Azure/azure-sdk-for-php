<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

<?php 

require_once '..\src\autoload.php';
require_once 'framework\autoload.php';
require_once 'functional\Queue\autoload.php';

use ext\microsoft\windowsazure\services\queue\QueueServiceIntegrationTest;
use ext\microsoft\windowsazure\services\queue\QueueServiceFunctionalTestClasses;
use ext\microsoft\windowsazure\services\queue\QueueServiceFunctionalTest;
use ext\microsoft\windowsazure\services\queue\FunctionalTestBase;
use ext\microsoft\windowsazure\services\queue\QueueServiceFunctionalTestParameters;
use ext\microsoft\windowsazure\services\queue\Assert;

$qt = new QueueServiceIntegrationTest();
$qt->setup();
Assert::runTests($qt);
$qt->cleanup();

$qt = new QueueServiceFunctionalTestClasses();
Assert::runTests($qt);

$qt = new QueueServiceFunctionalTest();
$qt->setup();
Assert::runTests($qt);
$qt->cleanup();

$qt = new QueueServiceFunctionalTestParameters();
$qt->setup();
Assert::runTests($qt);
$qt->cleanup();


//$f = new foo();
//$containerName = 'blobcontainer' . round( gettimeofday(true));
//$blobName = 'foo' . round( gettimeofday(true));
//$data = 'this is a test of the emergency broadcasting system. this is only a test';
//$blobJunk = new blobJunk();
//$blobJunk->setup($containerName);
//$blobJunk->UploadToBlob($containerName, $blobName, $data, 10);
//$blobJunk->ReadBlobCombined($containerName, $blobName);
//$blobJunk->cleanup($containerName);

//$f->testListQueuesSimple();
//$queue = 'foo' . round( gettimeofday(true));
//$f->setup($queue);
//$f->PollQueue($queue);
//$f->cleanup($queue);

        ?>
    </body>
</html>
