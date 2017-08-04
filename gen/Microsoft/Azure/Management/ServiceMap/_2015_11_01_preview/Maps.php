<?php
namespace Microsoft\Azure\Management\ServiceMap\_2015_11_01_preview;
final class Maps
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Generate_operation = $_client->createOperation('Maps_Generate');
    }
    /**
     * Generates the specified map.
     * @param string $resourceGroupName
     * @param string $workspaceName
     * @param array $request
     * @return array
     */
    public function generate(
        $resourceGroupName,
        $workspaceName,
        array $request
    )
    {
        return $this->_Generate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'workspaceName' => $workspaceName,
            'request' => $request
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Generate_operation;
}
