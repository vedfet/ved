<?php
/**
 * Joomla! 1.5 component Video
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Video
 * @license GNU/GPL
 *
 * Display and manage Video and related items 
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
 
class VideoViewVideo extends JView
{
    function display($tpl = null)
    {
        //$greeting = "Hello World!";
		global $mainframe,$option;
		$paginate_blocks_per_page=2;
		$params = &$mainframe->getParams();
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title', 'Video Details ');
			}
		} else {
			$params->set('page_title',	'Video Details ');
		}
		$document =& JFactory::getDocument();
		$document->setTitle( $params->get( 'page_title' ) );
		$params = &$mainframe->getParams();
		$page_number = JRequest::getVar('page', 1, '', 'int');
		$id			= JRequest::getVar('id', null, '', 'int');
	    $limit		= JRequest::getVar('limit', $params->get('display_num'), '', 'int');
		$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
		$res	= (int)JRequest::getVar('res', 0, '', 'int');
		
		$db =& JFactory::getDBO();
		$sql = "SELECT  * FROM #__video_config ";
		$db->setQuery($sql);
		$result=$db->loadObjectList();
		
		if($result[0]->order_by==2)
		$orderby="ordering";
		if($result[0]->order_by==3)
		$orderby="birth_date desc";
		if($result[0]->order_by==1)
		$orderby="video_name";
		
        $query = "SELECT * FROM #__video_details where published = 1 and archive = 0 "
		. "\n ORDER BY $orderby";
		$db->setQuery($query);
		$db->getQuery($query);
		$total=count($db->loadObjectList());
		$limit1   = $mainframe->getCfg( 'list_limit' );
		$limit = $limit ? $limit : $limit1;
		if ( $total <= $limit ) {
			$limitstart = 0;
		}
		jimport('joomla.html.pagination');
		$this->pagination = new JPagination($total, $limitstart, $limit);
		$db->setQuery($query ,$limitstart , $limit);
		$db->getQuery($query ,$limitstart , $limit);
		$videolist =$db->loadObjectList();
	   
		$this->assignRef('videolist',$videolist);
		$this->assignRef('total',$total);
 		$this->assignRef('paging', $paging );
		$this->assignRef('limit',$limit);
		$this->assignRef('params',$params);
        parent::display($tpl);
		}
	}