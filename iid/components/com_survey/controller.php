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
 
jimport('joomla.application.component.controller');

require_once(JPATH_COMPONENT."/captcha/captcha_images.php");

 

/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
class SurveyController extends JController
{
    /**
     * Method to display the view
     *
     * @access    public
     */
  
	
	function display()
    {
         $r=Jrequest::getVar('r');
			 if(isset($_SESSION['post_back'])&&!isset($r)&&($r!='err'))
			   unset($_SESSION['post_back']);
		
		parent::display('surveyanswer');
    }

	function surveyanswer()
	{
	
		global $mainframe;

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		
		$captcha_hash = $_REQUEST['captcha_hash'];
		$captcha_value = $_REQUEST['captcha_value'];
		$captcha = new captcha_image;
		
		// Get some objects from the JApplication
				$id=JRequest::getVar('survey_id');
				
		
		$post=JRequest::get('post');
		

		$model = $this->getModel('survey');
		
		if(!$captcha->validate_captcha($captcha_hash, $captcha_value))
			{
				
				
				
				if(isset($_SESSION['post_back']))
				 unset($_SESSION['post_back']);
				$_SESSION['post_back']=$_POST;

				
				$msg = JText::_('CAPTCHA_ERROR');
				//$this->setRedirect('index.php?option=com_survey&r=err',$msg);
				$this->setRedirect('index.php?option=com_survey&view=survey_details&r=err&id='.$id.'',$msg);
			
			}

			else {
		
						

						if ($model->save($post)) {
							
							$email_Msg = JText::_( 'Survey Saved');
						
						} else {
							$email_Msg = JText::_( 'Error Saving survey');
						}

							
						$this->setRedirect(JRoute::_('index.php?option=com_survey&view=survey_details&save=save', false), $email_Msg);
			}
	}
		
		
		function generate_captcha_image()
		{
			$captcha_hash = $_REQUEST['captcha_hash'];
			$captcha = new captcha_image;
			$captcha->generate_captcha_image($captcha_hash);	
			exit();
		}

	

}
?>