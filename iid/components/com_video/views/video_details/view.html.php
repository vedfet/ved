<?php
/**
 * Joomla! 1.5 component Video
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Video
 * @license GNU/GPL
 *
 * Display and manage Video and related items 
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
 
class VideoViewvideo_details extends JView
{
    function display($tpl = null)
    {
        $id	= (int)JRequest::getVar('id', 0, '', 'int');
		//$res	= (int)JRequest::getVar('res', 0, '', 'int');
		//$tab	= JRequest::getVar('tab', 0, '', 'str');
		//$referer	= JRequest::getVar('tab', 0, '', 'referer');
		$db =& JFactory::getDBO();
	    
		$query="SELECT * FROM #__video_details"."\n WHERE published =1 AND id ='".$id."'";
		$db->setQuery($query);
		$videodetails = $db->loadObjectList();
	     $total=(int)count($videodetails);
        $this->assignRef( 'videodetails', $videodetails);
		//$this->assignRef( 'res', $res );
		//$this->assignRef( 'tab', $tab );
		//$this->assignRef( 'imagecounter', $total2 );

 
        parent::display($tpl);
    }
}

