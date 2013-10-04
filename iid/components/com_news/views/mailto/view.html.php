<?php
/**
 * Joomla! 1.5 component news
 *
 * @version $Id: router.php 2010-06-03 02:04:32 svn $
 * @author Diwakar
 * @package Joomla
 * @subpackage news
 * @license GNU/GPL
 *
 * Every Days News
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
 
    class NewsViewmailto extends JView
	{
    function mailto($tpl = null)
    {
		$dispatcher	=& JDispatcher::getInstance();
		global $mainframe,$option;
		
		jimport('joomla.html.pane');
		
		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('News ') . ' :: ' .JText::_('Send email'));
		echo $template=JApplication::getTemplate();
		
		JHTML::stylesheet( 'template.css', 'templates/'.$template.'/css/' );
		
		$params = &$mainframe->getParams();
		$this->assignRef('params',		$params);
		$this->assignRef('template',		$template);
		        parent::display($tpl);
    }

		
}

