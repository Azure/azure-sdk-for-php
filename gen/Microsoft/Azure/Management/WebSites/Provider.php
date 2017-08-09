<?php
namespace Microsoft\Azure\Management\WebSites;
final class Provider
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetAvailableStacks_operation = $_client->createOperation('Provider_GetAvailableStacks');
        $this->_GetAvailableStacksOnPrem_operation = $_client->createOperation('Provider_GetAvailableStacksOnPrem');
    }
    /**
     * Get available application frameworks and their versions
     * @return array
     */
    public function getAvailableStacks()
    {
        return $this->_GetAvailableStacks_operation->call([]);
    }
    /**
     * Get available application frameworks and their versions
     * @return array
     */
    public function getAvailableStacksOnPrem()
    {
        return $this->_GetAvailableStacksOnPrem_operation->call([]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAvailableStacks_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAvailableStacksOnPrem_operation;
}
