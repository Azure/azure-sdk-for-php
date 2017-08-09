<?php
namespace Microsoft\Azure\Management\Advisor;
final class Suppressions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('Suppressions_Get');
        $this->_Create_operation = $_client->createOperation('Suppressions_Create');
        $this->_Delete_operation = $_client->createOperation('Suppressions_Delete');
        $this->_List_operation = $_client->createOperation('Suppressions_List');
    }
    /**
     * Obtains the details of a suppression.
     * @param string $resourceUri
     * @param string $recommendationId
     * @param string $name
     * @return array
     */
    public function get(
        $resourceUri,
        $recommendationId,
        $name
    )
    {
        return $this->_Get_operation->call([
            'resourceUri' => $resourceUri,
            'recommendationId' => $recommendationId,
            'name' => $name
        ]);
    }
    /**
     * Enables the snoozed or dismissed attribute of a recommendation. The snoozed or dismissed attribute is referred to as a suppression. Use this API to create or update the snoozed or dismissed status of a recommendation.
     * @param string $resourceUri
     * @param string $recommendationId
     * @param string $name
     * @param array $suppressionContract
     * @return array
     */
    public function create(
        $resourceUri,
        $recommendationId,
        $name,
        array $suppressionContract
    )
    {
        return $this->_Create_operation->call([
            'resourceUri' => $resourceUri,
            'recommendationId' => $recommendationId,
            'name' => $name,
            'suppressionContract' => $suppressionContract
        ]);
    }
    /**
     * Enables the activation of a snoozed or dismissed recommendation. The snoozed or dismissed attribute of a recommendation is referred to as a suppression.
     * @param string $resourceUri
     * @param string $recommendationId
     * @param string $name
     */
    public function delete(
        $resourceUri,
        $recommendationId,
        $name
    )
    {
        return $this->_Delete_operation->call([
            'resourceUri' => $resourceUri,
            'recommendationId' => $recommendationId,
            'name' => $name
        ]);
    }
    /**
     * Retrieves the list of snoozed or dismissed suppressions for a subscription. The snoozed or dismissed attribute of a recommendation is referred to as a suppression.
     * @param integer|null $_top
     * @param string|null $_skipToken
     * @return array
     */
    public function list_(
        $_top = null,
        $_skipToken = null
    )
    {
        return $this->_List_operation->call([
            '$top' => $_top,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Create_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
