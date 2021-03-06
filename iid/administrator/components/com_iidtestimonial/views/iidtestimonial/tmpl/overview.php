<?php 
/**
 * Joomla! 1.5 component iidtestimonial
 *
 * @version $Id: iidtestimonial.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage iidtestimonial
 * @license GNU/GPL
 *
 * It creates component for iidtestimonial
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
				<?php echo count( $this->listiidtestimonial ); ?>);" />
			</th>
			
			<th width="150" class="title"   >
				<?php echo JText::_( 'FIRST_NAME' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'LAST_NAME' ); ?>
			</th>						
			<th width="150" class="title">
				<?php echo JText::_( 'EMAIL' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'PHONE' ); ?>
			</th>
			<th width="150" class="CITY">
				<?php echo JText::_( 'CITY' ); ?>
			</th>
			<th width="150" class="TESTIMONIAL_STORY">
				<?php echo JText::_( 'TESTIMONIAL_STORY' ); ?>
			</th>
			<th width="150" class="VIDEOURL">
				<?php echo JText::_( 'VIDEOURL' ); ?>
			</th>
			
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$numItems = count($this->listiidtestimonial);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listiidtestimonial[$i];
								if($row->type == 0)
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.remove&id='. $row->id );
									
								}
								else
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.remove&id='. $row->id );
									
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
					
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php  echo $this->listiidtestimonial[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									
									<td align="center">
										<a href="#view" onclick="return listItemTask('cb<?php echo $i;?>','iidtestimonial.view')" title="<?php echo JText::_('View'); ?>">
										<?php echo $this->listiidtestimonial[$i]->firstname; ?>
										</a>
									</td>	
											
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->lastname; ?>
										
									</td>	
										<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->email; ?>
										
									</td>
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->phone; ?>
										
									</td>
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->city; ?>
										
									</td>	
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->testimonial_story; ?>
										
									</td>	
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->videourl; ?>
										
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
<input type="hidden" name="task" value="iidtestimonial.list" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
<input type="hidden" name="option" value="com_iidtestimonial" />
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
 
 submitform('iidtestimonial.saveorder');
}
</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<table class="adminlist">
	<thead>
		<tr>
					
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(
				<?php echo count( $this->listiidtestimonial ); ?>);" />
			</th>
			<th width="150" class="title"   >
				<?php echo JText::_( 'FIRST_NAME' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'LAST_NAME' ); ?>
			</th>						
			<th width="150" class="title">
				<?php echo JText::_( 'EMAIL' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'PHONE' ); ?>
			</th>
			<th width="150" class="CITY">
				<?php echo JText::_( 'CITY' ); ?>
			</th>
			<th width="150" class="TESTIMONIAL_STORY">
				<?php echo JText::_( 'TESTIMONIAL_STORY' ); ?>
			</th>
			<th width="150" class="VIDEOURL">
				<?php echo JText::_( 'VIDEOURL' ); ?>
			</th>
             <th width="100" nowrap="nowrap">
			    <?php echo JText::_('PUBLISHED'); ?>
			 </th> 
			<th width="100" nowrap="nowrap"><?php echo JText::_('Order'); ?>
<a href="javascript: saveUsageOrder( <?php echo count($this->listiidtestimonial)-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Save Order" /></a>
			</th>
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$j=0;
					$numItems = count($this->listiidtestimonial);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listiidtestimonial[$i];
								if($row->type == 0)
								{
									$editLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.edit&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.delete&id='. $row->id );
									$delText = 'CONFIRM DELETE CATEGORY';
									$color = 'green';
									$orderUpTask = 'cat_orderup';
									$orderDownTask = 'cat_orderdown';
								}
								else
								{
									$editLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.edit&id='. $row->id );
									$delText = 'CONFIRM DELETE GALLERY';
									$delLink 	= JRoute::_( 'index.php?option=com_iidtestimonial&task=iidtestimonial.remove&id='. $row->id );
									$color = '#0B55C4;';
									$orderUpTask = 'orderup';
									$orderDownTask = 'orderdown';
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
				
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $j;?>" name="cid[]" value="<?php echo $this->listiidtestimonial[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									<td align="center">
									<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','iidtestimonial.edit')" title="<?php echo JText::_('Edit'); ?>">
										<?php  echo $this->listiidtestimonial[$i]->firstname; ?>
										</a>
									</td>
									
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->lastname; ?>
										
									</td>	
										<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->email; ?>
										
									</td>
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->phone; ?>
										
									</td>
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->city; ?>
										
									</td>	
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->testimonial_story; ?>
										
									</td>	
									<td align="center">
										
										<?php echo $this->listiidtestimonial[$i]->videourl; ?>
										
									</td>	
													
									<td align="center">
									<?php                      	
									$img = $this->listiidtestimonial[$i]->published?'publish_g.png':'publish_r.png';
									?>
									<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $this->listiidtestimonial[$i]->published ? 'iidtestimonial.unpublish' : 'iidtestimonial.publish'; ?>')"><img src="<?php echo $pathIMG . $img; ?>" width="12" height="12" border="0" alt="" /></a>
									</td>
									
									<td align="center" >
								
			<span><?php echo $this->pageNav->orderUpIcon   ( $i, true,     'iidtestimonial.orderup',   'Move Up',   $this->listiidtestimonial[$i]->ordering ); ?></span>
			<span><?php echo $this->pageNav->orderDownIcon ( $i, $n, true, 'iidtestimonial.orderdown', 'Move Down', $this->listiidtestimonial[$i]->ordering ); ?></span>
									<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					                <input type="text" name="order[]" size="5" value="<?php  echo $this->listiidtestimonial[$i]->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
									</td>
																	
									
						</tr>
						<?php $j++;
							$k = 1 - $k;
						}
						?>
			</tbody>
						  
	 <tfoot>
        <tr>
    	    <td align="center" colspan="10">
			<?php echo $this->pageNav->getListFooter(); ?>
		    </td>
		</tr>
    </tfoot>
</table>
<input type="hidden" name="option" value="com_iidtestimonial" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="iidtestimonial.list" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />


</form>
<?php
}
?>