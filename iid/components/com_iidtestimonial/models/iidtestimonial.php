<?php


defined('_JEXEC') or die();

jimport( 'joomla.application.component.model' );

class Iidtestimonial_listModelIidtestimonial extends JModel {

	
	function save($data)
	{
		
		global $mainframe;
				$db =& JFactory::getDBO();
	
	$row =& $this->getTable('iidtestimonial');
		
		// Bind the form fields to the web link table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Store the web link table to the database
		if (!$row->store()) {

			$this->setError($this->_db->getErrorMsg());
			return false;
		}
					
					
					$query="select * from #__iidtestimonial_config LIMIT 1";
					$db->setQuery( $query);
					$rows = $db->loadObjectList();
					$conf=$rows[0];
					
					jimport('joomla.mail.helper');	
						$firstname 		= JRequest::getVar('firstname', array(0), '', '');
						$lastname 		= JRequest::getVar('lastname', array(0), '', '');
						$email   		= JRequest::getVar('email', array(0), '', '');
						
						$name= $firstname.' '.$lastname;
						
					
						$subject="Testimonial Submission - Don't Test the Waters Iowa" ;
						/******************Getting Email and Site Name********************************/
						
						 $MailFrom 	= $mainframe->getCfg('mailfrom');
						 $fromname 	= $mainframe->getCfg('fromname');
						
						if($conf->notification_text){
							$emailbody	=$conf->notification_text;
						}
						else {
							$emailbody ="Thanks for submitting.We will publishing your tesimonial after reviewing.";
						}
						
						 /*************************************************/
						$body 	= $name ."\r\n\r\n".stripslashes($emailbody);		
						$mail = JFactory::getMailer();
												
						$to=str_replace("<br />", ",",$conf->from_email);
						
						$email_id=explode(",",$to);
						
						foreach($email_id as $to)
						{		
							JUtility::sendMail($MailFrom, $fromname, $to, $subject, $body, $mode=$conf->email_format, $cc, $bcc, $attachment, $replyto, $replytoname);
						}						
						JUtility::sendMail($MailFrom, $fromname,$email, $subject, $body, $mode=$conf->email_format, $cc, $bcc, $attachment, $replyto, $replytoname);
				   ///
						$MailFrom="admin@donttestthewatersiowa.gov"; 
						$emailbody ="has just submitted a flood testimonial. Please go to the administrative panel to review.http://demo.meandv.com/w4/iid/administrator";
						$body 	= $name ." ".$emailbody;		
						$to=str_replace("<br />", ",",$conf->from_email);
						
						$email_id=explode(",",$to);
						
						foreach($email_id as $to)
						{		
							JUtility::sendMail($MailFrom, $fromname, $to, $subject, $body, $mode=$conf->email_format, $cc, $bcc, $attachment, $replyto, $replytoname);
						}
						

		return true;
	}

	function head_foot()
	{
		$database=& JFactory::getDBO();
		$query="select * from #__appointment_config";
		$database->setQuery($query);
		$row=$database->loadObjectList();
		return ($row);
	}
	
}
?>