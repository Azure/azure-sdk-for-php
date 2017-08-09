<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class Artifacts
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Artifacts_List');
        $this->_Get_operation = $_client->createOperation('Artifacts_Get');
        $this->_GenerateArmTemplate_operation = $_client->createOperation('Artifacts_GenerateArmTemplate');
    }
    /**
     * List artifacts in a given artifact source.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $artifactSourceName
     * @param string|null $_expand
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $artifactSourceName,
        $_expand = null,
        $_filter = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'artifactSourceName' => $artifactSourceName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Get artifact.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $artifactSourceName
     * @param string $name
     * @param string|null $_expand
     * @return array
     */
    public function get(
        $resourceGroupName,
        $labName,
        $artifactSourceName,
        $name,
        $_expand = null
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'artifactSourceName' => $artifactSourceName,
            'name' => $name,
            '$expand' => $_expand
        ]);
    }
    /**
     * Generates an ARM template for the given artifact, uploads the required files to a storage account, and validates the generated artifact.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string $artifactSourceName
     * @param string $name
     * @param array $generateArmTemplateRequest
     * @return array
     */
    public function generateArmTemplate(
        $resourceGroupName,
        $labName,
        $artifactSourceName,
        $name,
        array $generateArmTemplateRequest
    )
    {
        return $this->_GenerateArmTemplate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            'artifactSourceName' => $artifactSourceName,
            'name' => $name,
            'generateArmTemplateRequest' => $generateArmTemplateRequest
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
    private $_GenerateArmTemplate_operation;
}
