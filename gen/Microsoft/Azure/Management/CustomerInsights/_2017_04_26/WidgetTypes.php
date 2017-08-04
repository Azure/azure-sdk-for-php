<?php
namespace Microsoft\Azure\Management\CustomerInsights\_2017_04_26;
final class WidgetTypes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByHub_operation = $_client->createOperation('WidgetTypes_ListByHub');
        $this->_Get_operation = $_client->createOperation('WidgetTypes_Get');
    }
    /**
     * Gets all available widget types in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @return array
     */
    public function listByHub(
        $resourceGroupName,
        $hubName
    )
    {
        return $this->_ListByHub_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName
        ]);
    }
    /**
     * Gets a widget type in the specified hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $widgetTypeName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $widgetTypeName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'widgetTypeName' => $widgetTypeName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
