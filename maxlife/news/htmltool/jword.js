/*
######################################################################
Initial Function & Variable
######################################################################*/
var strToolPath='htmltool';
var isEditMode=true;
var oContent,idPickerShow,oSelection1,oSelection2,strSelectionType;
var intRowCount=0;
var intColCount=0;
var intRowCurrent=0;
var intColCurrent=0;
var flagCreateLinkStatus=false;
//====================
function fnInit(myObj) {
//====================
	fnHideAllPicker();
	oContent=myObj;
	oContent.document.designMode="On";
	oContent.focus();
}

/*
######################################################################
General Command
######################################################################
Using JScript Command Identifiers for
-------------------------------------
=> Cut, Copy, Paste, Undo, Redo,
=> JustifyLeft, JustifyCenter, JustifyRight, JustifyFull,
=> InsertOrderedList, InsertUnorderedList, Indent, Outdent, 
=> FormatBlock, Fontname, Fontsize, Bold, Italic, Underline, 
=> StrikeThrough, SubScript, SuperScript, InsertHorizontalRule */
//==================================
function fnDoCommand(myCmd,myOption) {
//==================================
	if(!isEditMode) return false;
	oContent.focus();
  	oContent.document.execCommand(myCmd,true,myOption);
	fnHideAllPicker();
}

/* 
######################################################################
Set Color command
######################################################################
Make Custom Script ForeColor, BackColor, BackgroundColor */
//===============================
function fnShowColorPicker(myObj) {
//===============================
	if(!isEditMode) return false;
	// Check Current Color Picker Show 
	// ForeColor or BackColor or BackgroundColor or nothing
	fnHideAllPicker();
	if(idPickerShow==myObj.id && divColorPicker.style.display=='') {
		divColorPicker.style.display='none';
	} else {
		idPickerShow=myObj.id;
		divColorPicker.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divColorPicker.style.pixelTop=document.body.scrollTop+window.event.clientY+10;
		divColorPicker.style.display='';
	}
}
//====================================
function fnSetColorCodePicker(myColor) {
//====================================
	if(!isEditMode) return false;
	// Set Color Code onMouseOver Color Picker
	txtColorCodePicker.innerHTML=myColor;
	bgColorCodePicker.style.background=myColor;
}
//=============================
function fnChangeColor(myColor) {
//=============================
	if(!isEditMode) return false;
	// Set Target Color onClick Color Picker
	if(idPickerShow=="BackgroundColor") { // Choose for body background color or table color
		oContent.focus();
		var myObj=oContent.document.selection.createRange();
		var myType=oContent.document.selection.type;
		var myoTable=(myObj.parentElement !=null ? fnGetElement(myObj.parentElement(),"TABLE") : fnGetElement(myObj.item(0),"TABLE"));
		var myoTD=(myObj.parentElement !=null ? fnGetElement(myObj.parentElement(),"TD") : fnGetElement(myObj.item(0),"TD"));
		if(myType=="Control" && myoTable!=null) {	
			// if selection is a table.
			myoTable.style.background=myColor;
		} else if(myType!="Text" && myoTD!=null) {	
			// if selection is inside table.
			myoTD.style.background=myColor;
		} else { 
			// if selection is outside table , set body background.
			//oContent.document.body.style.background=myColor; //Disable Background Color
		}
		divColorPicker.style.display='none';
	} else {
		fnDoCommand(idPickerShow,myColor);
		divColorPicker.style.display='none';
	}
}

/* 
######################################################################
Table Creator Command
######################################################################
Make Custom Script to Insert Table */
//============================
function fnSelectTablePicker() {
//============================
	if(!isEditMode) return false;
	fnHideAllPicker();
	oContent.focus();
	var myObj=oContent.document.selection.createRange();
	var myType=oContent.document.selection.type;
	var myoTable=(myObj.parentElement !=null ? fnGetElement(myObj.parentElement(),"TABLE") : fnGetElement(myObj.item(0),"TABLE"));
	var myoTD=(myObj.parentElement !=null ? fnGetElement(myObj.parentElement(),"TD") : fnGetElement(myObj.item(0),"TD"));
	if(myType=="Control" && myoTable!=null) {
		// if selection is a table, load table information and show divTablePickerEdit
		divTablePickerEdit.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divTablePickerEdit.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		oSelection1=myoTable;
		oSelection2=myoTable;
		document.getElementById("inputTablePickerEditWidth").value=myoTable.width;
		document.getElementById("inputTablePickerEditHeight").value=myoTable.height;
		document.getElementById("inputTablePickerEditBorder").value=myoTable.border;
		divTablePickerEdit.style.display='';
		divTablePickerEditBorderRow.style.display='';
	} else if(myType!="Text" && myoTD!=null) {	// if inside existing table
		// if selection is inside table, load cell information and show divTablePickerEdit
		divTablePickerEdit.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divTablePickerEdit.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		oSelection1=myoTD;
		oSelection2=myoTable;
		document.getElementById("inputTablePickerEditWidth").value=myoTD.width;
		document.getElementById("inputTablePickerEditHeight").value=myoTD.height;
		document.getElementById("inputTablePickerEditBorder").value=myoTable.border;
		divTablePickerEdit.style.display='';
	} else {
		// if selection is outside table , show table picker creator.
		oSelection1=myObj;
		strSelectionType=myType;
		fnShowTablePicker();
	}
}
//==========================
function fnShowTablePicker() {
//==========================
	if(!isEditMode) return false;
	if(divTablePickerCreate.style.display=='') {
		divTablePickerCreate.style.display='none';
	} else {
		intRowCount=6;
		intColCount=6;
		intRowCurrent=0;
		intColCurrent=0;
		divTablePickerCreate.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divTablePickerCreate.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		divTablePickerCreate.style.display='';
	}
	fnGenerateTablePicker();
}
//==============================
function fnGenerateTablePicker() {
//==============================
	if(!isEditMode) return false;
	var myCellSize=20;
	var myStr;
	myStr="<table cellspacing=0 cellpadding=0 bgcolor=#000000 border=0 width="+(intColCount*myCellSize)+">"
		 + "<tr><td>"
		 + "<table border=0 cellpadding=0 cellspacing=1 bordercolor=#000000 id=\"htmltool_table\">"
         + "<tr align=center valign=middle onmouseover=\"this.style.cursor='move'\" onClick=\"MM_dragLayer('divTablePickerCreate','',0,0,1000,20,true,false,-1,-1,-1,-1,false,false,0,'',false,'')\" bgcolor=\"#888888\" height=20>"
		 + "<td height="+myCellSize+" colspan="+intColCount+" bgcolor=#999999 id=\"txtTablePickerCreate\">"
		 + "<strong><font color=#FFFFFF>"+intRowCurrent+"x"+intColCurrent+"</font></strong></td>"
		 + "</tr>";
		for(var myIndexRow=1;myIndexRow<=intRowCount;myIndexRow++) {
			myStr+="<tr align=center valign=middle>";
			for(var myIndexCol=1;myIndexCol<=intColCount;myIndexCol++) {
				if(myIndexCol==intColCount && myIndexRow==intRowCount) {
					myStr+="<td width="+myCellSize+" height="+myCellSize+" bgcolor=#DDDDDD onmouseover=\"this.style.cursor='hand'; intColCount++; intRowCount++; fnGenerateTablePicker(); divTablePickerCreate.style.display='';\">&nbsp;</td>";
				} else if(myIndexCol==intColCount) {
					myStr+="<td width="+myCellSize+" height="+myCellSize+" bgcolor=#DDDDDD onmouseover=\"this.style.cursor='hand'; intColCount++; fnGenerateTablePicker(); divTablePickerCreate.style.display='';\">&nbsp;</td>";
				} else if(myIndexRow==intRowCount) {
					myStr+="<td width="+myCellSize+" height="+myCellSize+" bgcolor=#DDDDDD onmouseover=\"this.style.cursor='hand'; intRowCount++; fnGenerateTablePicker(); divTablePickerCreate.style.display='';\">&nbsp;</td>";
				} else {
					if(myIndexCol<=intColCurrent && myIndexRow<=intRowCurrent) {
						myStr+="<td id=\"cell"+myIndexRow+"x"+myIndexCol+"\" width="+myCellSize+" height="+myCellSize+" bgcolor=#FFDDDD onmouseover=\"this.style.cursor='hand'; fnSetTablePickerColor("+myIndexRow+","+myIndexCol+");\" onClick=\"fnInsertTable("+myIndexRow+","+myIndexCol+")\">&nbsp;</td>";
					} else {
						myStr+="<td id=\"cell"+myIndexRow+"x"+myIndexCol+"\" width="+myCellSize+" height="+myCellSize+" bgcolor=#FFFFFF onmouseover=\"this.style.cursor='hand'; fnSetTablePickerColor("+myIndexRow+","+myIndexCol+");\" onClick=\"fnInsertTable("+myIndexRow+","+myIndexCol+")\">&nbsp;</td>";
					}
				}
			}
			myStr+="</tr>";
		}
	myStr+="</table></td>"
		 + "</tr>"
		 + "</table>";
	divTablePickerCreate.innerHTML=myStr;
}
//=================================
function fnInsertTable(myRow,myCol) {
//=================================
	if(!isEditMode) return false;
	var myStr;
	myStr="<TABLE BORDER=1 CELLPADDING=0 CELLSPACING=0>";
	for(var myIndexRow=1;myIndexRow<=myRow;myIndexRow++) {
		myStr+="<TR>";
		for(var myIndexCol=1;myIndexCol<=myCol;myIndexCol++) {
			myStr+="<TD></TD>";
		}
		myStr+="</TR>";
	}
	myStr+="</TABLE>";
	idContent.focus();
	if (strSelectionType=="Control") {
		oSelection1.item(0).outerHTML=myStr;
	} else {
		oSelection1.pasteHTML(myStr);
	}
	divTablePickerCreate.style.display='none';
}
//======================
function fnUpdateTable() {
//======================
	if(!isEditMode) return false;
	// Width Update ---------------------------------------------
	var myWidth=document.getElementById("inputTablePickerEditWidth");
	var myWidthVal=myWidth.value.substr(0,myWidth.value.length-1);
	if(!isNaN(myWidth.value*1)) {
		oSelection1.width=myWidth.value;
	} else if(!isNaN(myWidthVal*1) && myWidth.value.charAt(myWidth.value.length-1)=="%") {
		oSelection1.width=myWidth.value;
	} else {
		myWidth.value="";
		myWidth.focus();
		return false;
	}
	// Height Update ---------------------------------------------
	var myHeight=document.getElementById("inputTablePickerEditHeight");
	var myHeightVal=myHeight.value.substr(0,myHeight.value.length-1);
	if(!isNaN(myHeight.value*1)) {
		oSelection1.height=myHeight.value;
	} else if(!isNaN(myHeightVal*1) && myHeight.value.charAt(myHeight.value.length-1)=="%") {
		oSelection1.height=myHeight.value;
	} else {
		myHeight.value="";
		myHeight.focus();
		return false;
	}
	// Border Update ---------------------------------------------
	var myBorder=document.getElementById("inputTablePickerEditBorder");
	if(!isNaN(myBorder.value*1)) {
		oSelection2.border=myBorder.value;
	} else {
		myBorder.value="";
		myBorder.focus();
		return false;
	}
	divTablePickerEdit.style.display='none'
}
//=========================================
function fnSetTablePickerColor(myRow,myCol) {
//=========================================
	if(!isEditMode) return false;
	intRowCurrent=myRow;
	intColCurrent=myCol;
	for(var myIndexRow=1;myIndexRow<=intRowCount-1;myIndexRow++) {
		for(myIndexCol=1;myIndexCol<=intColCount-1;myIndexCol++) {
			if(myIndexCol<=myCol && myIndexRow<=myRow) {
				document.getElementById("cell"+myIndexRow+"x"+myIndexCol).style.background="#FFDDDD";
			} else {
				document.getElementById("cell"+myIndexRow+"x"+myIndexCol).style.background="#FFFFFF";
			}
		}
	}
	txtTablePickerCreate.innerHTML="<strong><font color=#FFFFFF>"+myRow+"x"+myCol+"</font></strong>";
}

/* 
######################################################################
Image Creator Command
######################################################################
Make Custom Script to Insert Image */
//============================
function fnSelectImagePicker() {
//============================
	if(!isEditMode) return false;
	fnHideAllPicker();
	oContent.focus();
	var myObj=oContent.document.selection.createRange();
	var myType=oContent.document.selection.type;
	var myoIMG=(myObj.parentElement!=null ? fnGetElement(myObj.parentElement(),"IMG") : fnGetElement(myObj.item(0),"IMG"));
	if(myType=="Control" && myoIMG!=null) {
		oSelection1=myoIMG;
		divImagePickerEdit.style.pixelLeft=document.body.scrollLeft+window.event.clientX-100;
		divImagePickerEdit.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		divImagePickerEdit.style.display='';
		inputImagePickerEditWidth.value=oSelection1.width;
		inputImagePickerEditHeight.value=oSelection1.height;
		inputImagePickerEditBorder.value=oSelection1.border;
		inputImagePickerEditAlt.value=oSelection1.alt;
		switch(oSelection1.align) {
			case ""			:	inputImagePickerEditAlign.item(0).selected=true; break;
			case "Default"	:	inputImagePickerEditAlign.item(0).selected=true; break;
			case "Left"		:	inputImagePickerEditAlign.item(1).selected=true; break;
			case "Right"	:	inputImagePickerEditAlign.item(2).selected=true; break;
			case "Top"		:	inputImagePickerEditAlign.item(3).selected=true; break;
			case "Middle"	:	inputImagePickerEditAlign.item(4).selected=true; break;
			case "Bottom"	:	inputImagePickerEditAlign.item(5).selected=true; break;
			default			:	inputImagePickerEditAlign.item(0).selected=true; break;
		}
	} else {
		fnHtmlToolPopup('HtmlToolPopupWindow',strToolPath+'/image.php?courses='+document.myForm.courses.value,600,550,1);
	}
}
//=====================================================================================
function fnUpdateImage(myImgAlt,myImgAlign,myImgBorder,myImgWidth,myImgHeight) {
//=====================================================================================
	if(!isEditMode) return false;
	if(inputImagePickerEditWidth.value>0) oSelection1.width=inputImagePickerEditWidth.value;
	if(inputImagePickerEditHeight.value>0) oSelection1.height=inputImagePickerEditHeight.value;
	if(inputImagePickerEditBorder.value>=0) oSelection1.border=inputImagePickerEditBorder.value;
	if(inputImagePickerEditAlt.value!="") oSelection1.alt=inputImagePickerEditAlt.value;
	if(inputImagePickerEditAlign.value!="Default") oSelection1.align=inputImagePickerEditAlign.value;
	divImagePickerEdit.style.display='none';
}
//========================================
function fnHtmlToolPopup(pname,purl,w,h,s){
//========================================
	if(!isEditMode) return false;
	fnHideAllPicker();
	myLeftPosition = (screen.width) ? (screen.width-w-8)/2 : 0;
	myTopPosition = (screen.height) ? (screen.height-h-50)/2 : 0;
	myWinName=window.open(purl,pname,"width="+w+",height="+h+",top="+myTopPosition+",left="+myLeftPosition+",resizable=no,scrollbars="+s);
	if(parseInt(navigator.appVersion)>=4) {
		myWinName.window.focus();
	}
	return myWinName;
}
//=====================================================================================
function fnInsertImage(myImgURL,myImgAlt,myImgAlign,myImgBorder,myImgWidth,myImgHeight) {
//=====================================================================================
	if(!isEditMode) return false;
	oContent.focus();
	oContent.document.execCommand("InsertImage",false,myImgURL);
	var myObj=oContent.document.selection.createRange();
	var myType=oContent.document.selection.type;
	if (myObj.item && myObj.item(0).tagName=="IMG") {
		if(myImgAlt!="") { myObj.item(0).alt=myImgAlt; }
		if(myImgAlign!="Default") { myObj.item(0).align=myImgAlign; }
		myObj.item(0).border=myImgBorder;
		if(myImgWidth!=0) { myObj.item(0).width=myImgWidth; }
		if(myImgHeight!=0) { myObj.item(0).height=myImgHeight; }
	}
}

/* 
######################################################################
Link Creator Command
######################################################################
Make Custom Script to Create and Update Link */
//=================================
function fnSelectInsertLinkPicker() {
//=================================
	if(!isEditMode) return false;
	var myObj=oContent.document.selection.createRange();
	var myType=oContent.document.selection.type;
	var myoLink=(myObj.parentElement!=null ? fnGetElement(myObj.parentElement(),"A") : fnGetElement(myObj.item(0),"A"));
	var myoIMG=(myObj.parentElement!=null ? fnGetElement(myObj.parentElement(),"IMG") : fnGetElement(myObj.item(0),"IMG"));
	if(myoLink!=null) {
		oSelection1=myoLink;
		inputInsertLinkPickerURL.value=myoLink.href;
		switch(myoLink.target) {
			case ""			:	inputInsertLinkPickerTarget.item(0).selected=true; break;
			case "_blank"	:	inputInsertLinkPickerTarget.item(1).selected=true; break;
			case "_parent"	:	inputInsertLinkPickerTarget.item(2).selected=true; break;
			case "_self"	:	inputInsertLinkPickerTarget.item(3).selected=true; break;
			case "_top"		:	inputInsertLinkPickerTarget.item(4).selected=true; break;
			default			:	inputInsertLinkPickerTarget.item(0).selected=true; break;
		}
		divInsertLinkPicker.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divInsertLinkPicker.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		divInsertLinkPicker.style.display='';
		flagCreateLinkStatus=false;
	} else if(myType!="None") {
		oSelection1=myObj;
		inputInsertLinkPickerURL.value="http://";
		inputInsertLinkPickerTarget.item(0).selected=true;
		divInsertLinkPicker.style.pixelLeft=document.body.scrollLeft+window.event.clientX-20;
		divInsertLinkPicker.style.pixelTop =document.body.scrollTop+window.event.clientY+10;
		divInsertLinkPicker.style.display='';
		flagCreateLinkStatus=true;
	}
}
//==============================
function fnSetInsertLinkPicker(myURL,myTarget) {
//==============================
	if(!isEditMode) return false;
	if(flagCreateLinkStatus) {
		oSelection1.execCommand("CreateLink",false,myURL);
	} else {
		oSelection1.href=myURL;
	}
	oSelection1.target=myTarget;
	divInsertLinkPicker.style.display='none';
}

/*
############################
Library Function
############################
Function that severally use.*/
//==========================
function fnButtonOver(myObj) {
//==========================
	if(!isEditMode) if(myObj.id!="abcd") return false;
	myObj.src=strToolPath+'/'+myObj.id+'_over.gif';
	myObj.style.cursor='hand';
}
//==========================
function fnButtonDown(myObj) {
//==========================
	if(!isEditMode) if(myObj.id!="abcd") return false;
	myObj.src=strToolPath+'/'+myObj.id+'_down.gif';
	myObj.style.cursor='hand';
}
//==========================
function fnButtonOut(myObj) {
//==========================
	if(!isEditMode) if(myObj.id!="abcd") return false;
	myObj.src=strToolPath+'/'+myObj.id+'.gif';
	myObj.style.cursor='';
}
//=====================================
function fnGetElement(myoElement,mystrMatchTag) {
//=====================================
	if(!isEditMode) return false;
	while(myoElement!=null && myoElement.tagName!=mystrMatchTag) {
		if(myoElement.id==oContent.id) return null;
		myoElement=myoElement.parentElement
	}
	return myoElement
}
//========================
function fnHideAllPicker() {
//========================
	if(!isEditMode) return false;
	divTablePickerCreate.style.display='none';
	divColorPicker.style.display='none';
	divTablePickerEdit.style.display='none';
	fnSetColorCodePicker('#FFFFFF');
}
//========================
function fnSwitchMode(myObj) {
//========================
	if(myObj.id=="html") {
		document.getElementById("html").style.display='none';
		document.getElementById("abcd").style.display='';
		oContent.document.body.clearAttributes;
		oContent.document.body.style.fontFamily='MS Sans Serif';
		oContent.document.body.style.fontSize='12px';
		oContent.document.body.innerText=oContent.document.body.innerHTML;
		isEditMode=false;
	} else {
		document.getElementById("html").style.display='';
		document.getElementById("abcd").style.display='none';
		oContent.document.body.clearAttributes;
		oContent.document.body.style.fontFamily='';
		oContent.document.body.style.fontSize='';
		oContent.document.body.innerHTML=oContent.document.body.innerText;
		isEditMode=true;
	}
}
//========================
function fnSave() {
//========================
	if(!isEditMode) {
		fnSwitchMode(document.getElementById("abcd"));
		fnButtonOut(document.getElementById("html"));
		return false;
	}
	if(oContent.document.body.style.background=="") { 
		oContent.document.body.style.background="#FFFFFF";
	}
	document.getElementById("HTMLToolContent").value=oContent.document.body.innerHTML;
	//document.getElementById("HTMLToolContentBG").value=oContent.document.body.style.background;
}