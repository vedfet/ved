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
defined('_JEXEC') or die('Restricted access');
 
$editor =& JFactory::getEditor();
$row=$this->listsurvey;

?>
<div id="survey">
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >

		<fieldset class="adminform">
		<legend><?php echo JText::_( 'Survey Response Details' ); ?></legend>
	    <table cellpadding="4" cellspacing="0" border="0" >
	    <?php 
		
		if(count($this->listsurvey)>0)
		{
			foreach($this->listsurvey as $listsurvey1) { ?>
			<table class="admintable">
			<tbody>			
	
				  <tr>
					  <td >Question: <?php echo $listsurvey1->question_description; ?></td>
				 </tr>
				 
				 
				<tr>
				 
				  <td > Answer: <?php echo $listsurvey1->answer;?></td>
				</tr>
				</tbody>
			</table>	
		<?php } 
		}
		else
		{
			echo 'Details Not Available';
		}
		?>	
			
    
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="survey.list&archive=-1" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
	<input type="hidden" name="act" value="<?php echo $this->listsurvey->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo SURVEY_COM_COMPONENT;?>" />
	<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
</form>

</div>
