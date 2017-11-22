<?php

set_time_limit(600); //set timeout to 10 minutes, or you can set max_execution_time in php.ini
date_default_timezone_set('America/Los_Angeles');

$tenant =  "<tenant domanin name>.onmicrosoft.com";
$username = 'user@domain.com';
$password = 'userkey';
$clientId = "<client id (guid)>";
$clientKey = "<client key (base64)";
$restApiEndpoint = "https://<account name>.restv2.<region>.media.azure.net/api/";
$pfxFileName = "C:\\Path\\To\\keystore.pfx";
$pfxPassword = "KeyStorePassword";
