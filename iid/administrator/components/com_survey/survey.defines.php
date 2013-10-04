<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Kailash Pathak
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *
 */


// no direct access
defined('_JEXEC') or die( 'No Direct Access' );

if (!defined("SURVEY_COM_COMPONENT")){
	define("SURVEY_COM_COMPONENT","com_survey");
	define("SURVEY_COMPONENT",str_replace("com_","",SURVEY_COM_COMPONENT));
}

if (!defined("SURVEY_LIBS")){
	define("SURVEY_ADMINPATH",JPATH_ADMINISTRATOR."/components/".SURVEY_COM_COMPONENT."/");
	define("SURVEY_PATH",JPATH_SITE."/components/".SURVEY_COM_COMPONENT."/");
	define("SURVEY_LIBS",SURVEY_ADMINPATH."libraries/");
	define("SURVEY_ADMINLIBS",SURVEY_ADMINPATH."libraries/");
	define("SURVEY_HELPERS",SURVEY_ADMINPATH."helpers/");
	define("SURVEY_CONFIG",SURVEY_ADMINPATH."config/");
	define("SURVEY_FILTERS",SURVEY_ADMINPATH."filters/");
	define("SURVEY_LAYOUTS",SURVEY_ADMINPATH."layouts/");
	define("SURVEY_VIEWS",SURVEY_ADMINPATH."views");
}
	JLoader::register('JSite' , JPATH_SITE.'/includes/application.php');

	JLoader::register('SURVEYConfig',SURVEY_LIBS."config.php");


	JLoader::register('SurveyVersion',SURVEY_LIBS."version.php");
	JLoader::register('SurveyDBModel',SURVEY_PATH."libraries/dbmodel.php");
	JLoader::register('SurveyDataModel',SURVEY_PATH."libraries/datamodel.php");
	
	JLoader::register('SURVEYAccess',SURVEY_PATH."libraries/access.php");
	JLoader::register('SURVEYHelper',SURVEY_PATH."libraries/helper.php");
	
	JLoader::register('SurveyAbstractView',SURVEY_VIEWS."/abstract/abstract.php");
	


	

	


