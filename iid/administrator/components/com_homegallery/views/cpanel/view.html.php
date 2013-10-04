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
defined('_JEXEC') or die();

/**
 * HTML View class for the component
 *
 * @static
 */
class AdminCPanelViewCPanel extends JHomegalleryAbstractView 
{
	/**
	 * Control Panel display function
	 *
	 * @param template $tpl
	 */
	function cpanel($tpl = null)
	{
		
		jimport('joomla.html.pane');
		
		JHTML::stylesheet( 'homegalleryadmin.css', 'administrator/components/'.JHOMEGALLERY_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Homegallery') . ' :: ' .JText::_('CONTROL_PANEL'));
		
		// Set toolbar items for the page
		//JToolBarHelper::preferences('com_fantasyleague', '580', '750');s
		JToolBarHelper::title( JText::_('Homegallery') .' :: '. JText::_( 'CONTROL_PANEL' ), 'homegallery' );

		$this->_hideSubmenu();
		
		global $mainframe;
		if ($mainframe->isAdmin()){
			//JToolBarHelper::preferences(JNEWS_COM_COMPONENT, '580', '750');
		}
		//JToolBarHelper::help( 'screen.cpanel', true);

		JSubMenuHelper::addEntry(JText::_('CONTROL_PANEL'), 'index.php?option='.JHOMEGALLERY_COM_COMPONENT, true);
		
		$params = JComponentHelper::getParams(JHOMEGALLERY_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	

	
	function limitText($text, $wordcount)
	{
		if(!$wordcount) 
		{
			return $text;
		}

		$texts = explode( ' ', $text );
		$count = count( $texts );

		if ( $count > $wordcount )
		{
			$text = '';
			for( $i=0; $i < $wordcount; $i++ ) 
			{
				$text .= ' '. $texts[$i];
			}
			$text .= '...';
		}

		return $text;
	}
	
	
}