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

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();

/* 
 *
 * HTML View class for the component
 *
 * @static
 */
 class AdminIidtestimonialConfigViewiidtestimonialConfig extends IidtestimonialAbstractView 
{
	function edit($tpl = null)
	{
	        JHTML::stylesheet( 'iidtestimonialadmin.css', 'administrator/components/'.IIDTESTIMONIAL_COM_COMPONENT.'/assets/css/' );
		    global $mainframe, $option;
            $db		=& JFactory::getDBO();
		    $uri	=& JFactory::getURI();
		    JHTML::stylesheet( 'iidtestimonialadmin.css', 'administrator/components/'.IIDTESTIMONIAL_COM_COMPONENT.'/assets/css/' );
			$document =& JFactory::getDocument();
			$document->setTitle(JText::_('IIDTESTIMONIAL'));
			JToolBarHelper::title( JText::_('IIDTESTIMONIAL_CONFIGURATION'), 'iidtestimonial' );
			JToolBarHelper::save('iidtestimonialconfig.save');
			JToolBarHelper::cancel('iidtestimonial.list');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT, true);
			JSubMenuHelper::addEntry(JText::_('Manage Iidtestimonial '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonial.list&archive=-1', true);
		    JSubMenuHelper::addEntry(JText::_('Manage Iidtestimonial Configuration'), 'index.php?option='.IIDTESTIMONIAL_COM_COMPONENT.'&task=iidtestimonialconfig.edit', true);
			$params = JComponentHelper::getParams(IIDTESTIMONIAL_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }
	  
}


	
