<?php
namespace Microsoft\Azure\Management\Monitor;
final class LogProfiles
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Delete_operation = $_client->createOperation('LogProfiles_Delete');
        $this->_Get_operation = $_client->createOperation('LogProfiles_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('LogProfiles_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('LogProfiles_Update');
        $this->_List_operation = $_client->createOperation('LogProfiles_List');
    }
    /**
     * Deletes the log profile.
     * @param string $logProfileName
     */
    public function delete($logProfileName)
    {
        return $this->_Delete_operation->call(['logProfileName' => $logProfileName]);
    }
    /**
     * Gets the log profile.
     * @param string $logProfileName
     * @return array
     */
    public function get($logProfileName)
    {
        return $this->_Get_operation->call(['logProfileName' => $logProfileName]);
    }
    /**
     * Create or update a log profile in Azure Monitoring REST API.
     * @param string $logProfileName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $logProfileName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'logProfileName' => $logProfileName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing LogProfilesResource. To update other fields use the CreateOrUpdate method.
     * @param string $logProfileName
     * @param array $logProfilesResource
     * @return array
     */
    public function update(
        $logProfileName,
        array $logProfilesResource
    )
    {
        return $this->_Update_operation->call([
            'logProfileName' => $logProfileName,
            'logProfilesResource' => $logProfilesResource
        ]);
    }
    /**
     * List the log profiles.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
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
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
