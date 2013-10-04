<?php
/**
 * Joomla! 1.5 component news
 *
 * @version $Id: router.php 2010-06-03 02:04:32 svn $
 * @author Diwakar
 * @package Joomla
 * @subpackage news
 * @license GNU/GPL
 *
 * Every Days News
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
// Require the base controller
 
require_once( JPATH_COMPONENT.DS.'controller.php' );
 
// Require specific controller if requested
if($controller = JRequest::getVar('controller')) 
{
    $path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
    if (file_exists($path)) 
	{
        require_once $path;
    } else {
        $controller = '';
    }
}
 
// Create the controller
 $classname    = 'NewsController'.$controller;

$controller   = new $classname( );
 
// Perform the Request task
$controller->execute( JRequest::getVar( 'task' ));

 
// Redirect if set by the controller
$controller->redirect();

