<?php
/**
 * PEAR_Installer_Role
 *
 * PHP versions 4 and 5
 *
 * @category   pear
 * @package    PEAR
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2009 The Authors
 * @license    http://opensource.org/licenses/bsd-license.php New BSD License
 * @version    CVS: $Id: Role.php 313023 2011-07-06 19:17:11Z dufuz $
 * @link       http://pear.php.net/package/PEAR
 * @since      File available since Release 1.4.0a1
 */

/**
 * base class for installer roles
 */
require_once 'PEAR/Installer/Role/Common.php';
require_once 'PEAR/XMLParser.php';
/**
 * @category   pear
 * @package    PEAR
 * @author     Greg Beaver <cellog@php.net>
 * @copyright  1997-2009 The Authors
 * @license    http://opensource.org/licenses/bsd-license.php New BSD License
 * @version    Release: 1.9.4
 * @link       http://pear.php.net/package/PEAR
 * @since      Class available since Release 1.4.0a1
 */
class PEAR_Installer_Role
{
    /**
     * Set up any additional configuration variables that file roles require
     *
     * Never call this directly, it is called by the PEAR_Config constructor
     * @param PEAR_Config
     * @access private
     * @static
     */
    function initializeConfig(&$config)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        foreach ($GLOBALS['_PEAR_INSTALLER_ROLES'] as $class => $info) {
            if (!$info['config_vars']) {
                continue;
            }

            $config->_addConfigVars($class, $info['config_vars']);
        }
    }

    /**
     * @param PEAR_PackageFile_v2
     * @param string role name
     * @param PEAR_Config
     * @return PEAR_Installer_Role_Common
     * @static
     */
    function &factory($pkg, $role, &$config)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        if (!in_array($role, PEAR_Installer_Role::getValidRoles($pkg->getPackageType()))) {
            $a = false;
            return $a;
        }

        $a = 'PEAR_Installer_Role_' . ucfirst($role);
        if (!class_exists($a)) {
            require_once str_replace('_', '/', $a) . '.php';
        }

        $b = new $a($config);
        return $b;
    }

    /**
     * Get a list of file roles that are valid for the particular release type.
     *
     * For instance, src files serve no purpose in regular php releases.
     * @param string
     * @param bool clear cache
     * @return array
     * @static
     */
    function getValidRoles($release, $clear = false)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        static $ret = array();
        if ($clear) {
            $ret = array();
        }

        if (isset($ret[$release])) {
            return $ret[$release];
        }

        $ret[$release] = array();
        foreach ($GLOBALS['_PEAR_INSTALLER_ROLES'] as $role => $okreleases) {
            if (in_array($release, $okreleases['releasetypes'])) {
                $ret[$release][] = strtolower(str_replace('PEAR_Installer_Role_', '', $role));
            }
        }

        return $ret[$release];
    }

    /**
     * Get a list of roles that require their files to be installed
     *
     * Most roles must be installed, but src and package roles, for instance
     * are pseudo-roles.  src files are compiled into a new extension.  Package
     * roles are actually fully bundled releases of a package
     * @param bool clear cache
     * @return array
     * @static
     */
    function getInstallableRoles($clear = false)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        static $ret;
        if ($clear) {
            unset($ret);
        }

        if (isset($ret)) {
            return $ret;
        }

        $ret = array();
        foreach ($GLOBALS['_PEAR_INSTALLER_ROLES'] as $role => $okreleases) {
            if ($okreleases['installable']) {
                $ret[] = strtolower(str_replace('PEAR_Installer_Role_', '', $role));
            }
        }

        return $ret;
    }

    /**
     * Return an array of roles that are affected by the baseinstalldir attribute
     *
     * Most roles ignore this attribute, and instead install directly into:
     * PackageName/filepath
     * so a tests file tests/file.phpt is installed into PackageName/tests/filepath.php
     * @param bool clear cache
     * @return array
     * @static
     */
    function getBaseinstallRoles($clear = false)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        static $ret;
        if ($clear) {
            unset($ret);
        }

        if (isset($ret)) {
            return $ret;
        }

        $ret = array();
        foreach ($GLOBALS['_PEAR_INSTALLER_ROLES'] as $role => $okreleases) {
            if ($okreleases['honorsbaseinstall']) {
                $ret[] = strtolower(str_replace('PEAR_Installer_Role_', '', $role));
            }
        }

        return $ret;
    }

    /**
     * Return an array of file roles that should be analyzed for PHP content at package time,
     * like the "php" role.
     * @param bool clear cache
     * @return array
     * @static
     */
    function getPhpRoles($clear = false)
    {
        if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'])) {
            PEAR_Installer_Role::registerRoles();
        }

        static $ret;
        if ($clear) {
            unset($ret);
        }

        if (isset($ret)) {
            return $ret;
        }

        $ret = array();
        foreach ($GLOBALS['_PEAR_INSTALLER_ROLES'] as $role => $okreleases) {
            if ($okreleases['phpfile']) {
                $ret[] = strtolower(str_replace('PEAR_Installer_Role_', '', $role));
            }
        }

        return $ret;
    }

    /**
     * Scan through the Command directory looking for classes
     * and see what commands they implement.
     * @param string which directory to look for classes, defaults to
     *               the Installer/Roles subdirectory of
     *               the directory from where this file (__FILE__) is
     *               included.
     *
     * @return bool TRUE on success, a PEAR error on failure
     * @access public
     * @static
     */
    function registerRoles($dir = null)
    {
        $GLOBALS['_PEAR_INSTALLER_ROLES'] = array();
        $parser = new PEAR_XMLParser;
        if ($dir === null) {
            $dir = dirname(__FILE__) . '/Role';
        }

        if (!file_exists($dir) || !is_dir($dir)) {
            return PEAR::raiseError("registerRoles: opendir($dir) failed: does not exist/is not directory");
        }

        $dp = @opendir($dir);
        if (empty($dp)) {
            return PEAR::raiseError("registerRoles: opendir($dir) failed: $php_errmsg");
        }

        while ($entry = readdir($dp)) {
            if ($entry{0} == '.' || substr($entry, -4) != '.xml') {
                continue;
            }

            $class = "PEAR_Installer_Role_".substr($entry, 0, -4);
            // List of roles
            if (!isset($GLOBALS['_PEAR_INSTALLER_ROLES'][$class])) {
                $file = "$dir/$entry";
                $parser->parse(file_get_contents($file));
                $data = $parser->getData();
                if (!is_array($data['releasetypes'])) {
                    $data['releasetypes'] = array($data['releasetypes']);
                }

                $GLOBALS['_PEAR_INSTALLER_ROLES'][$class] = $data;
            }
        }

        closedir($dp);
        ksort($GLOBALS['_PEAR_INSTALLER_ROLES']);
        PEAR_Installer_Role::getBaseinstallRoles(true);
        PEAR_Installer_Role::getInstallableRoles(true);
        PEAR_Installer_Role::getPhpRoles(true);
        PEAR_Installer_Role::getValidRoles('****', true);
        return true;
    }
}