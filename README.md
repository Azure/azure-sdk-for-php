# Windows Azure SDK for PHP

This project provides a set of PHP client libraries that make it easy to access
Windows Azure tables, blobs, queues, service bus (queues and topics), service runtime and service management APIs. For documentation on how to host PHP applications on Windows Azure, please see the
[Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/).

# Features

* Tables
	* create and delete tables
	* create, query, insert, update, merge, and delete entities
	* batch operations
	* REST API Version: 2011-08-18
* Blobs
	* create, list, and delete containers, work with container metadata and permissions, list blobs in container
	* create block and page blobs (from a stream or a string), work with blob blocks and pages, delete blobs
	* work with blob properties, metadata, leases, snapshot a blob
	* REST API Version: 2011-08-18 
* Storage Queues
	* create, list, and delete queues, and work with queue metadata and properties
	* create, get, peek, update, delete messages
	* REST API Version: 2011-08-18 
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
	* REST API Version: 2.2

	
# Getting Started
## Download Source Code

To get the source code from GitHub, type

    git clone https://github.com/WindowsAzure/azure-sdk-for-php.git
    cd ./azure-sdk-for-php

> **Note**
> 
> The PHP Client Libraries for Windows Azure have a dependency on the [HTTP_Request2](http://pear.php.net/package/HTTP_Request2), [Mail_mime](http://pear.php.net/package/Mail_mime), and [Mail_mimeDecode](http://pear.php.net/package/Mail_mimeDecode) PEAR packages. The recommended way to resolve these dependencies is to install them using the [PEAR package manager](http://pear.php.net/manual/en/installation.php).


##Install via Composer

1. Create a file named **composer.json** in the root of your project and add the following code to it:

		{
			"require": {
				"microsoft/windowsazure": "*"
			},			
			"repositories": [
				{
					"type": "pear",
					"url": "http://pear.php.net"
				}
			],
			"minimum-stability": "dev"
		}

2. Download **[composer.phar](http://getcomposer.org/composer.phar)** in your project root.

3. Open a command prompt and execute this in your project root

		php composer.phar install

	> **Note**
	>
	> On Windows, you will also need to add the Git executable to your PATH environment variable.


##Install as a PEAR package

To install the PHP Client Libraries for Windows Azure as a PEAR package, follow these steps:

1. [Install PEAR](http://pear.php.net/manual/en/installation.getting.php).
2. Set-up the Windows Azure PEAR channel:

		pear channel-discover pear.windowsazure.com
3. Install the PEAR package:

		pear install pear.windowsazure.com/WindowsAzure-0.4.0


# Usage

## Getting Started

There are four basic steps that have to be performed before you can make a call to any Windows Azure API when using the libraries. 

* First, include the autoloader script:

	If installed via PEAR or Git:

		require_once "WindowsAzure/WindowsAzure.php"; 

	If installed via Composer:
		
		require_once "vendor/autoload.php"; 
	
* Include the namespaces you are going to use.

	To create any Windows Azure service client you need to use the **ServicesBuilder** class:

		use WindowsAzure\Common\ServicesBuilder;

	To process exceptions you need:

		use WindowsAzure\Common\ServiceException;

	
* To instantiate the service client you will also need a valid connection string. The format is: 

	* For accessing a live storage service (tables, blobs, queues):
	
			DefaultEndpointsProtocol=[http|https];AccountName=[yourAccount];AccountKey=[yourKey]
	
	* For accessing the emulator storage:
	
			UseDevelopmentStorage=true

	* For accessing the Service Bus:

			Endpoint=[yourEndpoint];SharedSecretIssuer=[yourWrapAuthenticationName];SharedSecretValue=[yourWrapPassword]

		Where the Endpoint is typically of the format `https://[yourNamespace].servicebus.windows.net`.

	* For accessing Service Management APIs:

			SubscriptionID=[yourSubscriptionId];CertificatePath=[filePathToYourCertificate]


* Instantiate a "REST Proxy" - a wrapper around the available calls for the given service.

	* For the Storage services:

			$tableRestProxy = ServicesBuilder::getInstance()->createTableService($connectionString);
			$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
			$queueRestProxy = ServicesBuilder::getInstance()->createQueueService($connectionString);

	* For Service Bus:

			$serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($connectionString);

	* For Service Management:

			$serviceManagementRestProxy = ServicesBuilder::getInstance()->createServiceManagementService($connectionString);

	* For Media Services:

			$mediaServicesRestProxy = ServicesBuilder->getInstance()->createMediaServicesService(new MediaServicesSettings([YourAccountName], [YourPrimaryOrSecondaryAccessKey]));

## Table Storage

The following are examples of common operations performed with the Table serivce. For more please read [How-to use the Table service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/table-service/).

### Create a table

To create a table call **createTable**:

```PHP
try	{
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
use WindowsAzure\Table\Models\Entity;
use WindowsAzure\Table\Models\EdmType;

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

try	{
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

The following are examples of common operations performed with the Blob serivce. For more please read [How-to use the Blob service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/blob-service/).


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

try	{
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

try	{
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
try	{
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

The following are examples of common operations performed with the Queue serivce. For more please read [How-to use the Queue service](http://www.windowsazure.com/en-us/develop/php/how-to-guides/queue-service/).


### Create a queue

A **QueueRestProxy** object lets you create a queue with the **createQueue** method. When creating a queue, you can set options on the queue, but doing so is not required.

```PHP
$createQueueOptions = new CreateQueueOptions();
$createQueueOptions->addMetaData("key1", "value1");
$createQueueOptions->addMetaData("key2", "value2");

try	{
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

```PHP
try	{
	// Create message.
	$queueRestProxy->createMessage("myqueue", "Hello World!");
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

try	{
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
	foreach($messages as $message)	{
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

try	{
	// Delete message.
	$queueRestProxy->deleteMessage("myqueue", $messageId, $popReceipt);
} catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

## Service Bus Queues

### Create a Queue

```PHP
try	{
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
try	{
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
try	{
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
try	{		
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
try	{
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
try	{
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
try	{
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

	openssl req -x509 -nodes -days 365 -newkey rsa:1024 -keyout mycert.pem -out mycert.pem

To create the .cer certificate, execute this: 

	openssl x509 -inform pem -in mycert.pem -outform der -out mycert.cer

### List Available Locations

```PHP	
$serviceManagementRestProxy->listLocations();
$locations = $result->getLocations();
foreach($locations as $location){
      echo $location->getName()."<br />";
}
```

### Create a Storage Service

To create a storage service, you need a name for the service (between 3 and 24 lowercase characters and unique within Windows Azure), a label (a base-64 encoded name for the service, up to 100 characters), and either a location or an affinity group. Providing a description for the service is optional.

```PHP
$name = "mystorageservice";
$label = base64_encode($name);
$options = new CreateStorageServiceOptions();
$options->setLocation('West US');

$result = $serviceManagementRestProxy->createStorageService($name, $label, $options);
```
	
	
### Create a Cloud Service

A cloud service is also known as a hosted service (from earlier versions of Windows Azure).  The **createHostedServices** method allows you to create a new hosted service by providing a hosted service name (which must be unique in Windows Azure), a label (the base 64-endcoded hosted service name), and a **CreateServiceOptions** object which allows you to set the location *or* the affinity group for your service. 

```PHP
$name = "myhostedservice";
$label = base64_encode($name);
$options = new CreateServiceOptions();
$options->setLocation('West US');
// Instead of setLocation, you can use setAffinityGroup to set an affinity group.

$result = $serviceManagementRestProxy->createHostedService($name, $label, $options);
```

### Create a Deployment

To make a new deployment to Azure you must store the package file in a Windows Azure Blob Storage account under the same subscription as the hosted service to which the package is being uploaded. You can create a deployment package with the [Windows Azure PowerShell cmdlets](https://www.windowsazure.com/en-us/develop/php/how-to-guides/powershell-cmdlets/), or with the [cspack commandline tool](http://msdn.microsoft.com/en-us/library/windowsazure/gg432988.aspx).

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

##Media Services

###Create new asset with file

To create an asset with a file you need to create an empty asset, create access policy with write permission, create a locator joining your asset and access policy, perform actual upload and generate file info.
```PHP
$asset = new Asset(Asset::OPTIONS_NONE);
$asset = $restProxy->createAsset($asset);

$access = new AccessPolicy('[Some access policy name]');
$access->setDurationInMinutes([Munites AccessPolicy is valid]);
$access->setPermissions(AccessPolicy::PERMISSIONS_WRITE);
$access = $restProxy->createAccessPolicy($access);

$locator = new Locator($asset,  $access, Locator::TYPE_SAS);
$locator->setStartTime(new \DateTime('now -5 minutes'));
$locator = $restProxy->createLocator($locator);

$restProxy->uploadAssetFile($locator, '[file name]', '[file content]');
$restProxy->createFileInfos($asset);
```

###Encode asset

To perform media file encoding you will need input asset ($inputAsset) with a file in it (something like in previous chapter). Also you need to create an array of task data objects and a job data object. To create a task object use a media processor, task XML body and configuration name.
```PHP
$mediaProcessor = $this->restProxy->getLatestMediaProcessor('[Media processor]');

$task = new Task('[Task XML body]', $mediaProcessor->getId(), TaskOptions::NONE);
$task->setConfiguration('[Configuration name]');

$restProxy->createJob(new Job(), array($inputAsset), array($task));
```

###Get public URL to encoded asset

After you’ve uploaded a media file and encode it you can get a download URL for that file. Create a new access policy with read permission and link it with job output asset via locator.

```PHP
$accessPolicy = new AccessPolicy('[Some access policy name]');
$accessPolicy->setDurationInMinutes([Munites AccessPolicy is valid]);
$accessPolicy->setPermissions(AccessPolicy::PERMISSIONS_READ);
$accessPolicy = $restProxy->createAccessPolicy($accessPolicy);

$locator = new Locator($asset, $accessPolicy, Locator::TYPE_SAS);
$locator->setStartTime(new \DateTime('now -5 minutes'));
$locator = $restProxy->createLocator($locator);

// Azure needs time to publish media
sleep(30);

$url = $locator->getBaseUri() . '/' . '[File name]' . $locator->getContentAccessComponent()
```

###Manage media services entities

Media services CRUD operations are performed through media services rest proxy class. It has methods like “createAsset”, “createLocator”, “createJob” and etc. for entities creations. 

To retrieve all entities list you may use methods “getAssetList”, “getAccessPolicyList”, “getLocatorList”, “getJobList” and etc. For getting single entity data use methods “getAsset”, “getJob”, “getTask” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter. 

Update entities with methods like “updateLocator”, “updateAsset”, “updateAssetFile” and etc. passing the entity data model object as a parameter. It is important to have valid entity identifier specified in data model object. 

Erase entities with methods like “deleteAsset”, “deleteAccessPolicy”, “deleteJob” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter.

Also you could get linked entities with methods “getAssetLocators”, “getAssetParentAssets”, “getAssetStorageAccount”, “getLocatorAccessPolicy”, “getJobTasks” and etc. passing the entity identifier or entity data model object with non-empty identifier as a parameter.

The complete list of all methods available you could find in IMediaServices interface.

**For more examples please see the [Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php)**

# Need Help?

Be sure to check out the Windows Azure [Developer Forums on Stack Overflow](http://go.microsoft.com/fwlink/?LinkId=234489) if you have trouble with the provided code.

# Contribute Code or Provide Feedback

If you would like to become an active contributor to this project please follow the instructions provided in [Windows Azure Projects Contribution Guidelines](http://windowsazure.github.com/guidelines.html).

To setup your development environment, follow the instructions in this [wiki page](https://github.com/WindowsAzure/azure-sdk-for-php/wiki/Devbox-installation-guide).

If you encounter any bugs with the library please file an issue in the [Issues](https://github.com/WindowsAzure/azure-sdk-for-php/issues) section of the project.

# Learn More
[Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/)
