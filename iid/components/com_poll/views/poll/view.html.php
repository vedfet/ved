<?php
/**
* @version		$Id: view.html.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @subpackage	Poll
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');

/**
 * HTML View class for the Poll component
 *
 * @static
 * @package		Joomla
 * @subpackage	Poll
 * @since 1.0
 */
class PollViewPoll extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		$db 	  =& JFactory::getDBO();
		$document =& JFactory::getDocument();
		$pathway  =& $mainframe->getPathway();

		$poll_id = JRequest::getVar( 'id', 0, '', 'int' );

		$poll =& JTable::getInstance('poll', 'Table');
		$poll->load( $poll_id );

		// if id value is passed and poll not published then exit
		if ($poll->id > 0 && $poll->published != 1) {
			JError::raiseError( 403, JText::_('Access Forbidden') );
			return;
		}

		// Adds parameter handling
		$params = $mainframe->getParams();

		//Set page title information
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();

		// because the application sets a default page title, we need to get it
		// right from the menu item itself
		if (is_object( $menu )) {
			$menu_params = new JParameter( $menu->params );
			if (!$menu_params->get( 'page_title')) {
				$params->set('page_title',	'Take A Quiz');
			}
		} else {
			$params->set('page_title',	'Take A Quiz');
		}
		$document->setTitle( $params->get( 'page_title' ) );

		//Set pathway information
		$pathway->addItem($poll->title, '');
        $menutitle=$params->get( 'page_title' );
		$params->def( 'show_page_title', 1 );
		$params->def( 'page_title', $menutitle );

		

		
		$poll_details=$this->getPoll($poll_id);
		$poll_opts=$this->getPollOptions($poll_details->id);
		
		$this->assign('poll_details',	$poll_details);
		$this->assign('poll_opts',	$poll_opts);
		
		
		
		$this->assignRef('params',	$params);
		
                
		$query_mng='select poll_manager from #__polls WHERE id = '.(int) $poll_details->id;
		$db->setQuery( $query_mng );
		$pmanager = $db->loadObjectList();

        $this->assignRef('pmanager',$pmanager);

		parent::display($tpl);
	}
	function getPoll($id)
	{
		$db		=& JFactory::getDBO();
		$result	= null;
		
		if($id==0)
		{
			$query = 'SELECT id'
				.' FROM #__polls'
				.' WHERE published = 1'
				;
			$db->setQuery($query);
			$db->getQuery($query);
			$rows = $db->loadObjectList();
			for($i=0;$i<count($rows);$i++){			
				 $result[]=$rows[$i]->id;
				  
			}
			
			//print_r($id);
			$id = array_rand($result, 1);		 			
			if($id==0){
				$id=1;
			}
	    }
		$query = 'SELECT id, title,'
			.' CASE WHEN CHAR_LENGTH(alias) THEN CONCAT_WS(\':\', id, alias) ELSE id END as slug '
			.' FROM #__polls'
			.' WHERE id = '.(int) $id
			.' AND published = 1'
			;
		$db->setQuery($query);
		$db->getQuery($query);
		$result = $db->loadObject();

		if ($db->getErrorNum()) {
			JError::raiseWarning( 500, $db->stderr() );
		}

		return $result;
	}
	function getPollOptions($id)
	{
		$db	=& JFactory::getDBO();

		$query = 'SELECT id, text' .
			' FROM #__poll_data' .
			' WHERE pollid = ' . (int) $id .
			' AND text <> ""' .
			' ORDER BY id';
		$db->setQuery($query);

		if (!($options = $db->loadObjectList())) {
			echo "MD ".$db->stderr();
			return;
		}

		return $options;
	}
}
?>
