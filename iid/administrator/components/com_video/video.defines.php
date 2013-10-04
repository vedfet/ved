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
defined('_JEXEC') or die( 'No Direct Access' );

if (!defined("VIDEO_COM_COMPONENT")){
	define("VIDEO_COM_COMPONENT","com_video");
	define("VIDEO_COMPONENT",str_replace("com_","",VIDEO_COM_COMPONENT));
}

if (!defined("VIDEO_LIBS")){
	define("VIDEO_ADMINPATH",JPATH_ADMINISTRATOR."/components/".VIDEO_COM_COMPONENT."/");
	define("VIDEO_PATH",JPATH_SITE."/components/".VIDEO_COM_COMPONENT."/");
	define("VIDEO_LIBS",VIDEO_ADMINPATH."libraries/");
	define("VIDEO_ADMINLIBS",VIDEO_ADMINPATH."libraries/");
	define("VIDEO_HELPERS",VIDEO_ADMINPATH."helpers/");
	define("VIDEO_CONFIG",VIDEO_ADMINPATH."config/");
	define("VIDEO_FILTERS",VIDEO_ADMINPATH."filters/");
	define("VIDEO_LAYOUTS",VIDEO_ADMINPATH."layouts/");
	define("VIDEO_VIEWS",VIDEO_ADMINPATH."views");
}
	JLoader::register('JSite' , JPATH_SITE.'/includes/application.php');

	JLoader::register('VIDEOConfig',VIDEO_LIBS."config.php");


	JLoader::register('VideoVersion',VIDEO_LIBS."version.php");
	JLoader::register('VideoDBModel',VIDEO_PATH."libraries/dbmodel.php");
	JLoader::register('VideoDataModel',VIDEO_PATH."libraries/datamodel.php");
	
	JLoader::register('VIDEOAccess',VIDEO_PATH."libraries/access.php");
	JLoader::register('VIDEOHelper',VIDEO_PATH."libraries/helper.php");
	
	JLoader::register('VideoAbstractView',VIDEO_VIEWS."/abstract/abstract.php");
	


	

	


