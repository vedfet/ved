<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *

 */
// no direct access
defined( '_JEXEC' ) or die('Restricted access');
class TableSurvey_answer extends JTable
{

	var $id				=	NULL;
  var $survey_id		=	NULL;
  var $name				=	NULL;
  var $email			=	NULL;
  var $ipaddress		=	NULL;
  var $browser			=	NULL;
  var $created			=	NULL;
  var $created_by		=	NULL;
  var $modified			=	NULL;
  var $modified_by		=	NULL;
  var $checked_out		=	NULL;
  var $checked_out_time	=	NULL;
  var $published		=	NULL;
  var $ordering			=	NULL;
	
	function __construct( &$_db )
	{
		parent::__construct( '#__survey_answer', 'id', $_db );
	}

}
?>
