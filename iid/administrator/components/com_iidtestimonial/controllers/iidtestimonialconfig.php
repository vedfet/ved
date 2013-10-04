<?php
/**
 * Joomla! 1.5 component monappointment
 *
 * @version $Id: monappointment.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage monappointment
 * @license GNU/GPL
 *
 * It creates component for monappointment
 *
 */

defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


JLoader::import("iidtestimonialconfig",IIDTESTIMONIAL_ADMINPATH."/tables/");

class AdminIidtestimonialconfigController extends JController {
	var $component = null;
	var $iidtestimonialconfigTable = null;
	var $iidtestimonialconfigClassname = null;

	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask( 'edit', 'edit' );
		$this->registerDefaultTask("edit");
		$this->component = 	IIDTESTIMONIAL_COM_COMPONENT;
		$this->iidtestimonialTable = "#__iidtestimonial_config";
		$this->iidtestimonialClassname = "TableIidtestimonialConfig";
		
	}

	function edit()
			{
						$id = JRequest::getVar('id',1);
						// TODO fix this when database is updated
						$db =& JFactory::getDBO();		
						$lists=array();			
						$iidtestimonialconfiglist = new $this->iidtestimonialClassname($db);
						$iidtestimonialconfiglist->load($id);
						
						
						$no_of_default_iidtestimonials = $this->getno_of_default_iidtestimonials();
						$lists['no_of_default_iidtestimonials'] = JHTML::_('select.genericlist',  $no_of_default_iidtestimonials, 'no_of_default_iidtestimonials', 'size ="1"' , 'value', 'text',$iidtestimonialconfiglist->no_of_default_iidtestimonials);	
						$order_by = $this->getorder_by();
						$lists1['order_by'] = JHTML::_('select.genericlist',  $order_by, 'order_by', 'size ="1"' , 'value', 'text',$iidtestimonialconfiglist->order_by);		
						// get news for parent info
						// authorised user to select admin
						$params = JComponentHelper::getParams("com_iidtestimonial");
						$this->view = & $this->getView("iidtestimonialconfig","html");
						
						// Set the layout
						$this->view->setLayout('edit');
						$this->view->assign('title', JText::_("Iidtestimonial Configuration Details"));
						$this->view->assign('iidtestimonialconfiglist', $iidtestimonialconfiglist);
						$this->view->assign('lists',$lists);
						$this->view->assign('lists1',$lists1);
						$this->view->assign('conf',$conf);		
						$this->view->display();
			}
	function getno_of_default_iidtestimonials()
	   {
		$no_of_default_iidtestimonials = array();
		$no_of_default_iidtestimonials[] = JHTML::_('select.option', '', JText::_('Select'));
		$no_of_default_iidtestimonials[] = JHTML::_('select.option', '1', JText::_('1'));
		$no_of_default_iidtestimonials[] = JHTML::_('select.option', '2', JText::_('2'));
		$no_of_default_iidtestimonials[] = JHTML::_('select.option', '3', JText::_('3'));
		return $no_of_default_iidtestimonials;
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
		 
		
		 $post['header_text'] =JRequest::getVar( 'header_text', '', 'post', 'string', JREQUEST_ALLOWHTML );
		 $post['footer_text'] =JRequest::getVar( 'footer_text', '', 'post', 'string', JREQUEST_ALLOWHTML );

		
		
		$model = $this->getModel('iidtestimonialconfig');
		if($model->save($post)) 
		{
			$msg = JText::_('Record Successfully Saved');
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
		}
	    else
		{
		  	$msg = JText::_('Not able to Saved'); 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonialconfig.edit",$msg);
			
		}
	
	}


	function delete(){
	    $post = JRequest::get('post');
		$model = $this->getModel('iidtestimonialconfig');
		if($model->delete($post)) 
		{
			$msg = JText::_('Record Successfully Deleted');
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonial.list",$msg);
		}
	    else
		{
		  	$msg = JText::_('Not able to Delete'); 
			$this->setRedirect("index.php?option=".IIDTESTIMONIAL_COM_COMPONENT."&task=iidtestimonialconfig.edit",$msg);
			
		}
	}
	

}