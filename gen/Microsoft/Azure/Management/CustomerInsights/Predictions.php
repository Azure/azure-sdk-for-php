<?php
namespace Microsoft\Azure\Management\CustomerInsights;
final class Predictions
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_CreateOrUpdate_operation = $_client->createOperation('Predictions_CreateOrUpdate');
        $this->_Get_operation = $_client->createOperation('Predictions_Get');
        $this->_Delete_operation = $_client->createOperation('Predictions_Delete');
        $this->_GetTrainingResults_operation = $_client->createOperation('Predictions_GetTrainingResults');
        $this->_GetModelStatus_operation = $_client->createOperation('Predictions_GetModelStatus');
        $this->_ModelStatus_operation = $_client->createOperation('Predictions_ModelStatus');
        $this->_ListByHub_operation = $_client->createOperation('Predictions_ListByHub');
    }
    /**
     * Creates a Prediction or updates an existing Prediction in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdate(
        $resourceGroupName,
        $hubName,
        $predictionName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets a Prediction in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     * @return array
     */
    public function get(
        $resourceGroupName,
        $hubName,
        $predictionName
    )
    {
        return $this->_Get_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName
        ]);
    }
    /**
     * Deletes a Prediction in the hub.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     */
    public function delete(
        $resourceGroupName,
        $hubName,
        $predictionName
    )
    {
        return $this->_Delete_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName
        ]);
    }
    /**
     * Gets training results.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     * @return array
     */
    public function getTrainingResults(
        $resourceGroupName,
        $hubName,
        $predictionName
    )
    {
        return $this->_GetTrainingResults_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName
        ]);
    }
    /**
     * Gets model status of the prediction.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     * @return array
     */
    public function getModelStatus(
        $resourceGroupName,
        $hubName,
        $predictionName
    )
    {
        return $this->_GetModelStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName
        ]);
    }
    /**
     * Creates or updates the model status of prediction.
     * @param string $resourceGroupName
     * @param string $hubName
     * @param string $predictionName
     * @param array $parameters
     */
    public function modelStatus(
        $resourceGroupName,
        $hubName,
        $predictionName,
        array $parameters
    )
    {
        return $this->_ModelStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'hubName' => $hubName,
            'predictionName' => $predictionName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Gets all the predictions in the specified hub.
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
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Delete_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetTrainingResults_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetModelStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ModelStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByHub_operation;
}
