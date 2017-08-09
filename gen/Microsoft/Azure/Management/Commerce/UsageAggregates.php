<?php
namespace Microsoft\Azure\Management\Commerce;
final class UsageAggregates
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('UsageAggregates_List');
    }
    /**
     * Query aggregated Azure subscription consumption data for a date range.
     * @param string $reportedStartTime
     * @param string $reportedEndTime
     * @param boolean|null $showDetails
     * @param string|null $aggregationGranularity
     * @param string|null $continuationToken
     * @return array
     */
    public function list_(
        $reportedStartTime,
        $reportedEndTime,
        $showDetails = null,
        $aggregationGranularity = null,
        $continuationToken = null
    )
    {
        return $this->_List_operation->call([
            'reportedStartTime' => $reportedStartTime,
            'reportedEndTime' => $reportedEndTime,
            'showDetails' => $showDetails,
            'aggregationGranularity' => $aggregationGranularity,
            'continuationToken' => $continuationToken
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
