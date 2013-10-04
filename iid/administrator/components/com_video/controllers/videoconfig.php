<?php
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: video.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage video
 * @license GNU/GPL
 *
 * It creates component for video
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


JLoader::import("videoconfig",VIDEO_ADMINPATH."/tables/");

class AdminVideoconfigController extends JController {
	var $component = null;
	var $videoconfigTable = null;
	var $videoconfigClassname = null;

	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask( 'edit', 'edit' );
		$this->registerDefaultTask("edit");
		$this->component = 	VIDEO_COM_COMPONENT;
		$this->videoTable = "#__video_config";
		$this->videoClassname = "TableVideoConfig";
		
	}

	function edit()
			{
						$id = JRequest::getVar('id',1);
						// TODO fix this when database is updated
						$db =& JFactory::getDBO();		
						$lists=array();			
						$videoconfiglist = new $this->videoClassname($db);
						$videoconfiglist->load($id);
						
						
						$no_of_default_videos = $this->getno_of_default_videos();
						$lists['no_of_default_videos'] = JHTML::_('select.genericlist',  $no_of_default_videos, 'no_of_default_videos', 'size ="1"' , 'value', 'text',$videoconfiglist->no_of_default_videos);	
						$order_by = $this->getorder_by();
						$lists1['order_by'] = JHTML::_('select.genericlist',  $order_by, 'order_by', 'size ="1"' , 'value', 'text',$videoconfiglist->order_by);		
						// get news for parent info
						// authorised user to select admin
						$params = JComponentHelper::getParams("com_video");
						$this->view = & $this->getView("videoconfig","html");
						
						// Set the layout
						$this->view->setLayout('edit');
						$this->view->assign('title', JText::_("Video Configuration Details"));
						$this->view->assign('videoconfiglist', $videoconfiglist);
						$this->view->assign('lists',$lists);
						$this->view->assign('lists1',$lists1);
						$this->view->assign('conf',$conf);		
						$this->view->display();
			}
	function getno_of_default_videos()
	   {
		$no_of_default_videos = array();
		$no_of_default_videos[] = JHTML::_('select.option', '', JText::_('Select'));
		$no_of_default_videos[] = JHTML::_('select.option', '1', JText::_('1'));
		$no_of_default_videos[] = JHTML::_('select.option', '2', JText::_('2'));
		$no_of_default_videos[] = JHTML::_('select.option', '3', JText::_('3'));
		return $no_of_default_videos;
		}	
	function getorder_by()
	   {
		$order_by = array();
		$order_by[] = JHTML::_('select.option', '', JText::_('Select'));
		$order_by[] = JHTML::_('select.option', '1', JText::_('By First Name'));
		$order_by[] = JHTML::_('select.option', '2', JText::_('By Order'));
		$order_by[] = JHTML::_('select.option', '3', JText::_('By Date'));
		return $order_by;
		}	
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
		$model = $this->getModel('videoconfig');
		if($model->save($post)) 
		{
			$msg = JText::_('Record Successfully Saved');
			$this->setRedirect("index.php?option=".VIDEO_COM_COMPONENT."&task=video.list",$msg);
		}
	    else
		{
		  	$msg = JText::_('Not able to Saved'); 
			$this->setRedirect("index.php?option=".VIDEO_COM_COMPONENT."&task=videoconfig.edit",$msg);
			
		}
	
	}


	function delete(){
	    $post = JRequest::get('post');
		$model = $this->getModel('videoconfig');
		if($model->delete($post)) 
		{
			$msg = JText::_('Record Successfully Deleted');
			$this->setRedirect("index.php?option=".VIDEO_COM_COMPONENT."&task=video.list",$msg);
		}
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			$this->setRedirect("index.php?option=".VIDEO_COM_COMPONENT."&task=videoconfig.edit",$msg);
			
		}
	}
	

}
