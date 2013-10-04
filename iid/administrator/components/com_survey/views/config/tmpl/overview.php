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

JHTML::_('behavior.tooltip');
$pathIMG = JURI::root().'/administrator/images/';
?>
<div id="fantasyleague">
<form action="index.php" method="post" name="adminForm" >
<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
<tr><td>
<script>			
function saveCostOrder( n ) {
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
	submitform('landcost.saveorder');
}
</script>

<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<tr>
		<th width="20" nowrap="nowrap">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->property ); ?>);" />
		</th>
		<th class="title" width="75%" nowrap="nowrap"><?php echo JText::_('Cost lower limt'); ?></th>
		<th class="title" width="25%" nowrap="nowrap"><?php echo JText::_('Cost Upper limit'); ?></th>
		<th class="title" width="5%" nowrap="nowrap"><?php echo JText::_('Count'); ?></th>
		<th width="2%"><?php echo JText::_('Order'); ?></th>
		<th width="1%">
		<a href="javascript: saveCostOrder( <?php echo count( $this->properties )-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Save Order" /></a>
		</th>
        <th width="10%" nowrap="nowrap"><?php echo JText::_('Published'); ?></th>
		
		
	</tr>

    <?php
    $k=0;
    $i=0;
    foreach ($this->costs as $cost) {
    	?>
        <tr class="row<?php echo $k; ?>">
        	<td width="20" >
                <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $cost->id; ?>" onclick="isChecked(this.checked);" />
        	</td>
          	<td >
          		<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','landcost.edit')" title="<?php echo JText::_('Edit'); ?>">
          		<?php echo $cost->lower_limit; ?>
          		</a>
          	</td>
          	<td><?php echo $cost->upper_limit;?></td>
			<td><?php echo (int)$cost->count;?></td>
          	<td align="center" colspan="2">
			<input type="text" name="order[]" size="5" value="<?php echo $cost->ordering; ?>" class="text_area" style="text-align: center" />
			</td>
          	<td align="center">
          	<?php                      	
          	$img = $cost->published?'publish_g.png':'publish_r.png';
          	?>
          	<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $cost->published ? 'landcost.unpublish' : 'landcost.publish'; ?>')"><img src="<?php echo $pathIMG . $img; ?>" width="12" height="12" border="0" alt="" /></a>
          	</td>
          	        </tr>
        <?php
        $i++;
        $k = 1 - $k;
    } ?>
    <tfoot>
        <tr>
    	  <td align="center" colspan="7">
			<?php echo $this->pageNav->getListFooter(); ?>
		  </td>
		</tr>
    </tfoot>
</table>
</td>
</tr>  
</table>
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="task" value="landcost.list" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="option" value="com_property" />
</form>
</div>