<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * It creates component for iidtestimonial
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
 class AdminIidtestimonialViewiidtestimonial extends IidtestimonialAbstractView 
{
	function overview($tpl = null)
	{
	    
	
	    JHTML::stylesheet( 'iidtestimonialadmin.css', 'administrator/components/'.IIDTESTIMONIAL_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Iidtestimonial'));
		$archive=$_REQUEST['archive'];

		if($archive==-1){
		    JToolBarHelper::title( JText::_( 'Iidtestimonial Archive' ), 'iidtestimonial' );
			JToolBarHelper::spacer();
			JToolBarHelper::unarchiveList('iidtestimonial.unarchive');
			JToolBarHelper::deleteList("Are you sure to delete this record?",'iidtestimonial.delete');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Iidtestimonial '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list&archive=-1', true);

			JSubMenuHelper::addEntry(JText::_('Manage IidTestimonial Configuartion '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonialconfig.edit', true);



		}
		else 
		{
		
		    global $mainframe, $option;
            $db		=& JFactory::getDBO();
		    $uri	=& JFactory::getURI();
			$filter_catid		= $mainframe->getUserStateFromRequest( $option.'filter_catid',		'filter_catid',		0,				'int' );
		    $filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'a.ordering',	'cmd' );
		    $filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',				'word' );
			$lists['catid'] = JHTML::_('list.category',  'filter_catid', $option, intval( $filter_catid ), $javascript );

			$lists['order_Dir'] = $filter_order_Dir;
		    $lists['order'] = $filter_order;
			$items		= & $this->get( 'Data');
		    $total		= & $this->get( 'Total');
		    $pagination = & $this->get( 'Pagination' );
			
			$this->assignRef('user',		JFactory::getUser());
		    $this->assignRef('lists',		$lists);
		    $this->assignRef('items',		$items);
		    $this->assignRef('pagination',	$pagination);
			
		    JToolBarHelper::title( JText::_( 'Iidtestimonial ' ), 'iidtestimonial' );
			//JToolBarHelper::custom( 'iidtestimonial.archive', 'default.png', 'default.png', 'archive', true);
			JToolBarHelper::archiveList('iidtestimonial.archive');
		    JToolBarHelper::publishList('iidtestimonial.publish');
		    JToolBarHelper::unpublishList('iidtestimonial.unpublish');
		    JToolBarHelper::addNew('iidtestimonial.edit');
		    JToolBarHelper::editList('iidtestimonial.edit');
			JToolBarHelper::deleteList("Are you sure to delete this record",'iidtestimonial.delete');
		    JToolBarHelper::custom( 'cpanel.cpanel', 'default.png', 'default.png', ' ADMIN CPANEL', false );
		    JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Iidtestimonial '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list&archive=-1', true);

			JSubMenuHelper::addEntry(JText::_('Manage IidTestimonial Configuartion '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonialconfig.edit', true);

		    $params = JComponentHelper::getParams(IIDTESTIMONIAL_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }	
	}


	function edit($tpl = null)
	{
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'iidtestimonialadmin.css', 'administrator/components/'.IIDTESTIMONIAL_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Iidtestimonial'));
		if(!empty($_REQUEST['cid']))
			JToolBarHelper::title( JText::_('IIDTESTIMONIAL_EDIT'), 'iidtestimonial' );
		else
			JToolBarHelper::title( JText::_('IIDTESTIMONIAL_NEW'), 'iidtestimonial' );
		JToolBarHelper::save('iidtestimonial.save');
		JToolBarHelper::cancel('iidtestimonial.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(IIDTESTIMONIAL_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	
     
	   function view($tpl = null)
	   {
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'iidtestimonialadmin.css', 'administrator/components/'.IIDTESTIMONIAL_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Iidtestimonial'));
		JToolBarHelper::title( JText::_('Iidtestimonial'), 'iidtestimonial' );
		JToolBarHelper::cancel('iidtestimonial.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(IIDTESTIMONIAL_COM_COMPONENT);
		JHTML::_('behavior.tooltip');
	   }	
	   
	 
	
}