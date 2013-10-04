<?php
/**
 * Joomla! 1.5 component Iidtestimonial_list
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Iidtestimonial_list
 * @license GNU/GPL
 *
 * Display and manage Iidtestimonial_list and related items 
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
 
class Iidtestimonial_listViewDetails extends JView
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
				$params->set('page_title', 'FlOOD TESTIMONIALS');
			}
		} else {
			$params->set('page_title',	'FlOOD TESTIMONIALS');
		}

		$document =& JFactory::getDocument();
		$document->setTitle("Don't Test the Waters Iowa Flood Awareness - Share Your Story");		
		
		$params = &$mainframe->getParams();
		$page_number = JRequest::getVar('page', 1, '', 'int');
		$id			= JRequest::getVar('id', null, '', 'int');
	    $limit		= JRequest::getVar('limit', $params->get('display_num'), '', 'int');
		$limitstart	= JRequest::getVar('limitstart', 0, '', 'int');
		$res	= (int)JRequest::getVar('res', 0, '', 'int');
		
		$db =& JFactory::getDBO();
		$sql = "SELECT  * FROM #__iidtestimonial ";
		$db->setQuery($sql);
		$result=$db->loadObjectList();
		
		if($result[0]->order_by==2)
		$orderby="ordering";
		if($result[0]->order_by==3)
		$orderby="birth_date desc";
		if($result[0]->order_by==1)
		$orderby="iidtestimonial_list_name";
		
		$query = "SELECT * FROM #__iidtestimonial  where published = 1 and archive = 0 AND id=".$id
		. "\n ORDER BY ordering";
				
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
		$iidtestimonial_listlist =$db->loadObjectList();
	   
	  
		$this->assignRef('iidtestimonial_listlist',$iidtestimonial_listlist);
		$this->assignRef('total',$total);
 	    $this->assignRef('paging', $paging );
		$this->assignRef('limit',$limit);
		$this->assignRef('params',$params);
        parent::display($tpl);
		}
	}