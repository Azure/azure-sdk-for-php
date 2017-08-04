<?php
namespace Microsoft\Azure\Management\MobileEngagement\_2014_12_01;
final class AppCollections
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('AppCollections_List');
        $this->_CheckNameAvailability_operation = $_client->createOperation('AppCollections_CheckNameAvailability');
    }
    /**
     * Lists app collections in a subscription.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Checks availability of an app collection name in the Engagement domain.
     * @param array $parameters
     * @return array
     */
    public function checkNameAvailability(array $parameters)
    {
        return $this->_CheckNameAvailability_operation->call(['parameters' => $parameters]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
}
