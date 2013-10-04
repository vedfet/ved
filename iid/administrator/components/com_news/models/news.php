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

jimport('joomla.application.component.model');
JLoader::import("news",JPATH_COMPONENT."/tables/");

class AdminnewsModelnews extends JModel
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
		$query = "SELECT * from #__news ".$orderby;
		
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
		$row = new Tablenews($db);
		$dateparts=explode('/',$post['created_date']);
   		$post['created_date']=$dateparts[2].'-'.$dateparts[0].'-'.$dateparts[1];
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
		
		if($_FILES['uploadedfile']['size'] > 0)
		{
		
		$imgSize = getimagesize( $_FILES['uploadedfile']['tmp_name'] );
		$file_width=$imgSize[0];
		$file_height=$imgSize[1];
		
		$fp=fopen($_FILES['uploadedfile']['tmp_name'], 'r');
		$content=fread($fp, filesize($_FILES['uploadedfile']['tmp_name']));
		$content=addslashes($content);
		fclose($fp);
		
		$query = "UPDATE #__news SET"
		. "\n file_name = '".$_FILES['uploadedfile']['name']."',"
		. "\n file_size = '".$_FILES['uploadedfile']['size']."',"
		. "\n file_type = '".$_FILES['uploadedfile']['type']."',"
		. "\n file_width = '".$file_width."',"
		. "\n file_height = '".$file_height."',"
		. "\n logo_image = '".$content."'"
		. "\n WHERE id = ".$row->id
		;
		$db->setQuery( $query );
		if (!$db->query())
		{
			echo "<script> alert('".$database->getErrorMsg()."'); window.history.go(-1); </script>\n";
		}
	
	
		}
		
        $row->checkin();
		$row->reorder();

		return true;	
	}
	
   function save_edit($post)
	{	
                $db =& JFactory::getDBO();
		$row = new Tablenews($db);
		
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
		$query = 'DELETE FROM #__news WHERE id IN ( '.$cids.' )';
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
		$query = 'UPDATE #__news SET published = '. $publish . ' WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);
		if ( !$this->_db->query() ) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}

		return true;
	}
	
	/*function feature($feature)
	{
		$cids = implode( ',', $this->_cid );
		$query = 'UPDATE #__news SET featured = '. $feature . ' WHERE id IN ( '.$cids.' )';
		$this->_db->setQuery($query);
		if ( !$this->_db->query() ) 
		{
			JError::raise(2, 500, $this->_db->getErrorMsg());
			return false;
		}

		return true;
	}*/
	
	function move($direction)
	{	
		$db =& JFactory::getDBO();
		$row = new Tablenews($db);
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
		$row = new Tablenews($db);
		
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