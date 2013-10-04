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
