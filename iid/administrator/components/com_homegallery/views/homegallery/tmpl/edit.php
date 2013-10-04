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
				 
				//$cfg = & JNEWSConfig::getInstance();
                JHTML::_('behavior.calendar');
				$editor =& JFactory::getEditor();
				$row=$this->homegallerylist;
				$uri =& JURI::getInstance();
				$uri->root(); //root url
				$uri->base(); //		base url
				$uri->current(); //current url pathj
				
				$uri =& JURI::getInstance();
$url=$uri->root(); //root url

$dir=trim($url,"administrator");
$current_dir=$dir.$this->file_path.'/homegallery';
				
?>


	<div id="property">
	 
	 <form enctype="multipart/form-data" action="index.php" method="post" name="adminForm" >
			
				
			<script language="javascript" type="text/javascript">
			
			function getKeyCode(e){
				if (window.event)
					return window.event.keyCode;
				else if (e)
					return e.which;
				else
					return null;
			}
	
	
			function keyRestrict(e, validchars) 
			{
				var key='', keychar='';
				key = getKeyCode(e);
				if (key == null) return true;
				keychar = String.fromCharCode(key);
				keychar = keychar.toLowerCase();
				validchars = validchars.toLowerCase();
				if (validchars.indexOf(keychar) != -1)
					return true;
				if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
					return true;
				
				return false;
			}

	  	
			function Trim(str){
				while(str.charAt(0) == (" ")){ 
					str = str.substring(1);
				}
				while(str.charAt(str.length-1) == " " )		{
					str = str.substring(0,str.length-1);
				}
				return str;
			}
	 	
			
		function submitbutton(pressbutton) 
			{
				var form = document.adminForm;
				
				if (pressbutton == 'cancel'|| pressbutton == 'homegallery.list') 
				{
					submitform( pressbutton );
					return;
				}
				else
				{
					
					if(form.homegallery_title.value == '')
					{
						alert('Please input title ');
						form.news_title.focus();		
						return false;		
					}
					else if(form.published[0].checked == false && form.published[1].checked == false )
					{
						alert('Please check to publish / unpublish');
						form.published[0].focus();
					}
					else
					{
						submitform( pressbutton );
					}
				}
			}
		
			</script>

			
  			<div class="adminform" align="left">
       		<div style="margin-bottom:20px;">
           
	      

    			
				<table cellpadding="5" cellspacing="0" border="0" >
								
				<tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_TITLE');?>
					</td>
					<td>
					<input type="text" name="homegallery_title" class="inputbox" size="40" value="<?php echo $row->homegallery_title; ?>" maxlength="255" />
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_DESCRIPTION');?>
					</td>
					<td>
					<input type="text" name="homegallery_discription" class="inputbox" size="40" value="<?php echo $row->homegallery_discription;?>" maxlength="255" />
					</td>
				</tr>
                <tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_LEARN_MORE');?>
					</td>
					<td>
					<input type="text" name="website_url" class="inputbox" size="40" value="<?php echo $row->website_url;?>" maxlength="255" />
					</td>
				</tr>
                <tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_LEARN_MORE_TARGET');?>
					</td>
					<td>
					<input type="radio" name="new_window" value='1' <?php echo($row->new_window=='1'?'checked':'');?> />No
					<input type="radio" name="new_window" value='2' <?php echo($row->new_window=='2'?'checked':'');?> />Yes
					
					</td>
				</tr>
                <tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_IMAGE');?>
					</td>
					<td>
					<span id="imagelist" style="display:block;float:left;"><?php echo $this->lists['logo_image']; ?>&nbsp;&nbsp;</span>
					
					</td>
				</tr>
				 <tr>
					<td width="130">
					<?php echo JText::_('HOMEGALLERY_IMAGE_DISPLAY');?>
					</td>
					<td>
					<img name="imagelib" src="<?php echo $current_dir.'/'.$row->logo_image; ?>" />
					
					</td>
				</tr>
				<tr>
					<td width="130">
					<?php echo JText::_('PUBLISH');?>
					</td>
					<td>
					<?php echo JHTML::_('select.booleanlist', 'published', 'class="inputbox"',$row->published );?>
					</td>
				</tr>
                </table>
               
	
						
				
				<tr>
					<td colspan="2">&nbsp;

					</td>
				</tr>
                </table>	
		</div>
		</div>

 <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="homegallery.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="act" value="<?php echo $this->homegallerylist->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo JHOMEGALLERY_COM_COMPONENT;?>" />
</form>

</div>