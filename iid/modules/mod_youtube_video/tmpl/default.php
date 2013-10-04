<?php // no direct access 
defined('_JEXEC') or die('Restricted access'); 

  $height = $params->get('height', '');
  $width  = $params->get('width', '');
?>

<style>
	/*********Video Section Css Start here *****************/
		.videobg
		{
			width:<?php echo $width; ?>px;
			height:<?php echo $height; ?>px;
			float:left;
			background:	url(<?php echo $background_image; ?>) no-repeat;
                        margin-top:10px;  
                        behavior:url("iepngfix.htc");                     
		}
		.videoinnerbg
		{
			width:<?php echo $width; ?>px;
			height:<?php echo $height; ?>px;
			float:left;
			cursor:pointer;
			background:url(images/iid_images/video/images/BlackPlayer.jpg) no-repeat;
			behavior:url("iepngfix.htc");
		}
		
		.video_text
		{
			width:263px;
			height:47px;
			float:left;
			padding-top:95px;
			font-family:Arial, Helvetica, sans-serif;
			font-size:12px;
			color:#000000;
			text-decoration:underline;
			font-weight:normal;
                        text-align: center;
		}
	
/*********Video Section Css end here *****************/

</style>
<?php if($video_type=="youtubevideo"):?>
<a href="<?php echo $id;?>&autoplay=1" rel="shadowbox;width=840;height=450">
<div class="videobg">
 <div class="videoinnerbg">
  <div class="video_text">
   
  </div>
 </div>
</div>
</a>
<?php endif; ?>

<?php if($video_type=="componentvideo"):?>
<a rel="shadowbox;width=840;height=450" href="images/iid_images/video/<?php echo $video->video_name; ?>">
 <div class="videobg">
		<div class="videoinnerbg">
			<div class="video_text">
       			
 			 </div>
		</div>
      
</div>
</a>

<?php endif; ?>

<?php if($video_type=="mediavideo"):?>
<a rel="shadowbox;width=840;height=450" href="images/mon_images/video/<?php echo $id;?>&autoplay=1">
<div class="videobg">
		<div class="videoinnerbg">
			<div class="video_text">
       			
  			</div>
		</div>
      

</div>
</a>
<?php endif; ?>
  

