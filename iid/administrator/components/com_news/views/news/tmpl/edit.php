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
				$row=$this->newslist;
				$uri =& JURI::getInstance();
				$uri->root(); //root url
				$uri->base(); //		base url
				$uri->current(); //current url pathj
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

	  
			function isEmail(str)
			{
				// Should not beging with a '.' or '@'
				if(str.charAt(0)=='@' || str.charAt(0) == '.')
				{	
					return false;
				}
				 
				var regex = /^[-_.a-z0-9]+@(([-_a-z0-9]+\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i;
				return regex.test(str);
				
			}
			
			function validateUSPhone( strValue ) 
			{
			/************************************************
			DESCRIPTION: Validates that a string contains valid
			  US phone pattern.
			  Ex. (999) 999-9999 or (999)999-9999
			
			PARAMETERS:
			   strValue - String to be tested for validity
			
			RETURNS:
			   True if valid, otherwise false.
			*************************************************/
			  var objRegExp  = /^\([1-9]\d{2}\)\s?\d{3}\-\d{4}$/;
			
			  //check for valid us phone with or without space between
			  //area code
			  return objRegExp.test(strValue);
			}
			
			function validate_us_phone(val)
			{
			if(val.length < 14){
				return false;
			}else{
				return true;
			}
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
	 	
			function isValidUSZip(sZip) 
			{
			   return /^\d{5}(-\d{4})?$/.test(sZip)||/^\d{6}(-\d{4})?$/.test(sZip);
			}
	
	
			function submitbutton(pressbutton) 
			{
				var form = document.adminForm;
				
				if (pressbutton == 'cancel'|| pressbutton == 'news.list') 
				{
					submitform( pressbutton );
					return;
				}
				else
				{
					
					<?php echo $editor->getContent( 'description' ); ?>
					if(form.created_date.value == '')
					{
						alert('Please Enter News Creation Date');
						form.created_date.focus();
						return false;
					}
					else if(form.news_title.value == '')
					{
						alert('Please input news title ');
						form.news_title.focus();		
						return false;		
					}
					else if(form.short_description.value == '')
					{
						alert('Please input short description');
						form.short_description.focus();		
						return false;		
					}
					else if(form.zip_code.value == ''||!isValidUSZip(form.zip_code.value))
					{
						alert('Please enter proper zipcode');
						form.zip_code.focus();		
						return false;		
					}
					else if(form.phone.value == '')
					{
						alert('Please Enter Phone Number');
						form.phone.focus();		
						return false;		
					}
					else if(form.email.value == ''||!isEmail(form.email.value))
					{
						alert('Please input Valid Email Address');
						form.email.focus();		
						return false;		
						
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
           
	      

    			
				 <fieldset><legend><?php echo JText::_('NEWS_DETAILS');?></legend>
                <table cellpadding="5" cellspacing="0" border="0" >
				<tr>
					<td width="130">
					<?php echo JText::_('DATE');?>
					</td>
					<td  valign="top"> 
                    <div>
                    <?php  
                    if(!empty($row->created_date))
                    {
                    $dateparts=explode('-',$row->created_date);
                    $d=$dateparts[1].'/'.$dateparts[2].'/'.$dateparts[0];
                    }
                    else
                    {$d='';}
                    JHTML::_('behavior.calendar'); 
                    echo JHTML::_('calendar',$d,'created_date','created_date','%m/%d/%y', array('class'=>'inputbox', 'size'=>'10','maxlength'=>'19', 'readonly'=>'readonly'));
                    
                         ?>
                    </div>
				   </td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('NEWS_TITLE');?>
					</td>
					<td>
					<input type="text" name="news_title" class="inputbox" size="40" value="<?php echo $row->news_title; ?>" maxlength="255" />
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('SHORT_DESCRIPTION');?>
					</td>
					<td>
					<textarea name="short_description" class="inputbox" rows="5" cols="80"><?php echo $row->short_description; ?></textarea>
					</td>
				</tr>
                
                <tr>
					<td width="130" valign="top">
					<?php echo JText::_('LOGO_IMAGE');?>
					</td>
					<td>
							<input type="hidden" name="MAX_FILE_SIZE" value="10000000"/>
							<input type="file" name="uploadedfile">&nbsp;&nbsp;&nbsp; <?php echo JText::_('MAX_WIDTH');?>
							<br><br>
							<?php //if(!empty($row->logo_image)){?>
							<img src="index2.php?option=<?php echo $option;?>&task=news.showLogoImage&id=<?php echo $row->id; ?>" alt="image" style="border:1px solid 
							#d0d0d0;" width="80" height="80"/>
							<?php //} ?>
					</td>
				</tr>
                <tr>
					<td width="130">
					<?php echo JText::_('DESCRIPTION');?>
					</td>
					<td>
					 <?php
                    // parameters : areaname, content, hidden field, width, height, rows, cols
echo $editor->display( 'description',htmlspecialchars($row->description, ENT_QUOTES), "100%", 250, '70', '10', array("readmore","pagebreak")) ;
//echo $editor->display( 'description',  htmlspecialchars($row->description, ENT_QUOTES), '450', '250', '60', '20', array('pagebreak', 'readmore') ) ;
                    ?>
					
					</td>
				</tr>
                </table>
               
				</fieldset>
				<fieldset><legend><?php echo JText::_('CONTACT_DETAILS');?></legend>
                <table cellpadding="5" cellspacing="0" border="0" >
				<tr>
					<td width="130">
					<?php echo JText::_('CONTACT_PERSON');?>
					</td>
					<td>
					<input type="text" name="contact_person" class="inputbox" size="40" value="<?php echo $row->contact_person; ?>" maxlength="50" />
					</td>
				</tr>
			
				<tr>
					<td width="130">
						<?php echo JText::_('TITLE');?>
					</td>
					<td>
					<input type="text" name="contact_title" class="inputbox" size="40" value="<?php echo $row->contact_title; ?>" maxlength="50" />
					</td>
				</tr>	
				
				
				<tr>
					<td width="130">
					<?php echo JText::_('ADDRESS1');?>
					</td>
					<td>
					<input type="text" name="address_line1" class="inputbox" size="40" value="<?php echo $row->address_line1; ?>" maxlength="50" />
                      <span class="hasTip" title="<?php echo JText::_('NEWS_ADDRESS1_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('ADDRESS2');?>
					</td>
					<td>
					<input type="text" name="address_line2" class="inputbox" size="40" value="<?php echo $row->address_line2; ?>" maxlength="50" />
                     <span class="hasTip" title="<?php echo JText::_('NEWS_ADDRESS2_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('CITY');?>
					</td>
					<td>
					<input type="text" name="city" class="inputbox" size="40" value="<?php echo $row->city; ?>" maxlength="50" />
                     <span class="hasTip" title="<?php echo JText::_('NEWS_CITY_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('STATE');?>
					</td>
					<td>
					<input type="text" name="state" class="inputbox" size="20" value="<?php echo $row->state; ?>" maxlength="20" />
                     <span class="hasTip" title="<?php echo JText::_('NEWS_STATE_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>
				
				<tr>
					<td width="130">
					<?php echo JText::_('ZIP_CODE');?>
					</td>
					<td>
					<input type="text" name="zip_code" class="inputbox" size="20" value="<?php echo $row->zip_code; ?>" maxlength="5"  onKeyPress="return keyRestrict(event,'1234567890');" /> <span class="hasTip" title="<?php echo JText::_('NEWS_ZIPCODE_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>

				<tr>
					<td width="130">
					<?php echo JText::_('PHONE');?>
					</td>
					<td>
					<input type="text" name="phone" class="inputbox" size="40" value="<?php echo $row->phone; ?>" maxlength="20" onkeydown="javascript:backspacerDOWN(this,event);" onkeyup="javascript:backspacerUP(this,event);"/>Ex: 
(111)111-1111
					</td>
				</tr>

				<tr>
					<td width="130">
					<?php echo JText::_('EMAIL');?>
					</td>
					<td>
					<input type="text" name="email" class="inputbox" size="40" value="<?php echo $row->email; ?>" maxlength="50" />
                     <span class="hasTip" title="<?php echo JText::_('NEWS_EMAIL_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>

				<tr>
					<td width="130">
					<?php echo JText::_('WEBSITE');?>
					</td>
					<td>
					<input type="text" name="website_url" class="inputbox" size="40" value="<?php echo $row->website_url; ?>" maxlength="250" />
                     <span class="hasTip" title="<?php echo JText::_('NEWS_WEBSITE_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span>
					</td>
				</tr>
                </table>
				</fieldset>
               
                
                <fieldset><legend><?php echo JText::_('NEWS_SETTINGS');?></legend>
                  <table cellpadding="5" cellspacing="0" border="0" >
				<tr>
					<td width="130">
					<?php echo JText::_('NEWS_LAYOUT');?>
					</td>
					<td>
					<select name="news_layout">
						<option value='1' <?php echo($row->news_layout=='1'?'selected':'');?>>One Column</option>
						<option value='2' <?php echo($row->news_layout=='2'?'selected':'');?>>Two Column</option>
					</select>
                    <span class="hasTip" title="<?php echo JText::_('NEWS_LAYOUT_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span> 
					</td>
				</tr>
				<tr>
					<td width="130">
					<?php echo JText::_('PUBLISH_FRONT_PAGE');?>
					</td>
					<td>
					<?php echo JHTML::_('select.booleanlist',  'publish_frontpage', 'class="inputbox"',  $row->publish_frontpage );?>
					<span class="hasTip" title="<?php echo JText::_('PUBLISHED_FRONTPAGE_HASTIP'); ?>"><a href=" " ><img src="../administrator/components/com_news/assets/images/icon.jpg" border="0" alt="information" width="20" height="20" align="absmiddle"/></a></span> 
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
						
				
				<tr>
					<td colspan="2">&nbsp;

					</td>
				</tr>
                </table>
  			</fieldset>		
		</div>
		</div>

 <input type="hidden" name="boxchecked" value="0" />
    <input type="hidden" name="task" value="news.save" />
	<input type="hidden" name="id" value="<?php echo (int)$row->id; ?>" />
    <input type="hidden" name="act" value="<?php echo $this->newslist->cssclass; ?>" />
    <input type="hidden" name="option" value="<?php echo JNEWS_COM_COMPONENT;?>" />
</form>

</div>