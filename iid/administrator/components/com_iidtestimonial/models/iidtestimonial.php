<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-11-28 23:39:36 svn $
 * @author Gajendra Kumar Jain
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * This component is used for iidtestimonial given by someone.
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Import Joomla! libraries
jimport('joomla.application.component.model');
JLoader::import("iidtestimonial",JPATH_COMPONENT."/tables/");
class adminiidtestimonialModelIidtestimonial extends JModel {
    var $_id = null;
	var $_cid = null;
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
		$cid = JRequest::getVar('cid',  $cid, '', 'array');

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
		$query = "SELECT * from #__iidtestimonial ".$orderby;
		
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
		$row = new TableIidtestimonial($db);

		$cid = JRequest::getVar('id',	0 );
		$uri =& JURI::getInstance();
        
		
		if (!$row->bind($post)) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		
		if($archive==-1)
		{
				  $row->archive=0;
		}
		else
		{
		          $row->archive=0;  
        }
			
 		if (!$row->store()) 
		{
			JError::raise(2, 500, $row->getError());
			return false;
		}
		
		//print_r($_FILES);
		//exit;
	      	
		$row->checkin();
		$row->reorder();
        
		return true;	
	}
	
   function save_edit($post)
	{	
	   
        $db =& JFactory::getDBO();
		$row = new TableIidtestimonial($db);
		
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
		$query = 'DELETE FROM #__iidtestimonial WHERE id IN ( '.$cid.' )';
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
		$query = 'UPDATE #__iidtestimonial SET published = '. $publish . ' WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);

	
		if ( !$this->_db->query() ) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	function archive($archive)
	{
		$cids = implode( ',', $this->_cid );
		$query = 'UPDATE #__iidtestimonial SET archive = '. $archive . ' WHERE id IN ( '.$cids.' )';
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
		$row = new TableIidtestimonial($db);
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
		
		$row = new TableIidtestimonial($db);
		
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