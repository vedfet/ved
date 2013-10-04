<?php
/**
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

jimport('joomla.application.component.model');
JLoader::import("video_details",JPATH_COMPONENT."/tables/");
JLoader::import("video_config",VIDEO_ADMINPATH."/tables/");
class adminvideoconfigModelVideoConfig extends JModel
{
    var $_id = null;
	var $_plans = null;
	var $_plan = null;
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
		$this->_plans = null;
		$this->_plan = null;
		$this->_data = null;

		
	}
	
    function getData()
	{
		if (empty($this->_data))
		{
			$query = $this->_buildQuery();
			$this->_data = $this->_getList($query, $this->getState('limitstart'), 200);
		}

		$videoren = array();
	    
	    foreach ($this->_data as $v ) 
	    {
	        $pt = $v->parent;
	        $list = @$videoren[$pt] ? $videoren[$pt] : array();
	        array_push($list, $v);
	        $videoren[$pt] = $list;
	    }
	    //$videoren = array_values($videoren);
	    $list = JHTML::_('menu.treerecurse',  0, '', array(), $videoren, max( 0, 9 ) );
	    //print_r($videoren);return;
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
		$query = "SELECT * from #__video_config ".$orderby;
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
		$row = new TableVideoConfig($db);
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
		$row = new TablevideoConfig($db);
		
		if (!$row->bind($post)) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		$row->id=$this->_cid;
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
		$cid = implode( ',', $this->_cid );
		$query = 'DELETE FROM #__video_config WHERE id IN ( '.$cid.' )';
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
		$query = 'UPDATE #__video_config SET published = '. $publish . ' WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);

	
		if ( !$this->_db->query() ) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	
	function _buildContentWhere()
	{
		global $mainframe, $option;
		$db					= &JFactory::getDBO();
		
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'a.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		
		$where = array();

		$where 		= ( count( $where ) ? ' WHERE '. implode( ' AND ', $where ) : '' );

		return $where;
	}
}

	
	


?>