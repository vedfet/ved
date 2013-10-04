/* Font Size Changer */
var prefsLoaded = false;
var defaultFontSize = defaultSize;
var currentFontSize = defaultFontSize;

function revertStyles(sizeDifference,maxsize,minsize,type) {
 currentFontSize = defaultFontSize;
 changeFontSize(0,maxsize,minsize,type);
}

function changeFontSize(sizeDifference,maxsize,minsize,type) {
 currentFontSize = parseInt(currentFontSize) + parseInt(sizeDifference);
 if (currentFontSize > maxsize) {
 currentFontSize = maxsize;
 } else if (currentFontSize < minsize) {
 currentFontSize = minsize;
 }
 setFontSize(currentFontSize,type);
}

function setFontSize(fontSize,type) {
 /*var p = document.getElementsByTagName('p');
 for(i=0;i<p.length;i++) {
 p[i].style.fontSize = fontSize+type;
 }
 var p = document.getElementsByTagName('ul');
for(i=0;i<p.length;i++) {
 p[i].style.fontSize = fontSize+type;
 }*/
//document.getElementById('text_area').style.fontSize=fontSize+type;

 //document.getElementById('content_area').style.fontSize=fontSize+'px';

 document.getElementById('content').style.fontSize=fontSize+type;
}

function createCookie(name,value,days) {
 if (days) {
 var date = new Date();
 date.setTime(date.getTime() + (days*24*60*60*1000));
 var expires = "; expires=" + date.toGMTString();
} else expires = "";
 document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
 var nameEQ = name + "=";
 var ca = document.cookie.split(';');
 for (var i=0; i < ca.length; i++) {
var c = ca[i];
 while (c.charAt(0)==' ') c = c.substring(1, c.length);
 if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
 }
 return null;
}



function setUserOptions() {
 if (!prefsLoaded) {
 userFontSize = readCookie("fontSize");
 currentFontSize = userFontSize ? userFontSize : defaultFontSize;
 setFontSize(currentFontSize);
 prefsLoaded = true;
 }
}

window.onunload = saveUserOptions;

function saveUserOptions() {
createCookie("fontSize", currentFontSize, 30);
}