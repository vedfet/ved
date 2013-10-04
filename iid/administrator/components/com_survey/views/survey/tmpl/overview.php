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
if($archive==-1){

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
				<?php echo JText::_( 'TITLE' ); ?>
			</th>
			
			<th width="90" class="title"   >
				<?php echo JText::_( 'HEADER' ); ?>
			</th>
			
			
			
			<th width="150" class="title">
				<?php echo JText::_( 'FOOTER' ); ?>
			</th>

			<th width="150" class="title">
				<?php echo JText::_('NO_OF_QUESTIONS'); ?>
			</th>
			
			<th width="150" class="title">
				<?php echo JText::_( 'NO_OF_RESPONSES' ); ?>
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
									$viewLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.remove&id='. $row->id );
									
								}
								else
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.remove&id='. $row->id );
									
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
					
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php  echo $this->listsurvey[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									
									<td align="center">
										<a href="#view" onclick="return listItemTask('cb<?php echo $i;?>','survey.view')" title="<?php echo JText::_('View'); ?>">
										<?php echo $this->listsurvey[$i]->title; ?>
										</a>
									</td>	
											
									<td align="center">
										<?php  echo $this->listsurvey[$i]->header_descriptions; ?>
									</td>
									
									
									
									<td align="center">
										<?php  echo $this->listsurvey[$i]->header_descriptions; ?>
									</td>
									
									<td align="center">
										<?php  //echo $this->listsurvey[$i]->header_descriptions; ?>
									</td>
									
									<td align="center">
										<?php  //echo $this->listsurvey[$i]->header_descriptions; ?>
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
<?php 
}
else 
{
?>
<script>   
function saveUsageOrder( n ) {
 for ( var j = 0; j <= n; j++ ) {
  box = eval( "document.adminForm.cb" + j );
  
  if ( box ) {
   if ( box.checked == false ) {
    box.checked = true;
   }
  } else {
   alert("You cannot change the order of items, as an item in the list is `Checked Out`");
   return;
  }
 }
 
 submitform('survey.saveorder');
}
</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<table class="adminlist">
	<thead>
		<tr>
					
			
			<th width="20" class="title"   >
				<?php echo JText::_( '#' ); ?>
			</th>

			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(
				<?php echo count( $this->listsurvey ); ?>);" />
			</th>
			
			
			<th width="90" class="title"   >
				<?php echo JText::_( 'TITLE' ); ?>
			</th>
			<th width="90" class="title"   >
				<?php echo JText::_( 'HEADER' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'FOOTER' ); ?>
			</th>
					
			<th width="150" class="title">
				<?php echo JText::_( 'NO_OF_QUESTIONS' ); ?>
			</th>
			
			<th width="150" class="title">
				<?php echo JText::_( 'NO_OF_RESPONSES' ); ?>
			</th>
			
		
             <th width="100" nowrap="nowrap">
			    <?php echo JText::_('PUBLISHED'); ?>
			 </th>
			 
			<th width="100" nowrap="nowrap"><?php echo JText::_('Order'); ?>
<a href="javascript: saveUsageOrder( <?php echo count($this->listsurvey)-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Save Order" /></a>
			</th>
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$j=0;
					$numItems = count($this->listsurvey);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listsurvey[$i];
								if($row->type == 0)
								{
									$editLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.edit&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.delete&id='. $row->id );
									$delText = 'CONFIRM DELETE CATEGORY';
									$color = 'green';
									$orderUpTask = 'cat_orderup';
									$orderDownTask = 'cat_orderdown';
								}
								else
								{
									$editLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.edit&id='. $row->id );
									$delText = 'CONFIRM DELETE GALLERY';
									$delLink 	= JRoute::_( 'index.php?option=com_survey&task=survey.remove&id='. $row->id );
									$color = '#0B55C4;';
									$orderUpTask = 'orderup';
									$orderDownTask = 'orderdown';
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
				
									
									<td align="center">
										
										<?php echo $this->listsurvey[$i]->id; ?>
										
									</td>	
									
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $j;?>" name="cid[]" value="<?php echo $this->listsurvey[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									
									<td align="center">
									<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','survey.edit')" title="<?php echo JText::_('Edit'); ?>">
										<?php  echo $this->listsurvey[$i]->title; ?>
										</a>
									</td>
									
									<td align="center">
										
										<?php echo $this->listsurvey[$i]->header_descriptions ; ?>
										
									</td>	
									
									<td align="center">
										<?php  echo $this->listsurvey[$i]->footer_descriptions; ?>
									</td>

									<td align="center">
										<?php  
										
										$db=& JFactory::getDBO();
										$query="select * from #__survey_questions where survey_id=".$this->listsurvey[$i]->id;
										$db->setQuery($query);
										$db->query();
										echo $num_rows = $db->getNumRows();

									?>
									</td>
									<td align="center">
										<?php  
										
										$db=& JFactory::getDBO();
										$query="select * from #__survey_answer  where survey_id=".$this->listsurvey[$i]->id;
										$db->setQuery($query);
										$db->query();
										echo $num_rows = $db->getNumRows();
									
									
									
									?>
									</td>
									
									<td align="center">
									<?php                      	
									$img = $this->listsurvey[$i]->published?'publish_g.png':'publish_r.png';
									?>
									<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $this->listsurvey[$i]->published ? 'survey.unpublish' : 'survey.publish'; ?>')"><img src="<?php echo $pathIMG . $img; ?>" width="12" height="12" border="0" alt="" /></a>
									</td>
									
									<td align="center" >
								
			<span><?php echo $this->pageNav->orderUpIcon   ( $i, true,     'survey.orderup',   'Move Up',   $this->listsurvey[$i]->ordering ); ?></span>
			<span><?php echo $this->pageNav->orderDownIcon ( $i, $n, true, 'survey.orderdown', 'Move Down', $this->listsurvey[$i]->ordering ); ?></span>
									<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					                <input type="text" name="order[]" size="5" value="<?php  echo $this->listsurvey[$i]->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
									</td>
									
						</tr>
						<?php $j++;
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
<input type="hidden" name="option" value="com_survey" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="survey.list" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />


</form>
<?php
}
?>