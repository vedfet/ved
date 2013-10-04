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

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');



JLoader::import("iidtestimonial",IIDTESTIMONIAL_ADMINPATH."/tables/");

class AdminIidtestimonialController extends JController {
	var $component = null;
	var $iidtestimonialTable = null;
	var $iidtestimonialClassname = null;
	
	/**
	 * Controler for the Control Panel
	 * @param array		configuration
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		
		$this->registerTask( 'list', 'overview' );
		$this->registerDefaultTask("overview");
		
		$this->component = 	IIDTESTIMONIAL_COM_COMPONENT;
		$this->nurseyTable = "#__iidtestimonial";
		$this->iidtestimonialClassname = "TableIidtestimonial";
		
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
		
		
		global $mainframe,$option;
        $db		=& JFactory::getDBO();
		$uri	=& JFactory::getURI();
		$filter_catid		= $mainframe->getUserStateFromRequest( $option.'filter_catid',		'filter_catid',		0,				'int' );
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'a.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		$lists['catid'] = JHTML::_('list.category',  'filter_catid', $option, intval( $filter_catid ), $javascript );
        $lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;
			
		
		// TODO fix this when database is updated
		$db	=& JFactory::getDBO();
		$user =& JFactory::getUser();
		
		$archive=(int)$_REQUEST['archive'];
	    if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}

		$limit		= intval( $mainframe->getUserStateFromRequest( "listlimit", 'limit', 10 ));
		$limitstart = intval( $mainframe->getUserStateFromRequest( "{$this->component}limitstart", 'limitstart', 0 ));

				// get the total number of records
		$query = "SELECT count(*) FROM $this->nurseyTable"
		. "\n WHERE archive=$archive "	;
		$db->setQuery( $query);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		if( $limit > $total ) {
			$limitstart = 0;
		}

		$db	=& JFactory::getDBO();

		$sql = "SELECT c.* FROM $this->nurseyTable as c"
		. "\n WHERE archive=$archive  "
		. "\n ORDER BY ordering ";
		if ($limit>0){
			$sql .= "\n LIMIT $limitstart, $limit";
		}
		$db->setQuery( $sql);
	
		$row= $db->loadObjectlist();
		
		
		jimport('joomla.html.pagination');
		$pageNav = new JPagination( $total, $limitstart, $limit  );
    	// get the view
		$this->view = & $this->getView("iidtestimonial","html");
		// Set the layout
		$this->view->setLayout('overview');

		$this->view->assign('title'   , JText::_("Iidtestimonial"));
		$this->view->assign('listiidtestimonial',$row);
		
		$this->view->assign('pageNav',$pageNav);
		$this->view->display();

	}

	/**
	 * Category Editing code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	function edit(){
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);
	    $uri =& JURI::getInstance();
		$db =& JFactory::getDBO();
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		
		$sql = "SELECT * FROM #__iidtestimonial where id=".$cid;
		$db->setQuery($sql);
		$rows = $db->loadObjectList();
	
		$listiidtestimonial = new $this->iidtestimonialClassname($db);
		$listiidtestimonial->load($cid);
		$params = JComponentHelper::getParams("com_iidtestimonial");
	// get the view
		$this->view = & $this->getView("iidtestimonial","html");

		// Set the layout
		$this->view->setLayout('edit');
		$this->view->assign('title'   , JText::_("Iidtestimonial"));
		$this->view->assign('listiidtestimonial', $listiidtestimonial);
		$this->view->display();
	}
     
	 
	
    function view(){
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);
	 	// TODO fix this when database is updated
		$db =& JFactory::getDBO();
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list&archive=-1", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		$lists=array();
	    $listiidtestimonial = new $this->iidtestimonialClassname($db);
		$listiidtestimonial->load($cid);
	    $params = JComponentHelper::getParams("com_iidtestimonial");
		$this->view = & $this->getView("iidtestimonial","html");
    	$this->view->setLayout('View');
		$this->view->assign('title'   , JText::_("Children Details"));
		$this->view->assign('listiidtestimonial', $listiidtestimonial);
		$this->view->assign('lists',$lists);	
		$this->view->display();
	}

	/**
	 * Category Saving code
	 *
	 * Author: Geraint Edwards
	 * 
	 */
	function save(){
		
		
		$user =& JFactory::getUser();
        $cid = JRequest::getVar('id',	0 );
		$id=$_GET['id'];
		$db	=& JFactory::getDBO();
		

		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
        $post = JRequest::get('post');
		

		$model = $this->getModel('iidtestimonial');
		if($model->save($post)) 
		{
			$msg = JText::_('Iidtestimonial Saved'); 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('Iidtestimonial Not Saved'); 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
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

		$model = $this->getModel('iidtestimonial');
		if ($model->saveorder()) 
		{
			$msg = JText::_( 'NEW ORDERING SAVED' );
		}
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
	}

	/**
	 * Category Deletion code
	 *
	 * Author: Geraint Edwards
	 * 
	 */	
	function delete(){
	    $post = JRequest::get('post');
		$model = $this->getModel('iidtestimonial');
		$archive=$_POST[archive];
		if($model->delete($post)) 
		{
			$msg = JText::_('Record Successfully Deleted');
			if($archive==-1){ 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list&archive=-1",$msg);
			}
			else
			{
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
			}
		} 
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			if($archive==-1){ 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list&archive=-1",$msg);
			}
			else
			{
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
			}
		}
	}

    function orderup()
	{
		
		$model = $this->getModel('iidtestimonial');
		$model->move(-1);
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list");
	}
	
	function orderdown()
	{
		
		$model = $this->getModel('iidtestimonial');
		$model->move(1);
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list");
	}
	
	function publish(){
		$model = $this->getModel('iidtestimonial');
		$model->publish(1); 
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list");

	}

	function unpublish(){
	    $model = $this->getModel('iidtestimonial');
		$model->publish(0); 
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list");
	}
	function archive(){
		$model = $this->getModel('iidtestimonial');
		$model->archive(-1); 
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list");

	}
	function unarchive(){
	    $model = $this->getModel('iidtestimonial');
		$model->archive(0); 
		$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list&archive=-1");
	}
			
}