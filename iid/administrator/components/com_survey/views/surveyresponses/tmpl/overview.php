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
$ordering = ($this->lists['order'] == 'a.ordering');
JHTML::_('behavior.tooltip');
$pathIMG = JURI::root().'/administrator/images/';
$archive=$_REQUEST['archive'];
?>

<form action="index.php" method="post" name="adminForm" id="adminForm">

<fieldset class = "adminform">
<table class="adminlist">
	<thead>
		<tr>
					
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(
				<?php echo count( $this->listsurvey ); ?>);" />
			</th>
			
			<th width="150" class="title">
				<?php echo JText::_( 'Name' ); ?>
			</th>
			
			<th width="90" class="title"   >
				<?php echo JText::_( 'Email' ); ?>
			</th>
			
			
			
			<th width="150" class="title">
				<?php echo JText::_( 'Survey' ); ?>
			</th>

			<th width="150" class="title">
				<?php echo JText::_('Date'); ?>
			</th>
			
			
			
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$numItems = count($this->listsurvey);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listsurvey[$i];
								if($row->type == 0)
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_survey&task=surveyresponses.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.remove&id='. $row->id );
									
								}
								else
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_survey&task=surveyresponses.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.remove&id='. $row->id );
									
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
					
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php  echo $this->listsurvey[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									
									<td align="center">
										<a href="#view" onclick="return listItemTask('cb<?php echo $i;?>','surveyresponses.view')" title="<?php echo JText::_('View'); ?>">
										<?php echo $this->listsurvey[$i]->name; ?>
										</a>
									</td>	
									<td align="center">
										<?php  echo $this->listsurvey[$i]->email; ?>
									</td>		
									<td align="center">
										<?php  echo $this->listsurvey[$i]->survey_name; ?>
									</td>
									
									
									
									<td align="center">
										<?php  echo $this->listsurvey[$i]->created; ?>
									</td>
									
									
									
									
									
																	
						</tr>
						<?php
							$k = 1 - $k;
						}
						?>
			</tbody>
						  
	 <tfoot>
        <tr>
    	    <td align="center" colspan="9">
			<?php echo $this->pageNav->getListFooter(); ?>
		    </td>
		</tr>
    </tfoot>
</table>

<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="survey.list" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
<input type="hidden" name="option" value="com_survey" />
</form>
</fieldset>

