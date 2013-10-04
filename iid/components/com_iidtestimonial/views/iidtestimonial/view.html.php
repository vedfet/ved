<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: view.html.php 2010-11-17 01:25:27 svn $
 * @author 
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport( 'joomla.application.component.view');

require_once("captcha_images.php"); 

/**
 * HTML View class for the iidtestimonial component
 */
class Iidtestimonial_listViewIidtestimonial extends JView {
	function display($tpl = null) {
       
global $mainframe;		
		$params = &$mainframe->getParams();
		
		$menus = &JSite::getMenu();
  $menu = $menus->getActive();
  
  if (is_object( $menu )) 
  {
  
    $menu_params = new JParameter( $menu->params );
    
    if (!$menu_params->get( 'page_title')) {
     $params->set('page_title', JText::_( 'Share Your Story'));
    }
   } else {
    $params->set('page_title', JText::_( 'Share Your Story'));
   }


$this->assignRef('params',  $params);

$document =& JFactory::getDocument();
$document->setTitle("Don't Test the Waters Iowa Flood Awareness - Share Your Story");


		$db =& JFactory::getDBO();
		$sql = "SELECT * FROM #__iidtestimonial_config";
		$db->setQuery($sql);
		$result=$db->loadObjectList();
		
		$this->assignRef('result',$result);
		
		$captcha = new captcha_image;
	    $captcha_hash = $captcha->generate_hash();
		$this->assignRef('captcha_hash',$captcha_hash);
		
		parent::display($tpl);
    }
}
?>