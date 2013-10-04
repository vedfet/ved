<?php
/**
 * Joomla! 1.5 component homegallery
 *
 * @version $Id: homegallery.php 2010-11-09 02:17:03 svn $
 * @author Gajendra Kumar Jain
 * @package Joomla
 * @subpackage homegallery
 * @license GNU/GPL
 *
 * 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.path');
global $option;
/*
 * Define constants for all pages
 */
define( 'COM_HOMEGALLERY_DIR', 'images'.DS.'homegallery'.DS );
define( 'COM_HOMEGALLERY_BASE', JPATH_ROOT.DS.COM_HOMEGALLERY_DIR );
define( 'COM_HOMEGALLERY_BASEURL', JURI::root().str_replace( DS, '/', COM_HOMEGALLERY_DIR ));
define("JHOMEGALLERY_COM_COMPONENT",$option);
define("JHOMEGALLERY_COMPONENT",str_replace("com_","",$option));
include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.JHOMEGALLERY_COMPONENT.".defines.php");

$lang =& JFactory::getLanguage();
$lang->load(JHOMEGALLERY_COM_COMPONENT, JHOMEGALLERY_ADMINPATH);
$lang->load(JHOMEGALLERY_COM_COMPONENT, JHOMEGALLERY_PATH);
$cmd = JRequest::getCmd('task', 'cpanel.show');

if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);
	
	// Define the controller name and path
	$controllerName	= strtolower($controllerName);
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	$controllerName = "Admin".$controllerName;
	
	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath))
	 {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
} else {
	// Base controller, just set the task 
	$controllerName = null;
	$task = $cmd;
}

// Require the base controller
//JPluginHelper::importPlugin("NEWS");

// Set the name for the controller and instantiate it
$controllerClass = ucfirst($controllerName).'Controller';
if (class_exists($controllerClass)) 
{
	$controller = new $controllerClass();
}
else 
{
	JError::raiseError(500, 'Invalid Controller Class - '.$controllerClass );
}

$config	=& JFactory::getConfig();
// Perform the Request task

$controller->execute($task);
// Redirect if set by the controller
$controller->redirect();?>