<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachineImages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('VirtualMachineImages_Get');
        $this->_List_operation = $_client->createOperation('VirtualMachineImages_List');
        $this->_ListOffers_operation = $_client->createOperation('VirtualMachineImages_ListOffers');
        $this->_ListPublishers_operation = $_client->createOperation('VirtualMachineImages_ListPublishers');
        $this->_ListSkus_operation = $_client->createOperation('VirtualMachineImages_ListSkus');
    }
    /**
     * Gets a virtual machine image.
     * @param string $location
     * @param string $publisherName
     * @param string $offer
     * @param string $skus
     * @param string $version
     * @return array
     */
    public function get(
        $location,
        $publisherName,
        $offer,
        $skus,
        $version
    )
    {
        return $this->_Get_operation->call([
            'location' => $location,
            'publisherName' => $publisherName,
            'offer' => $offer,
            'skus' => $skus,
            'version' => $version
        ]);
    }
    /**
     * Gets a list of all virtual machine image versions for the specified location, publisher, offer, and SKU.
     * @param string $location
     * @param string $publisherName
     * @param string $offer
     * @param string $skus
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array[]
     */
    public function list_(
        $location,
        $publisherName,
        $offer,
        $skus,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_List_operation->call([
            'location' => $location,
            'publisherName' => $publisherName,
            'offer' => $offer,
            'skus' => $skus,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * Gets a list of virtual machine image offers for the specified location and publisher.
     * @param string $location
     * @param string $publisherName
     * @return array[]
     */
    public function listOffers(
        $location,
        $publisherName
    )
    {
        return $this->_ListOffers_operation->call([
            'location' => $location,
            'publisherName' => $publisherName
        ]);
    }
    /**
     * Gets a list of virtual machine image publishers for the specified Azure location.
     * @param string $location
     * @return array[]
     */
    public function listPublishers($location)
    {
        return $this->_ListPublishers_operation->call(['location' => $location]);
    }
    /**
     * Gets a list of virtual machine image SKUs for the specified location, publisher, and offer.
     * @param string $location
     * @param string $publisherName
     * @param string $offer
     * @return array[]
     */
    public function listSkus(
        $location,
        $publisherName,
        $offer
    )
    {
        return $this->_ListSkus_operation->call([
            'location' => $location,
            'publisherName' => $publisherName,
            'offer' => $offer
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListOffers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPublishers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSkus_operation;
}
