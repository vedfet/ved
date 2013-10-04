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

// Require the base controller
require_once JPATH_COMPONENT.DS.'controller.php';

// Initialize the controller
$controller = new HomegalleryController();
$controller->execute( null );

// Redirect if set by the controller
$controller->redirect();
?>