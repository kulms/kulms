	<!-- 
	function getCal(val,c){
		if(val!=""){
			window.open("shared/index.php?users="+val+"&courses="+c, "calWindow", "ScreenX=200,ScreenY=70,width=800,height=600,status=no,toolbar=no,menubar=no,scrollbars=yes");
//			alert(val);
		}
	}
	var newDisplayWin = null;
	function ShowIt(s){
		LeftPosition = (screen.width) ? (screen.width-450)/2 : 0;
		TopPosition = (screen.height) ? (screen.height-280)/2 : 0;
		settings =
		'height='+280+',width='+450+',top='+TopPosition+',left='+LeftPosition+',status=no,toolbar=no,menubar=no,scrollbars=yes';		
		links = "show.php?id=" + s;
		newDisplayWin = window.open(links, "displayWindow", settings);
	}
	
	function AddIt(d,c){
		LeftPosition = (screen.width) ? (screen.width-300)/2 : 0;
		TopPosition = (screen.height) ? (screen.height-320)/2 : 0;
		settings =
		'height='+320+',width='+300+',top='+TopPosition+',left='+LeftPosition+',status=no,toolbar=no,menubar=no,scrollbars=no';
		links = "addToCal.php?dt=" + d + "&courses=" + c;
		newAddwin = window.open(links, "AddWindow", settings);
	}
	
	function Update(){
		window.location.reload();
	}
	//-->
