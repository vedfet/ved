<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
$path=JURI::base();
$database  =& JFactory::getDBO();
$result = null;
?>
<script>
var img = new Array(10); //array to hold the images
var i = 0;
</script>
<?php
// $abc = $mosConfig_live_site."/images/".$folder_name."/";
$abc =$path.'images/iid_images/'.$folder_name."/";

$query = "SELECT COUNT(*) as count"
. "\n FROM #__homegallery AS n where published=1"
;
$database->setQuery($query);
$total1 = $database->loadObjectList();
$total= $total1[0]->count;


// get the subset (based on limits) of required records
$query = "SELECT * "
. "\n FROM #__homegallery AS n where published=1"
. "\n ORDER BY ordering "
;

$database->setQuery( $query );
$rows = $database->loadObjectList();

$fileCount=0;
echo "<script> img1 = new Array(); linktitle=new Array(); linktext=new Array(); linkurl=new Array(); linktarget=new Array(); ";
foreach($rows as $row)
{
$target=($row->new_window==1)?'_NEW':'_PARENT';

echo "img[i] = new Image();
img[i].src = '".$path."images/iid_images/".$folder_name."/'+ '".$row->logo_image."' ;
img1[i] = '".$path."images/iid_images/".$folder_name."/'+ '".$row->logo_image."' ;
linktitle[i] = '".$row->homegallery_title."';
linktext[i] = '".$row->homegallery_discription."';
linkurl[i] = '".$row->website_url."';
linktarget[i] = '".$target."';
i++;";
$fileCount++;
}


echo "</script>";
?>
<div class="bannertext"><span class="leftpadd"><div id="message"></div></span></div>
<a id="anc-sliderlink"><img id="banner_section_left" src=""  width="209" height="335" /></a>


<script language="JavaScript" type="text/JavaScript">


//declaring necessary local variables

var start = null;  //start pointer
var counter = 0;  //counts the image sequences
var delayTime = null;  //user defined


if(document.images)
{
//pre-load all the images
/* change the looping condition if you want
to add or remove images. Do not load too
many images, it will slow down the program
loading time [e.g. 30 or above images] */


//alert(img.length);
}



//function for getting the user defined delay time
function getDelayTime(dlTime){
var temp = parseInt(dlTime);
if(temp != NaN)
delayTime = temp * 1000;
else
delayTime = 4000;
}


//function for changing the images
function anim(){
counter++;
for(i=0;i<<?php echo $fileCount;?>;i++){

//var btn_name = document.getElementById("img"+i).name;
if(i==0){
var previndex=<?php echo $fileCount-1;?>
}
else{
var previndex=counter-1;
}

if(i==<?php echo $fileCount-1;?>){
var nextindex=0;
}
else{
var nextindex=counter+1;
}

var show=counter+1;

if(counter == i){
document.getElementById("banner_section_left").src = img1[counter];
var url= document.getElementById("anc-sliderlink").href=''+linkurl[counter];
document.getElementById("anc-sliderlink").target=''+linktarget[counter];
document.getElementById("message").innerHTML =linktext[counter];
//document.getElementById("messagetext").innerHTML = linktext[counter];
//var url1= document.getElementById("anc-sliderlink1").href=''+linkurl[counter];
//document.getElementById("anc-sliderlink1").target=''+linktarget[counter];
continue;
}

}

if(counter == <?php echo $fileCount-1;?>)
counter = -1; //sets the counter value to 0
}
function fadeimage()
{
//document.getElementById("banner_area").style.backgroundImage = "url(images/fading_background_1.png)";
//document.getElementById("banner_area").style.backgroundRepeat = "repeat-x";
//document.getElementById("banner_section_left").style.opacity = "0.6";
}

//function for starting the slide show
function slide(){

//getDelayTime(document.form1.delay.value);
anim();
start = setInterval("setTimeout('fadeimage();',5000);anim();",5300);
}

function next(index){
//count=parseInt(<?php echo $total;?>)-1;
// if(index!=count)
// {
//indexincrement=parseInt(index)+1;
stopSlide(index);

// show=indexincrement+1;
// document.getElementById("nextprevimage").innerHTML='<div class="imageleft"><img src="images/left.png" height="9" width="5" onclick="prev('+index+');" style="cursor: pointer; cursor: hand;margin-left:2px;margin-right:2px;margin-top:3px;margin-bottom:3px;"/>'+'<img src="images/default.png" height="9" width="3" onclick="pause(0);" style="cursor: pointer; cursor: hand;margin-left:7px;margin-right:7px;margin-top:3px;margin-bottom:3px;"/>'+'<img src="images/right.png" height="9" width="5" onclick="next('+indexincrement+');" style="cursor: pointer; cursor: hand;margin-top:3px;margin-bottom:3px;margin-left:2px;margin-right:2px;"/></div>'+'<div class="numbring">'+show+' of '+<?php echo $total ?>+'</div>';

// }
}

function prev(index)
{

if(index>=0)
{
//indexincrement=parseInt(index)-1;

stopSlide(index);

//show=parseInt(index)+1;
//document.getElementById("nextprevimage").innerHTML='<div class="imageleft"><img src="images/left.png" height="9" width="5" onclick="prev('+indexincrement+');" style="cursor: pointer; cursor: hand;margin-left:2px;margin-right:2px;margin-top:3px;margin-bottom:3px;"/>'+'<img src="images/default.png" height="9" width="3" onclick="pause(0);" style="cursor: pointer; cursor: hand;margin-left:7px;margin-right:7px;margin-top:3px;margin-bottom:3px;"/>'+'<img src="images/right.png" height="9" width="5" onclick="next('+index+');" style="cursor: pointer; cursor: hand;margin-left:2px;margin-right:2px;margin-top:3px;margin-bottom:3px;"/></div>'+'<div class="numbring">'+show+' of '+<?php echo $total ?>+'</div>';

}

}

function pause(index)
{
stopSlide(index);

//document.getElementById("nextprevimage").innerHTML='<div class="imageleft"><img src="images/left.png" height="9" width="5" onclick="prev(0);" style="cursor: pointer; cursor: hand;margin-left:2px;margin-right:2px;margin-top:3px;margin-bottom:3px;"/>'+'<img src="images/default.png" height="9" width="3" onclick="pause(0);" style="cursor: pointer; cursor: hand;margin-left:7px;margin-right:7px;margin-top:3px;margin-bottom:3px;;"/>'+'<img src="images/right.png" height="9" width="5" onclick="next(0);" style="cursor: pointer; cursor: hand;margin-left:2px;margin-right:2px;margin-top:3px;margin-bottom:3px;"/></div>'+'<div class="numbring">'+1+' of '+<?php echo $total ?>+'</div>';
// setInterval("stopSlide("+index+")",20000);
}

//function to stop the slide show
function stopSlide(index){
counter = index;

if(counter==0){
var previndex=<?php echo $fileCount-1;?>
}
else{
var previndex=counter-1;
}
if(counter==<?php echo $fileCount-1;?>){
var nextindex=0;
}
else{
var nextindex=counter+1;
}

var show=counter+1;

document.getElementById("banner_section_left").src = img1[counter];
var url= document.getElementById("anc-sliderlink").href=''+linkurl[counter];
document.getElementById("anc-sliderlink").target=''+linktarget[counter];
document.getElementById("message").innerHTML =linktext[counter];





}
function clearLabel(index){

}
window.onload=slide();
</script>

</head>

<body onLoad="slide();">


