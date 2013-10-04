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
// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminSurveyConfigViewsurveyConfig extends SurveyAbstractView 
{
	function edit($tpl = null)
	{
	        JHTML::stylesheet( 'surveyadmin.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );
		    global $mainframe, $option;
            $db		=& JFactory::getDBO();
		    $uri	=& JFactory::getURI();
		    JHTML::stylesheet( 'surveyadmin.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );
			$document =& JFactory::getDocument();
			$document->setTitle(JText::_('SURVEY'));
			JToolBarHelper::title( JText::_('SURVEY_CONFIGURATION'), 'survey' );
			JToolBarHelper::save('surveyconfig.save');
			JToolBarHelper::cancel('survey.list');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.SURVEY_COM_COMPONENT, true);
			
			JSubMenuHelper::addEntry(JText::_('List of Survey '), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list', true);
		    JSubMenuHelper::addEntry(JText::_('List of Question '), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyquestion.list', true);
		    JSubMenuHelper::addEntry(JText::_('List Of Responses'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyresponses.list', true);
			//JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list&archive=-1', true);
		    
			JSubMenuHelper::addEntry(JText::_('Survey Configuration'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyconfig.edit', true);
			$params = JComponentHelper::getParams(SURVEY_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }
	  
}


	
