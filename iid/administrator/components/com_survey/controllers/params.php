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


defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.controller');


class AdminParamsController extends JController 
{
	/**
	 * Custom Constructor
	 */
	function __construct( $default = array())
	{
		$default['default_task'] = 'edit';
		parent::__construct( $default );

		$this->registerTask( 'apply', 'save' );
	}

	/**
	 * Show the configuration edit form
	 * @param string The URL option
	 */
	function edit()
	{
		//JRequest::setVar('tmpl', 'component'); //force the component template
		$component = JFL_COM_COMPONENT;

		$model = $this->getModel('params' );
		$table =& JTable::getInstance('component');

		if (!$table->loadByOption( $component ))
		{
			JError::raiseWarning( 500, 'Not a valid component' );
			return false;
		}

		// get the view
		$this->view = & $this->getView("params","html");

		// Set the layout
		$this->view->setLayout('edit');
		
		$this->view->assignRef('component', $table);
		$this->view->setModel( $model, true );
		$this->view->display();
	}

	/**
	 * Save the configuration
	 */
	function save()
	{
		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		$component = JFL_COM_COMPONENT;

		$table =& JTable::getInstance('component');
		if (!$table->loadByOption( $component ))
		{
			JError::raiseWarning( 500, 'Not a valid component' );
			return false;
		}

		$post = JRequest::get( 'post' );
		$post['option'] = $component;
		$table->bind( $post );

		// pre-save checks
		if (!$table->check()) {
			JError::raiseWarning( 500, $table->getError() );
			return false;
		}

		// save the changes
		if (!$table->store()) {
			JError::raiseWarning( 500, $table->getError() );
			return false;
		}

		$this->setRedirect( 'index.php?option='.JFL_COM_COMPONENT."&task=cpanel.cpanel", JText::_("Config saved") );
		//$this->setMessage(JText::_("Config saved"));
		//$this->edit();
	}

	/**
	 * Cancel operation
	 */
	function cancel()
	{
		$this->setRedirect( 'index.php' );
	}
}