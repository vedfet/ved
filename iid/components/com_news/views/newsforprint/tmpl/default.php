<?php
 /**
 * Joomla! 1.5 component news
 *
 * @version $Id: router.php 2010-06-03 02:04:32 svn $
 * @author Diwakar
 * @package Joomla
 * @subpackage news
 * @license GNU/GPL
 *
 * Every Days News
 *
 * This component file was created using the Joomla Component Creator by Not Web Design
 * http://www.notwebdesign.com/joomla_component_creator/
 *
 */

// no direct access

 defined('_JEXEC') or die('Restricted access');

 	$logo_width = 0;
		?>

		<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
		<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
		</div>
		<?php endif; ?>
		<hr color="#408080"/>
		
		
		<br/><br/>
		<SCRIPT LANGUAGE="JavaScript">

					function enlargeImage1(image1)
					{
					   image1.height="300"
					}
					function dropImage1(image1)
					{
					   image1.height="150"
					}
					function showMoreInfo()
					{
						document.getElementById("minfoid").style.display='inline';
						document.getElementById("details").style.display='none';
					}
					function hideMoreInfo()
					{
						document.getElementById("minfoid").style.display='none';
						document.getElementById("details").style.display='inline';
					}

		</script>
		<table class="contentpaneopen">			
		<tr>
				<td valign="top" style="font-size:14px; font-style:normal;">
				<span class="blue_head"><strong><?php echo $this->newslist->news_title;?></strong></span>
				</td>
				<td>
				<a href="javascript:window.print();">
					<img src="<?php echo "components/".$option."/images/print.png";?>" width="20" height="20" title="<?php echo JText::_('CLOSE_THIS_NEWS');?>">
				</a>
				<a href="javascript:window.close();">
					<img src="<?php echo "components/".$option."/images/close.jpeg";?>" width="20" height="20" title="<?php echo JText::_('CLOSE_THIS_NEWS');?>">
				</a>
				</td>
				</tr>
				<tr>
				<td>
				<?php if(!empty($this->newslist->logo_image))
				{?>
				<img id="image1" src="index.php?option=com_news&task=showLogoImage&id=<?php echo $this->newslist->id;?>" border="0" height="150"
				<?php echo ($logo_width > 600?'width=600':'');?> ondblclick="enlargeImage1(this);" onclick="dropImage1(this)" alt="image" 
				title="<?php echo $this->newslist->news_title;?>" style="border:1px solid #d0d0d0; background:repeat-x;"/>
				<br/>
				</td>
				</tr>
				<tr>
				<td>
				<font color="#0000FF"><i><?php echo JText::_('DBCLICK_ENLARGE');?></i></font>
				<br/><br/>
				<?php 
				}?>
				<?php echo JText::_('WRITTEN_BY').$this->newslist->contact_person;?><br>
				<?php 
				$d=explode(" ",$this->newslist->created_date);
				$d1=explode("-",$d[0]);
				switch($d1[1])
				{
					case 01:
					  $month=JText::_('January');
					  break;
					case 02:
					  $month=JText::_('February');
					  break;
					case 03:
					  $month=JText::_('March');
					  break;
					case 04:
					  $month=JText::_('April');
					  break;   
					case 05:
					  $month=JText::_('May');
					  break;	  
					case 06:
					  $month=JText::_('June');
					  break;
					case 07:
					  $month=JText::_('July');
					  break;
					case 08:
					  $month=JText::_('August');
					  break;
					case 09:
					  $month=JText::_('September');
					  break; 
					case 10:
					  $month=JText::_('October');
					  break;
					case 11:
					  $month=JText::_('November');
					  break;
					case 12:
					  $month=JText::_('December');
					  break;
					default:
					  break;                 
				}
				
				echo $d1[2]." ".$month." ".$d1[0];
				?>
				</td>
				</tr>
				<br/>
				<tr>
				<td>
				<?php echo $this->newslist->description;?><br><br>
				</td>
				</tr>
				<tr>
				<td>
				<?php if($this->newslist->last_update_format !='')
				{?>
				<?php echo 'Last updated ( '.$this->newslist->last_update_format.' )';?><br><br>
				<?php }?>
				
				<?php if( $this->newslist->contact_person != '' || $this->newslist->contact_title != '' ||
				$this->newslist->address_line1 != '' || $this->newslist->address_line2 != '' ||
				$this->newslist->city != '' || $this->newslist->state !='' || $this->newslist->zip_code !='0' ||
				$this->newslist->phone != '' || $this->newslist->email != '')
				{?>
				<div id="details" style="display:inline;">
				<img src="components/<?php echo $option;?>/images/details.jpg" width="100" height="30" onclick="showMoreInfo();" style="cursor:pointer;" title="<?php echo JText::_('CLICK_MORE_INFO');?>" border="0"/>
				</div>
				
				<font color="#0000FF" style="font-style:italic;"><?php //echo JText::_('CLICK_MORE_INFO');?></font>
				<?php }?>
				<div id="minfoid" style="display:none;">
				<div id="hideminfoid">
					<img src="components/<?php echo $option;?>/images/hide.jpg" width="100" height="30" onclick="hideMoreInfo();" style="cursor:pointer;" title="<?php echo JText::_('CLICK_HIDE_INFO');?>" border="0"/>
				</div>
				
				
				<?php if($this->newslist->contact_person != '')
				{?>
				<?php echo $this->newslist->contact_person;?><br>
				<?php }?>
				
				<?php if($this->newslist->contact_title != ''){?>
				<?php echo $this->newslist->contact_title;?><br>
				<?php }?>
				
				<?php if($this->newslist->address_line1 != ''){?>
				<?php echo $this->newslist->address_line1;?><br>
				<?php }?>
				
				<?php if($this->newslist->address_line2 != ''){?>
				<?php echo $this->newslist->address_line2;?><br>
				<?php }?>
				
				<?php if($this->newslist->city != '' || $this->newslist->state !='' || $this->newslist->zip_code !='0'){?>
				<?php echo $this->newslist->city;?>, <?php echo $this->newslist->state;?> <?php echo $this->newslist->zip_code;?><br>
				<?php }?>
				
				<?php if($this->newslist->phone != ''){?>
				<?php echo $this->newslist->phone;?><br>
				<?php }?>
				
				<?php if($this->newslist->email != ''){?>
				<a href="mailto:<?php echo $this->newslist->email;?>"><?php echo $this->newslist->email;?></a>
				<?php }?>
				</div>
				</td>
				</tr>
				</table>
	
