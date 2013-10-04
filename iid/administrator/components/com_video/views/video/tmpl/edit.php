<?php 
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: edit.php 2010-06-03 01:08:55 svn $
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
JHTML::_('behavior.calendar');
$editor =& JFactory::getEditor();
$row=$this->listvideo;
$rows=$this->listvideoconfig;
$uri =& JURI::getInstance();
$url=$uri->root(); //root url

$dir=trim($url,"administrator");
$video_path=$dir.$this->file_path.'/video';
?>


<div id="video">



<script language="javascript" type="text/javascript">
		
		
		function isFormat(ffname)
		{
			var extension = new Array();
			extension[0] = ".png";
			extension[1] = ".jpeg";
			extension[2] = ".jpg";
			extension[3] = ".gif";
			extension[4] = ".PNG";
			extension[5] = ".JPEG";
			extension[6] = ".JPG";
			extension[7] = ".GIF";
			var thisext = ffname.substr(ffname.lastIndexOf('.'));
			var x=0;
			for(var i = 0; i < extension.length; i++) {
				if(thisext == extension[i]) { x=1;}
			}
			return x;
		}
		function IsNumeric(sText)
        {
              var ValidChars = "0123456789.";
              var IsNumber=true;
              var Char;

              for (i = 0; i < sText.length && IsNumber == true; i++) 
              { 
                       Char = sText.charAt(i); 
                       if (ValidChars.indexOf(Char) == -1) 
                       {
                            IsNumber = false;
                       }
              }
              return IsNumber;
   
        }

 
 
  


		function submitbutton(pressbutton) {
			var form = document.adminForm;
			
			// do field validation
			if ((pressbutton == 'cancel') || (pressbutton == 'video.list')) 
			{
				submitform( pressbutton );
				return;
			}
			if (form.video_title.value =='')
			{
				alert( "Enter Video Title" );
				form.video_name.focus();
				return;
			}
			if ((form.video_name.value =='') && (form.video_name_list.selectedIndex==0))
			{
				alert( "Enter select or browse a video" );
				form.video_name.focus();
				return;
			}
			else if((form.image_name.value !='') && (isFormat(form.image_name.value)==0) ) 
			{
				alert( "Video Thumbnail must be in png,jpeg,gif format" );
				form.image_name.value='';
				form.image_name.focus();
				return;
			}
			else 
			{
				submitform( pressbutton );
		    }
		
		}
		
		function videoList()
		{
			document.getElementById('videolist').style.display='block';
			document.getElementById('newvideo').style.display='none';
			document.getElementById('newvideoclick').style.display='block';
			document.getElementById('videolistclick').style.display='none';
			document.getElementById('video_name').value='';
		}
		function newVideo()
		{
			document.getElementById('videolist').style.display='none';
			document.getElementById('newvideo').style.display='block';
			document.getElementById('newvideoclick').style.display='none';
			document.getElementById('videolistclick').style.display='block';
			form.video_name_list.selectedIndex=0;
		}
		function changeVideoPlay()
		{
			
			document.getElementById('rowVideo').style.display='none';
			document.getElementById('changeVideo').style.display='block';
			document.getElementById('changeVideo').innerHTML='<embed height="247" width="368" flashvars="file='+document.getElementById('files').value+'&autostart=false" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" quality="high" bgcolor="#FFFFFF" name="ply1" id="ply1" style="" src="<?php echo $uri->root().'/images/video/jwplayer.swf'; ?>" type="application/x-shockwave-flash"/></embed>'
		}
		</script>
		</script>
		<?php 	
		?>
<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >		
  <div class="adminform" align="left">
       	<div style="margin-bottom:20px;">
		
		<fieldset class="adminform">
		<legend><?php echo JText::_( 'VIDEO_DETAILS' ); ?></legend>
	    <table cellpadding="5" cellspacing="0" border="0" >
        <table class="admintable">
    	<tbody>			

             <tr>
              <td align="right" class = "key"><?php echo JText::_('VIDEO_TITLE');?>:</td>
              <td colspan="2"><input class="text_area" type="text" name="video_title" size="50" maxlength="250" value="<?php echo $row->video_title;?>" /></td>
            </tr>
			
			
           
            
		
            <tr>
              <td align="right" class = "key"><?php echo JText::_('VIDEO_DESCRIPTION');?>:</td>
              <td colspan="2"><?php
                    // parameters : areaname, content, hidden field, width, height, rows, cols
                    echo $editor->display( 'description',  htmlspecialchars( $row->description, ENT_QUOTES, 'UTF-8'), "100%", 250, '70', '10', array("readmore","pagebreak")) ;
                    ?>
              </td>
            </tr>
             <tr>
					 <td align="right" class = "key"> *<?php echo JText::_('VIDEO_NAME');?>:</td>
					<td>
						<span id="videolist" style="display:block;float:left;"><?php echo $this->lists['video_name']; ?>&nbsp;&nbsp;</span>
						<span id="newvideo" style="display:none;float:left;"><input type="file" name="video_name" id="video_name" size="50"/>&nbsp;&nbsp;</span><span style="display:block;float:left;cursor:pointer;" id="newvideoclick" onclick="newVideo();"><?php echo JText::_('ADDNEW');?></span> <span style="display:none;float:left;cursor:pointer;" id="videolistclick" onclick="videoList();"><?php echo JText::_('BACKBUTTON'); ?></span>                				
					</td>
			</tr>


            <tr>
              <td valign="top" align="right" class = "key"><?php echo JText::_('IMAGE');?>: </td>
              <td width="32%"  valign="top"><input type="file" name="image_name"  class="inputbox" /><span class="hasTip" title="<?php echo JText::_('VIDEO_IMAGE_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_video/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>              </td>
              <td width="44%"  valign="top"><?php echo JText::_('IMAGE_DETAIL');?><?php if(strlen($row->image_name) > 0) { ?><img src="<?php echo "../components/".VIDEO_COM_COMPONENT."/images/".$row->image_name;?>" width="105" height="78" align="left" />
			<?php } ?> </td>
            </tr>
          
		   <tr>
              <td valign="top" align="right" class = "key"> <?php echo JText::_('PUBLISHED');?>:  </td>
              <td>
					<?php echo JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $row->published );?>
			 </td>
            </tr>
             <tr>
					<td valign="top" align="right" class = "key"><?php echo JText::_('VIDEOPREVIEW');?> </td>
					<td>
					<div id="rowVideo" style="display:block;">
					  	<?php if($row->video_name){?>
					  <embed height="247" width="368" flashvars="file=<?php echo $row->video_name;?>&autostart=false" wmode="opaque" allowscriptaccess="always" allowfullscreen="true" quality="high" bgcolor="#FFFFFF" name="ply1" id="ply1" style="" src="<?php echo $video_path.'/jwplayer.swf'; ?>" type="application/x-shockwave-flash"/></embed>
						<?php }?>		
					 </div>
					 <div id="changeVideo" style="display:none;">
					 	
					 </div>
			 	   </td>
			</tr>
    </tbody>      
</table>
    <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="video.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="act" value="<?php echo $this->listvideo->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo VIDEO_COM_COMPONENT;?>" />
</form>

</div>

