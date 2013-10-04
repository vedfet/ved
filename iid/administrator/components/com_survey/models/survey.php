<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Kailash Pathak
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *
 */


// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');
JLoader::import("survey",JPATH_COMPONENT."/tables/");

class adminsurveyModelSurvey extends JModel
{
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

		$surveyren = array();
	    
	    foreach ($this->_data as $v ) 
	    {
	        $pt = $v->parent;
	        $list = @$surveyren[$pt] ? $surveyren[$pt] : array();
	        array_push($list, $v);
	        $surveyren[$pt] = $list;
	    }
	    //$surveyren = array_values($surveyren);
	    $list = JHTML::_('menu.treerecurse',  0, '', array(), $surveyren, max( 0, 9 ) );
	    //print_r($surveyren);return;
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
		$query = "SELECT * from #__survey ".$orderby;
		
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
		$row = new TableSurvey($db);

		$cid = JRequest::getVar('id',	0 );
		$uri =& JURI::getInstance();
        
		
		$params = &JComponentHelper::getParams( 'com_media' );               
		$file_path=$params->get('file_path');
		$image_path=$params->get('image_path');
		
		$dir=trim(JPATH_BASE,"administrator");
		$survey_path=$dir.$file_path.'/survey';
		
		$tempdate=explode("/",$post['birth_date']);
		if($cid==0)
		{
			$post['created']=date("d-m-y");  
		}

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
	      if($_FILES['survey_name']['size'] > 0)
		  {
			  $survey_name=time()."_".str_replace(" ","_",$_FILES['survey_name']['name']);
			  $destination=$survey_path."/".$survey_name;
			  copy($_FILES['survey_name']['tmp_name'],$destination);
		
			  $query = "UPDATE #__survey SET"
			  . "\n survey_name = '".$survey_name."'"
			  . "\n WHERE id = ".$row->id
			  ;
			  $db->setQuery( $query );
			
			  if (!$db->query())
			  {
			   echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			  }
			  
		  }
		 
	     if($_FILES['image_name']['size'] > 0)
		  {
			  $image_name=time()."_".str_replace(" ","_",$_FILES['image_name']['name']);
			  $destination=$survey_path."/images/".$image_name;
			  copy($_FILES['image_name']['tmp_name'],$destination);
			  
			  $query = "UPDATE #__survey SET"
			  . "\n image_name = '".$image_name."'"
			  . "\n WHERE id = ".$row->id
			  ;
			  $db->setQuery( $query );
			  if (!$db->query())
			  {
			   echo "<script> alert('".$db->getErrorMsg()."'); window.history.go(-1); </script>\n";
			  }
		  }
		
		$row->checkin();
		$row->reorder();
        
		return true;	
	}
	
   function save_edit($post)
	{	
	   
        $db =& JFactory::getDBO();
		$row = new TableSurvey($db);
		
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
		$query = 'DELETE FROM #__survey WHERE id IN ( '.$cid.' )';
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
		$query = 'UPDATE #__survey SET published = '. $publish . ' WHERE id IN ( '.$cids.' )';
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
		$query = 'UPDATE #__survey SET archive = '. $archive . ' WHERE id IN ( '.$cids.' )';
		
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
		$row = new TableSurvey($db);
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
		
		$row = new TableSurvey($db);
		
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