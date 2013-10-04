<?php 
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: video.php 2010-06-03 01:08:55 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage video
 * @license GNU/GPL
 *
 * It creates component for video
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
				<?php echo count( $this->listvideo ); ?>);" />
			</th>
			
			<th width="150" class="title">
				<?php echo JText::_( 'VIDEO_NAME' ); ?>
			</th>
			
			<th width="90" class="title"   >
				<?php echo JText::_( 'VIDEO_TITLE' ); ?>
			</th>
			
			
			
			<th width="150" class="title">
				<?php echo JText::_( 'ADD_DATE' ); ?>
			</th>
			
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$numItems = count($this->listvideo);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listvideo[$i];
								if($row->type == 0)
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_video&task=video.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_video&task=video.remove&id='. $row->id );
									
								}
								else
								{
									$viewLink 	= JRoute::_( 'index.php?option=com_video&task=video.view&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_video&task=video.remove&id='. $row->id );
									
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
					
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php  echo $this->listvideo[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									
									<td align="center">
										<a href="#view" onclick="return listItemTask('cb<?php echo $i;?>','video.view')" title="<?php echo JText::_('View'); ?>">
										<?php echo $this->listvideo[$i]->video_name; ?>
										</a>
									</td>	
											
									<td align="center">
										<?php  echo $this->listvideo[$i]->video_title; ?>
									</td>
									
									
									
									<td align="center">
										<?php  echo $this->listvideo[$i]->created; ?>
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
<input type="hidden" name="task" value="video.list" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />
<input type="hidden" name="option" value="com_video" />
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
 
 submitform('video.saveorder');
}
</script>


<form action="index.php" method="post" name="adminForm" id="adminForm">
	<fieldset class="adminform">
	<table class="adminlist">
	<thead>
		<tr>
					
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(
				<?php echo count( $this->listvideo ); ?>);" />
			</th>
			<th width="90" class="title"   >
				<?php echo JText::_( 'VIDEO_ID' ); ?>
			</th>
			<th width="90" class="title"   >
				<?php echo JText::_( 'VIDEO_TITLE' ); ?>
			</th>
			<th width="150" class="title">
				<?php echo JText::_( 'VIDEO_NAME' ); ?>
			</th>
			
			
			
						
			<th width="150" class="title">
				<?php echo JText::_( 'ADD_DATE' ); ?>
			</th>
			
		
             <th width="100" nowrap="nowrap">
			    <?php echo JText::_('PUBLISHED'); ?>
			 </th>
			 
			<th width="100" nowrap="nowrap"><?php echo JText::_('Order'); ?>
<a href="javascript: saveUsageOrder( <?php echo count($this->listvideo)-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Save Order" /></a>
			</th>
			
		</tr>
	</thead>
	        <tbody>	
				<?php
					$k = 0;
					$j=0;
					$numItems = count($this->listvideo);
					$db =& JFactory::getDBO();
							for ($i=0; $i<$numItems; $i++)
							{
								$row = &$this->listvideo[$i];
								if($row->type == 0)
								{
									$editLink 	= JRoute::_( 'index.php?option=com_video&task=video.edit&id='. $row->id );
									$delLink 	= JRoute::_( 'index.php?option=com_video&task=video.delete&id='. $row->id );
									$delText = 'CONFIRM DELETE CATEGORY';
									$color = 'green';
									$orderUpTask = 'cat_orderup';
									$orderDownTask = 'cat_orderdown';
								}
								else
								{
									$editLink 	= JRoute::_( 'index.php?option=com_video&task=video.edit&id='. $row->id );
									$delText = 'CONFIRM DELETE GALLERY';
									$delLink 	= JRoute::_( 'index.php?option=com_video&task=video.remove&id='. $row->id );
									$color = '#0B55C4;';
									$orderUpTask = 'orderup';
									$orderDownTask = 'orderdown';
								}	
								
							?>
				<tr class="<?php echo "row$k"; ?>">
				
									<td width="20" align="center" >
										<input type="checkbox" id="cb<?php echo $j;?>" name="cid[]" value="<?php echo $this->listvideo[$i]->id; ?>" onclick="isChecked(this.checked);" />
									</td>
									<td align="center">
										
										<?php echo $this->listvideo[$i]->id; ?>
										
									</td>	
									<td align="center">
									<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','video.edit')" title="<?php echo JText::_('Edit'); ?>">
										<?php  echo $this->listvideo[$i]->video_title; ?>
										</a>
									</td>
									
									<td align="center">
										
										<?php echo $this->listvideo[$i]->video_name; ?>
										
									</td>	
											
									
									
									
									<td align="center">
										<?php  echo $this->listvideo[$i]->created; ?>
									</td>
									
									
									
									<td align="center">
									<?php                      	
									$img = $this->listvideo[$i]->published?'publish_g.png':'publish_r.png';
									?>
									<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $this->listvideo[$i]->published ? 'video.unpublish' : 'video.publish'; ?>')"><img src="<?php echo $pathIMG . $img; ?>" width="12" height="12" border="0" alt="" /></a>
									</td>
									
									<td align="center" >
								
			<span><?php echo $this->pageNav->orderUpIcon   ( $i, true,     'video.orderup',   'Move Up',   $this->listvideo[$i]->ordering ); ?></span>
			<span><?php echo $this->pageNav->orderDownIcon ( $i, $n, true, 'video.orderdown', 'Move Down', $this->listvideo[$i]->ordering ); ?></span>
									<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
					                <input type="text" name="order[]" size="5" value="<?php  echo $this->listvideo[$i]->ordering; ?>" <?php echo $disabled ?> class="text_area" style="text-align: center" />
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
<input type="hidden" name="option" value="com_video" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="video.list" />
<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $this->lists['order_Dir']; ?>" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="archive" value="<?php echo $_REQUEST['archive']; ?>" />


</form>
<?php
}
?>