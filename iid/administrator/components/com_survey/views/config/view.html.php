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
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminConfigViewConfig extends SurveyAbstractView 
{
	function overview($tpl = null)
	{
		
		JHTML::stylesheet( 'survey.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Configuration'));
		
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'Configuration' ), 'config' );
	
		JToolBarHelper::publishList('config.publish');
		JToolBarHelper::unpublishList('config.unpublish');
		JToolBarHelper::addNew('config.edit');
		JToolBarHelper::editList('config.edit');
		JToolBarHelper::deleteList("config category?",'config.delete');
		JToolBarHelper::spacer();
		JToolBarHelper::custom( 'cpanel.cpanel', 'default.png', 'default.png', ' ADMIN CPANEL', false );
		//JToolBarHelper::help( 'screen.config', true);

		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.JPM_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JPM_COM_COMPONENT);
		//$section = $params->getValue("section",0);
				
		JHTML::_('behavior.tooltip');
	}	


	function edit($tpl = null)
	{
		//JRequest::setVar( 'hidemainmenu', 1 );
		
		JHTML::stylesheet( 'eventsadmin.css', 'administrator/components/'.JPM_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Configuration'));
		
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'Configuration' ), 'config' );
	
		JToolBarHelper::save('config.save');
		//JToolBarHelper::cancel('config.edit');
		//JToolBarHelper::help( 'screen.config.edit', true);

		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.JPM_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JPM_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	

}