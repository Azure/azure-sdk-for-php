<?php

namespace WindowsAzure\ServiceManagement\Models;

use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

class GetSubscriptionResult
{
    /**
     * @var string
     */
    private $_subscriptionId;

    /**
     * @var string
     */
    private $_subscriptionName;

    /**
     * @var string
     */
    private $_subscriptionStatus;

    /**
     * @var string
     */
    private $_accountAdminLiveEmailId;

    /**
     * @var string
     */
    private $_serviceAdminLiveEmailId;

    /**
     * @var integer
     */
    private $_maxCoreCount;

    /**
     * @var integer
     */
    private $_maxStorageAccounts;

    /**
     * @var integer
     */
    private $_maxHostedServices;

    /**
     * @var integer
     */
    private $_currentCoreCount;

    /**
     * @var integer
     */
    private $_currentHostedServices;

    /**
     * @var integer
     */
    private $_currentStorageAccounts;

    /**
     * Creates a GetSubscriptionResult object from a parsed response.
     *
     * @param array $parsed The parsed response.
     *
     * @return GetSubscriptionResult
     */
    public static function create($parsed)
    {
        $result = new GetSubscriptionResult();

        $result->setSubscriptionId(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_SUBSCRIPTION_ID
        ));
        $result->setSubscriptionName(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_SUBSCRIPTION_NAME
        ));
        $result->setSubscriptionStatus(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_SUBSCRIPTION_STATUS
        ));
        $result->setAccountAdminLiveEmailId(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_ACCOUNT_ADMIN_LIVE_EMAIL_ID
        ));
        $result->setServiceAdminLiveEmailId(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_SERVICE_ADMIN_LIVE_EMAIL_ID
        ));
        $result->setMaxCoreCount(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_MAX_CORE_COUNT
        )));
        $result->setMaxStorageAccounts(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_MAX_STORAGE_ACCOUNTS
        )));
        $result->setMaxHostedServices(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_MAX_HOSTED_SERVICES
        )));
        $result->setCurrentCoreCount(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_CURRENT_CORE_COUNT
        )));
        $result->setCurrentHostedServices(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_CURRENT_HOSTED_SERVICES
        )));
        $result->setCurrentStorageAccounts(intval(Utilities::tryGetValue(
            $parsed,
            Resources::XTAG_CURRENT_STORAGE_ACCOUNTS
        )));

        return $result;
    }

    /**
     * Sets Live ID of the account administrator.
     *
     * @param string $accountAdminLiveEmailId The account administrator Live ID.
     */
    public function setAccountAdminLiveEmailId($accountAdminLiveEmailId)
    {
        $this->_accountAdminLiveEmailId = $accountAdminLiveEmailId;
    }

    /**
     * Gets Live ID of the account administrator.
     *
     * @return string
     */
    public function getAccountAdminLiveEmailId()
    {
        return $this->_accountAdminLiveEmailId;
    }

    /**
     * Sets the number of currently allocated cores.
     *
     * @param int $currentCoreCount The current core count.
     */
    public function setCurrentCoreCount($currentCoreCount)
    {
        $this->_currentCoreCount = $currentCoreCount;
    }

    /**
     * Gets the number of currently allocated cores.
     *
     * @return int
     */
    public function getCurrentCoreCount()
    {
        return $this->_currentCoreCount;
    }

    /**
     * Sets the number of currently allocated hosted services.
     *
     * @param int $currentHostedServices The current hosted service count.
     */
    public function setCurrentHostedServices($currentHostedServices)
    {
        $this->_currentHostedServices = $currentHostedServices;
    }

    /**
     * Gets the number of currently allocated hosted services.
     *
     * @return int
     */
    public function getCurrentHostedServices()
    {
        return $this->_currentHostedServices;
    }

    /**
     * Sets the number of currently allocated storage accounts.
     *
     * @param int $currentStorageAccounts The current storage account count.
     */
    public function setCurrentStorageAccounts($currentStorageAccounts)
    {
        $this->_currentStorageAccounts = $currentStorageAccounts;
    }

    /**
     * Gets the number of currently allocated storage accounts.
     *
     * @return int
     */
    public function getCurrentStorageAccounts()
    {
        return $this->_currentStorageAccounts;
    }

    /**
     * Sets the maximum number of cores that can be allocated on this subscription.
     *
     * @param int $maxCoreCount The maximum core count.
     */
    public function setMaxCoreCount($maxCoreCount)
    {
        $this->_maxCoreCount = $maxCoreCount;
    }

    /**
     * Gets the maximum number of cores that can be allocated on this subscription.
     *
     * @return int
     */
    public function getMaxCoreCount()
    {
        return $this->_maxCoreCount;
    }

    /**
     * Sets the maximum number of hosted services that can be allocated on this
     * subscription.
     *
     * @param int $maxHostedServices The maximum hosted service count.
     */
    public function setMaxHostedServices($maxHostedServices)
    {
        $this->_maxHostedServices = $maxHostedServices;
    }

    /**
     * Gets the maximum number of hosted services that can be allocated on this
     * subscription.
     *
     * @return int
     */
    public function getMaxHostedServices()
    {
        return $this->_maxHostedServices;
    }

    /**
     * Sets the maximum number of storage accounts that can be allocated on this
     * subscription.
     *
     * @param int $maxStorageAccounts The maximum storage account count.
     */
    public function setMaxStorageAccounts($maxStorageAccounts)
    {
        $this->_maxStorageAccounts = $maxStorageAccounts;
    }

    /**
     * Gets the maximum number of storage accounts that can be allocated on this
     * subscription.
     *
     * @return int
     */
    public function getMaxStorageAccounts()
    {
        return $this->_maxStorageAccounts;
    }

    /**
     * Sets the Live ID of the subscription administrator.
     *
     * @param string $serviceAdminLiveEmailId The subscription administrator Live ID.
     */
    public function setServiceAdminLiveEmailId($serviceAdminLiveEmailId)
    {
        $this->_serviceAdminLiveEmailId = $serviceAdminLiveEmailId;
    }

    /**
     * Gets the Live ID of the subscription administrator.
     *
     * @return string
     */
    public function getServiceAdminLiveEmailId()
    {
        return $this->_serviceAdminLiveEmailId;
    }

    /**
     * Sets the subscription ID that the operation was called on.
     *
     * @param string $subscriptionId The subscription ID.
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->_subscriptionId = $subscriptionId;
    }

    /**
     * Gets the subscription ID that the operation was called on.
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->_subscriptionId;
    }

    /**
     * Sets the user-supplied name of the subscription.
     *
     * @param string $subscriptionName The subscription name.
     */
    public function setSubscriptionName($subscriptionName)
    {
        $this->_subscriptionName = $subscriptionName;
    }

    /**
     * Gets the user-supplied name of the subscription.
     *
     * @return string
     */
    public function getSubscriptionName()
    {
        return $this->_subscriptionName;
    }

    /**
     * Sets the subscription status.
     *
     * @param string $subscriptionStatus The subscription status.
     */
    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->_subscriptionStatus = $subscriptionStatus;
    }

    /**
     * Gets the subscription status.
     *
     * @return string
     */
    public function getSubscriptionStatus()
    {
        return $this->_subscriptionStatus;
    }
}
