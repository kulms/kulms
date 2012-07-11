/*
###########################################################################
Progress Bar
###########################################################################
	- 2 กันยายน 2545 14:37:00
	- modify from www.javascriptsource.com
	- by TeeLek theteelek@yahoo.com
	- Script Support IE 4+
###########################################################################

@ How to use ;-)

-------------------------------------
1. Create Progress Layer on your page.
-------------------------------------

	<div id="ProgressBarLayer" style="position:absolute; left:0px; top:0px; z-index:1; visibility: hidden;"></div>

----------------------------------------------------
2. Proload bar on document load process in body tag.
----------------------------------------------------
	<BODY onLoad="loadProgressBar('ProgressBarLayer',50,'#FF0000',100)">

-------------------------------------------
3. Config Progress Bar by preload function.
-------------------------------------------

	loadProgressBar('ProgressBarLayer',myProgressStepSize,myProgressColor,myProgressSpeed)

	ProgressStepSize	// set to number of progress
	ProgressColor		// set to progress bar color
	progressSpeed		// set to time between updates (milli-seconds)

---------------------------------------
4. Use progress by using show function.
---------------------------------------
	showProgressBar('ProgressBarLayer')

	and use "progressAt" (integer type) to indicate progress 

	1<= progressAt <= ProgressStepSize

###########################################################################
*/
// Set Default value...
var progressEnd = 100;		// set to number of progress <span>'s.
var progressColor = '#FF9900';	// set to progress bar color
var progressInterval = 100;	// set to time between updates (milli-seconds)
var progressAt = progressEnd;
var progressTimer;

function progress_clear() {
	for (var i = 1; i <= progressEnd; i++) document.getElementById('progress'+i).style.backgroundColor = 'transparent';
	progressAt = 0;
}

function progress_update() {
	progressAt++;
	if (progressAt > progressEnd) {
		progress_clear();
	} else {
		document.getElementById('progress'+progressAt).style.backgroundColor = progressColor;
	}
	progressTimer = setTimeout('progress_update()',progressInterval);
}

function progress_stop() {
	clearTimeout(progressTimer);
	progress_clear();
}

function loadProgressBar(myLayer,myProgressStepSize,myProgressColor,myProgressSpeed) {
	var txt;

	if (myProgressStepSize>0)	progressEnd = myProgressStepSize;
	if (myProgressColor!="")	progressColor = myProgressColor;
	if (myProgressSpeed>0)		progressInterval = myProgressSpeed;

	txt ="<table border=\"0\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\" id=\"htmltool_table\">\n"
		+ "<tr align=\"center\" valign=\"middle\"> \n"
		+ "<td>กำลังส่งข้อมูล</td>\n"
		+ "<td><div style=\"font-size:8pt;padding:1px;border:solid black 1px\">\n";
	for(i=1;i<=progressEnd;i++) {
		txt += "<span id=\"progress" + i + "\"><img src=\"blank.gif\" width=\"2\" height=\"10\"></span>"
	}
	txt +="</div></td>\n"
		+ "</tr>\n"
		+ "</table>\n";
	document.getElementById(myLayer).innerHTML = txt;
	//Move Progress Bar on center
	if (document.all) {	// Internet Explorer
		document.getElementById(myLayer).style.left = (document.body.clientWidth/2) - (document.getElementById(myLayer).offsetWidth/2);
		document.getElementById(myLayer).style.top = (document.body.clientHeight/2) - (document.getElementById(myLayer).offsetHeight/2);
	} else if (document.layers) {	// Netscape
		document.getElementById(myLayer).left = (window.innerWidth/2) - 100;
		document.getElementById(myLayer).top = (window.innerHeight/2) - 40;
	}
}

function showProgressBar(myLayer) {
	if (document.all) {	// Internet Explorer
		if(document.getElementById(myLayer).style.visibility=='visible') {
			//document.getElementById(myLayer).style.visibility='hidden';
			//progress_stop();				// stop progress bar
		} else {
			document.getElementById(myLayer).style.visibility = 'visible';
			progress_update();				// start progress bar
		}
	} else if (document.layers) {	// Netscape
		if(document.getElementById(myLayer).visibility) {
			//document.getElementById(myLayer).visibility = false;
			//progress_stop();				// stop progress bar
		} else {
			document.getElementById(myLayer).visibility = true;
			progress_update();				// start progress bar
		}
	}
}
