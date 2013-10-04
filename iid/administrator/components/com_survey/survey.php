<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *
 */


// no direct access
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.path');
global $option;
/*
 * Define constants for all pages
 */
define( 'COM_SURVEY_DIR', 'images'.DS.'survey'.DS );
define( 'COM_SURVEY_BASE', JPATH_ROOT.DS.COM_SURVEY_DIR );
define( 'COM_SURVEY_BASEURL', JURI::root().str_replace( DS, '/', COM_SURVEY_DIR ));


define("SURVEY_COM_COMPONENT",$option);
define("SURVEY_COMPONENT",str_replace("com_","",$option));

include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.SURVEY_COMPONENT.".defines.php");

$lang =& JFactory::getLanguage();
$lang->load(SURVEY_COM_COMPONENT, SURVEY_ADMINPATH);
$lang->load(SURVEY_COM_COMPONENT, SURVEY_PATH);
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

}
//echo $controllerName;exit;
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