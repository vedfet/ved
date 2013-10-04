<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$path=JURI::base();
$database  =& JFactory::getDBO();
$result = null;
?>
<?php

$query = "SELECT * "
. "\n FROM #__homegallery AS n where published=1"
. "\n ORDER BY RAND() LIMIT 1 "
;

$database->setQuery( $query );
$rows = $database->loadObjectList();

$img = $path."/images/iid_images/".$folder_name."/".$rows[0]->logo_image ;
$linktitle = $rows[0]->homegallery_title;
$linktext = $rows[0]->homegallery_discription;
$linkurl = $rows[0]->website_url;
$linktarget = $target;

?>
<div class="bannertext"><span class="leftpadd"><div id="message"><?php echo $linktext; ?></div><div><a style="color:#00749a;" href="<?php echo $linkurl; ?>">Learn More</a></div></span></div>
<a id="anc-sliderlink" href="<?php echo $linkurl; ?>" target="<?php echo $linktarget; ?>"><img id="banner_section_left"  width="209" height="335" src="<?php echo $img; ?>" /></a>




