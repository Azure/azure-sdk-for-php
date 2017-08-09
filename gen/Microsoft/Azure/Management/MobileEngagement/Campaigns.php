<?php
namespace Microsoft\Azure\Management\MobileEngagement;
final class Campaigns
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Campaigns_List');
        $this->_Create_operation = $_client->createOperation('Campaigns_Create');
        $this->_Get_operation = $_client->createOperation('Campaigns_Get');
        $this->_Update_operation = $_client->createOperation('Campaigns_Update');
        $this->_Delete_operation = $_client->createOperation('Campaigns_Delete');
        $this->_GetByName_operation = $_client->createOperation('Campaigns_GetByName');
        $this->_TestSaved_operation = $_client->createOperation('Campaigns_TestSaved');
        $this->_TestNew_operation = $_client->createOperation('Campaigns_TestNew');
        $this->_Activate_operation = $_client->createOperation('Campaigns_Activate');
        $this->_Suspend_operation = $_client->createOperation('Campaigns_Suspend');
        $this->_Push_operation = $_client->createOperation('Campaigns_Push');
        $this->_GetStatistics_operation = $_client->createOperation('Campaigns_GetStatistics');
        $this->_Finish_operation = $_client->createOperation('Campaigns_Finish');
    }
    /**
     * Get the list of campaigns.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $_skip
     * @param integer $_top
     * @param string $_filter
     * @param string $_orderby
     * @param string $_search
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $_skip,
        $_top,
        $_filter,
        $_orderby,
        $_search
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            '$skip' => $_skip,
            '$top' => $_top,
            '$filter' => $_filter,
            '$orderby' => $_orderby,
            '$search' => $_search
        ]);
    }
    /**
     * Create a push campaign (announcement, poll, data push or native push).
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param array $parameters
     * @return array
     */
    public function create(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        array $parameters
    )
    {
        return $this->_Create_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'parameters' => $parameters
        ]);
    }
    /**
     * The Get campaign operation retrieves information about a previously created campaign.
     * @param string $kind
     * @param integer $id
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @return array
     */
    public function get(
        $kind,
        $id,
        $resourceGroupName,
        $appCollection,
        $appName
    )
    {
        return $this->_Get_operation->call([
            'kind' => $kind,
            'id' => $id,
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName
        ]);
    }
    /**
     * Update an existing push campaign (announcement, poll, data push or native push).
     * @param string $kind
     * @param integer $id
     * @param array $parameters
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @return array
     */
    public function update(
        $kind,
        $id,
        array $parameters,
        $resourceGroupName,
        $appCollection,
        $appName
    )
    {
        return $this->_Update_operation->call([
            'kind' => $kind,
            'id' => $id,
            'parameters' => $parameters,
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName
        ]);
    }
    /**
     * Delete a campaign previously created by a call to Create campaign.
     * @param string $kind
     * @param integer $id
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     */
    public function delete(
        $kind,
        $id,
        $resourceGroupName,
        $appCollection,
        $appName
    )
    {
        return $this->_Delete_operation->call([
            'kind' => $kind,
            'id' => $id,
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName
        ]);
    }
    /**
     * The Get campaign operation retrieves information about a previously created campaign.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param string $name
     * @return array
     */
    public function getByName(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $name
    )
    {
        return $this->_GetByName_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'name' => $name
        ]);
    }
    /**
     * Test an existing campaign (created with Create campaign) on a set of devices.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $id
     * @param array $parameters
     * @return array
     */
    public function testSaved(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $id,
        array $parameters
    )
    {
        return $this->_TestSaved_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'id' => $id,
            'parameters' => $parameters
        ]);
    }
    /**
     * Test a new campaign on a set of devices.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param array $parameters
     * @return array
     */
    public function testNew(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        array $parameters
    )
    {
        return $this->_TestNew_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'parameters' => $parameters
        ]);
    }
    /**
     * Activate a campaign previously created by a call to Create campaign.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $id
     * @return array
     */
    public function activate(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $id
    )
    {
        return $this->_Activate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'id' => $id
        ]);
    }
    /**
     * Suspend a push campaign previously activated by a call to Activate campaign.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $id
     * @return array
     */
    public function suspend(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $id
    )
    {
        return $this->_Suspend_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'id' => $id
        ]);
    }
    /**
     * Push a previously saved campaign (created with Create campaign) to a set of devices.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $id
     * @param array $parameters
     * @return array
     */
    public function push(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $id,
        array $parameters
    )
    {
        return $this->_Push_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'id' => $id,
            'parameters' => $parameters
        ]);
    }
    /**
     * Get all the campaign statistics.
     * @param string $kind
     * @param integer $id
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @return array
     */
    public function getStatistics(
        $kind,
        $id,
        $resourceGroupName,
        $appCollection,
        $appName
    )
    {
        return $this->_GetStatistics_operation->call([
            'kind' => $kind,
            'id' => $id,
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName
        ]);
    }
    /**
     * Finish a push campaign previously activated by a call to Activate campaign.
     * @param string $resourceGroupName
     * @param string $appCollection
     * @param string $appName
     * @param string $kind
     * @param integer $id
     * @return array
     */
    public function finish(
        $resourceGroupName,
        $appCollection,
        $appName,
        $kind,
        $id
    )
    {
        return $this->_Finish_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'appCollection' => $appCollection,
            'appName' => $appName,
            'kind' => $kind,
            'id' => $id
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
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
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetByName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TestSaved_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TestNew_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Activate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Suspend_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Push_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetStatistics_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Finish_operation;
}
