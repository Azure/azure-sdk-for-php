<?php
/**
 * Integrated Template - IT
 * 
 * PHP version 4
 *
 * Copyright (c) 1997-2007 Ulf Wendel, Pierre-Alain Joye,               
 *                         David Soria Parra                          
 *
 * This source file is subject to the New BSD license, That is bundled  
 * with this package in the file LICENSE, and is available through      
 * the world-wide-web at                                                
 * http://www.opensource.org/licenses/bsd-license.php                   
 * If you did not receive a copy of the new BSDlicense and are unable   
 * to obtain it through the world-wide-web, please send a note to       
 * pajoye@php.net so we can mail you a copy immediately.                
 * 
 * Author: Ulf Wendel <ulf.wendel@phpdoc.de>                            
 *         Pierre-Alain Joye <pajoye@php.net>                           
 *         David Soria Parra <dsp@php.net>                              
 * 
 * @category HTML
 * @package  HTML_Template_IT
 * @author   Ulf Wendel <uw@netuse.de>
 * @license  BSD http://www.opensource.org/licenses/bsd-license.php
 * @version  CVS: $Id: IT_Error.php 295117 2010-02-15 23:25:21Z clockwerx $
 * @link     http://pear.php.net/packages/HTML_Template_IT
 * @access   public
 */

require_once "PEAR.php";

/**
* IT[X] Error class
* 
 * @category HTML
 * @package  HTML_Template_IT
 * @author   Ulf Wendel <uw@netuse.de>
 * @license  BSD http://www.opensource.org/licenses/bsd-license.php
 * @link     http://pear.php.net/packages/HTML_Template_IT
 * @access   public
*/
class IT_Error extends PEAR_Error
{
    /**
     * Prefix of all error messages.
     * 
     * @var  string
     */
    var $error_message_prefix = "IntegratedTemplate Error: ";
  
    /**
     * Creates an cache error object.
     * 
     * @param string $msg  error message
     * @param string $file file where the error occured
     * @param string $line linenumber where the error occured
     */
    function IT_Error($msg, $file = __FILE__, $line = __LINE__)
    {
        $this->PEAR_Error(sprintf("%s [%s on line %d].", $msg, $file, $line)); 
    } // end func IT_Error
  
} // end class IT_Error
?>
