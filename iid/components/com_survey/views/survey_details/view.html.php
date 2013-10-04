<?php
/**
 * Joomla! 1.5 component Survey
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Survey
 * @license GNU/GPL
 *
 * Display and manage Survey and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view');
require_once(JPATH_COMPONENT."/captcha/captcha_images.php"); 
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @package    HelloWorld
 */
  $id = JRequest::getVar('id');

class SurveyViewsurvey_details extends JView
{
    function display($tpl = null)
    {
global $mainframe;
					$params = &$mainframe->getParams();
					
					$menus	= &JSite::getMenu();
					$menu	= $menus->getActive();
					if (is_object( $menu )) 
					{
							$menu_params = new JParameter( $menu->params );
//print_r($menu_params);
//echo 	$menu_params->get( 'page_title'); exit;
							if (!$menu_params->get( 'page_title')) {
								$params->set('page_title',	JText::_( 'Flood Awareness Survey'));
							}
						} else {
							$params->set('page_title',	JText::_( 'Flood Awareness Survey'));
						}
					
					$this->assignRef('params',$params);  
$document = &JFactory::getDocument();	
$document->setTitle("Don't Test the Waters Iowa Flood Awareness - Survey");     

$id	= (int)JRequest::getVar('id', 0, '', 'int');
		//$res	= (int)JRequest::getVar('res', 0, '', 'int');
		//$tab	= JRequest::getVar('tab', 0, '', 'str');
		//$referer	= JRequest::getVar('tab', 0, '', 'referer');
		$db =& JFactory::getDBO();
	    
		$query="SELECT * FROM #__survey_details"."\n WHERE published =1 AND id ='".$id."'";
		$db->setQuery($query);
		$surveydetails = $db->loadObjectList();
	     $total=(int)count($surveydetails);
        $this->assignRef( 'surveydetails', $surveydetails);

		/////////// get question kailash////////////////////////

		$db =& JFactory::getDBO();
		$Qsql = "SELECT  * FROM #__survey_questions  where survey_id=".$id." and published='1'" ;
		$db->setQuery($Qsql);
		$question=$db->loadObjectList();

		
		 $querymsg=" SELECT thankmessage  FROM #__survey_configuration";
		
		$db->setQuery($querymsg);
		$emailmsg=$db->loadObjectList();
		
		$query1 = "SELECT  * FROM #__survey  where id=".$id." " ;
		$db->setQuery($query1);
		$headfoot=$db->loadObjectList();

			
		////////// get question kailash end ////////////////////
		$captcha = new captcha_image;
	    $captcha_hash = $captcha->generate_hash();
		$this->assignRef('captcha_hash',$captcha_hash);

		//$this->assignRef( 'res', $res );
		//$this->assignRef( 'tab', $tab );
		//$this->assignRef( 'imagecounter', $total2 );
		$this->assignRef('question',$question);
		$this->assignRef('emailmsg',$emailmsg);
		$this->assignRef('headfoot',$headfoot);

 
        parent::display($tpl);
    }
}

