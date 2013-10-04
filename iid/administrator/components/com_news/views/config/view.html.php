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
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminConfigViewConfig extends JNewsAbstractView 
{
	function overview($tpl = null)
	{
		
		JHTML::stylesheet( 'eventsadmin.css', 'administrator/components/'.JPM_COM_COMPONENT.'/assets/css/' );

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