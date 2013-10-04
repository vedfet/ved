<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JLoader::import("property_details",JPATH_COMPONENT."/tables/");

class propertyModelsave extends JModel
{
	

	function __construct()
	{
		parent::__construct();

		global $mainframe;
		
		$gid = JRequest::getInt('gid',0);
		$cid = JRequest::getVar('cid',  array(0), '', 'array');
		$order 	= JRequest::getVar('order', array(0), 'post', 'array');
		$this->setValues($cid, $cid[0], $order, $gid);
	}
	
	function setValues($cid, $id, $order, $gid)
	{
		$this->_cid = $cid;
		JArrayHelper::toInteger($this->_cid);
		
		$this->_id = (int)$id;
		
		$this->_order = $order;
		JArrayHelper::toInteger($this->_order);
		
		$this->_gid = (int)$gid;
		
		
	}
	
	function save($post)
	{	
		$db =& JFactory::getDBO();
		$row = new TableProperty_details($db);
		//print_r($row); exit;
		if (!$row->bind($post)) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		
 		if (!$row->store()) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		
		return true;	
	}
	
	
	
	
}	


?>