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
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminVideoViewvideo extends VideoAbstractView 
{
	function overview($tpl = null)
	{
	    
	
	    JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Video'));
		$archive=$_REQUEST['archive'];

		if($archive==-1){
		    JToolBarHelper::title( JText::_( 'Video Archive' ), 'video' );
			JToolBarHelper::spacer();
			JToolBarHelper::unarchiveList('video.unarchive');
			JToolBarHelper::deleteList("Are you sure to delete this record?",'video.delete');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.VIDEO_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Video '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list&archive=-1', true);
			JSubMenuHelper::addEntry(JText::_('Manage Video Configuration'), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=videoconfig.edit', true);
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
			
		    JToolBarHelper::title( JText::_( 'Video ' ), 'video' );
			//JToolBarHelper::custom( 'video.archive', 'default.png', 'default.png', 'archive', true);
			JToolBarHelper::archiveList('video.archive');
		    JToolBarHelper::publishList('video.publish');
		    JToolBarHelper::unpublishList('video.unpublish');
		    JToolBarHelper::addNew('video.edit');
		    JToolBarHelper::editList('video.edit');
			JToolBarHelper::deleteList("Are you sure to delete this record",'video.delete');
		    JToolBarHelper::custom( 'cpanel.cpanel', 'default.png', 'default.png', ' ADMIN CPANEL', false );
		    JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.VIDEO_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Video '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list&archive=-1', true);
			JSubMenuHelper::addEntry(JText::_('Manage Video Configuration'), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=videoconfig.edit', true);
		    $params = JComponentHelper::getParams(VIDEO_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }	
	}


	function edit($tpl = null)
	{
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Video'));
		if(!empty($_REQUEST['cid']))
			JToolBarHelper::title( JText::_('VIDEO_EDIT'), 'video' );
		else
			JToolBarHelper::title( JText::_('VIDEO_NEW'), 'video' );
		JToolBarHelper::save('video.save');
		JToolBarHelper::cancel('video.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.VIDEO_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(VIDEO_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	
     
	   function view($tpl = null)
	   {
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Video'));
		JToolBarHelper::title( JText::_('Video'), 'video' );
		JToolBarHelper::cancel('video.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.VIDEO_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(VIDEO_COM_COMPONENT);
		JHTML::_('behavior.tooltip');
	   }	
	   
	 
	
}