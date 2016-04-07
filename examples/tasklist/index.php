<!DOCTYPE html>
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

require_once '..\client\client.php';
use Client\CloudSubscription;
use Client\CloudTable;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Table\Models\EdmType;

date_default_timezone_set('America/Los_Angeles');

$subscriptionId      = 'Your subscription';
$certificatePath     = 'Certificate path';
$storageServiceName  = 'phpsdkexamples'; // Storage account may change if it already exists in another subscription.
$tasksTableName      = 'tasks';
$cloudSubscription   = null;
$cloudStorageService = null;
$cloudTable          = null;

// Initialize;
$cloudSubscription   = new CloudSubscription($subscriptionId, $certificatePath);
$cloudStorageService = $cloudSubscription->createStorageService($storageServiceName);
$cloudTable          = $cloudStorageService->createTable($tasksTableName);

if (array_key_exists('Completed', $_POST)) {
    // Remove completed item.
    $completed = $_POST['Completed'];
    $cloudTable->deleteEntity($completed);
} else if (array_key_exists('AddItem', $_POST)) {
    $item             = $_POST['item'];
    $item['Complete'] = '0';
    $cloudTable->insertTypelessEntity($item);
} else if (array_key_exists('ClearList', $_POST)) {
    // Remove the table service.
    $deleted    = $cloudStorageService->deleteTable($tasksTableName);
    $cloudTable = null;
    if ($deleted) {
        // Sleep until the table is deleted
        sleep(40);
    }
} else if (array_key_exists('DestroyList', $_POST)) {
    // Clean and remove the storage service.
    $cloudSubscription->deleteStorageService($storageServiceName);
    $cloudSubscription = null;
}

if (!is_null($cloudTable)) {
    listEntries($cloudTable);
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
                    <input name="item[Name]" type="text" />
                </td>
            </tr>
                <td>Item Category:</td>
                <td>
                    <input name="item[Category]" type="text" />
                </td>
            <tr>
            </tr>
            <tr>
                <td>Item Date:</td>
                <td>
                    <input name="item[Date]" type="text" />
                </td>
            </tr>
        </table>
        <input type="submit" value="Add item" name="AddItem"/>
        <input type="submit" value="Complete List" name="ClearList"/>
        <hr />
        Clean and remove storage service
        <br />
        <input type="submit" value="Click me!" name="DestroyList" />
    </form>
    
</body>
</html>
