<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Images
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetUploadUrlForEntityType_operation = $_client->createOperation('Images_GetUploadUrlForEntityType');
        $this->_GetUploadUrlForData_operation = $_client->createOperation('Images_GetUploadUrlForData');
    }
    /**
     * Gets entity type (profile or interaction) image upload URL.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param array $parameters
     * @return array
     */
    public function getUploadUrlForEntityType(
        $resourceGroupName,
        $hubName,
        array $parameters
    )
    {
        return $this->_GetUploadUrlForEntityType_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets data image upload URL.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param array $parameters
     * @return array
     */
    public function getUploadUrlForData(
        $resourceGroupName,
        $hubName,
        array $parameters
    )
    {
        return $this->_GetUploadUrlForData_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'parameters' => $parameters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetUploadUrlForEntityType_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetUploadUrlForData_operation;
}
