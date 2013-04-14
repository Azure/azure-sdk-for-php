<?php

namespace WindowsAzure\ServiceManagement\Models;

class OperatingSystem
{
    /**
     * @var string
     */
    private $_version;

    /**
     * @var string
     */
    private $_label;

    /**
     * @var bool
     */
    private $_isDefault;

    /**
     * @var bool
     */
    private $_isActive;

    /**
     * @var string
     */
    private $_family;

    /**
     * @var string
     */
    private $_familyLabel;

    /**
     * Sets the operating system family.
     *
     * @param string $family
     */
    public function setFamily($family)
    {
        $this->_family = $family;
    }

    /**
     * Gets the operating system family.
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->_family;
    }

    /**
     * Sets the base-64 encoded label of the operating system family.
     *
     * @param string $familyLabel
     */
    public function setFamilyLabel($familyLabel)
    {
        $this->_familyLabel = $familyLabel;
    }

    /**
     * Gets the base-64 encoded label of the operating system family.
     *
     * @return string
     */
    public function getFamilyLabel()
    {
        return $this->_familyLabel;
    }

    /**
     * Sets whether the operating system version is active.
     *
     * @param boolean $isActive
     */
    public function setIsActive($isActive)
    {
        $this->_isActive = $isActive;
    }

    /**
     * Gets whether the operating system version is active.
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->_isActive;
    }

    /**
     * Sets whether the operating system version is the default version.
     *
     * @param boolean $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->_isDefault = $isDefault;
    }

    /**
     * Gets whether the operating system version is the default version.
     *
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->_isDefault;
    }

    /**
     * Sets the base-64 encoded label of the operating system version.
     *
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->_label = $label;
    }

    /**
     * Gets the base-64 encoded label of the operating system version.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * Sets the operating system version.
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->_version = $version;
    }

    /**
     * Gets the operating system version.
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }
}
