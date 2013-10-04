<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JLoader::import("property_images",JPATH_COMPONENT."/tables/");

class propertyModelupload extends JModel
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
	
	function save($savearray)
	{	
		$db =& JFactory::getDBO();
		$row = new TableProperty_images($db);
		//print_r($row); exit;
		for($i=0;$i<count($savearray);$i++)
		{
			if($savearray[$i])
			$arrdetails=explode('~',$savearray[$i]);
			
			$row->id=0;
			$row->property_id=$arrdetails[2];
			$row->caption=$arrdetails[1];
			$row->image_path=$arrdetails[0];
			
			if (!$row->store()) 
			{
				JError::raise(2, 500, $row->getError());
				return false;
			}
		}
		
		return true;	
	}
	function update_photos($post) {
	 	$db =& JFactory::getDBO();
		$row = new TableProperty_images($db);
		
		$ids=$post['id'];
		$captions=$post['caption'];
		$property_id=$post['property_id'];
		
		
		for($i=0;$i<count($ids);$i++)
		{
			$row->id=(int)$ids[$i];
			$row->property_id=$arrdetails[2];
			$row->caption=$captions[$i];
			if (!$row->store()) 
			{
				JError::raise(2, 500, $row->getError());
				return false;
			}
		}
		
		return true;	
	}
	
	
}	


?>