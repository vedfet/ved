<?php
/**
 * Joomla! 1.5 component News
 *
 * @version $Id: News.php 2010-03-14 01:52:14 svn $
 * @author Diwakar Kumar Singh
 * @package Joomla
 * @subpackage News
 * @license GNU/GPL
 *
 * Display and manage News and related items 
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
define( 'COM_NEWS_DIR', 'images'.DS.'NEWS'.DS );
define( 'COM_NEWS_BASE', JPATH_ROOT.DS.COM_NEWS_DIR );
define( 'COM_NEWS_BASEURL', JURI::root().str_replace( DS, '/', COM_NEWS_DIR ));


define("JNEWS_COM_COMPONENT",$option);
define("JNEWS_COMPONENT",str_replace("com_","",$option));

include_once(JPATH_COMPONENT_ADMINISTRATOR.DS.JNEWS_COMPONENT.".defines.php");

$lang =& JFactory::getLanguage();
$lang->load(JNEWS_COM_COMPONENT, JNEWS_ADMINPATH);
$lang->load(JNEWS_COM_COMPONENT, JNEWS_PATH);
// Split tasl into command and task
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