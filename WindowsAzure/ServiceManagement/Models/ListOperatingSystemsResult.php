<?php

namespace WindowsAzure\ServiceManagement\Models;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\Common\Internal\Utilities;

class ListOperatingSystemsResult
{
    /**
     * @var array
     */
    private $_operatingSystems;

    /**
     * Creates new ListOperatingSystemsResult object from parsed response body.
     *
     * @param array $parsed The parsed response body.
     *
     * @return ListOperatingSystemsResult
     */
    public static function create($parsed)
    {
        $result = new ListOperatingSystemsResult();

        $result->_operatingSystems = array();
        $entries                   = array();

        if (!empty($parsed)) {
            $entries = Utilities::getArray($parsed[Resources::XTAG_OPERATING_SYSTEM]);
        }

        foreach ($entries as $value) {
            $operatingSystem = new OperatingSystem();
            $operatingSystem->setVersion(
                Utilities::tryGetValue($value, Resources::XTAG_VERSION)
            );
            $operatingSystem->setLabel(
                Utilities::tryGetValue($value, Resources::XTAG_LABEL)
            );
            $operatingSystem->setIsDefault(
                Utilities::tryGetValue($value, Resources::XTAG_IS_DEFAULT)
            );
            $operatingSystem->setIsActive(
                Utilities::tryGetValue($value, Resources::XTAG_IS_ACTIVE)
            );
            $operatingSystem->setFamily(
                Utilities::tryGetValue($value, Resources::XTAG_FAMILY)
            );
            $operatingSystem->setFamilyLabel(
                Utilities::tryGetValue($value, Resources::XTAG_FAMILY_LABEL)
            );
            $result->_operatingSystems[] = $operatingSystem;
        }

        return $result;
    }

    /**
     * Sets the operating systems.
     *
     * @param array $operatingSystems
     */
    public function setOperatingSystems($operatingSystems)
    {
        $this->_operatingSystems = $operatingSystems;
    }

    /**
     * Gets the operating systems.
     *
     * @return array
     */
    public function getOperatingSystems()
    {
        return $this->_operatingSystems;
    }
}
