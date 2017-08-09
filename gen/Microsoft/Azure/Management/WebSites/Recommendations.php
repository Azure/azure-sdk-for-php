<?php
namespace Microsoft\Azure\Management\WebSites;
final class Recommendations
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('Recommendations_List');
        $this->_ResetAllFilters_operation = $_client->createOperation('Recommendations_ResetAllFilters');
        $this->_ListHistoryForWebApp_operation = $_client->createOperation('Recommendations_ListHistoryForWebApp');
        $this->_ListRecommendedRulesForWebApp_operation = $_client->createOperation('Recommendations_ListRecommendedRulesForWebApp');
        $this->_DisableAllForWebApp_operation = $_client->createOperation('Recommendations_DisableAllForWebApp');
        $this->_ResetAllFiltersForWebApp_operation = $_client->createOperation('Recommendations_ResetAllFiltersForWebApp');
        $this->_GetRuleDetailsByWebApp_operation = $_client->createOperation('Recommendations_GetRuleDetailsByWebApp');
    }
    /**
     * List all recommendations for a subscription.
     * @param boolean $featured
     * @param string $_filter
     * @return array[]
     */
    public function list_(
        $featured,
        $_filter
    )
    {
        return $this->_List_operation->call([
            'featured' => $featured,
            '$filter' => $_filter
        ]);
    }
    /**
     * Reset all recommendation opt-out settings for a subscription.
     */
    public function resetAllFilters()
    {
        return $this->_ResetAllFilters_operation->call([]);
    }
    /**
     * Get past recommendations for an app, optionally specified by the time range.
     * @param string $resourceGroupName
     * @param string $siteName
     * @param string $_filter
     * @return array[]
     */
    public function listHistoryForWebApp(
        $resourceGroupName,
        $siteName,
        $_filter
    )
    {
        return $this->_ListHistoryForWebApp_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'siteName' => $siteName,
            '$filter' => $_filter
        ]);
    }
    /**
     * Get all recommendations for an app.
     * @param string $resourceGroupName
     * @param string $siteName
     * @param boolean $featured
     * @param string $_filter
     * @return array[]
     */
    public function listRecommendedRulesForWebApp(
        $resourceGroupName,
        $siteName,
        $featured,
        $_filter
    )
    {
        return $this->_ListRecommendedRulesForWebApp_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'siteName' => $siteName,
            'featured' => $featured,
            '$filter' => $_filter
        ]);
    }
    /**
     * Disable all recommendations for an app.
     * @param string $resourceGroupName
     * @param string $siteName
     */
    public function disableAllForWebApp(
        $resourceGroupName,
        $siteName
    )
    {
        return $this->_DisableAllForWebApp_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'siteName' => $siteName
        ]);
    }
    /**
     * Reset all recommendation opt-out settings for an app.
     * @param string $resourceGroupName
     * @param string $siteName
     */
    public function resetAllFiltersForWebApp(
        $resourceGroupName,
        $siteName
    )
    {
        return $this->_ResetAllFiltersForWebApp_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'siteName' => $siteName
        ]);
    }
    /**
     * Get a recommendation rule for an app.
     * @param string $resourceGroupName
     * @param string $siteName
     * @param string $name
     * @param boolean $updateSeen
     * @return array
     */
    public function getRuleDetailsByWebApp(
        $resourceGroupName,
        $siteName,
        $name,
        $updateSeen
    )
    {
        return $this->_GetRuleDetailsByWebApp_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'siteName' => $siteName,
            'name' => $name,
            'updateSeen' => $updateSeen
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResetAllFilters_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListHistoryForWebApp_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListRecommendedRulesForWebApp_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DisableAllForWebApp_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ResetAllFiltersForWebApp_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetRuleDetailsByWebApp_operation;
}
