<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JLoader::import("property_details",JPATH_COMPONENT."/tables/");

class propertyModelsavesearchcats extends JModel
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
		if($post['country'])
		{
			$db->setQuery( "Select count(*) as total from #__property_search_categorization WHERE category_type='country' AND category_name='".$post['country']."'");
			$total=(int)$db->loadResult();
			if($total==0)
			{
				$db->setQuery( "Insert into #__property_search_categorization set category_type='country', category_name='".$post['country']."'");
				$db->query();
			}
			
			$count=(int)$this->getCount(" country='".$post['country']."' ");
						
			$db->setQuery( "Update #__property_search_categorization set valcount='".$count."' WHERE category_type='country' AND category_name='".$post['country']."'");
			echo $db->getQuery( "Update #__property_search_categorization set valcount='".$count."' WHERE category_type='country' AND category_name='".$post['country']."'");
			$db->query();
	
		}
		
		if($post['city'] && $post['country'])
		{
			$db->setQuery( "Select count(*) as total from #__property_search_categorization WHERE category_type='city' AND category_name='".$post['city']."' AND country='".$post['country']."'");
			$total=(int)$db->loadResult();
			if($total==0)
			{
				$db->setQuery( "Insert into #__property_search_categorization set category_type='city', category_name='".$post['city']."',country='".$post['country']."'");
				$db->query();
			}
			
			$count=(int)$this->getCount(" city='".$post['city']."' AND country='".$post['country']."' ");
						
			$db->setQuery( "Update #__property_search_categorization set valcount='".$count."' WHERE category_type='city' AND category_name='".$post['city']."' AND country='".$post['country']."'");
			
			$db->query();
	
		}

		
		if($post['total_price'])
		{
			$catrangerow=$this->getRangeCategory(" category_type='price' AND upper_limit>='".$post['total_price']."' AND lower_limit<='".$post['total_price']."' ");
			if($catrangerow)
			{
				$count=(int)$this->getCount(" total_price<='".$catrangerow[0]->upper_limit."' AND total_price>='".$catrangerow[0]->lower_limit."' ");
							
				$db->setQuery( "Update #__property_search_categorization set valcount='".$count."' WHERE category_type='price' AND upper_limit>='".$post['total_price']."' AND lower_limit<='".$post['total_price']."'");
				$db->query();
	        }
		}
		
		if($post['acerage'])
		{
			$catrangerow=$this->getRangeCategory(" category_type='acerage' AND upper_limit>='".$post['acerage']."' AND lower_limit<='".$post['acerage']."' ");
			if($catrangerow)
			{
				$count=(int)$this->getCount(" acerage<='".$catrangerow[0]->upper_limit."' AND acerage>='".$catrangerow[0]->lower_limit."' ");
							
				$db->setQuery( "Update #__property_search_categorization set valcount='".$count."' WHERE category_type='acerage' AND upper_limit>='".$post['acerage']."' AND lower_limit<='".$post['acerage']."'");
				$db->query();
	        }
		}
		
	    
	}
	function getCount($where)
	{
		$db =& JFactory::getDBO();

		$total=0;
		if($where)
		{
			$db->setQuery( "Select count(*) as total from #__property_details  WHERE ".$where." ");
			echo $db->getQuery( "Select count(*) as total from #__property_details  WHERE ".$where." ");
			$total=(int)$db->loadResult();
		}
		return $total;
						
	}
	
	function getRangeCategory($where)
	{
		$db =& JFactory::getDBO();
        $rows='';
		if($where)
		{
			$db->setQuery( "Select * from #__property_search_categorization WHERE ".$where." ");
			$rows=$db->loadObjectList();
		}
		return $rows;
						
	}
	
	
	
}	


?>