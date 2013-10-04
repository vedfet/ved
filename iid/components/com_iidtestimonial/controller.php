<?php
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: controller.php 2010-11-17 01:25:27 svn $
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

jimport('joomla.application.component.controller');
require_once("captcha_images.php"); 


class Iidtestimonial_listController extends JController
{
    
    function display()
    {
		 if(JRequest::getCmd('view') == '') {
            JRequest::setVar('view', 'iidtestimonial');
        }
		
		
		if(JRequest::getCmd('view') == 'iidtestimonial_list') {
           
			JRequest::setVar('view', 'iidtestimonial_list');
        }
		parent::display();
    }
	function generate_captcha_image()
	{
		
		$captcha_hash = $_REQUEST['captcha_hash'];
		$captcha = new captcha_image;
		$captcha->generate_captcha_image($captcha_hash);	
		exit();
	}
	function savetestimonial(){
	
		global $mainframe;

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );

		// Get some objects from the JApplication
		$db	=& JFactory::getDBO();
		
		$post=JRequest::get('post');

		$model = $this->getModel('iidtestimonial');
		
		$captcha_hash = $_REQUEST['captcha_hash'];
		$captcha_value = $_REQUEST['captcha_value'];
		$captcha = new captcha_image;
	
		$post['archive']='0';

		$db=& JFactory::getDBO();
		 $query_ordering = 'SELECT max(ordering) as ords from #__iidtestimonial';
 
		 $db->setQuery($query_ordering);
		 $rows_order =$db->loadObjectList();
		 $rd=$rows_order[0]->ords;
		 $post['ordering']=$rd+1;
		 $post['published']=0;
		
///////// mail function value  ////////////////////////////////////////

 $subject="Testimonial Information";
 
 $subject = html_entity_decode($subject, ENT_QUOTES);
 
 $message = "<html><head></head><body>
    
     <table width='100%' border='1' align='center'>
      
	  <tr>
       <tr>
			<td align='left'>First Name</td>
			<td>".$post['firstname']."</td>
	   </tr>
       <tr>
			<td align='left'>Last Name</td>
				<td>". $post['lastname']."</td>
			</tr>
       <tr>
			<td align='left'>Email</td>
	   <td>".$post['email']."</td>
	   </tr>
	    <tr>
				<td align='left'>Phone</td>
				<td>".$post['phone']."</td>
		</tr>
		<tr>
			<td align='left'>City  </td>
			<td>".$post['city']."</td>
		
		</tr>
		<tr>
				<td align='left'>Testimonial Story</td>
				<td>".$post['testimonial_story']."</td>
		</tr>
		<tr>
			<td align='left'>Video Url</td>
			<td>".$post['videourl']."</td>
		
		</tr>
			<tr>
			<td colspan='2'></td>
		</tr>
		<tr>
			<td colspan='2'>If you have any questions or concerns, please fill out the form at this URL http://www.iid.state.ia.us/contact_us/contactus.asp?linksback=contactinfo. </td>
		</tr>
		<tr>
			<td colspan='2'></td>
			
		</tr>		  
         </table>
         <div style='margin-top:20px;'></div></body></html>";
 
 //get all super administrator
 $db=& JFactory::getDBO();
 $query = 'SELECT * from #__iidtestimonial_config';
 
 $db->setQuery($query);
 $rows =$db->loadObjectList();

   $Email= $post['email'];
  
 $mailfrom 	= $mainframe->getCfg('mailfrom');
 $fromname 	= $mainframe->getCfg('fromname');
 
 $headers = "From:$mailfrom\r\n";
 $headers .="Content-type:&nbsp;text/html\r\n";

//// mail function value end //////////////////////////////////////////////

		if(!$captcha->validate_captcha($captcha_hash, $captcha_value))
			{
				
				if(isset($_SESSION['post_back']))
				 unset($_SESSION['post_back']);
				$_SESSION['post_back']=$_POST;
				
				$msg = JText::_('CAPTCHA_ERROR');
				$this->setRedirect('index.php?option=com_iidtestimonial&view=iidtestimonial&r=err',$msg);
				
			
			}
		
		else{
					if ($model->save($post)) {
						$msg = JText::_( 'iidtestimonial Saved' );
					} else {
						$msg = JText::_( 'Error Saving iidtestimonial');
					}
			

			
			  JUtility::sendMail($mailfrom, $fromname, $Email, $subject, $message, $headers);
                                     session_destroy();
		$this->setRedirect(JRoute::_('index.php?option=com_iidtestimonial&view=iidtestimonial&layout=message', false), $msg);
	
		}
	
	}
	
}

?>