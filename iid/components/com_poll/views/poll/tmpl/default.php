<?php // no direct access
defined('_JEXEC') or die('Restricted access');

$poll=$this->poll_details;
$options=$this->poll_opts;
$menu = &JSite::getMenu();

$items	= $menu->getItems('link', 'index.php?option=com_poll&view=poll');

$itemid = isset($items[0]) ? '&Itemid='.$items[0]->id : '';
 ?>
 <?php if ($this->params->get( 'show_page_title', 1)) : ?>
<div class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
<?php endif; ?>
<form action="index.php" method="post" name="form2">
<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<label for="id">
		<a href="<?php echo JRoute::_("index.php?option=com_poll".$itemid); ?>" >Take Another Quiz Question</a>
		
	</label>
</div>
<table width="95%" border="0" cellspacing="0" cellpadding="1" align="center" class="poll">

<thead>
	<tr>
		<td style="font-weight: bold;">
			<?php echo $poll->title; ?>
		</td>
	</tr>
</thead>
	<tr>
		<td align="">
			<table class="pollstableborder" cellspacing="0" cellpadding="0" border="0">
			<?php for ($i = 0, $n = count($options); $i < $n; $i ++) : ?>
				<tr>
					<td class="<?php echo $tabclass_arr[$tabcnt]; ?>" valign="top">
						<input type="radio" name="voteid" id="voteid<?php echo $options[$i]->id;?>" value="<?php echo $options[$i]->id;?>" alt="<?php echo $options[$i]->id;?>" />
					</td>
					<td class="<?php echo $tabclass_arr[$tabcnt]; ?>" valign="top">
						<label for="voteid<?php echo $options[$i]->id;?>">
							<?php echo $options[$i]->text; ?>
						</label>
					</td>
				</tr>
				<?php
					$tabcnt = 1 - $tabcnt;
				?>
			<?php endfor; ?>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<div align="center">
				<input type="submit" name="task_button" class="button" value="Submit" />
				&nbsp;
				
			</div>
		</td>
	</tr>
</table>

	<input type="hidden" name="option" value="com_poll" />
	<input type="hidden" name="Itemid" value="<?php echo $items[0]->id;?>" />
	<input type="hidden" name="task" value="vote" />
	<input type="hidden" name="id" value="<?php echo $poll->id;?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>