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

if (!defined("JNEWS_COM_COMPONENT")){
	define("JNEWS_COM_COMPONENT","com_news");
	define("JNEWS_COMPONENT",str_replace("com_","",JNEWS_COM_COMPONENT));
}

if (!defined("JNEWS_LIBS")){
	define("JNEWS_ADMINPATH",JPATH_ADMINISTRATOR."/components/".JNEWS_COM_COMPONENT."/");
	define("JNEWS_PATH",JPATH_SITE."/components/".JNEWS_COM_COMPONENT."/");
	define("JNEWS_LIBS",JNEWS_ADMINPATH."libraries/");
	define("JNEWS_ADMINLIBS",JNEWS_ADMINPATH."libraries/");
	define("JNEWS_HELPERS",JNEWS_ADMINPATH."helpers/");
	define("JNEWS_CONFIG",JNEWS_ADMINPATH."config/");
	define("JNEWS_FILTERS",JNEWS_ADMINPATH."filters/");
	define("JNEWS_LAYOUTS",JNEWS_ADMINPATH."layouts/");
	define("JNEWS_VIEWS",JNEWS_ADMINPATH."views");
}
	JLoader::register('JSite' , JPATH_SITE.'/includes/application.php');
	JLoader::register('JNEWSConfig',JNEWS_LIBS."config.php");
	JLoader::register('JNewsAbstractView',JNEWS_VIEWS."/abstract/abstract.php");



	

	


