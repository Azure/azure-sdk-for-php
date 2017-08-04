<?php
namespace Microsoft\Azure\Management\Batch\_2017_05_01;
final class Application
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Create_operation = $_client->createOperation('Application_Create');
        $this->_Delete_operation = $_client->createOperation('Application_Delete');
        $this->_Get_operation = $_client->createOperation('Application_Get');
        $this->_Update_operation = $_client->createOperation('Application_Update');
        $this->_List_operation = $_client->createOperation('Application_List');
    }
    /**
     * Adds an application to the specified Batch account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $accountName,
        $applicationId,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Deletes an application.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $applicationId
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId
        ]);
    }
    /**
     * Gets information about the specified application.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $applicationId
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId
        ]);
    }
    /**
     * Updates settings for the specified application.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param array $parameters
     */
    public function update(
        $resourceGroupName,
        $accountName,
        $applicationId,
        array $parameters
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Lists all of the applications in the specified account.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param integer $maxresults
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $accountName,
        $maxresults
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'maxresults' => $maxresults
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
