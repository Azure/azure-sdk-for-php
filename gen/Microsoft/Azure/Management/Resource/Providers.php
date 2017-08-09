<?php
namespace Microsoft\Azure\Management\Resource;
final class Providers
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Unregister_operation = $_client->createOperation('Providers_Unregister');
        $this->_Register_operation = $_client->createOperation('Providers_Register');
        $this->_List_operation = $_client->createOperation('Providers_List');
        $this->_Get_operation = $_client->createOperation('Providers_Get');
    }
    /**
     * Unregisters a subscription from a resource provider.
     * @param string $resourceProviderNamespace
     * @return array
     */
    public function unregister($resourceProviderNamespace)
    {
        return $this->_Unregister_operation->call(['resourceProviderNamespace' => $resourceProviderNamespace]);
    }
    /**
     * Registers a subscription with a resource provider.
     * @param string $resourceProviderNamespace
     * @return array
     */
    public function register($resourceProviderNamespace)
    {
        return $this->_Register_operation->call(['resourceProviderNamespace' => $resourceProviderNamespace]);
    }
    /**
     * Gets all resource providers for a subscription.
     * @param integer|null $_top
     * @param string|null $_expand
     * @return array
     */
    public function list_(
        $_top = null,
        $_expand = null
    )
    {
        return $this->_List_operation->call([
            '$top' => $_top,
            '$expand' => $_expand
        ]);
    }
    /**
     * Gets the specified resource provider.
     * @param string|null $_expand
     * @param string $resourceProviderNamespace
     * @return array
     */
    public function get(
        $_expand = null,
        $resourceProviderNamespace
    )
    {
        return $this->_Get_operation->call([
            '$expand' => $_expand,
            'resourceProviderNamespace' => $resourceProviderNamespace
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Unregister_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Register_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
