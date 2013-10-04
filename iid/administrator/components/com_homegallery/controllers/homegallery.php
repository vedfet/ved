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


JLoader::import("homegallery",JHOMEGALLERY_ADMINPATH."/tables/");

class AdminHomegalleryController extends JController 
{
	var $component = null;
	var $homegalleryTable = null;
	var $homegalleryClassname = null;
	
	/**
	 * Controler for the Control Panel
	 * @param array		configuration
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		
		$this->registerTask( 'list',  'overview' );
		$this->registerDefaultTask("overview");

		$this->component = 	JHOMEGALLERY_COM_COMPONENT;
		$this->homegalleryTable = "#__homegallery";
		$this->homegalleryClassname = "TableHomegallery";
		
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
		$query = "SELECT count(*) FROM $this->homegalleryTable"
		. "\n WHERE 1 "	;
		$db->setQuery( $query);
		$total = $db->loadResult();
		echo $db->getErrorMsg();
		if( $limit > $total ) {
			$limitstart = 0;
		}

		$db	=& JFactory::getDBO();

		$sql = "SELECT c.* FROM $this->homegalleryTable as c"
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
		$this->view = & $this->getView("homegallery","html");

		// Set the layout
		$this->view->setLayout('overview');
		$this->view->assign('title'   , JText::_("Homegallery"));
		$this->view->assign('homegallerylist',$rows);
		$this->view->assign('pageNav',$pageNav);

		$this->view->display();

	}
		function saveorder(){
		$user =& JFactory::getUser();
		if (strtolower($user->usertype)!="super administrator" && strtolower($user->usertype)!="administrator"){
			$this->setRedirect( "index.php?option=$this->component&task=cpanel.cpanel", "Not Authorised - must be admin" );
			return;
		}
		$post = JRequest::get('post');
		$model = $this->getModel('homegallery');
		if ($model->saveorder()) 
		{
			$msg = JText::_( 'NEW ORDERING SAVED' );
		}
		$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list",$msg);
	}

	/**
	 * Category Deletion code
	 *
	 * Author: Geraint Edwards
	 * 
	 */	
	function delete(){
	$post = JRequest::get('post');
		$model = $this->getModel('homegallery');
		if($model->delete($post)) 
		{
			$msg = JText::_('Successfully Homegallery Deleted'); 
			$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list",$msg);
		}
	}

    function orderup()
	{
		$model = $this->getModel('homegallery');
		$model->move(-1);
		$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list");
	}
	
	function orderdown()
	{
		$model = $this->getModel('homegallery');
		$model->move(1);
		$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list");
	}
	
	function publish(){
		$model = $this->getModel('homegallery');
		$model->publish(1); 
		$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list");

			}

	function unpublish(){
	    $model = $this->getModel('homegallery');
		$model->publish(0); 
		$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list");
			}
			
			
			
	function edit()
	{
		
		$cid = JRequest::getVar(	'cid',	array(0) );
		JArrayHelper::toInteger($cid);
		$params = &JComponentHelper::getParams( 'com_media' );                           
		$file_path=$params->get('file_path');
		$image_path=$params->get('image_path');

		// TODO fix this when database is updated
		$db =& JFactory::getDBO();
		
		
		$lists=array();
		
		
		if (count($cid)<=0){
			$this->setRedirect( "index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list", "Invalid Category Selection" );
			return;
		}
		else {
			$cid=$cid[0];
		}
		$sql = "SELECT * FROM #__homegallery where id=".$cid;
		$db->setQuery($sql);
		$rows = $db->loadObjectList();
		
		$homegallerylist = new $this->homegalleryClassname($db);
		$homegallerylist->load($cid);

		// get news for parent info
		// authorised user to select admin
		$params = JComponentHelper::getParams("com_homegallery");
		
		$files=array();
		
		$files[] = JHTML::_('select.option', 0, JText::_('Select'));
		$dir=trim(JPATH_BASE,"administrator");
		$current_dir=$dir.$file_path.'/homegallery/';
		
		$this->getImagefile_path('',$current_dir,$files);
		$lists['logo_image']=JHTML::_('select.genericlist',  $files, 'logo_image', 'id="files" class="inputbox"  size="1" "' , 'value', 'text',$rows[0]->logo_image);
		// get the view
		$this->view = & $this->getView("homegallery","html");

		// Set the layout
		$this->view->setLayout('edit');
		$this->view->assign('title'   , JText::_("Homegallery Details"));
		$this->view->assign('homegallerylist', $homegallerylist);
		$this->view->assign('lists',$lists);	
		$this->view->assign('file_path',$file_path);
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
        $post = JRequest::get('post');
		$model = $this->getModel('homegallery');
		if($model->save($post)) 
		{
			$msg = JText::_('HOMEGALLERY_SAVED'); 
			$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list",$msg);
		} 
	    else
		{
		  	$msg = JText::_('HOMEGALLERY_NOT_SAVED'); 
			$this->setRedirect("index.php?option=".JHOMEGALLERY_COM_COMPONENT."&task=homegallery.list",$msg);
		}
	
	}
function getImagefile_path($original_dir,$current_dir,&$files){
		 $dir=opendir($current_dir);
		 while($file=readdir($dir)){
		  if ($file!="." and $file!=".."){
		   $vidfile=$file; 
		   $thumbdir="_thumbs";
		   if ($vidfile!=$thumbdir){
			$fullfile=$current_dir."/".$vidfile;
			if (!is_dir($fullfile)){
			 
				 $files[] = JHTML::_('select.option', $original_dir . $vidfile, $original_dir . $vidfile);
			 
			}else{
			 
			 $this->getVideofile_path($vidfile.'/',$fullfile,$files);
			}
		   }
		  }
		 }
		 closedir($dir);
		}

}
