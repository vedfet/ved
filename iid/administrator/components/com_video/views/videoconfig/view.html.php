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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminVideoConfigViewvideoConfig extends VideoAbstractView 
{
	function edit($tpl = null)
	{
	        JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );
		    global $mainframe, $option;
            $db		=& JFactory::getDBO();
		    $uri	=& JFactory::getURI();
		    JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );
			$document =& JFactory::getDocument();
			$document->setTitle(JText::_('VIDEO'));
			JToolBarHelper::title( JText::_('VIDEO_CONFIGURATION'), 'video' );
			JToolBarHelper::save('videoconfig.save');
			JToolBarHelper::cancel('video.list');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.VIDEO_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Video '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list&archive=-1', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Video Configuration'), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=videoconfig.edit', true);
			$params = JComponentHelper::getParams(VIDEO_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }
	  
}


	
