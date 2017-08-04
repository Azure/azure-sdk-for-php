<?php
namespace Microsoft\Azure\Management\Resource\_2017_05_10;
final class Deployments
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('Deployments_Delete');
        $this->_CheckExistence_operation = $_client->createOperation('Deployments_CheckExistence');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Deployments_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Deployments_Get');
        $this->_Cancel_operation = $_client->createOperation('Deployments_Cancel');
        $this->_Validate_operation = $_client->createOperation('Deployments_Validate');
        $this->_ExportTemplate_operation = $_client->createOperation('Deployments_ExportTemplate');
        $this->_ListByResourceGroup_operation = $_client->createOperation('Deployments_ListByResourceGroup');
    }
    /**
     * A template deployment that is currently running cannot be deleted. Deleting a template deployment removes the associated deployment operations. Deleting a template deployment does not affect the state of the resource group. This is an asynchronous operation that returns a status of 202 until the template deployment is successfully deleted. The Location response header contains the URI that is used to obtain the status of the process. While the process is running, a call to the URI in the Location header returns a status of 202. When the process finishes, the URI in the Location header returns a status of 204 on success. If the asynchronous request failed, the URI in the Location header returns an error-level status code.
     * @param string $resourceGroupName
     * @param string $deploymentName
     */
    public function delete(
        $resourceGroupName,
        $deploymentName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName
        ]);
    }
    /**
     * Checks whether the deployment exists.
     * @param string $resourceGroupName
     * @param string $deploymentName
     */
    public function checkExistence(
        $resourceGroupName,
        $deploymentName
    )
    {
        return $this->_CheckExistence_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName
        ]);
    }
    /**
     * You can provide the template and parameters directly in the request or link to JSON files.
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $deploymentName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a deployment.
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $deploymentName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName
        ]);
    }
    /**
     * You can cancel a deployment only if the provisioningState is Accepted or Running. After the deployment is canceled, the provisioningState is set to Canceled. Canceling a template deployment stops the currently running template deployment and leaves the resource group partially deployed.
     * @param string $resourceGroupName
     * @param string $deploymentName
     */
    public function cancel(
        $resourceGroupName,
        $deploymentName
    )
    {
        return $this->_Cancel_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName
        ]);
    }
    /**
     * Validates whether the specified template is syntactically correct and will be accepted by Azure Resource Manager..
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @param array $parameters
     * @return array
     */
    public function validate(
        $resourceGroupName,
        $deploymentName,
        array $parameters
    )
    {
        return $this->_Validate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Exports the template used for specified deployment.
     * @param string $resourceGroupName
     * @param string $deploymentName
     * @return array
     */
    public function exportTemplate(
        $resourceGroupName,
        $deploymentName
    )
    {
        return $this->_ExportTemplate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'deploymentName' => $deploymentName
        ]);
    }
    /**
     * Get all the deployments for a resource group.
     * @param string $resourceGroupName
     * @param string $_filter
     * @param integer $_top
     * @return array
     */
    public function listByResourceGroup(
        $resourceGroupName,
        $_filter,
        $_top
    )
    {
        return $this->_ListByResourceGroup_operation->call([
            'resourceGroupName' => $resourceGroupName,
            '$filter' => $_filter,
            '$top' => $_top
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckExistence_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Cancel_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Validate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ExportTemplate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByResourceGroup_operation;
}
