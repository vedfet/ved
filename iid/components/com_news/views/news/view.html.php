<?php
/**
 * Joomla! 1.5 component news
 *
 * @version $Id: router.php 2010-06-03 02:04:32 svn $
 * @author Diwakar
 * @package Joomla
 * @subpackage news
 * @license GNU/GPL
 *
 * Every Days News
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
 
 
class NewsViewNews extends JView
{
    function display($tpl = null)
    {
		
		$dispatcher	=& JDispatcher::getInstance();
		global $mainframe,$option;
		$db =& JFactory::getDBO();
		$document	=& JFactory::getDocument();
		$params = &$mainframe->getParams();
		$page_number = JRequest::getVar('page', 1, '', 'int');
		$id			= JRequest::getVar('id', null, '', 'int');
	    $limit		= JRequest::getVar('limit', $params->get('display_num'), '', 'int');
		$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
		
		
		
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();
		if (is_object( $menu )) 
		{
				$menu_params = new JParameter( $menu->params );
				if (!$menu_params->get( 'page_title')) {
					$params->set('page_title',	JText::_( 'News'));
				}
			} else {
				$params->set('page_title',	JText::_( 'News'));
			}
                $document =& JFactory::getDocument();
		$document->setTitle("Don't Test the Waters Iowa Flood Awareness - News");

		if(isset($_REQUEST['sort_by']))
			 $ordering=$_REQUEST['sort_by'];
		else
				$ordering="created_date"; 
				
 		$query = "SELECT * FROM #__news where publish_frontpage=1 ORDER BY $ordering DESC";
		$db->setQuery($query);
		$total=count($db->loadObjectList());
		$limit = $limit ? $limit :2;
		if ( $total <= $limit ) 
		{
			$limitstart = 0;
		}
		
		jimport('joomla.html.pagination');
		$this->pagination = new JPagination($total, $limitstart, $limit);
		$db->setQuery($query ,$limitstart , $limit);
		$newslist =$db->loadObjectList();
		
		$news_layout=$newslist[0]->news_layout;
		
		$this->assignRef('newslist',$newslist);
		$this->assignRef('total',$total);
 		$this->assignRef( 'paging', $paging );
		$this->assignRef( 'sort_by', $ordering );
		$this->assignRef('params',$params);
		$this->assignRef('limit',$limit);
		
		
		
		
        parent::display($tpl);
    }
	
		
}

