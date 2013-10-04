<?php
/**
 * Joomla! 1.5 component survey
 *
 * @version $Id: survey.php 2010-06-03 01:08:55 svn $
 * @author Kailash Pathak
 * @package Joomla
 * @subpackage survey
 * @license GNU/GPL
 *
 * It creates component for survey
 *

 */
// no direct access
defined( '_JEXEC' ) or die('Restricted access');
class TableSurvey_questions extends JTable
{

	
  var $id					= NULL;
  var $survey_id			= NULL;
  var $question_description	= NULL;
  var $answer_type			= NULL;
  var $answer_options		= NULL;
  var $created				= NULL;
  var $created_by			= NULL;
  var $modified				= NULL;
  var $modified_by			= NULL;
  var $checked_out			= NULL;
  var $checked_out_time		= NULL;
  var $published			= NULL;
  var $ordering				= NULL;
	
	function __construct( &$_db )
	{
		parent::__construct( '#__survey_questions', 'id', $_db );
	}

}
?>
