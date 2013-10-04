<?php
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: video.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage video
 * @license GNU/GPL
 *
 * It creates component for video
 *
 */


// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.path');
global $option;
/*
 * Define constants for all pages
 */
define( 'COM_VIDEO_DIR', 'images'.DS.'video'.DS );
define( 'COM_VIDEO_BASE', JPATH_ROOT.DS.COM_VIDEO_DIR );
define( 'COM_VIDEO_BASEURL', JURI::root().str_replace( DS, '/', COM_VIDEO_DIR ));


define("VIDEO_COM_COMPONENT",$option);
define("VIDEO_COMPONENT",str_replace("com_","",$option));

include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.VIDEO_COMPONENT.".defines.php");

$lang =& JFactory::getLanguage();
$lang->load(VIDEO_COM_COMPONENT, VIDEO_ADMINPATH);
$lang->load(VIDEO_COM_COMPONENT, VIDEO_PATH);
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