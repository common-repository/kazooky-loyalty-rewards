<?php
/* 
 * Plugin Name:   Kazooky Loyalty
 * Version:       2.0
 * Plugin URI:    http://www.kazookyloyalty.com
 * Description:	  Coded By http://www.kazookyloyalty.com
 * Author:        Richard Nasr
 * Author URI:    http://www.kazookyloyalty.com
 */
require_once(dirname(__FILE__).'/kazooky_loyalty.php');
register_activation_hook(__FILE__, array(&$KazookyLoyalty, 'install'));
//register_deactivation_hook(__FILE__, array(&$KazookyLoyalty, 'uninstall'));
?>
