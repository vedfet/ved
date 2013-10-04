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
?>
<div id="subscriptionmanager">
   <?php if (isset($this->warning)){
   	?>
		<dl id="system-message">
		<dt class="notice"><?php echo JText::_('MESSAGE');?></dt>
		<dd class="notice fade">
			<ul>
				<li><?php echo $this->warning;?></li>
			</ul>
		</dd>
		</dl>   	
   	<?php
   }
   ?>
   <form action="index.php" method="post" name="adminForm" >
	<table width="90%" border="0" cellpadding="2" cellspacing="2" class="adminform">
	
		<tr>
			<td width="100%" valign="top">
				<div id="cpanel">
				<?php				
				$link = "index.php?option=$option&task=news.list";
				$this->_quickiconButton( $link, "icon-48-category.png", JText::_('MANAGE_NEWS')  ,"/administrator/templates/khepri/images/header/");
				?>
				</div>
			</td>
		</tr>
  </table>
 
  <input type="hidden" name="task" value="cpanel" />
  <input type="hidden" name="act" value="" />
  <input type="hidden" name="option" value="<?php echo JNEWS_COM_COMPONENT; ?>" />
</form>
</div>
