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
 
  class NewsViewDetailsnews extends JView
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

		$page_number = 	(ceil($total/$paginate_blocks_per_page)<$page_number?ceil($total/$paginate_blocks_per_page):$page_number);
				
		$limit_start = 	$paginate_blocks_per_page * ($page_number - 1);
		if($limit_start<0) $limit_start=0;
		
		 $query = "SELECT * FROM #__news where id='".$did."'";
		
		$db->setQuery($query ,$limit_start , $paginate_blocks_per_page);
		$newslist = $db->loadObjectList();
		$total=count($newslist);	
		
	    $news_layout=$newslist[0]->news_layout;
		
	    $this->assignRef('news_layout',$news_layout);
		$this->assignRef('newslist',$newslist[0]);
		$this->assignRef('total',$total);
 		$this->assignRef('params' ,	 $params);
        parent::display($tpl);
    }
	function getNavigation($total_records, $paginate_blocks_per_page, $page_number, $option, $task='', $Itemid='',$OtherParam='')
	{
			$db =& JFactory::getDBO();
			$content = '';
			if (ceil($total_records/$paginate_blocks_per_page) <= $page_number)
			{
					$content .= '<div class="pagninationarrowright">
						<img height="24" border="0" width="25" alt="Next" src="images/spacer.gif"/>
						</div><div class="pagnination">
						';
			}
			else
			{
						$n_page_number=$page_number + 1;
						$content .= '<div class="pagninationarrowright">
						<a title="Next" href="index.php?option='.$option.$task.$Itemid.'&page='.$n_page_number.$OtherParam.'" >
						<img height="24" border="0" width="25" alt="Next" src="images/spacer.gif"/>
						</a>
						</div><div class="pagnination">
						';
			}
			for ($i=1; $i <= ceil($total_records/$paginate_blocks_per_page); $i++) {
				if ($i == $page_number) {
					$content .= '<a class="active01" href="index.php?option='.$option.$task.$Itemid.'&page='.$i.$OtherParam.'" >'.$i.'</a>';
				} else {
					$content .= '<a href="index.php?option='.$option.$task.$Itemid.'&page='.$i.$OtherParam.'" >'.$i.'</a>';
				}
				
			}
			if ($page_number == 1){
			
				$content .= '</div><div class="pagninationarrowleft">
							  <img height="24" border="0" width="25" src="images/spacer.gif"/>
						</div>';
			}
			else
			{
			   $p_page_number=$page_number - 1;
			   $content .= '</div><div class="pagninationarrowleft">
							  <a href="index.php?option='.$option.$task.$Itemid.'&page='.$p_page_number.$OtherParam.'"><img height="24" border="0" width="25" src="images/spacer.gif"/></a>
						</div>';
			}
		
			return $content;
		}
		
}

