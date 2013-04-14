<?php

namespace WindowsAzure\ServiceManagement\Models;

use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;

class GetSubscriptionResult
{
    private $_subscriptionId;
    private $_subscriptionName;
    private $_subscriptionStatus;
    private $_accountAdminLiveEmailId;
    private $_serviceAdminLiveEmailId;
    private $_maxCoreCount;
    private $_maxStorageAccounts;
    private $_maxHostedServices;
    private $_currentCoreCount;
    private $_currentHostedServices;
    private $_currentStorageAccounts;

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

    public function setAccountAdminLiveEmailId($accountAdminLiveEmailId)
    {
        $this->_accountAdminLiveEmailId = $accountAdminLiveEmailId;
    }

    public function getAccountAdminLiveEmailId()
    {
        return $this->_accountAdminLiveEmailId;
    }

    public function setCurrentCoreCount($currentCoreCount)
    {
        $this->_currentCoreCount = $currentCoreCount;
    }

    public function getCurrentCoreCount()
    {
        return $this->_currentCoreCount;
    }

    public function setCurrentHostedServices($currentHostedServices)
    {
        $this->_currentHostedServices = $currentHostedServices;
    }

    public function getCurrentHostedServices()
    {
        return $this->_currentHostedServices;
    }

    public function setCurrentStorageAccounts($currentStorageAccounts)
    {
        $this->_currentStorageAccounts = $currentStorageAccounts;
    }

    public function getCurrentStorageAccounts()
    {
        return $this->_currentStorageAccounts;
    }

    public function setMaxCoreCount($maxCoreCount)
    {
        $this->_maxCoreCount = $maxCoreCount;
    }

    public function getMaxCoreCount()
    {
        return $this->_maxCoreCount;
    }

    public function setMaxHostedServices($maxHostedServices)
    {
        $this->_maxHostedServices = $maxHostedServices;
    }

    public function getMaxHostedServices()
    {
        return $this->_maxHostedServices;
    }

    public function setMaxStorageAccounts($maxStorageAccounts)
    {
        $this->_maxStorageAccounts = $maxStorageAccounts;
    }

    public function getMaxStorageAccounts()
    {
        return $this->_maxStorageAccounts;
    }

    public function setServiceAdminLiveEmailId($serviceAdminLiveEmailId)
    {
        $this->_serviceAdminLiveEmailId = $serviceAdminLiveEmailId;
    }

    public function getServiceAdminLiveEmailId()
    {
        return $this->_serviceAdminLiveEmailId;
    }

    public function setSubscriptionId($subscriptionId)
    {
        $this->_subscriptionId = $subscriptionId;
    }

    public function getSubscriptionId()
    {
        return $this->_subscriptionId;
    }

    public function setSubscriptionName($subscriptionName)
    {
        $this->_subscriptionName = $subscriptionName;
    }

    public function getSubscriptionName()
    {
        return $this->_subscriptionName;
    }

    public function setSubscriptionStatus($subscriptionStatus)
    {
        $this->_subscriptionStatus = $subscriptionStatus;
    }

    public function getSubscriptionStatus()
    {
        return $this->_subscriptionStatus;
    }
}
