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
class TableSurvey_answer_details  extends JTable
{

	
  var $id					= NULL;
  var $survey_id			= NULL;
  var $survey_answer_id		= NULL;
  var $survey_question_id	= NULL;
  var $answer				= NULL;
	
	function __construct( &$_db )
	{
		parent::__construct( '#__survey_answer_details', 'id', $_db );
	}

}
?>
