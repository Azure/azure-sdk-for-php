<?php
namespace Microsoft\Azure\Management\Advisor\_2017_04_19;
final class Recommendations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Generate_operation = $_client->createOperation('Recommendations_Generate');
        $this->_GetGenerateStatus_operation = $_client->createOperation('Recommendations_GetGenerateStatus');
        $this->_List_operation = $_client->createOperation('Recommendations_List');
        $this->_Get_operation = $_client->createOperation('Recommendations_Get');
    }
    /**
     * Initiates the recommendation generation or computation process for a subscription. This operation is asynchronous. The generated recommendations are stored in a cache in the Advisor service.
     */
    public function generate()
    {
        return $this->_Generate_operation->call([]);
    }
    /**
     * Retrieves the status of the recommendation computation or generation process. Invoke this API after calling the generation recommendation. The URI of this API is returned in the Location field of the response header.
     * @param string $operationId
     */
    public function getGenerateStatus($operationId)
    {
        return $this->_GetGenerateStatus_operation->call(['operationId' => $operationId]);
    }
    /**
     * Obtains cached recommendations for a subscription. The recommendations are generated or computed by invoking generateRecommendations.
     * @param string $_filter
     * @param integer $_top
     * @param string $_skipToken
     * @return array
     */
    public function list_(
        $_filter,
        $_top,
        $_skipToken
    )
    {
        return $this->_List_operation->call([
            '$filter' => $_filter,
            '$top' => $_top,
            '$skipToken' => $_skipToken
        ]);
    }
    /**
     * Obtains details of a cached recommendation.
     * @param string $resourceUri
     * @param string $recommendationId
     * @return array
     */
    public function get(
        $resourceUri,
        $recommendationId
    )
    {
        return $this->_Get_operation->call([
            'resourceUri' => $resourceUri,
            'recommendationId' => $recommendationId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Generate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetGenerateStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
}
