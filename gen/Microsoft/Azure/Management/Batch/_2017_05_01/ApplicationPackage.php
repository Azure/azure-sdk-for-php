<?php
namespace Microsoft\Azure\Management\Batch\_2017_05_01;
final class ApplicationPackage
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Activate_operation = $_client->createOperation('ApplicationPackage_Activate');
        $this->_Create_operation = $_client->createOperation('ApplicationPackage_Create');
        $this->_Delete_operation = $_client->createOperation('ApplicationPackage_Delete');
        $this->_Get_operation = $_client->createOperation('ApplicationPackage_Get');
    }
    /**
     * Activates the specified application package.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param string $version
     * @param array $parameters
     */
    public function activate(
        $resourceGroupName,
        $accountName,
        $applicationId,
        $version,
        array $parameters
    )
    {
        return $this->_Activate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'version' => $version,
            'parameters' => $parameters
        ]);
    }
    /**
     * Creates an application package record.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param string $version
     * @return array
     */
    public function create(
        $resourceGroupName,
        $accountName,
        $applicationId,
        $version
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'version' => $version
        ]);
    }
    /**
     * Deletes an application package record and its associated binary file.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param string $version
     */
    public function delete(
        $resourceGroupName,
        $accountName,
        $applicationId,
        $version
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'version' => $version
        ]);
    }
    /**
     * Gets information about the specified application package.
     * @param string $resourceGroupName
     * @param string $accountName
     * @param string $applicationId
     * @param string $version
     * @return array
     */
    public function get(
        $resourceGroupName,
        $accountName,
        $applicationId,
        $version
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'accountName' => $accountName,
            'applicationId' => $applicationId,
            'version' => $version
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Activate_operation;
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
}
