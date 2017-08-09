<?php
namespace Microsoft\Azure\Management\Monitor;
final class ServiceDiagnosticSettings
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ServiceDiagnosticSettings_Get');
        $this->_CreateOrUpdate_operation = $_client->createOperation('ServiceDiagnosticSettings_CreateOrUpdate');
        $this->_Update_operation = $_client->createOperation('ServiceDiagnosticSettings_Update');
    }
    /**
     * Gets the active diagnostic settings for the specified resource. **WARNING**: This method will be deprecated in future releases.
     * @param string $resourceUri
     * @return array
     */
    public function get($resourceUri)
    {
        return $this->_Get_operation->call(['resourceUri' => $resourceUri]);
    }
    /**
     * Create or update new diagnostic settings for the specified resource. **WARNING**: This method will be deprecated in future releases.
     * @param string $resourceUri
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceUri,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceUri' => $resourceUri,
            'parameters' => $parameters
        ]);
    }
    /**
     * Updates an existing ServiceDiagnosticSettingsResource. To update other fields use the CreateOrUpdate method. **WARNING**: This method will be deprecated in future releases.
     * @param string $resourceUri
     * @param array $serviceDiagnosticSettingsResource
     * @return array
     */
    public function update(
        $resourceUri,
        array $serviceDiagnosticSettingsResource
    )
    {
        return $this->_Update_operation->call([
            'resourceUri' => $resourceUri,
            'serviceDiagnosticSettingsResource' => $serviceDiagnosticSettingsResource
        ]);
    }
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
}
