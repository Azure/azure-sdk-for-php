<?php
namespace Microsoft\Azure\Management\Resource;
final class Features
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListAll_operation = $_client->createOperation('Features_ListAll');
        $this->_List_operation = $_client->createOperation('Features_List');
        $this->_Get_operation = $_client->createOperation('Features_Get');
        $this->_Register_operation = $_client->createOperation('Features_Register');
    }
    /**
     * Gets all the preview features that are available through AFEC for the subscription.
     * @return array
     */
    public function listAll()
    {
        return $this->_ListAll_operation->call([]);
    }
    /**
     * Gets all the preview features in a provider namespace that are available through AFEC for the subscription.
     * @param string $resourceProviderNamespace
     * @return array
     */
    public function list_($resourceProviderNamespace)
    {
        return $this->_List_operation->call(['resourceProviderNamespace' => $resourceProviderNamespace]);
    }
    /**
     * Gets the preview feature with the specified name.
     * @param string $resourceProviderNamespace
     * @param string $featureName
     * @return array
     */
    public function get(
        $resourceProviderNamespace,
        $featureName
    )
    {
        return $this->_Get_operation->call([
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'featureName' => $featureName
        ]);
    }
    /**
     * Registers the preview feature for the subscription.
     * @param string $resourceProviderNamespace
     * @param string $featureName
     * @return array
     */
    public function register(
        $resourceProviderNamespace,
        $featureName
    )
    {
        return $this->_Register_operation->call([
            'resourceProviderNamespace' => $resourceProviderNamespace,
            'featureName' => $featureName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListAll_operation;
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
    private $_Register_operation;
}
