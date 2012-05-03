<!--
Copyright 2012 Microsoft Corporation

LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
-->

<html>
    <head>
        <title>Index</title>
    </head>
<body>
    <h1>My Task List</h1>
    <table border="1" cellpadding="3">
        <tr>
            <td>Name</td>
            <td>Category</td>
            <td>Date</td>
            <td>Complete</td>
        </tr>
<?php

require_once '..\Client.php';
use Client\CloudSubscription;
use Client\CloudTable;
use WindowsAzure\Utilities;
use WindowsAzure\Services\Table\Models\EdmType;

$subscriptionId     = 'Your Subscription Id';
$certificatePath    = 'Subscription Certificate';
$defaultParitionKey = '123';
$storageServiceName = 'azuresdkexamples'; // The storage service name would be changed if it already exists in another subscription.
$tasksTableName     = 'tasks';

$cloudSubscription   = new CloudSubscription($subscriptionId, $certificatePath);

destroyListAction($cloudSubscription, $storageServiceName);

$cloudStorageService = $cloudSubscription->createStorageService($storageServiceName);

$deleted = clearListAction($cloudStorageService, $tasksTableName);

if ($deleted) {
    // Sleep until the table is deleted.
    sleep(40);
}

$cloudTable = $cloudStorageService->createTable($tasksTableName);
$cloudTable->setDefaultPartitionKey($defaultParitionKey);

removeCompletedItemAction($cloudTable);

addNewItemAction($cloudTable);

listEntries($cloudTable);



function destroyListAction($cloudSubscription, $storageServiceName)
{
    $destroy = Utilities::tryGetValue($_POST, 'DestroyList');
    if (!is_null($destroy)) {
        $cloudSubscription->deleteStorageService($storageServiceName);
    }
}

function clearListAction($cloudStorageService, $tasksTableName)
{
    $clear = Utilities::tryGetValue($_POST, 'ClearList');
    if (!is_null($clear)) {
        $cloudStorageService->deleteTable($tasksTableName);
        return true;
    }
    
    return false;
}

function removeCompletedItemAction($cloudTable)
{
    $completed = Utilities::tryGetValue($_POST, 'Completed');
    if (!is_null($completed)) {
        $cloudTable->deleteEntity($completed);
    }
}

function addNewItemAction($cloudTable)
{
    $addItem = Utilities::tryGetValue($_POST, 'AddItem');

    if (!is_null($addItem)) {
        $item             = $_POST['item'];
        $item['Complete'] = '0';
        $cloudTable->insertTypelessEntity($item);
    }
}

function listEntries($cloudTable)
{
    $result         = $cloudTable->queryEntities();
    $entities       = $result->getEntities();

    foreach ($entities as $entity) {
        $name     = $entity->getPropertyValue('Name');
        $category = $entity->getPropertyValue('Category');
        $date     = $entity->getPropertyValue('Date');
        $complete = $entity->getPropertyValue('RowKey');
        echo "<tr>
                <td>$name</td>
                <td>$category</td>
                <td>$date</td>
                <form action=\"index.php\" method=\"post\">
                <td><input type=\"checkbox\" name=\"Completed\" value=\"$complete\" 
                            onchange=\"form.submit()\"/></td>
                </form>
            </tr>";
    }
}

?>
    </table>
    <hr>
    <form action="index.php" method="post">
        <table border="1">
            <tr>
                <td>Item Name:</td>
                <td>
                    <input name="item[Name]" type="textbox" />
                </td>
            </tr>
                <td>Item Category:</td>
                <td>
                    <input name="item[Category]" type="textbox" />
                </td>
            <tr>
            </tr>
            <tr>
                <td>Item Date:</td>
                <td>
                    <input name="item[Date]" type="textbox" />
                </td>
            </tr>
        </table>
        <p>
            <input type="submit" value="Add item" name="AddItem"/>
            <input type="submit" value="Clear List" name="ClearList"/>
            <input type="submit" value="Destroy List" name="DestroyList"/>
        </p>
    </form>
    <form action="index.php" method="post">
        
    </form>
    
</body>
</html>
