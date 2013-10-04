<?php
/*
 * ARI Ext menu Joomla! module
 *
 * @package		ARI Ext Menu Joomla! module.
 * @version		1.0.0
 * @author		ARI Soft
 * @copyright	Copyright (c) 2009 www.ari-soft.com. All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
 * 
 */

defined('ARI_FRAMEWORK_LOADED') or die('Direct Access to this location is not allowed.');

$menuId = AriUtils2::getParam($params, 'menuId', '');
$menu = $params['menu'];
$level = $params['level'];
$parentId = $params['parentId'];
$gid = $params['gid'];
$selectedId = AriUtils2::getParam($params, 'selectedId', 0);
$direction = AriUtils2::getParam($params, 'direction');

$ulClass = $level == 0 ? 'ux-menu' : 'ux-menu-sub ux-menu-init-hidden';
if ($level == 0)
	$ulClass .= $direction == 'horizontal' ? ' ux-menu-horizontal' : ' ux-menu-vertical';	
?>

<?php
if ($menu):
?>
	<ul<?php if ($menuId): ?> id="<?php echo $menuId; ?>"<?php endif; ?> class="<?php echo $ulClass; ?>">
		<?php
			$i = 0;
			$j = -1;
			$menuCnt = count($menu);
			foreach ($menu as $menuItem):
				++$j;
				if ($menuItem->access == 2 && $gid == 18)
					continue ;
				
				$hasChilds = isset($menuItem->children) && count($menuItem->children) > 0;
				if ($menuItem->parent != $parentId || ($menuItem->type == 'separator' && !$hasChilds)) continue;

				$menuParams = new JParameter($menuItem->params);
				$link = $menuItem->link;
				$menuType = $menuItem->type;
				if ($menuItem->type == 'menulink')
				{
					$aliasId = AriJoomlaMenuHelper::getItemId($link);
					if ($aliasId > 0 && isset($menu[$aliasId]))
					{
						$aliasMenuItem =& $menu[$aliasId];
						$menuType = $aliasMenuItem->type;
						$link = $aliasMenuItem->link;
					}
				}

				if ($link && $menuType == 'component')
				{ 
					$link .= (strpos($link, '?') !== false) ? '&' : '?';
					$link .= 'Itemid=' . $menuItem->id;
				}

				$isSelected = ($menuItem->id == $selectedId);
				$id = $menuItem->id;
				$subMenu = $hasChilds ? $menuItem->children : null;
				$aAttr = array();
				if ($link)
				{
					if (strcasecmp(substr($link, 0, 4), 'http'))
					{
						$secure = $menuParams->def('secure', 0);
						$link = JRoute::_($link, true, $secure);
					}
					
					$link = AriJoomlaUtils::getLink($link, true, false);
					switch ($menuItem->browserNav)
					{
						case 1:
							$aAttr['target'] = '_blank';
							break;
							
						case 2:
							$aAttr['onclick'] = "window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,');return false;";
							break;
					}
				}
				else 
				{ 
					$link = 'javascript:void(0);';
				}
					
				$aAttr['href'] = $link;
				
				$liClass = $level == 0 ? 'ux-menu-item-main' : '';
				if ($hasChilds)
					$liClass .= ' ux-menu-item-parent';
				$liClass .= ' ux-menu-item' . $menuItem->id;
				if ($level == 0)
					$liClass .= ' ux-menu-item-parent-pos' . $i;
					
				$aClass = '';
				if ($i == 0)
					$aClass = 'ux-menu-link-first';
				if ($i == $menuCnt - 1)
					$aClass .= ' ux-menu-link-last';
				if ($menuItem->id == $selectedId)
					$aClass .= ' current';
				if ($hasChilds)
					$aClass .= ' ux-menu-link-parent';
				if ($aClass)
					$aAttr['class'] = $aClass;
		?>
			<li<?php if ($liClass): ?> class="<?php echo $liClass; ?>"<?php endif; ?>><a<?php echo AriHtmlHelper::getAttrStr($aAttr); ?>><?php echo stripslashes(htmlspecialchars($menuItem->name)); ?></a>
			<?php
				if ($subMenu):
					AriTemplate::display(__FILE__,
						array(
							'menu' => $subMenu,
							'level' => $level + 1,
							'parentId' => $id,
							'selectedId' => $selectedId,
							'gid' => $gid));
				endif;
			?>
			</li>
		<?php
				++$i;
			endforeach;
		?>
	</ul>
<?php
endif; 
?>