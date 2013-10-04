<?php 
/**
 * Joomla! 1.5 component video
 *
 * @version $Id: video.php 2010-06-03 01:08:55 svn $
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

?>
<div id="subscriptionmanager">
   <?php if (isset($this->warning)){
   	?>
		<dl id="system-message">
		<dt class="notice">Message</dt>
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
				$link = "index.php?option=$option&task=video.list";
				$this->_quickiconButton( $link, "icon-48-category.png", JText::_('Manage Video')  ,"/administrator/templates/khepri/images/header/");
				$link = "index.php?option=$option&task=video.list&archive=-1";
				$this->_quickiconButton( $link, "icon-48-category.png", JText::_('Manage Archive' )  ,"/administrator/templates/khepri/images/header/");
				$link = "index.php?option=$option&task=videoconfig.edit";
				$this->_quickiconButton( $link, "icon-48-category.png", JText::_('Manage Video Configuration' )  ,"/administrator/templates/khepri/images/header/");
				?>
				</div>
			</td>
		</tr>
  </table>
 
  <input type="hidden" name="task" value="cpanel" />
  <input type="hidden" name="act" value="" />
  <input type="hidden" name="option" value="<?php echo VIDEO_COM_COMPONENT; ?>" />
</form>
</div>
