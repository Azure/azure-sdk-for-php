<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class ArtifactSources
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('ArtifactSources_List');
        $this->_Get_operation = $_client->createOperation('ArtifactSources_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ArtifactSources_CreateOrUpdate');
        $this->_Delete_operation = $_client->createOperation('ArtifactSources_Delete');
        $this->_Update_operation = $_client->createOperation('ArtifactSources_Update');
    }
    /**
     * List artifact sources in a given lab.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $_expand
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $_expand,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get artifact source.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $name,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Create or replace an existing artifact source.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $artifactSource
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $labName,
        $name,
        array $artifactSource
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'artifactSource' => $artifactSource
        ]);
    }
    /**
     * Delete artifact source.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     */
    public function delete(
        $resourceGroupName,
        $labName,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name
        ]);
    }
    /**
     * Modify properties of artifact sources.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $name
     * @param array $artifactSource
     * @return array
     */
    public function update(
        $resourceGroupName,
        $labName,
        $name,
        array $artifactSource
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'name' => $name,
            'artifactSource' => $artifactSource
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
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
