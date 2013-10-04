<?php
/**
 * Joomla! 1.5 component Video
 *
 * @version $Id: controller.php 2010-03-14 01:52:14 svn $
 * @author Vinod Dubey
 * @package Joomla
 * @subpackage Video
 * @license GNU/GPL
 *
 * Display and manage Video and related items 
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access
 defined('_JEXEC') or die('Restricted access'); 
$dir=trim($url,"administrator");
 $uri =& JURI::getInstance();
$url=$uri->root(); 
$params = &JComponentHelper::getParams( 'com_media' );               
		$file_path=$params->get('file_path');
$video_path=$url.$file_path.'/video';
  ?>
  <table width="500" border="0" cellspacing="2" cellpadding="6" align="center" class="contentpane">
        <tr>
              <td colspan=2 align =center><h1><span class="colorgreen">Video Detail</span></h1></td>
        </tr>
			
		<?php $count=1; foreach($this->videodetails as $videodetails) { ?>

	     <tr>
		          <td  width=100 >Video Name:</td><td ><?php echo $videodetails->video_name;?></td>
		 </tr>
		  <tr>
		          <td  width=100 >Video Title:</td><td ><?php echo $videodetails->video_title;?></td>
		 </tr>
		  <tr>
		          <td  width=100 valign="top">Video:</td><td ><embed height="247" width="368" flashvars="file=<?php echo $videodetails->video_name;?>&autostart=false" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" quality="high" bgcolor="#FFFFFF" name="ply1" id="ply1" style="" src="<?php echo $video_path.'/jwplayer.swf'; ?>" type="application/x-shockwave-flash"/></embed></td>
		 </tr>
		  <?php $count++; } 
		  ?>
		  <tr >
		          <td colspan=2 align="center"><a href="index.php?option=com_video">Go Back</a></td>
		 </tr>			                      
</table>