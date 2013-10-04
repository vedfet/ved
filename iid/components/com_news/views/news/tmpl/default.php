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

			defined('_JEXEC') or die('Restricted access'); ?>	
					
			<?php 
$itemId = JRequest::getVar('Itemid');
$document = &JFactory::getDocument();
			$renderer = $document->loadRenderer('modules');
			$options = array('style'=>'raw');
			echo $renderer->render('user9',$options,null); ?> 
  			<div class="content_heading_t2">
			<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
			<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $this->escape($this->params->get('page_title')); ?>
			</div>
			<?php endif; ?>
			
			</div>
			<?php if($this->total>0)
			{
			?>
			<style>
			a#active_menu { background:#C0C0C0; }
			</style>
  			<table width="100%" border="0" cellspacing="2" cellpadding="6" align="center" class="" background="">
        	<tr>
				<td align="left" nowrap="nowrap" width="120">
				<a href="index.php?option=<?php echo $option;?>&sort_by=created_date&Itemid=<?php echo $itemId; ?>" 
				class="mainlevel" id="<?php echo ($this->sort_by=='created_date'?'active_menu':'');?>">
				<b><?php echo JText::_('SORT_BY_RECENT');?></b></a>				
				</td>
				<td width="10" align="left">&nbsp;|&nbsp;</td>
				<td align="left" width="470"><a href="index.php?option=<?php echo $option;?>&sort_by=hits&Itemid=<?php echo $itemId; ?>" 
				class="mainlevel" id="<?php echo ($this->sort_by=='hits'?'active_menu':'');?>"><b><?php echo JText::_('SORT_BY_POPULAR');?></b></a>				
				</td>
			</tr>
			</table>
				
			<?php
			$k = 0;
			
			for ($i=0, $n=count($this->newslist); $i < $n; $i++) 
			{
			$link 	= 'index.php?option='.$option.'&task=view&view=detailsnews&hidemainmenu=1&id='.$this->newslist[$i]->id;
			$img 	= $row->published ? 'tick.png' : 'publish_x.png';
			$task 	= $row->published ? 'unpublish' : 'publish';
			$alt 	= $row->published ? 'Published' : 'Unpublished';
			?>
			<table class="" width="100%">			
			<tr>				
			<td valign="top" colspan="2">
			<?php
			$total_rows = count($rows);
			
			$row = $rows[$i];
			?>
			
				
				<span class="blue_head"><strong><?php echo $this->newslist[$i]->news_title;?></strong></span><br>
                <?php 
				$d=explode(" ",$this->newslist[$i]->created_date);
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
				<br>
				<?php echo $this->newslist[$i]->short_description;?><br>
				<a href="index.php?option=<?php echo $option;?>&id=<?php echo $this->newslist[$i]->id;?>&task=view&view=detailsnews&Itemid=<?php echo $itemId; ?>">
				<?php echo JText::_('MORE');?><img src="components/<?php echo $option;?>/images/more.png" border="0" style="vertical-align:middle;"></a><br><br>
				  </td>
				  <?php
				  if(!empty($this->newslist[$i]->logo_image))
				  {
				  ?>
				  <td align="right">
					<a href="index.php?option=<?php echo $option;?>&id=<?php echo $this->newslist[$i]->id;?>&task=view&view=detailsnews&Itemid=<?php echo $itemId; ?>">
					<img id="image1" src="index.php?option=com_news&task=showLogoImage&id=<?php echo $this->newslist[$i]->id;?>" border="0" height="70" width="70" 
					title="<?php echo $this->newslist[$i]->news_title;?>" style="border:1px solid #d0d0d0; background:repeat-x;"/></a>
				  </td>
				  <?php
				  }
				  ?>
			  
			</tr>
			</table>
			<?php
			$k = 1 - $k;
			}
			}
			else
			{?>
			 <div align="center" style="border:medium; border-color:#EBEBEB"><?php echo JText::_('NO_NEWS_AVAILABLE'); ?></div>
			<?php
			}
			?>		  
		    <?php if($this->total>$this->limit)
			{
			?>
			<table width="100%" align="center" background=""> 
			<tr>
			<td valign="top" align="center" style="color:#0000FF;">
			<?php echo "<strong>".$this->pagination->getPagesLinks()."</strong>"; ?>
			</td>
			</tr>
			<tr>
			<td valign="top" align="center" style="color:#0000FF;">
			<?php echo $this->pagination->getPagesCounter(); ?>
			</td>
			</tr>
			</table>
			<?php
			}
	  ?>