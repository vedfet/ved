<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class TableNews extends JTable
{
	var $id 			= null;
	
	/** @var string */
	var $news_title 	= null;
	
	/** @var string */
	var $contact_person = null;
	var $contact_title 	= null;
	
	/** @var string */
	var $address_line1	= null;
	var $address_line2	= null;
	/** @var string */
	
	var $city		    = null;
	var $state	        = null;
	
	var $zip_code		= null;
	var $phone 			= null;
	var $email 			= null;
	
	var $short_description	= null;
	var $description		= null;
	var $website_url 		= null;
	
	var $news_layout 		= null;
	var $created_date =null;
	
	/** @var int */
	var $published 			= null;
	/** @var int */
	var $publish_frontpage  =null;
	var $checked_out 		= null;
	/** @var datetime */
	var $checked_out_time 	= null;
	/** @var int */
	var $ordering 			= null;


	/**
	* @param database A database connector object
	*/
	
function TableNews(& $db) 
	{
		parent::__construct('#__news', 'id', $db);
	}

}
?>
