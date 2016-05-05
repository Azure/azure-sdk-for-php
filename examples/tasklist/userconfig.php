<?php

set_time_limit(600); //set timeout to 10 minutes, or you can set max_execution_time in php.ini
date_default_timezone_set('America/Los_Angeles');

$subscriptionId = 'Your subscription';
$certificatePath = 'Certificate path';
$storageServiceName = 'phpsdkexamples'; // the storage account will be created if it does not exist
