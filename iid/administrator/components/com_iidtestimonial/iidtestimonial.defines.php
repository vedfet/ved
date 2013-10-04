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

if (!defined("IIDTESTIMONIAL_COM_COMPONENT")){
	define("IIDTESTIMONIAL_COM_COMPONENT","com_video");
	define("IIDTESTIMONIAL_COMPONENT",str_replace("com_","",IIDTESTIMONIAL_COM_COMPONENT));
}

if (!defined("IIDTESTIMONIAL_LIBS")){
	define("IIDTESTIMONIAL_ADMINPATH",JPATH_ADMINISTRATOR."/components/".IIDTESTIMONIAL_COM_COMPONENT."/");
	define("IIDTESTIMONIAL_PATH",JPATH_SITE."/components/".IIDTESTIMONIAL_COM_COMPONENT."/");
	define("IIDTESTIMONIAL_LIBS",IIDTESTIMONIAL_ADMINPATH."libraries/");
	define("IIDTESTIMONIAL_ADMINLIBS",IIDTESTIMONIAL_ADMINPATH."libraries/");
	define("IIDTESTIMONIAL_HELPERS",IIDTESTIMONIAL_ADMINPATH."helpers/");
	define("IIDTESTIMONIAL_CONFIG",IIDTESTIMONIAL_ADMINPATH."config/");
	define("IIDTESTIMONIAL_FILTERS",IIDTESTIMONIAL_ADMINPATH."filters/");
	define("IIDTESTIMONIAL_LAYOUTS",IIDTESTIMONIAL_ADMINPATH."layouts/");
	define("IIDTESTIMONIAL_VIEWS",IIDTESTIMONIAL_ADMINPATH."views");
}
	JLoader::register('JSite' , JPATH_SITE.'/includes/application.php');

	JLoader::register('IIDTESTIMONIALConfig',IIDTESTIMONIAL_LIBS."config.php");


	JLoader::register('IidtestimonialVersion',IIDTESTIMONIAL_LIBS."version.php");
	JLoader::register('IidtestimonialDBModel',IIDTESTIMONIAL_PATH."libraries/dbmodel.php");
	JLoader::register('IidtestimonialDataModel',IIDTESTIMONIAL_PATH."libraries/datamodel.php");
	
	JLoader::register('IIDTESTIMONIALAccess',IIDTESTIMONIAL_PATH."libraries/access.php");
	JLoader::register('IIDTESTIMONIALHelper',IIDTESTIMONIAL_PATH."libraries/helper.php");
	
	JLoader::register('IidtestimonialAbstractView',IIDTESTIMONIAL_VIEWS."/abstract/abstract.php");
	


	

	


