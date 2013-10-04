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
 
jimport('joomla.application.component.controller');
 
/**
 * Hello World Component Controller
 *
 * @package    Joomla.Tutorials
 * @subpackage Components
 */
 
class NewsController extends JController
{
    /**
     * Method to display the view
     *
     * @access    public
     */
	
    function display()
    {
		if(($_REQUEST['option']=='com_news')&&($_REQUEST['task']=='view')&&($_REQUEST['view']=='detailsnews'))
			 $this->setNewsHit();
		  
		parent::display();
		
    }
	function showLogoImage()
	{
		$id=JRequest::getVar('id', null, '', 'int');
		$database =& JFactory::getDBO();
		$query="SELECT file_name, file_type, file_size, logo_image"
		."\n FROM #__news WHERE id='".$_REQUEST['id']."'  LIMIT 1";
		
		$database->setQuery( $query);
		$rows_image = $database->loadObjectList();
		
		if(count($rows_image)>0)
		{
			$file_name = $rows_image[0]->file_name;
			$file_type = $rows_image[0]->file_type;
			$file_size = $rows_image[0]->file_size;
			$logo_image = $rows_image[0]->logo_image;
			header("Content-length: $file_size");
			header("Content-type: $file_type");
			header("Content-Disposition: attachment; filename=$file_name");
			echo $logo_image;
		}
		else
		{
			
		}
		exit;

    }
	function mailto()
	{
		$session =& JFactory::getSession();
		$session->set('com_news.formtime', time());
		JRequest::setVar( 'view', 'mailto' );
		$this->display();
	}

	/**
	 * Send the message and display a notice
	 *
	 * @access public
	 * @since 1.5
	 */
	function setNewsHit()
	{
		$db	=& JFactory::getDBO();
		$id=JRequest::getVar('id', null, '', 'int');
		$query="select hits from #__news where id='".$id."'";
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$rows[0]->hits;
		$query="UPDATE #__news set hits='".($rows[0]->hits+1)."' where id='".$id."'";
		$db->setQuery($query);
		$db->query($query);
	} 
	function send()
	{
		global $mainframe;

		// Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
		$session =& JFactory::getSession();
		$db	=& JFactory::getDBO();

		// we return time() instead of 0 (as it previously was), so that the session variable has to be set in order to send the mail
		$timeout = $session->get('com_news.formtime', time());
		if($timeout == 0 || time() - $timeout < MAILTO_TIMEOUT) {
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}
		// here we unset the counter right away so that you have to wait again, and you have to visit mailto() first
		$session->set('com_news.formtime', null);

		jimport( 'joomla.mail.helper' );

		$SiteName 	= $mainframe->getCfg('sitename');
		$MailFrom 	= $mainframe->getCfg('mailfrom');
		$FromName 	= $mainframe->getCfg('fromname');

		$link 		= base64_decode( JRequest::getVar( 'link', '', 'post', 'base64' ) );

		// Verify that this is a local link
		if(!JURI::isInternal($link)) {
			//Non-local url...  
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}

		// An array of e-mail headers we do not want to allow as input
		$headers = array (	'Content-Type:',
							'MIME-Version:',
							'Content-Transfer-Encoding:',
							'bcc:',
							'cc:');

		// An array of the input fields to scan for injected headers
		$fields = array ('mailto',
						 'sender',
						 'from',
						 'subject',
						 );

		/*
		 * Here is the meat and potatoes of the header injection test.  We
		 * iterate over the array of form input and check for header strings.
		 * If we find one, send an unauthorized header and die.
		 */
		foreach ($fields as $field)
		{
			foreach ($headers as $header)
			{
				if (strpos($_POST[$field], $header) !== false)
				{
					JError::raiseError(403, '');
				}
			}
		}

		/*
		 * Free up memory
		 */
		unset ($headers, $fields);

		$email 				= JRequest::getString('mailto', '', 'post');
		$sender 			= JRequest::getString('sender', '', 'post');
		$from 				= JRequest::getString('from', '', 'post');
		$subject_default 	= JText::sprintf('Item sent by', $sender);
		$subject 			= JRequest::getString('subject', $subject_default, 'post');

		// Check for a valid to address
		$error	= false;
		if ( ! $email  || ! JMailHelper::isEmailAddress($email) )
		{
			$error	= JText::sprintf('EMAIL_INVALID', $email);
			JError::raiseWarning(0, $error );
		}

		// Check for a valid from address
		if ( ! $from || ! JMailHelper::isEmailAddress($from) )
		{
			$error	= JText::sprintf('EMAIL_INVALID', $from);
			JError::raiseWarning(0, $error );
		}

		if ( $error )
		{
			return $this->mailto();
		}

		// Build the message to send
		$msg	= JText :: _('EMAIL_MSG');
		$body	= sprintf( $msg, $SiteName, $sender, $from, $link);

		// Clean the email data
		$subject = JMailHelper::cleanSubject($subject);
		$body	 = JMailHelper::cleanBody($body);
		$sender	 = JMailHelper::cleanAddress($sender);

		// Send the email
		if ( JUtility::sendMail($from, $sender, $email, $subject, $body) !== true )
		{
			JError::raiseNotice( 500, JText:: _ ('EMAIL_NOT_SENT' ));
			return $this->mailto();
		}

		JRequest::setVar( 'view', 'sent' );
		$this->display();
	}
	
	function newsactive()
	{
		
 		$post  = JRequest::get('post');
		$rowid = JRequest::getVar('id', 0);
		$val = (int)JRequest::getVar('val', 0);
        $db =& JFactory::getDBO();
		
	    
		if($rowid>0)
		{
				if($val==1)
				{
					
					$query = 'UPDATE #__news_details SET published="1" WHERE id ='.intval($rowid);
					$db->setQuery($query);
					$db->query();
				}
				else
				{
					$query = 'UPDATE #__news_details SET published="0" WHERE id ='.intval($rowid);
					$db->setQuery($query);
					$db->query();
				}
			$msg = JText::_('news Saved');	
		}
		else
		{
		    $msg = JText::_('news Not Saved');	
		}
		
		
		$this->setRedirect("index.php?option=com_news&view=my_listings&res=1&id=".$rowid,$msg);
        
		
	}
	
	   
  
	function news_details()
	{	
		$db =& JFactory::getDBO();
		$rowid = JRequest::getVar('id', 0);

		$referer	= JRequest::getVar('referer', '');
		if(intval($rowid)>0)
		{
		
				if($referer=='featured')
				{
					
					$query = 'UPDATE #__news_details SET featured_views=featured_views+1, `views`=`views`+1  WHERE id ='.intval($rowid);
					$db->setQuery($query);
					$db->query();
				}
				elseif($referer=='homepage')
				{
					
					$query = 'UPDATE #__news_details SET homepage_views=homepage_views+1, `views`=`views`+1  WHERE id ='.intval($rowid);
					$db->setQuery($query);
					$db->query();
				}
				else
				{
					$query = 'UPDATE #__news_details SET `views`=`views`+1 WHERE id ='.intval($rowid);
					$db->setQuery($query);
					$db->query();
				}
		}
		$this->setRedirect("index.php?option=com_news&view=news_details&id=".$rowid,$msg);

		
		
	}
 
}
