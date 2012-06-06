# Windows Azure SDK for PHP

This project provides a set of PHP client libraries that make it easy to access
Windows Azure tables, blobs, queues, service runtime and service management APIs. For documentation on how to host PHP applications on Windows Azure, please see the
[Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/).

# Features

* Tables
    * create and delete tables
    * create, query, insert, update, merge, and delete entities
	* batch operations
* Blobs
    * create, list, and delete containers, work with container metadata and permissions, list blobs in container
    * create block and page blobs (from a stream or a string), work with blob blocks and pages, delete blobs
    * work with blob properties, metadata, leases, snapshot a blob
* Storage Queues
    * create, list, and delete queues, and work with queue metadata and properties
    * create, get, peek, update, delete messages
* Service Runtime
    * discover addresses and ports for the endpoints of other role instances in your service
    * get configuration settings and access local resources
    * get role instance information for current role and other role instances
    * query and set the status of the current role
* Service Management
	* create, update, delete, list storage services
	* create, update, delete, list affinity groups

# Getting Started
## Download Source Code

To get the source code from GitHub, type

    git clone https://github.com/WindowsAzure/azure-sdk-for-php.git
    cd ./azure-sdk-for-php

**Note**

The PHP Client Libraries for Windows Azure have a dependency on the [HTTP_Request2](http://pear.php.net/package/HTTP_Request2), [Mail_mime](http://pear.php.net/package/Mail_mime), and [Mail_mimeDecode](http://pear.php.net/package/Mail_mimeDecode) PEAR packages. The recommended way to resolve these dependencies is to install them using the [PEAR package manager](http://pear.php.net/manual/en/installation.php).


## Download Package

Alternatively, you can download the client libraries and all dependencies using the PHP package manager PEAR:

1. [Install PEAR](http://pear.php.net/manual/en/installation.php).
2. Install the PEAR package:

		pear install pear.windowsazure.com/WindowsAzure

# Usage

## Table Storage

### Getting Started

There are four basic steps that have to be performed before you can make a call to a Windows Azure Table API when using the libraries. 

* First, include the autoloader script:

		require_once "WindowsAzure/WindowsAzure.php"; 
	
* Include the namespaces you are going to use.

	Before you can access any of the services you must set your authentication credentials up in an instance of the `Configuration` class:

		use WindowsAzure\Common\Configuration;

	For accessing Table storage the minimum you need is:

		use WindowsAzure\Table\TableService;
		use WindowsAzure\Table\TableSettings;

	To process exceptions you need:

		use WindowsAzure\Common\ServiceException;

	[Error Codes and Messages](http://msdn.microsoft.com/en-us/library/windowsazure/dd179438.aspx)
	
* To set-up your authentication information:

		$config = new Configuration();
		$config->setProperty(TableSettings::ACCOUNT_NAME, 
			'[YOUR_STORAGE_ACCOUNT_NAME]');
		$config->setProperty(TableSettings::ACCOUNT_KEY,
			'[YOUR_STORAGE_ACCOUNT_KEY]');
		$config->setProperty(TableSettings::URI, 
			'http://' . '[YOUR_STORAGE_ACCOUNT_NAME]' .
			'.table.core.windows.net');

* To make calls to a Windows Azure Table you instantiate a "REST Proxy" for it. You do so using the TableService factory:

		$tableRestProxy = TableService::create($config);


### Create a table

To create a table call **createTable**:

```PHP
try	{
	// Create table.
	$tableRestProxy->createTable("mytable");
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

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
}
catch(ServiceException $e){
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
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}

$entities = $result->getEntities();

foreach($entities as $entity){
	echo $entity->getPartitionKey().":".$entity->getRowKey()."<br />";
}
```

### Updating an entity

An existing entity can be updated by using the **Entity->setProperty** and **Entity->addProperty** methods on the entity, and then calling **TableRestProxy->updateEntity**. The following example retrieves an entity, modifies one property, removes another property, and adds a new property. Note that removing a property is done by setting its value to **null**. 

```PHP
$result = $tableRestProxy->getEntity("mytable", "pk", 1);

$entity = $result->getEntity();

$entity->setPropertyValue("OneProperty", 'New Value');

$entity->addProperty("AnotherProperty", EdmType::STRING, 'Another Value');

try	{
	$tableRestProxy->updateEntity("mytable", $entity);
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Deletig an entity

To delete an entity simply call **deleteEntity**:

```PHP
try	{
	// Delete entity.
	$tableRestProxy->deleteEntity("mytable", "pk", "rk");
}
catch(ServiceException $e){

	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```



## Blob Storage

### Getting Started

There are four basic steps that have to be performed before you can make a call to a Windows Azure Blob API when using the libraries. 

* First, include the autoloader script:

		require_once "WindowsAzure/WindowsAzure.php"; 
	
* Include the namespaces you are going to use.

	Before you can access any of the services you must set your authentication credentials up in an instance of the `Configuration` class:

		use WindowsAzure\Common\Configuration;

	For accessing Blob storage the minimum you need is:

		use WindowsAzure\Blob\BlobService;
		use WindowsAzure\Blob\BlobSettings;

	To process exceptions you need:

		use WindowsAzure\Common\ServiceException;

	[Error Codes and Messages](http://msdn.microsoft.com/en-us/library/windowsazure/dd179439.aspx)
	
* To set-up your authentication information:

		$config = new Configuration();
		$config->setProperty(BlobSettings::ACCOUNT_NAME, 	'[YOUR_STORAGE_ACCOUNT_NAME]');
		$config->setProperty(BlobSettings::ACCOUNT_KEY, 	'[YOUR_STORAGE_ACCOUNT_KEY]');
		$config->setProperty(BlobSettings::URI, 
			'http://' . '[YOUR_STORAGE_ACCOUNT_NAME]' .
			'.blob.core.windows.net');
	
* To make calls to a Windows Azure Blob you instantiate a "REST Proxy" for it. You do so using the TableService factory:

		$blobRestProxy = BlobService::create($config);

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
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

For more information about container ACLs, see [Set Container ACL (REST API)](http://msdn.microsoft.com/en-us/library/windowsazure/dd179391.aspx).


### Upload a blob

To upload a file as a blob, use the **BlobRestProxy->createBlockBlob** method. This operation will create the blob if it doesn’t exist, or overwrite it if it does. The code example below assumes that the container has already been created and uses [fopen](http://www.php.net/fopen) to open the file as a stream.

```PHP
$content = fopen("c:\myfile.txt", "r");
$blob_name = "myblob";

try	{
	//Upload blob
	$blobRestProxy->createBlockBlob("mycontainer", $blob_name, $content);
}
catch(ServiceException $e){
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
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Download a blob

To download a blob, call the **BlobRestProxy->getBlob** method, then call the **getContentStream** method on the resulting **GetBlobResult** object.

```PHP
try	{
	// Get blob.
	$blob = $blobRestProxy->getBlob("mycontainer", "myblob");
	fpassthru($blob->getContentStream());
}
catch(ServiceException $e){
	// Handle exception based on error codes and messages.
	// Error codes and messages are here: 
	// http://msdn.microsoft.com/en-us/library/windowsazure/dd179439.aspx
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

Note that the example above gets a blob as a stream resource. However, you can use the [stream\_get\_contents](http://www.php.net/stream_get_contents) function to convert the returned stream to a string.

### Delete a blob

To delete a blob, pass the container name and blob name to **BlobRestProxy->deleteBlob**. 

```PHP
try	{
	// Delete container.
	$blobRestProxy->deleteBlob("mycontainer", "myblob");
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Delete a container

Finally, to delete a blob container, pass the container name to **BlobRestProxy->deleteContainer**.

```PHP
try	{
	// Delete container.
	$blobRestProxy->deleteContainer("mycontainer");
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

## Storage Queues

### Getting Started

There are four basic steps that have to be performed before you can make a call to a Windows Azure Queues API when using the libraries. 

* First, include the autoloader script:

		require_once "WindowsAzure/WindowsAzure.php"; 
	
* Include the namespaces you are going to use.

	Before you can access any of the services you must set your authentication credentials up in an instance of the `Configuration` class:

		use WindowsAzure\Common\Configuration;

	For accessing Queues the minimum you need is:

		use WindowsAzure\Queue\QueueService;
		use WindowsAzure\Queue\QueueSettings;

	To process exceptions you need:

		use WindowsAzure\Common\ServiceException;

	[Error Codes and Messages](http://msdn.microsoft.com/en-us/library/windowsazure/dd179446.aspx)
	
* To set-up your authentication information:

		$config = new Configuration();
		$config->setProperty(QueueSettings::ACCOUNT_NAME, 	'[YOUR_STORAGE_ACCOUNT_NAME]');
		$config->setProperty(QueueSettings::ACCOUNT_KEY, 	'[YOUR_STORAGE_ACCOUNT_KEY]');
		$config->setProperty(QueueSettings::URI, 
			'http://' . '[YOUR_STORAGE_ACCOUNT_NAME]' .
			'.queue.core.windows.net');
	
* To make calls to a Windows Azure Queues you instantiate a "REST Proxy" for it. You do so using the QueueService factory:

		$queueRestProxy = QueueService::create($config);

### Create a queue

A **QueueRestProxy** object lets you create a queue with the **createQueue** method. When creating a queue, you can set options on the queue, but doing so is not required.

```PHP
$createQueueOptions = new CreateQueueOptions();
$createQueueOptions->addMetaData("key1", "value1");
$createQueueOptions->addMetaData("key2", "value2");

try	{
	// Create queue.
	$queueRestProxy->createQueue("myqueue", $createQueueOptions);
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Add a message to a queue

To add a message to a queue, use **QueueRestProxy->createMessage**. The method takes the queue name, the message text, and message options (which are optional).

```PHP
try	{
	// Create message.
	$queueRestProxy->createMessage("myqueue", "Hello World!");
}
catch(ServiceException $e){
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
}
catch(ServiceException $e){
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
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Change the contents of a queued message

You can change the contents of a message in-place in the queue by calling **QueueRestProxy->updateMessage**.

```PHP
// Get message.
$listMessagesResult = $queueRestProxy->listMessages("myqueue");
$messages = $listMessagesResult->getQueueMessages();
$message = $messages[0];

// Define new message properties.
$new_message_text = "New message text.";
$new_visibility_timeout = 5; // Measured in seconds. 

// Get message Id and pop receipt.
$messageId = $message->getMessageId();
$popReceipt = $message->getPopReceipt();

try	{
	// Update message.
	$queueRestProxy->updateMessage("myqueue", 
								$messageId, 
								$popReceipt, 
								$new_message_text, 
								$new_visibility_timeout);
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

### Get queue length

You can get an estimate of the number of messages in a queue. The **QueueRestProxy->getQueueMetadata** method asks the queue service to return metadata about the queue. Calling the **getApproximateMessageCount** method on the returned object provides a count of how many messages are in a queue. The count is only approximate because messages can be added or removed after the queue service responds to your request.

```PHP
try	{
	// Get queue metadata.
	$queue_metadata = $queueRestProxy->getQueueMetadata("myqueue");
	$approx_msg_count = $queue_metadata->getApproximateMessageCount();
}
catch(ServiceException $e){
	$code = $e->getCode();
	$error_message = $e->getMessage();
	echo $code.": ".$error_message."<br />";
}
```

**For more examples please see the [Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php)**

# Need Help?

Be sure to check out the Windows Azure [Developer Forums on Stack Overflow](http://go.microsoft.com/fwlink/?LinkId=234489) if you have trouble with the provided code.

# Contribute Code or Provide Feedback

If you would like to become an active contributor to this project please follow the instructions provided in [Windows Azure Projects Contribution Guidelines](http://windowsazure.github.com/guidelines.html).

If you encounter any bugs with the library please file an issue in the [Issues](https://github.com/WindowsAzure/azure-sdk-for-php/issues) section of the project.

# Learn More
[Windows Azure PHP Developer Center](http://www.windowsazure.com/en-us/develop/php/)
