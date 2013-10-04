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
 
    class NewsViewnewsforprint extends JView
	{
    function display($tpl = null)
    {
		
		$dispatcher	=& JDispatcher::getInstance();
		global $mainframe,$option;
		$paginate_blocks_per_page=3;
		$document	=& JFactory::getDocument();
		$params = &$mainframe->getParams();
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();
		if (is_object( $menu )) {
				$menu_params = new JParameter( $menu->params );
				if (!$menu_params->get( 'page_title')) {
					$params->set('page_title',	JText::_( 'News'));
				}
			} else {
				$params->set('page_title',	JText::_( 'News'));
			}


		$document->setTitle( $params->get( 'page_title' ) );
		
		$page_number = JRequest::getVar('page', 1, '', 'int');
		$did=JRequest::getVar('id', null, '', 'int');
  		//$purpose	= JRequest::getVar('purpose', 0, '', 'int');
		$db =& JFactory::getDBO();
		
		 $query = "SELECT * FROM #__news where id='".$did."'";
		
		$db->setQuery($query);
		$newslist = $db->loadObjectList();
		$total=count($newslist);	
		
		//$propertylist = $dispatcher->trigger('onPrepareContent', array (& $propertylist, & $params, $limitstart));
		//$paging=$this->getNavigation($total,$paginate_blocks_per_page,$page_number,'com_news','','','');
	
	
		$this->assignRef('newslist',$newslist[0]);
		$this->assignRef('total',$total);
 		$this->assignRef('params' ,	 $params);
        parent::display($tpl);
		
    }

		
}

