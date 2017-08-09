<?php
namespace Microsoft\Azure\Management\WebSites;
final class TopLevelDomains
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('TopLevelDomains_List');
        $this->_Get_operation = $_client->createOperation('TopLevelDomains_Get');
        $this->_ListAgreements_operation = $_client->createOperation('TopLevelDomains_ListAgreements');
    }
    /**
     * Get all top-level domains supported for registration.
     * @return array
     */
    public function list_()
    {
        return $this->_List_operation->call([]);
    }
    /**
     * Get details of a top-level domain.
     * @param string $name
     * @return array
     */
    public function get($name)
    {
        return $this->_Get_operation->call(['name' => $name]);
    }
    /**
     * Gets all legal agreements that user needs to accept before purchasing a domain.
     * @param string $name
     * @param array $agreementOption
     * @return array
     */
    public function listAgreements(
        $name,
        array $agreementOption
    )
    {
        return $this->_ListAgreements_operation->call([
            'name' => $name,
            'agreementOption' => $agreementOption
        ]);
    }
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
    private $_ListAgreements_operation;
}
