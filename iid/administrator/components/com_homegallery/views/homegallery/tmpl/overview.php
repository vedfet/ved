<?php 
/**
 * Joomla! 1.5 component News
 *
 * @version $Id: News.php 2010-03-14 01:52:14 svn $
 * @author Diwakar Kumar Singh
 * @package Joomla
 * @subpackage News
 * @license GNU/GPL
 *
 * Display and manage News and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
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
function saveHomegalleryOrder( n ) {
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
	submitform('homegallery.saveorder');
}
</script>

<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminlist">
	<tr>
		<th width="20" nowrap="nowrap">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->homegallerylist ); ?>);" />
		</th>
		<th class="title"  nowrap="nowrap"><?php echo JText::_('HOMEGALLERY_TITLE'); ?></th>
		<th class="title"  nowrap="nowrap"><?php echo JText::_('HOMEGALLERY_IMAGE'); ?></th>
		<th width="4%"><?php echo JText::_('ORDER'); ?></th>
		<th width="3%">
		<a href="javascript: saveHomegalleryOrder( <?php echo count( $this->homegallerylist )-1; ?> )"><img src="images/filesave.png" border="0" width="16" height="16" alt="Save Order" /></a>
		</th>
        <th width="10%" nowrap="nowrap"><?php echo JText::_('PUBLISHED'); ?></th>
		<th class="title"  nowrap="nowrap" width="20%"><?php echo JText::_('HOMEGALLERY_URL'); ?></th>
		
	</tr>

    <?php
    $k=0;
    $i=0;
    foreach ($this->homegallerylist as $homegallery) 
	{
    	?>
        <tr class="row<?php echo $k; ?>">
        	<td width="20" >
                <input type="checkbox" id="cb<?php echo $i;?>" name="cid[]" value="<?php echo $homegallery->id; ?>" onclick="isChecked(this.checked);" />
        	</td>
          	<td >
          		<a href="#edit" onclick="return listItemTask('cb<?php echo $i;?>','homegallery.edit')" title="<?php echo JText::_('Edit'); ?>">
          		<?php echo $homegallery->homegallery_title; ?>
          		</a>
          	</td>
          	<td><?php echo $homegallery->logo_image;?></td>
          	<td align="center" colspan="2">
			<input type="text" name="order[]" size="5" value="<?php echo $homegallery->ordering; ?>" class="text_area" style="text-align: center" />
			</td>
          	<td align="center">
          	<?php                      	
          	$img = $homegallery->published?'publish_g.png':'publish_r.png';
          	?>
          	<a href="javascript: void(0);" onclick="return listItemTask('cb<?php echo $i; ?>','<?php echo $homegallery->published ? 'homegallery.unpublish' : 'homegallery.publish'; ?>')"><img src="<?php echo $pathIMG . $img; ?>" width="12" height="12" border="0" alt="" /></a>
          	</td>
          	<td><?php echo $homegallery->website_url ;?></td>
          
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
<input type="hidden" name="task" value="homegallery.list" />
<input type="hidden" name="act" value="" />
<input type="hidden" name="option" value="com_homegallery" />
</form>
</div>