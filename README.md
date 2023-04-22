[![Build Status](https://travis-ci.org/Azure/azure-sdk-for-php.svg?branch=master)](https://travis-ci.org/Azure/azure-sdk-for-php)
[![Latest Stable Version](https://poser.pugx.org/microsoft/windowsazure/v/stable)](https://packagist.org/packages/microsoft/windowsazure)

# Microsoft Azure SDK for PHP

This project provides a set of PHP client libraries that make it easy to access
Microsoft Azure tables, blobs, queues, service bus (queues and topics), service runtime and service management APIs. For documentation on how to host PHP applications on Microsoft Azure, please see the
[Microsoft Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/).

## Important Annoucement

As of February 2021, the Azure SDK for PHP has entered a retirement phase and is no longer officially supported by Microsoft. This repository will no longer be maintained.  

If you prefer to work in PHP, you can directly call the [Azure REST API in PHP](https://docs.microsoft.com/en-us/rest/api/azure/)

>NOTE: Please note that the Azure Storage SDK for PHP will be separately maintained in [its own repo](https://github.com/Azure/azure-storage-php)

For more details, please refer to our [support policy here](SUPPORT.md) 

# Features

* Tables
  * create and delete tables
  * create, query, insert, update, merge, and delete entities
  * batch operations
  * REST API Version: see https://github.com/Azure/azure-storage-php
* Blobs
  * create, list, and delete containers, work with container metadata and permissions, list blobs in container
  * create block and page blobs (from a stream or a string), work with blob blocks and pages, delete blobs
  * work with blob properties, metadata, leases, snapshot a blob
  * REST API Version: see https://github.com/Azure/azure-storage-php
* Storage Queues
  * create, list, and delete queues, and work with queue metadata and properties
  * create, get, peek, update, delete messages
  * REST API Version: see https://github.com/Azure/azure-storage-php
* Service Bus
  * Queues: create, list and delete queues; send, receive, unlock and delete messages
  * Topics: create, list, and delete topics; create, list, and delete subscriptions; send, receive, unlock and delete messages; create, list, and delete rules
* Service Runtime
  * discover addresses and ports for the endpoints of other role instances in your service
  * get configuration settings and access local resources
  * get role instance information for current role and other role instances
  * query and set the status of the current role
  * REST API Version: 2011-03-08
* Service Management
  * storage accounts: create, update, delete, list, regenerate keys
  * affinity groups: create, update, delete, list, get properties
  * locations: list
  * hosted services: create, update, delete, list, get properties
  * deployment: create, get, delete, swap, change configuration, update status, upgrade, rollback
  * role instance: reboot, reimage
  * REST API Version: 2011-10-01
* Media Services
  * Connection
  * Ingest asset, upload files
  * Encoding / process asset, create job, job templates
  * Manage media services entities: create / update / read / delete / get list
  * Delivery SAS and Streaming media content
  * Dynamic encryption: AES and DRM (PlayReady/Widevine/FairPlay) with and without Token restriction
  * Scale encoding reserved unit type
  * Live streaming: live encoding and pass-through channels, programs and all their operations
  * REST API Version: 2.13


# Getting Started
## Download Source Code

To get the source code from GitHub, type

```
git clone https://github.com/Azure/azure-sdk-for-php.git
cd ./azure-sdk-for-php
```

> **Note**
>
> The recommended way to resolve dependencies is to install them using the [Composer package manager](http://getcomposer.org).

## Install via Composer

[Composer](https://getcomposer.org/) is a dependency management tool for PHP. It allows you to specify libraries (like this one)
that your project requires and it will install and update them for you.

### Already using Composer

* Require Package

  If you would to added this package to an existing project that already has a `composer.json`, you can do so by running 
  the following in a command prompt in the root of your project directory:
  
  ```
  php composer.phar require microsoft/windowsazure ^0.5
  ```

### New to Composer

* Install Composer
  
   If you do not yet have Composer, you can download a copy for your project using [these instructions](https://getcomposer.org/download/).
   You can also install it globally [on linux](https://getcomposer.org/doc/00-intro.md#globally) or on Windows using the 
[Windows Installer](https://getcomposer.org/doc/00-intro.md#installation-windows)

  > **Note**
  >
  > On Windows, you will also need to add the Git executable to your PATH environment variable.
  
* Create *composer.json*
  
  If you are new to Composer, its worth having a look at the [Basic Usage Guide](https://getcomposer.org/doc/01-basic-usage.md) to get 
  started. When you are ready, skip ahead to creating a `composer.json` config file interactively by running the following in a command prompt in 
  the root directory of your project:
  
  ```
  php composer.phar init
  ```
  When asked if you would like to define your dependencies, select *yes* and search for the *microsoft/windowsazure* package.

* Install Package

  Lastly, still in a command prompt in your project root, execute the following: 
  ```
  php composer.phar install
  ```
  Composer will download the correct version of this library to a `vendor` in the root directory of your project 

# Usage

## Getting Started

There are four basic steps that have to be performed before you can make a call to any Microsoft Azure API when using the libraries.

* First, include the composer autoloader script:

  ```PHP
  require_once "vendor/autoload.php";
  ```

* Include the namespaces you are going to use.

  To create any Microsoft Azure service client you need to use the **ServicesBuilder** class:

  ```PHP
  use WindowsAzure\Common\ServicesBuilder;
  ```

  To process exceptions you need:

  ```PHP
  use WindowsAzure\Common\ServiceException;
  ```

* To instantiate the service client you will also need a valid connection string. The format is:

  * For accessing a live storage service (tables, blobs, queues):

    ```
    DefaultEndpointsProtocol=[http|https];AccountName=[yourAccount];AccountKey=[yourKey]
    ```

  * For accessing the emulator storage:

    ```
    UseDevelopmentStorage=true
    ```

  * For accessing the Service Bus:

    ```
    Endpoint=[yourEndpoint];SharedSecretIssuer=[yourWrapAuthenticationName];SharedSecretValue=[yourWrapPassword]
    ```

    Where the Endpoint is typically of the format `https://[yourNamespace].servicebus.windows.net`.

  * For accessing Service Management APIs:

    ```
    SubscriptionID=[yourSubscriptionId];CertificatePath=[filePathToYourCertificate]
    ```


* Instantiate a "REST Proxy" - a wrapper around the available calls for the given service.

  * For the Storage services:

    ```PHP
    $tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);
    $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
    $queueRestProxy = ServicesBuilder::getInstance()->createQueueService($connectionString);
    ```

  * For Service Bus:

    ```PHP
    $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);
    ```

  * For Service Management:

    ```PHP
    $serviceManagementRestProxy = ServicesBuilder::getInstance()->createServiceManagementService($connectionString);
    ```

  * For Media Services:

    ```PHP
    // 1 - Instantiate the credentials
    $credentials = new AzureAdTokenCredentials(
        '<tenant domain name>',
        new AzureAdClientSymmetricKey('<service principal client id>', '<service principal client key>'),
        AzureEnvironments::AZURE_CLOUD_ENVIRONMENT());

    // 2 - Instantiate a token provider
    $provider = new AzureAdTokenProvider($credentials);

    // 3 - Connect to Azure Media Services
    $mediaServicesRestProxy = ServicesBuilder::getInstance()->createMediaServicesService(new MediaServicesSettings('<rest api endpoint>', $provider));
    ```
    You can find more examples for Media Services Authentication on the [examples](examples/MediaServices/) folder.

## Table Storage

The following are examples of common operations performed with the Table service. For more please read [How-to use the Table service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/table-service/).

### Create a table

To create a table call **createTable**:

```PHP
try {
  // Create table.
  $tableRestProxy->createTable("mytable");
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

[Error Codes and Messages for Tables](http://msdn.microsoft.com/en-us/library/windowsazure/dd179438.aspx)

### Insert an entity

To add an entity to a table, create a new **Entity** object and pass it to **TableRestProxy->insertEntity**. Note that when you create an entity you must specify a `PartitionKey` and `RowKey`. These are the unique identifiers for an entity and are values that can be queried much faster than other entity properties. The system uses `PartitionKey` to automatically distribute the table’s entities over many storage nodes.

```PHP
use MicrosoftAzure\Storage\Table\Models\Entity;
use MicrosoftAzure\Storage\Table\Models\EdmType;

$entity = new Entity();
$entity->setPartitionKey("pk");
$entity->setRowKey("1");
$entity->addProperty("PropertyName", EdmType::STRING, "Sample");

try{
  $tableRestProxy->insertEntity("mytable", $entity);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Query entities

To query for entities you can call **queryEntities**. The subset of entities you retrieve will be determined by the filter you use (for more information, see [Querying Tables and Entities](http://msdn.microsoft.com/en-us/library/windowsazure/dd894031.aspx)). You can also provide no filter at all.

```PHP
$filter = "RowKey eq '2'";

try {
  $result = $tableRestProxy->queryEntities("mytable", $filter);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}

$entities = $result->getEntities();

foreach($entities as $entity){
  echo $entity->getPartitionKey().":".$entity->getRowKey()."<br />";
}
```

## Blob Storage

To get started using the Blob service you must include the `BlobService` and `BlobSettings` namespaces and set the `ACCOUNT_NAME` and `ACCOUNT_KEY` configuration settings for your credentials. Then you instantiate the wrapper using the `BlobService` factory.

The following are examples of common operations performed with the Blob service. For more please read [How-to use the Blob service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/blob-service/).


### Create a container

```PHP
// OPTIONAL: Set public access policy and metadata.
// Create container options object.
$createContainerOptions = new CreateContainerOptions();

// Set public access policy. Possible values are
// PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
// CONTAINER_AND_BLOBS: full public read access for container and blob data.
// BLOBS_ONLY: public read access for blobs. Container data not available.
// If this value is not specified, container data is private to the account owner.
$createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

// Set container metadata
$createContainerOptions->addMetaData("key1", "value1");
$createContainerOptions->addMetaData("key2", "value2");

try {
  // Create container.
  $blobRestProxy->createContainer("mycontainer", $createContainerOptions);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

[Error Codes and Messages for Blobs](http://msdn.microsoft.com/en-us/library/windowsazure/dd179439.aspx)

For more information about container ACLs, see [Set Container ACL (REST API)](http://msdn.microsoft.com/en-us/library/windowsazure/dd179391.aspx).

### Upload a blob

To upload a file as a blob, use the **BlobRestProxy->createBlockBlob** method. This operation will create the blob if it doesn’t exist, or overwrite it if it does. The code example below assumes that the container has already been created and uses [fopen](http://www.php.net/fopen) to open the file as a stream.

```PHP
$content = fopen("myfile.txt", "r");
$blob_name = "myblob";

try {
  //Upload blob
  $blobRestProxy->createBlockBlob("mycontainer", $blob_name, $content);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

While the example above uploads a blob as a stream, a blob can also be uploaded as a string.

### List blobs in a container

To list the blobs in a container, use the **BlobRestProxy->listBlobs** method with a **foreach** loop to loop through the result. The following code outputs the name and URI of each blob in a container.

```PHP
try {
  // List blobs.
  $blob_list = $blobRestProxy->listBlobs("mycontainer");
  $blobs = $blob_list->getBlobs();

  foreach($blobs as $blob)
  {
    echo $blob->getName().": ".$blob->getUrl()."<br />";
  }
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```


## Storage Queues

To get started using the Queue service you must include the `QueueService` and `QueueSettings` namespaces and set the `ACCOUNT_NAME` and `ACCOUNT_KEY` configuration settings for your credentials. Then you instantiate the wrapper using the `QueueService` factory.

The following are examples of common operations performed with the Queue service. For more please read [How-to use the Queue service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/queue-service/).


### Create a queue

A **QueueRestProxy** object lets you create a queue with the **createQueue** method. When creating a queue, you can set options on the queue, but doing so is not required.

```PHP
$createQueueOptions = new CreateQueueOptions();
$createQueueOptions->addMetaData("key1", "value1");
$createQueueOptions->addMetaData("key2", "value2");

try {
  // Create queue.
  $queueRestProxy->createQueue("myqueue", $createQueueOptions);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

[Error Codes and Messages for Queues](http://msdn.microsoft.com/en-us/library/windowsazure/dd179446.aspx)


### Add a message to a queue

To add a message to a queue, use **QueueRestProxy->createMessage**. The method takes the queue name, the message text, and message options (which are optional).
For compatibility with others you may need to base64 encode message.

```PHP
try {
  // Create message.
  $msg = "Hello World!";
  // optional: $msg = base64_encode($msg);
  $queueRestProxy->createMessage("myqueue", $msg);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Peek at the next message

You can peek at a message (or messages) at the front of a queue without removing it from the queue by calling **QueueRestProxy->peekMessages**.

```PHP
// OPTIONAL: Set peek message options.
$message_options = new PeekMessagesOptions();
$message_options->setNumberOfMessages(1); // Default value is 1.

try {
  $peekMessagesResult = $queueRestProxy->peekMessages("myqueue", $message_options);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}

$messages = $peekMessagesResult->getQueueMessages();

// View messages.
$messageCount = count($messages);
if($messageCount <= 0){
  echo "There are no messages.<br />";
}
else{
  foreach($messages as $message)  {
    echo "Peeked message:<br />";
    echo "Message Id: ".$message->getMessageId()."<br />";
    echo "Date: ".date_format($message->getInsertionDate(), 'Y-m-d')."<br />";
    echo "Message text: ".$message->getMessageText()."<br /><br />";
  }
}
```

### De-queue the next message

Your code removes a message from a queue in two steps. First, you call **QueueRestProxy->listMessages**, which makes the message invisible to any other code reading from the queue. By default, this message will stay invisible for 30 seconds (if the message is not deleted in this time period, it will become visible on the queue again). To finish removing the message from the queue, you must call **QueueRestProxy->deleteMessage**.

```PHP
// Get message.
$listMessagesResult = $queueRestProxy->listMessages("myqueue");
$messages = $listMessagesResult->getQueueMessages();
$message = $messages[0];

// Process message

// Get message Id and pop receipt.
$messageId = $message->getMessageId();
$popReceipt = $message->getPopReceipt();

try {
  // Delete message.
  $queueRestProxy->deleteMessage("myqueue", $messageId, $popReceipt);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

## Service Bus Queues
The current PHP Service Bus APIs only support ACS connection strings. You need to use PowerShell to create a new ACS Service Bus namespace at the present time.
First, make sure you have Azure PowerShell installed, then in a PowerShell command prompt, run
```PowerShell
Add-AzureAccount # this will sign you in
New-AzureSBNamespace -CreateACSNamespace $true -Name 'mytestbusname' -Location 'West US' -NamespaceType 'Messaging'
```
If it is sucessful, you will get the connection string in the PowerShell output. If you get connection errors with it and the conection string looks like Endpoint=sb://..., change it to **Endpoint=https://...**

### Create a Queue

```PHP
try {
  $queueInfo = new QueueInfo("myqueue");

  // Create queue.
  $serviceBusRestProxy->createQueue($queueInfo);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

[Error Codes and Messages](http://msdn.microsoft.com/en-us/library/windowsazure/dd179357)

### Send a Message

To send a message to a Service Bus queue, your application will call the **ServiceBusRestProxy->sendQueueMessage** method. Messages sent to (and received from ) Service Bus queues are instances
of the **BrokeredMessage** class.

```PHP
try {
  // Create message.
  $message = new BrokeredMessage();
  $message->setBody("my message");

  // Send message.
  $serviceBusRestProxy->sendQueueMessage("myqueue", $message);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Receive a Message

The primary way to receive messages from a queue is to use a **ServiceBusRestProxy->receiveQueueMessage** method. Messages can be received in two different modes: **ReceiveAndDelete** (mark message as consumed on read) and **PeekLock** (locks message for a period of time, but does not delete).

The example below demonstrates how a message can be received and processed using **PeekLock** mode (not the default mode).

```PHP
try {
  // Set the receive mode to PeekLock (default is ReceiveAndDelete).
  $options = new ReceiveMessageOptions();
  $options->setPeekLock(true);

  // Receive message.
  $message = $serviceBusRestProxy->receiveQueueMessage("myqueue", $options);
  echo "Body: ".$message->getBody()."<br />";
  echo "MessageID: ".$message->getMessageId()."<br />";

  // *** Process message here ***

  // Delete message.
  $serviceBusRestProxy->deleteMessage($message);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

## Service Bus Topics

### Create a Topic

```PHP
try {
  // Create topic.
  $topicInfo = new TopicInfo("mytopic");
  $serviceBusRestProxy->createTopic($topicInfo);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Create a subscription with the default (MatchAll) filter

```PHP
try {
  // Create subscription.
  $subscriptionInfo = new SubscriptionInfo("mysubscription");
  $serviceBusRestProxy->createSubscription("mytopic", $subscriptionInfo);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Send a message to a topic

Messages sent to Service Bus topics are instances of the **BrokeredMessage** class.

```PHP
try {
  // Create message.
  $message = new BrokeredMessage();
  $message->setBody("my message");

  // Send message.
  $serviceBusRestProxy->sendTopicMessage("mytopic", $message);
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

### Receive a message from a topic

The primary way to receive messages from a subscription is to use a **ServiceBusRestProxy->receiveSubscriptionMessage** method. Received messages can work in two different modes: **ReceiveAndDelete** (the default) and **PeekLock** similarly to Service Bus Queues.

The example below demonstrates how a message can be received and processed using **ReceiveAndDelete** mode (the default mode).

```PHP
try {
  // Set receive mode to PeekLock (default is ReceiveAndDelete)
  $options = new ReceiveMessageOptions();
  $options->setReceiveAndDelete();

  // Get message.
  $message = $serviceBusRestProxy->receiveSubscriptionMessage("mytopic",
                                "mysubscription",
                                $options);
  echo "Body: ".$message->getBody()."<br />";
  echo "MessageID: ".$message->getMessageId()."<br />";
} catch(ServiceException $e){
  $code = $e->getCode();
  $error_message = $e->getMessage();
  echo $code.": ".$error_message."<br />";
}
```

## Service Management

### Set-up certificates

You  need to create two certificates, one for the server (a .cer file) and one for the client (a .pem file). To create the .pem file using [OpenSSL](http://www.openssl.org), execute this:
```
openssl req -x509 -nodes -days 365 -newkey rsa:1024 -keyout mycert.pem -out mycert.pem
```
To create the .cer certificate, execute this:
```
openssl x509 -inform pem -in mycert.pem -outform der -out mycert.cer
```

### List Available Locations

```PHP
$serviceManagementRestProxy->listLocations();
$locations = $result->getLocations();
foreach($locations as $location){
      echo $location->getName()."<br />";
}
```

### Create a Storage Service

To create a storage service, you need a name for the service (between 3 and 24 lowercase characters and unique within Microsoft Azure), a label (a base-64 encoded name for the service, up to 100 characters), and either a location or an affinity group. Providing a description for the service is optional.

```PHP
$name = "mystorageservice";
$label = base64_encode($name);
$options = new CreateStorageServiceOptions();
$options->setLocation('West US');

$result = $serviceManagementRestProxy->createStorageService($name, $label, $options);
```

### Create a Cloud Service

A cloud service is also known as a hosted service (from earlier versions of Microsoft Azure).  The **createHostedServices** method allows you to create a new hosted service by providing a hosted service name (which must be unique in Microsoft Azure), a label (the base 64-encoded hosted service name), and a **CreateServiceOptions** object which allows you to set the location *or* the affinity group for your service.

```PHP
$name = "myhostedservice";
$label = base64_encode($name);
$options = new CreateServiceOptions();
$options->setLocation('West US');
// Instead of setLocation, you can use setAffinityGroup to set an affinity group.

$result = $serviceManagementRestProxy->createHostedService($name, $label, $options);
```

### Create a Deployment

To make a new deployment to Azure you must store the package file in a Microsoft Azure Blob Storage account under the same subscription as the hosted service to which the package is being uploaded. You can create a deployment package with the [Microsoft Azure PowerShell cmdlets](https://www.windowsazure.com/en-us/develop/php/how-to-guides/powershell-cmdlets/), or with the [cspack commandline tool](http://msdn.microsoft.com/en-us/library/windowsazure/gg432988.aspx).

```PHP
$hostedServiceName = "myhostedservice";
$deploymentName = "v1";
$slot = DeploymentSlot::PRODUCTION;
$packageUrl = "URL_for_.cspkg_file";
$configuration = file_get_contents('path_to_.cscfg_file');
$label = base64_encode($hostedServiceName);

$result = $serviceManagementRestProxy->createDeployment($hostedServiceName,
                         $deploymentName,
                         $slot,
                         $packageUrl,
                         $configuration,
                         $label);

$status = $serviceManagementRestProxy->getOperationStatus($result);
echo "Operation status: ".$status->getStatus()."<br />";
```

## Media Services

### Create new asset with file

To create an asset with a file you need to create an empty asset, create access policy with write permission, create a locator joining your asset and access policy, perform actual upload and generate file info.
```PHP
$asset = new Asset(Asset::OPTIONS_NONE);
$asset = $restProxy->createAsset($asset);

$access = new AccessPolicy('[Some access policy name]');
$access->setDurationInMinutes([Munites AccessPolicy is valid]);
$access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
$access = $restProxy->createAccessPolicy($access);

$sasLocator = new Locator($asset,  $access, Locator::TYPE_SAS);
$sasLocator->setStartTime(new \DateTime('now -5 minutes'));
$sasLocator = $restProxy->createLocator($sasLocator);

$restProxy->uploadAssetFile($sasLocator, '[file name]', '[file content]');
$restProxy->createFileInfos($asset);
```

### Encode asset

To perform media file encoding you will need input asset ($inputAsset) with a file in it (something like in previous chapter). Also you need to create an array of task data objects and a job data object. To create a task object use a media processor, task XML body and configuration name.
```PHP
$mediaProcessor = $this->restProxy->getLatestMediaProcessor('[Media processor]');

$task = new Task('[Task XML body]', $mediaProcessor->getId(), TaskOptions::NONE);
$task->setConfiguration('[Configuration name]');

$restProxy->createJob(new Job(), array($inputAsset), array($task));
```

### Get public URL to encoded asset

After you’ve uploaded a media file and encode it you can get a download URL for that file or a streaming URL for multiple bitrate files. Create a new access policy with read permission and link it with job output asset via locator.

```PHP
$accessPolicy = new AccessPolicy('[Some access policy name]');
$accessPolicy->setDurationInMinutes([Munites AccessPolicy is valid]);
$accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
$accessPolicy = $restProxy->createAccessPolicy($accessPolicy);

// Download URL
$sasLocator = new Locator($asset, $accessPolicy, Locator::TYPE_SAS);
$sasLocator->setStartTime(new \DateTime('now -5 minutes'));
$sasLocator = $restProxy->createLocator($sasLocator);

// Azure needs time to publish media
sleep(30);

$downloadUrl = $sasLocator->getBaseUri() . '/' . '[File name]' . $sasLocator->getContentAccessComponent()

// Streaming URL
$originLocator = new Locator($asset, $accessPolicy, Locator::TYPE_ON_DEMAND_ORIGIN);
$originLocator = $restProxy->createLocator($originLocator);

// Azure needs time to publish media
sleep(30);

$streamingUrl = $originLocator->getPath() . '[Manifest file name]' . "/manifest";
```

### Manage media services entities

Media services CRUD operations are performed through media services rest proxy class. It has methods like “createAsset”, “createLocator”, “createJob” and etc. for entities creations.

To retrieve all entities list you may use methods “getAssetList”, “getAccessPolicyList”, “getLocatorList”, “getJobList” and etc. For getting single entity data use methods “getAsset”, “getJob”, “getTask” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter.

Update entities with methods like “updateLocator”, “updateAsset”, “updateAssetFile” and etc. passing the entity data model object as a parameter. It is important to have valid entity identifier specified in data model object.

Erase entities with methods like “deleteAsset”, “deleteAccessPolicy”, “deleteJob” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter.

Also you could get linked entities with methods “getAssetLocators”, “getAssetParentAssets”, “getAssetStorageAccount”, “getLocatorAccessPolicy”, “getJobTasks” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter.

The complete list of all methods available you could find in [IMediaServices](src/MediaServices/Internal/IMediaServices.php) interface.

**For more examples please see the [Microsoft Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php)**

# Need Help?

Be sure to check out the Microsoft Azure [Developer Forums on Stack Overflow](http://go.microsoft.com/fwlink/?LinkId=234489) if you have trouble with the provided code.

# Contribute Code or Provide Feedback

If you would like to become an active contributor to this project please follow the instructions provided in [Microsoft Azure Projects Contribution Guidelines](http://windowsazure.github.com/guidelines.html).

To setup your development environment, follow the instructions in this [wiki page](https://github.com/Azure/azure-sdk-for-php/wiki/Devbox-installation-guide).

If you encounter any bugs with the library please file an issue in the [Issues](https://github.com/Azure/azure-sdk-for-php/issues) section of the project.

# Learn More
[Microsoft Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/)

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). For more information see the [Code of Conduct FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or
contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional questions or comments.
