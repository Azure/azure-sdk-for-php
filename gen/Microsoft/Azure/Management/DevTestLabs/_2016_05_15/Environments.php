<?php
namespace Microsoft\Azure\Management\DevTestLabs\_2016_05_15;
final class Environments
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Environments_List');
        $this->_Get_operation = $_client->createOperation('Environments_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('Environments_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('Environments_Delete');
    }
    /**
     * List environments in a given user profile.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $userName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get environment.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing environment. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     * @param array $dtlEnvironment
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $userName,
        $name,
        array $dtlEnvironment
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name,
            'dtlEnvironment' => $dtlEnvironment
        ]);
    }
    /**
     * Delete environment. This operation can take a while to complete.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $userName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $userName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'userName' => $userName,
            'name' => $name
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
}
