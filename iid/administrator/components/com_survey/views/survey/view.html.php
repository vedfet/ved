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
 class AdminSurveyViewsurvey extends SurveyAbstractView 
{
	function overview($tpl = null)
	{
	   
	    JHTML::stylesheet( 'surveyadmin.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Survey'));
		$archive=$_REQUEST['archive'];

		if($archive==-1){
		    JToolBarHelper::title( JText::_( 'Survey Archive' ), 'survey' );
			JToolBarHelper::spacer();
			JToolBarHelper::unarchiveList('survey.unarchive');
			JToolBarHelper::deleteList("Are you sure to delete this record?",'survey.delete');
			JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.SURVEY_COM_COMPONENT, true);
			
			JSubMenuHelper::addEntry(JText::_('List of Survey'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list', true);
			JSubMenuHelper::addEntry(JText::_('List of Question'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyquestion.list', true);
		   	JSubMenuHelper::addEntry(JText::_('List Of Responce'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyresponses.list', true);
			//JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list&archive=-1', true);
			JSubMenuHelper::addEntry(JText::_('Survey Configuration'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyconfig.edit', true);
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
			
		    JToolBarHelper::title( JText::_( 'Survey ' ), 'survey' );
			//JToolBarHelper::custom( 'survey.archive', 'default.png', 'default.png', 'archive', true);
			//JToolBarHelper::archiveList('survey.archive');
		    //JToolBarHelper::publishList('survey.publish');
		    //JToolBarHelper::unpublishList('survey.unpublish');
		    JToolBarHelper::addNew('survey.edit');
		    JToolBarHelper::editList('survey.edit');
			JToolBarHelper::deleteList("Are you sure to delete this record",'survey.delete');
		    JToolBarHelper::custom( 'cpanel.cpanel', 'default.png', 'default.png', ' ADMIN CPANEL', false );
		    JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.SURVEY_COM_COMPONENT, true);
			
			JSubMenuHelper::addEntry(JText::_('List of Survey'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list', true);
		    JSubMenuHelper::addEntry(JText::_('List of Question'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyquestion.list', true);
					JSubMenuHelper::addEntry(JText::_('List Of Responses'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyresponses.list', true);
			//JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=survey.list&archive=-1', true);
			JSubMenuHelper::addEntry(JText::_('Survey Configuration'), 'index.php?option='.SURVEY_COM_COMPONENT.'&task=surveyconfig.edit', true);
		    $params = JComponentHelper::getParams(SURVEY_COM_COMPONENT);
		    JHTML::_('behavior.tooltip');
	   }	
	}


	function edit($tpl = null)
	{
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'surveyadmin.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Survey'));
		if(!empty($_REQUEST['cid']))
			JToolBarHelper::title( JText::_('SURVEY_EDIT'), 'survey' );
		else
			JToolBarHelper::title( JText::_('SURVEY_NEW'), 'survey' );
		JToolBarHelper::save('survey.save');
		JToolBarHelper::cancel('survey.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.SURVEY_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(SURVEY_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	
     
	   function view($tpl = null)
	   {
		
		JRequest::setVar( 'hidemainmenu', 1 );
		JHTML::stylesheet( 'surveyadmin.css', 'administrator/components/'.SURVEY_COM_COMPONENT.'/assets/css/' );
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Survey'));
		JToolBarHelper::title( JText::_('Survey'), 'survey' );
		JToolBarHelper::cancel('survey.list');
		JSubMenuHelper::addEntry(JText::_('Control Panel'), 'index.php?option='.SURVEY_COM_COMPONENT, true);
		$params = JComponentHelper::getParams(SURVEY_COM_COMPONENT);
		JHTML::_('behavior.tooltip');
	   }	
	   
	 
	
}