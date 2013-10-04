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


// no direct access
defined('_JEXEC') or die();

/**
 * HTML View class for the component
 *
 * @static
 */
class AdminCPanelViewCPanel extends VideoAbstractView 
{
	/**
	 * Control Panel display function
	 *
	 * @param template $tpl
	 */
	function cpanel($tpl = null)
	{
		jimport('joomla.html.pane');
		
		JHTML::stylesheet( 'videoadmin.css', 'administrator/components/'.VIDEO_COM_COMPONENT.'/assets/css/' );

		$document =& JFactory::getDocument();
		$document->setTitle(JText::_('Video') . ' :: ' .JText::_('Control Panel'));
		
		// Set toolbar items for the page
		//JToolBarHelper::preferences('com_fantasyleague', '580', '750');
		JToolBarHelper::title( JText::_('Video') .' :: '. JText::_( 'Control Panel ' ), 'video' );

		$this->_hideSubmenu();
		
		global $mainframe;
		if ($mainframe->isAdmin()){
			//JToolBarHelper::preferences(JNEWS_COM_COMPONENT, '580', '750');
		}
		//JToolBarHelper::help( 'screen.cpanel', true);

		JSubMenuHelper::addEntry(JText::_('Control Panel '), 'index.php?option='.VIDEO_COM_COMPONENT, true);
		JSubMenuHelper::addEntry(JText::_('Manage Video '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list', true);
		JSubMenuHelper::addEntry(JText::_('Manage Archive '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=video.list&archive=-1', true);
		JSubMenuHelper::addEntry(JText::_('Manage Video Configuartion '), 'index.php?option='.VIDEO_COM_COMPONENT.'&task=videoconfig.edit', true);
		
		$params = JComponentHelper::getParams(VIDEO_COM_COMPONENT);
		//$section = $params->getValue("section",0);
		
		JHTML::_('behavior.tooltip');
	}	

	
	function limitText($text, $wordcount)
	{
		if(!$wordcount) {
			return $text;
		}

		$texts = explode( ' ', $text );
		$count = count( $texts );

		if ( $count > $wordcount )
		{
			$text = '';
			for( $i=0; $i < $wordcount; $i++ ) {
				$text .= ' '. $texts[$i];
			}
			$text .= '...';
		}

		return $text;
	}
	
	
}