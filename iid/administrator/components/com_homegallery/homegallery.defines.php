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
defined('_JEXEC') or die( 'No Direct Access' );

if (!defined("JHOMEGALLERY_COM_COMPONENT")){
	define("JHOMEGALLERY_COM_COMPONENT","com_homegallery");
	define("JHOMEGALLERY_COMPONENT",str_replace("com_","",JHOMEGALLERY_COM_COMPONENT));
}

if (!defined("JHOMEGALLERY_LIBS")){
	define("JHOMEGALLERY_ADMINPATH",JPATH_ADMINISTRATOR."/components/".JHOMEGALLERY_COM_COMPONENT."/");
	define("JHOMEGALLERY_PATH",JPATH_SITE."/components/".JHOMEGALLERY_COM_COMPONENT."/");
	define("JHOMEGALLERY_LIBS",JHOMEGALLERY_ADMINPATH."libraries/");
	define("JHOMEGALLERY_ADMINLIBS",JHOMEGALLERY_ADMINPATH."libraries/");
	define("JHOMEGALLERY_HELPERS",JHOMEGALLERY_ADMINPATH."helpers/");
	define("JHOMEGALLERY_CONFIG",JHOMEGALLERY_ADMINPATH."config/");
	define("JHOMEGALLERY_FILTERS",JHOMEGALLERY_ADMINPATH."filters/");
	define("JHOMEGALLERY_LAYOUTS",JHOMEGALLERY_ADMINPATH."layouts/");
	define("JHOMEGALLERY_VIEWS",JHOMEGALLERY_ADMINPATH."views");
}

	JLoader::register('JSite' , JPATH_SITE.'/includes/application.php');
	JLoader::register('JHOMEGALLERYConfig',JHOMEGALLERY_LIBS."config.php");
	JLoader::register('JHomegalleryAbstractView',JHOMEGALLERY_VIEWS."/abstract/abstract.php");



	

	


