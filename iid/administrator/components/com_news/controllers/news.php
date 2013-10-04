<?php
/**
 * Joomla! 1.5 component News
 *
 * @version $Id: News.php 2010-03-14 01:52:14 svn $
 * @author Diwakar Kumar Singh
 * @package Joomla
 * @subpackage News
 * @license GNU/GPL
 *
 * Display and manage News and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


JLoader::import("news",JNEWS_ADMINPATH."/tables/");

class AdminNewsController extends JController 
{
	var $component = null;
	var $newsTable = null;
	var $newsClassname = null;
	
	/**
	 * Controler for the Control Panel
	 * @param array		configuration
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		
		$this->registerTask( 'list',  'overview' );
		$this->registerDefaultTask("overview");

		$this->component = 	JNEWS_COM_COMPONENT;
		$this->newsTable = "#__news";
		$this->newsClassname = "TableNews";
		
	}

	/**
	 * Category Management code
	 *
	 * Author: Geraint Edwards
	 */
	/**
	 * Manage news - show lists
	 *
	 */
	function overview( )
	{
		global $mainframe;
		// TODO fix this when database is updated
		$db	=& JFactory::getDBO();
		$user =& JFactory::getUser();

		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}

		$limit		= intval( $mainframe->getUserStateFromRequest( "listlimit", 'limit', 10 ));
		$limitstart = intval( $mainframe->getUserStateFromRequest( "{$this->component}limitstart", 'limitstart', 0 ));

				// get the total number of records
		$query = "SELECT count(*) FROM $this->newsTable"
		. "\n WHERE 1 "	;
		$db->setQuery( $query);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		if( $limit > $total ) {
			$limitstart = 0;
		}

		$db	=& JFactory::getDBO();

		$sql = "SELECT c.* FROM $this->newsTable as c"
		. "\n WHERE 1 "
		. "\n ORDER BY ordering ";
		if ($limit>0){
			$sql .= "\n LIMIT $limitstart, $limit";
		}

		$db->setQuery($sql);
		$rows = $db->loadObjectList();
		
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit  );

		// get the view
		$this->view = & $this->getView("news","html");

		// Set the layout
		$this->view->setLayout('overview');
		$this->view->assign('title'   , JText::_("News"));
		$this->view->assign('newslist',$rows);
		$this->view->assign('pageNav',$pageNav);

		$this->view->display();

	}

	/**
	 * Category Editing code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	 function showLogoImage()
	{
		
		$id=$_REQUEST['id'];
		$database =& JFactory::getDBO();
		$query="SELECT file_name, file_type, file_size, logo_image"
		."\n FROM #__news WHERE id='".$_REQUEST['id']."'  LIMIT 1";
		
		$database->setQuery( $query);
		$rows_image = $database->loadObjectList();
		
		if(count($rows_image)>0)
		{
			$file_name = $rows_image[0]->file_name;
			$file_type = $rows_image[0]->file_type;
			$file_size = $rows_image[0]->file_size;
			$logo_image = $rows_image[0]->logo_image;
			header("Content-length: $file_size");
			header("Content-type: $file_type");
			header("Content-Disposition: attachment; filename=$file_name");
			echo $logo_image;
		}
		else
		{
			
		}
		exit;

    }
	function edit()
	{
		
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);

		// TODO fix this when database is updated
		$db =& JFactory::getDBO();
		
		
		$lists=array();
		
		
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".JNEWS_COM_COMPONENT."&task=news.list", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		$newslist = new $this->newsClassname($db);
		$newslist->load($cid);

		// get news for parent info
		// authorised user to select admin
		$params = JComponentHelper::getParams("com_news");
		
		
		// get the view
		$this->view = & $this->getView("news","html");

		// Set the layout
		$this->view->setLayout('edit');
		$this->view->assign('title'   , JText::_("News Details"));
		$this->view->assign('newslist', $newslist);
		$this->view->assign('lists',$lists);	
		$this->view->display();
	}

	/**
	 * Category Saving code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	function save()
	{
		$db	=& JFactory::getDBO();
		$user =& JFactory::getUser();

		$cid = JRequest::getVar('cid',	array(0) );
		JArrayHelper::toInteger($cid);

		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
        $post = JRequest::get('post', JREQUEST_ALLOWHTML);
		$model = $this->getModel('news');
		if($model->save($post)) 
		{
			$msg = JText::_('NEWS_SAVED'); 
			$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('NEWS_NOT_SAVED'); 
			$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list",$msg);
		}
	
	}

	/**
	 * Category Ordering code
	 *
	 * Author: Geraint Edwards
	 * Copyright: 2007 Geraint Edwards
	 * 
	 */
	function saveorder(){
		$user =& JFactory::getUser();
		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
		$post = JRequest::get('post');
		$model = $this->getModel('news');
		if ($model->saveorder()) 
		{
			$msg = JText::_( 'NEW ORDERING SAVED' );
		}
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list",$msg);
	}

	/**
	 * Category Deletion code
	 *
	 * Author: Geraint Edwards
	 * 
	 */	
	function delete(){
	$post = JRequest::get('post');
		$model = $this->getModel('news');
		if($model->delete($post)) 
		{
			$msg = JText::_('Successfully News Deleted'); 
			$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list",$msg);
		}
	}

    function orderup()
	{
		$model = $this->getModel('news');
		$model->move(-1);
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");
	}
	
	function orderdown()
	{
		$model = $this->getModel('news');
		$model->move(1);
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");
	}
	
	function publish(){
		$model = $this->getModel('news');
		$model->publish(1); 
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");

			}

	function unpublish(){
	    $model = $this->getModel('news');
		$model->publish(0); 
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");
			}
	/*function feature(){
		$model = $this->getModel('news');
		$model->feature(1); 
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");

			}

	function unfeature(){
	    $model = $this->getModel('news');
		$model->feature(0); 
		$this->setRedirect("index.php?option=".JNEWS_COM_COMPONENT."&task=news.list");
			}
*/
			
	

}
