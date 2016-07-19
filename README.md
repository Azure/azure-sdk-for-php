# Microsoft Azure SDK for PHP
### - Azure Resource Management -

In the current PHP SDK code, we have generated code for most Azure Resource Management APIs (ARM).

## Prerequisites
To run the sample code such as [root]/examples/Arm/StorageSamples.php, you must have the following prerequisites,

* must have a valid tenant at [Azure Active Directory](https://manage.windowsazure.com/microsoft.onmicrosoft.com#Workspaces/ActiveDirectoryExtension/directory)
* must have an application set up at Azure Active Directory and get its client id and client secret
* must have an existing Resource Group and have permissions granted to the application above

For detailed instructions, go to https://azure.microsoft.com/en-us/documentation/articles/resource-group-create-service-principal-portal/

Once you have set up the above settings, open examples/Arm/StorageSamples.php, and modify the following,
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
* Go to the root of the project from a command prompt or shell
* ```php composer.phar Install```    -- this will install all dependencies
* ```php examples/Arm/StorageSamples.php```  -- this will run the sample code for Storage Resource Provider


## In the StorageSamples.php (more code samples are coming)
* It checks if the storage account $accountName exists
* If $accountName exists, it can be updated, deleted, and queried for properties
* If $accountName does not exists, it will be created.

## Learn More
[Microsoft Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/)

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). For more information see the [Code of Conduct FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or
contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional questions or comments.

## PHP Code Generation 
To generated the PHP code in this SDK,
* Get AutoRest from https://github.com/yaqiyang/autorest
* Get all dependecies for AutoRest, see AutoRest build instructions
* Run "gulp build" in the root folder
* Open file PhpGenTest.bat in the root folder of the AutoTest project, modify the first two lines to point the commands to the correct local folders
* Execute PhpGenTest.bat