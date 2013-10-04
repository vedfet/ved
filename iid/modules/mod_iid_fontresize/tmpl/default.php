<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$path=JURI::base();
if($_GET['view'] == 'frontpage' )
{ 
$defaultsize=$defaultsizefront;
$maxsize=$maxsizefront;
$minsize=$minsizefront;
$type=$typefront;
}
else
{
$defaultsize=$defaultsizeinner;
$maxsize=$maxsizeinner;
$minsize=$minsizeinner;
$type=$typeinner;
}
?>
<div id="headertop" style="float:left;">
  <script type="text/javascript" language="javascript">
		var defaultSize = <?php echo $defaultsize; ?>;
	</script>
  <script src="<?php echo $path; ?>/modules/mod_iid_fontresize/js/md_stylechanger.js" type="text/javascript"></script>
  <!--<div style="padding-left: 772px; color: rgb(0, 0, 0); width: 80px; float: left; margin-top: 7px;" id="fontsize_text">Font Resize</div> -->
  <div style="width: 60px; float: left;" id="fontsize">
    
    <a class="font-sizer" onclick="changeFontSize(1,<?php echo $maxsize; ?>,<?php echo $minsize; ?>,<?php echo "'".$type."'"; ?>); return false;" title="Increase size" >
	+
	</a>
	
	<a class="font-sizer" onclick="revertStyles(<?php echo $defaultsize; ?>,<?php echo $maxsize; ?>,<?php echo $minsize; ?>,'<?php echo $type; ?>'); return false;" title="Reset font size to default" href="index.php">
	reset
	</a> 
<a class="font-sizer" onclick="changeFontSize(-1,<?php echo $maxsize; ?>,<?php echo $minsize; ?>,<?php echo "'".$type."'"; ?>); return false;" title="Decrease size" >
	-
	</a>
	</div>
</div>
