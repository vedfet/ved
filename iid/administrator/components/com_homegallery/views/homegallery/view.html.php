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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminHomegalleryViewHomegallery extends JHomegalleryAbstractView 
{
	function overview($tpl = null)
	{
		JHTML::stylesheet( 'homegalleryadmin.css', 'administrator/components/'.JHOMEGALLERY_COM_COMPONENT.'/assets/css/' );
		
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Homegallery'));
		
		// Set toolbar items for the page
		JToolBarHelper::title( JText::_( 'HOMEGALLERY_LIST' ), 'homegallery' );
	
		JToolBarHelper::publishList('homegallery.publish');
		JToolBarHelper::unpublishList('homegallery.unpublish');
		JToolBarHelper::addNew('homegallery.edit');
		JToolBarHelper::editList('homegallery.edit');
		JToolBarHelper::deleteList("Are You Sure want to delete this homegallery image?",'homegallery.delete');
		JToolBarHelper::spacer();
	//	JToolBarHelper::custom( 'cpanel.cpanel', 'default.png', 'default.png', 'ADMIN CPANEL', false );
		//JToolBarHelper::help( 'screen.news', true);

		JSubMenuHelper::addEntry(JText::_('CONTROL_PANEL'), 'index.php?option='.JHOMEGALLERY_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JHOMEGALLERY_COM_COMPONENT);
		//$section = $params->getValue("section",0);
				
		JHTML::_('behavior.tooltip');
	}	


	function edit($tpl = null)
	{
		JRequest::setVar( 'hidemainmenu', 1 );
		
		JHTML::stylesheet( 'homegalleryadmin.css', 'administrator/components/'.JHOMEGALLERY_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Homegallery'));
		
		// Set toolbar items for the page
		if(!empty($_REQUEST['cid']))
			JToolBarHelper::title( JText::_( 'HOMEGALLERY_EDIT' ), 'homegallery' );
		else
			JToolBarHelper::title( JText::_( 'HOMEGALLERY_NEW' ), 'homegallery' );
		
	
		JToolBarHelper::save('homegallery.save');
		JToolBarHelper::cancel('homegallery.list');
		//JToolBarHelper::help( 'screen.news.edit', true);

		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.JHOMEGALLERY_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JHOMEGALLERY_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	

}