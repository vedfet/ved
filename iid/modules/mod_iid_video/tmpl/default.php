<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$db  =& JFactory::getDBO();
$result = null;
$query = "SELECT * FROM #__video_details where id=".$id." AND published = 1";
$db->setQuery($query);
$rows = $db->loadObjectList();
?><div style="background-image:url(<?php echo $background_image; ?>);width:207px;height:72px;margin-top:10px; margin-left:16px; float:left;	">
<?php if($video_type=="youtubevideo"):?>
<a href="<?php echo $id; ?>" rel="shadowbox;width=840;height=450">
		<img src="images/iid_images/video/images/video_top.png" border="0">
	</a>
<?php endif; ?>
<?php if($video_type=="componentvideo"):?>
	<a rel="shadowbox;width=840;height=450" href="images/iid_images/video/<?php echo $rows[0]->video_name; ?>">
		<img src="images/iid_images/video/images/video_top.png" border="0">
	</a>
<?php endif; ?>
<?php if($video_type=="mediavideo"):?>
<a rel="shadowbox;width=840;height=450" href="<?php echo $id;?>">
		<img src="images/iid_images/video/images/video_top.png" border="0">
	</a>
<?php endif; ?>
</div>
