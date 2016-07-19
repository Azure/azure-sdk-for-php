# Microsoft Azure SDK for PHP
### - Storage Resource Provider -

In the current PHP SDK code, I have implemented the following calls from https://msdn.microsoft.com/en-us/library/azure/mt163683.aspx,

* Create Storage Account
* Poll Async Storage Operation
* Check Storage Account Name Availability
* Update Storage Account
* Delete Storage Account
* Get Storage Account Properties

## Prerequisites
To run the sample code in [root]/StorageResourceProviderSample.php, you must have the following prerequisites,

* must have a valid tenant at [Azure Active Directory](https://manage.windowsazure.com/microsoft.onmicrosoft.com#Workspaces/ActiveDirectoryExtension/directory)
* must have an application set up at Azure Active Directory and get its client id and client secret
* must have an existing Resource Group and have permissions granted to the application above

For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/

Once you have set up the above settings, open StorageResourceProviderSample.php, and modify the following,
```
    $tenant_id = '<your organizations tenant id at Azure Active Director>';
    $client_id = '<your client id for your applicaton at Azure Active Directory>';
    $client_secret = '<your client secret for your applicaton at Azure Active Directory>';
    $subscriptionId = '<your subscription id>';
    $resourceGroup = '<your existing resource group name>';
    $accountName = '<your new storage account nanme>';
```

## Dependences
* Download **[composer.phar](http://getcomposer.org/composer.phar)** to your project root
* Go to the root of the project from the a command prompt or shell
* ```php composer.phar Install```    -- this will install all dependencies
* ```php StorageResourceProviderSample.php```  -- this will run the sample code for Storage Resource Provider


## In the Sample
* It checks if the storage account $accountName exists
* If $accountName exists, it can be updated, deleted, and queried for properties
* If $accountName does not exists, it will be created.

## Learn More
[Microsoft Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/)

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). For more information see the [Code of Conduct FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or
contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional questions or comments.

