<?php

/**
 * These are code samples for Storage Resource Provider at https://msdn.microsoft.com/en-us/library/azure/mt163683.aspx
 */

    // some important settings
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    date_default_timezone_set('America/Los_Angeles');

    require_once __DIR__ .'/../../vendor/autoload.php';
    use MicrosoftAzure\Common\Internal\Authentication\OAuthSettings;
    use MicrosoftAzure\Common\Internal\ServiceException;
    use MicrosoftAzure\Common\ServicesBuilder;
    use  MicrosoftAzure\Arm\Storage\StorageManagementClient;

    /** To use the Storage Resource Provider APIs,
     * 1. must have a valid tenant at Azure Active Directory(https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/)
     * 2. must have an application set up at Azure Active Directory and get its client id and client secret
     * 3. must have an existing Resource Group and have permissions granted to the application above
     * For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/
     */
    $tenant_id = '<your organizations tenant id at Azure Active Director>';
    $client_id = '<your client id for your applicaton at Azure Active Directory>';
    $client_secret = '<your client secret for your applicaton at Azure Active Directory>';
    $subscriptionId = '<your subscription id>';
    $resourceGroup = '<your existing resource group name>';
    $accountName = '<your new storage account nanme>';

    // or, read the settings from a file
    $config =  __DIR__ . '/privatesettings.php';
    if (file_exists($config))
    {
        include_once $config;
    }

    $oauthSettings = new OAuthSettings($tenant_id, $client_id, $client_secret);
    $client = new StorageManagementClient($oauthSettings);
    $client->setSubscriptionId($subscriptionId);
    $client->setLongRunningOperationRetryTimeout(600);

    $result = $client->getUsageOperations()->listOperation();
    echo "\ngetUsageOperations()->listOperation:\n";
    var_dump($result);

    $accountNameArray = ['name' => $accountName, 'type' => 'Microsoft.Storage/storageAccounts'];
    $result = $client->getStorageAccounts()->checkNameAvailability($accountNameArray);

    if (!$result['nameAvailable'])
    {
        $prompt = "Storage Account $accountName already exists. Do you want to Update it, Delete it, Get properties, or List accounts? (u/d/g/l)";
        $action = 'u';
        if (PHP_OS == 'WINNT') {
            echo "$prompt";
            $action = stream_get_line(STDIN, 1024, PHP_EOL);
        } else {
            $action = readline("$prompt");
        }

        if (strtolower($action ) == 'd')
        {
            $status = 0;
            echo 'Deleting...';
            $result = $client->getStorageAccounts()->delete($resourceGroup, $accountName);
            echo "\nStorage Account $accountName deleted.\n";
            $result = $client->getUsageOperations()->listOperation();
            echo "\ngetUsageOperations()->listOperation:\n";
            var_dump($result);
        }
        else if (strtolower($action ) == 'u')
        {
            $updateParams = [];
            $updateParams['tags'] = ['key1' => time(), 'key2' => date('F Y h:i:s A')];  //sample changes
            $result = $client->getStorageAccounts()->update($resourceGroup, $accountName, $updateParams);
            echo "\nStorage Account $accountName updated.\n";
            var_dump($result);
        }
        else if (strtolower($action ) == 'g')
        {
            $result = $client->getStorageAccounts()->getProperties($resourceGroup, $accountName);
            echo "\nStorage Account $accountName prperties:\n";
            var_dump($result);
        }
        else if (strtolower($action ) == 'l')
        {
            $result = $client->getStorageAccounts()->listByResourceGroup($resourceGroup);
            echo "\nList Storage Accounts:\n";
            var_dump($result);
        }
        else
        {
            echo "\nYou entered unrecognized command: $action.\n";
        }
    }
    else // account not existed
    {
        $prompt = "Storage Account $accountName does not exist. Do you want to create it? (y/n)";
        $action = 'u';
        if (PHP_OS == 'WINNT') {
            echo "$prompt";
            $action = stream_get_line(STDIN, 1024, PHP_EOL);
        } else {
            $action = readline("$prompt");
        }

        if (strtolower($action ) == 'y') {
            echo "Creating Storage Account $accountName ...";
            $createParams =
            [
                'sku' => [
                    'name' => 'Standard_LRS',
                    'tier' => 'Standard'
                ],
                'kind' => 'Storage',
                'location' => 'eastus',
                'tags' => '',
                'properties' => [
                    'customDomain' => [
                    'name' => '',
                    'useSubDomain' => 'false'
                    ],
                    'encryption' => [
                    'services' => [
                        'blob' => [
                            'enabled' => 'false',
                            'lastEnabledTime' => ''
                        ]
                    ],
                    'keySource' => 'Microsoft.Storage'
                    ],
                    /* accessTier cannot be present when kind = Storage, but must present when kind = BlobStorage*/
                    /*'accessTier' => 'Hot|Cool'*/
                ]
            ];

            $result = $client->getStorageAccounts()->create($resourceGroup, $accountName, $createParams);
            echo "\nStorage Account $accountName has been successfully created.\n";
        }
    }

?>
