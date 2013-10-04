<?php
/**
 * @version		$Id: survey_details.php  $
 * @package		Joomla
 * @subpackage	Survey
  */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

/**
 * @package		Joomla
 * @subpackage	Survey
 */
class TableSurvey extends JTable
{
  

   var $id					=	NULL;
   var $title				=	NULL;
   var $header_descriptions	=	NULL;
   var $footer_descriptions	=	NULL;
   var $created				=	NULL;
   var $created_by			=	NULL;
   var $modified			=	NULL;
   var $modified_by			=	NULL;
   var $checked_out			=	NULL;
   var $checked_out_time	=	NULL;
   var $published			=	NULL;
   var $ordering			=	NULL;


	
	function __construct( &$_db )
	{
		parent::__construct( '#__survey', 'id', $_db );
}

}
?>
