<?php
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

defined( 'JPATH_BASE' ) or die( 'Direct Access to this location is not allowed.' );

jimport('joomla.application.component.controller');

class AdminCpanelController extends JController {
	/**
	 * Controler for the Control Panel
	 * @param array		configuration
	 */
	function __construct($config = array())
	{
		parent::__construct($config);
		$this->registerTask( 'show',  'cpanel' );
		$this->registerDefaultTask("cpanel");
	}

	function cpanel( )
	{
		// check DB
		// check the latest column addition or change
		// do this in a way that supports mysql 4 
		$db =& JFactory::getDBO();
		
		
		// get the view
		$this->view = & $this->getView("cpanel","html");

		// get all the raw native calendars
		// Set the layout
		$this->view->setLayout('cpanel');
		$this->view->assign('title'   , JText::_("Control Panel"));

		$this->view->display();
	}


}
