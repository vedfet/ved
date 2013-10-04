<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-11-28 23:39:36 svn $
 * @author Gajendra Kumar Jain
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * This component is used for iidtestimonial given by someone.
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
define( 'COM_IIDTESTIMONIAL_DIR', 'images'.DS.'iidtestimonial'.DS );
define( 'COM_IIDTESTIMONIAL_BASE', JPATH_ROOT.DS.COM_IIDTESTIMONIAL_DIR );
define( 'COM_IIDTESTIMONIAL_BASEURL', JURI::root().str_replace( DS, '/', COM_IIDTESTIMONIAL_DIR ));

define("IIDTESTIMONIAL_COM_COMPONENT",$option);
define("IIDTESTIMONIAL_COMPONENT",str_replace("com_","",$option));
include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.IIDTESTIMONIAL_COMPONENT.".defines.php");

$lang =& JFactory::getLanguage();
$lang->load(IIDTESTIMONIAL_COM_COMPONENT, IIDTESTIMONIAL_ADMINPATH);
$lang->load(IIDTESTIMONIAL_COM_COMPONENT, IIDTESTIMONIAL_PATH);
// Split tasl into command and task
$cmd = JRequest::getCmd('task', 'cpanel.show');


if (strpos($cmd, '.') != false) {
	// We have a defined controller/task pair -- lets split them out
	list($controllerName, $task) = explode('.', $cmd);
	
	// Define the controller name and path
	
	$controllerPath	= JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php';
	 $controllerName	= ucfirst($controllerName);
	$controllerName = "Admin".$controllerName;
	// If the controller file path exists, include it ... else lets die with a 500 error
	if (file_exists($controllerPath)) {
		require_once($controllerPath);
	} else {
		JError::raiseError(500, 'Invalid Controller');
	}
} else {
	// Base controller, just set the task 
$controllerName = null;
$task = $cmd;
}

// Set the name for the controller and instantiate it
$controllerClass = ucfirst($controllerName).'Controller';

if (class_exists($controllerClass)) {
	$controller = new $controllerClass();
} else {
	JError::raiseError(500, 'Invalid Controller Class - '.$controllerClass );
}

$config	=& JFactory::getConfig();

// Perform the Request task
$controller->execute($task);

// Redirect if set by the controller
$controller->redirect();?>