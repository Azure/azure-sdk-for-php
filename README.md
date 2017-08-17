# Azure SDK for PHP

https://packagist.org/packages/microsoft/windowsazure#dev-arm2

```
composer require microsoft/windowsazure:dev-arm2
```

Requirements are
- PHP 5.6 or higher.

## An Example

```php
use Microsoft\Azure\Management\Resource\ResourceManagementClient;
use Microsoft\Rest\Azure\AzureStatic;

$subscriptionId = '...';
$applicationId = '...';
$tenantId = '...';
$clientSecret = '...';

$runTime = AzureStatic::create($applicationId, $tenantId, $clientSecret);

$rm = new ResourceManagementClient($runTime, $subscriptionId);

$resourceGroups = $rm->getResourceGroups();
$result = $resourceGroups->createOrUpdate('test-resource-group', ['location' => 'East US']);
print_r($result);

$resourceGroups->update('test-resource-group', []);
$result = $resourceGroups->delete('test-resource-group');
print_r($result);

$result = $resourceGroups->list_('', null);
print_r($result);

$result = $resourceGroups->get('test-resource-group');
print_r($result);

$result = $resourceGroups->checkExistence('test-resource-group');
print_r($result);

$result = $resourceGroups->exportTemplate('test-resource-group', ['resources' => ['*']]);
print_r($result);
```