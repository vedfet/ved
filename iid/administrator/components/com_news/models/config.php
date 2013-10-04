<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JLoader::import("property_config",JPATH_COMPONENT."/tables/");

class AdminConfigModelConfig extends JModel
{
    var $_id = null;
	var $_configs = null;
	var $_config = null;
	var $_data = null;
	var $_total = null;
	var $_pagination = null;

	

	function __construct()
	{
		parent::__construct();

		global $mainframe, $option; 
		
		$limit      = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int' );
  		$limitstart = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0, 'int' );
		
		$this->setState('limit', $limit);
		$this->setState('limitstart', $limitstart);
		
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
		$this->_configs = null;
		$this->_config = null;
		$this->_data = null;

		
	}
	
    function getData()
	{
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), 200);
		}

		$children = array();
	    
	    foreach ($this->_data as $v ) 
	    {
	        $pt = $v->parent;
	        $list = @$children[$pt] ? $children[$pt] : array();
	        array_push($list, $v);
	        $children[$pt] = $list;
	    }
	    //$children = array_values($children);
	    $list = JHTML::_('menu.treerecurse',  0, '', array(), $children, max( 0, 9 ) );
	    //print_r($children);return;
	    $orderedList = array_values($list);
	    
	    return $orderedList;
	}
	
	function getTotal()
	{	
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}
		return $this->_total;
	}
	
	function getPagination()
	{
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}
		return $this->_pagination;
	}
	
	function _buildQuery()
	{
		$orderby	= $this->_buildContentOrderBy();
		$query = "SELECT * from #__property_config ".$orderby;
		
		return $query;
	}
	
	function _buildContentOrderBy()
	{
		global $mainframe, $option;
		
		$filter_order     = $mainframe->getUserStateFromRequest( $option.'filter_order',     'filter_order', 'ordering', 'cmd' );
  		$filter_order_Dir = $mainframe->getUserStateFromRequest( $option.'filter_order_Dir', 'filter_order_Dir', '', 'word' );

		$orderby 	= ' ORDER BY ordering'; //.$filter_order.' '.$filter_order_Dir . ' ';			
		
		return $orderby;
	}
	
	function save($post)
	{	
		$db =& JFactory::getDBO();
		$row = new TableProperty_config($db);
		
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
		
                $row->checkin();
		$row->reorder();

		return true;	
	}
	
        function save_edit($post)
	{	
                $db =& JFactory::getDBO();
		$row = new TableProperty_config($db);
		
		if (!$row->bind($post)) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		$row->id=$this->_id;
 		if (!$row->store()) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		
                $row->checkin();
		$row->reorder();

		return true;	
	}
	
	function delete($post)
	{
		$cids = implode( ',', $this->_cid );
		$query = 'DELETE FROM #__property_config WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);
		if(!$this->_db->query()) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}
		return true;

	}
	
		
	function publish($publish)
	{
		$cids = implode( ',', $this->_cid );
		$query = 'UPDATE #__property_config SET published = '. $publish . ' WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);
		if ( !$this->_db->query() ) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	function move($direction)
	{	
		$db =& JFactory::getDBO();
		$row = new TableProperty_config($db);
		if (!$row->load($this->_id)) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}
		
		$row->move($direction);
		
		if (!$row->reorder()) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}
		return true;
	}
        function saveorder()
	{		
		$db =& JFactory::getDBO();
		$row = new TableProperty_config($db);
		
		$groupings = array();
		
		for($i=0; $i < count($this->_cid); $i++)
		{
			$row->load( (int)$this->_cid[$i] );
			
			if($row->ordering != $this->_order[$i])
			{
				$row->ordering = $this->_order[$i];
				
				if (!$row->store()) 
				{
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
			}
		}
		return true;
	}
	
	
}	


?>