<?php
namespace Microsoft\Azure\Management\Authorization;
final class ProviderOperationsMetadata
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('ProviderOperationsMetadata_Get');
        $this->_List_operation = $_client->createOperation('ProviderOperationsMetadata_List');
    }
    /**
     * Gets provider operations metadata for the specified resource provider.
     * @param string $resourceProviderNamespace
     * @param string $_expand
     * @return array
     */
    public function get(
        $resourceProviderNamespace,
        $_expand
    )
    {
        return $this->_Get_operation->call([
            'resourceProviderNamespace' => $resourceProviderNamespace,
            '$expand' => $_expand
        ]);
    }
    /**
     * Gets provider operations metadata for all resource providers.
     * @param string $_expand
     * @return array
     */
    public function list_($_expand)
    {
        return $this->_List_operation->call(['$expand' => $_expand]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
