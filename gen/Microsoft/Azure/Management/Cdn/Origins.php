<?php
namespace Microsoft\Azure\Management\Cdn;
final class Origins
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByEndpoint_operation = $_client->createOperation('Origins_ListByEndpoint');
        $this->_Get_operation = $_client->createOperation('Origins_Get');
        $this->_Update_operation = $_client->createOperation('Origins_Update');
    }
    /**
     * Lists all of the existing origins within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @return array
     */
    public function listByEndpoint(
        $resourceGroupName,
        $profileName,
        $endpointName
    )
    {
        return $this->_ListByEndpoint_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName
        ]);
    }
    /**
     * Gets an existing origin within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $originName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $originName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'originName' => $originName
        ]);
    }
    /**
     * Updates an existing origin within an endpoint.
     * @param string $resourceGroupName
     * @param string $profileName
     * @param string $endpointName
     * @param string $originName
     * @param array $originUpdateProperties
     * @return array
     */
    public function update(
        $resourceGroupName,
        $profileName,
        $endpointName,
        $originName,
        array $originUpdateProperties
    )
    {
        return $this->_Update_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'profileName' => $profileName,
            'endpointName' => $endpointName,
            'originName' => $originName,
            'originUpdateProperties' => $originUpdateProperties
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByEndpoint_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Update_operation;
}
