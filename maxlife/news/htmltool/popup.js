function Popup(pname,purl,w,h,s){
	LeftPosition = (screen.width) ? (screen.width-w-8)/2 : 0;
	TopPosition = (screen.height) ? (screen.height-h-50)/2 : 0;
	myWinName = window.open(purl,pname,"width="+w+",height="+h+",top="+TopPosition+",left="+LeftPosition+",resizable=no,scrollbars="+s);
	if (parseInt(navigator.appVersion) >= 4) {
		myWinName.window.focus();
	}
	return myWinName;
}