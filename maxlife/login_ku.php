<?php
header ('Content-type: text/html; charset=utf-8');
session_start();
require_once 'connectdb.php'; 

echo $_POST['user'];

$iusername = $_POST['user'];
$ipassword = md5($_POST['pass']);

mysql_query("SET NAMES UTF8");
mysql_query("SET character_set_result=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");


function ldap_authen($server,$base_dn,$useraccount,$password){

    $ldapserver = ldap_connect($server);
        $bind = ldap_bind($ldapserver);
        $authen = "pass";
    if(!bind)
    {
                $authen = "false";
    }

    $filter = "uid=" . $useraccount;
    $inforequired = array("employeeType","department","thainame","mail","givenName",
                        "sn","uid","entrydn","gender","jobdescription","position","faculty","campus");
    $result = ldap_search($ldapserver,$base_dn,$filter,$inforequired);
    $info = ldap_get_entries($ldapserver,$result);
    if(!$result)
    {
                $authen = "false";
    }
    if($info["count"] == 0)
    {
                $authen = "false";
    }
    if($info["count"] > 1)
    {
                $authen = "false";
    }

        $user_dn = $info[0]["dn"];
    $bind = @ldap_bind($ldapserver,$user_dn,$password);
    if(!$bind)
    {
                $authen = "false";
    }

        ldap_close($ldapserver);

    return($authen);

}


$authenou[0]="ou=bkn,dc=ku,dc=ac,dc=th";
$authenou[1]="ou=kps,dc=ku,dc=ac,dc=th";
$authenou[2]="ou=src,dc=ku,dc=ac,dc=th";
$authenou[3]="ou=csc,dc=ku,dc=ac,dc=th";
$authenzone[0]="ldap2.ku.ac.th";
$authenzone[1]="ldap3.ku.ac.th";
//$authenzone[2]="ldap3.ku.ac.th";
$authenzone[2]="ldap.src.ku.ac.th";
$i=0;
$j=0;
while($i<count($authenzone)){
     while($j<count($authenou)){
	   $ilogin = str_replace("*","",$ilogin);
	   if(trim($ipassword)==""){
		$ipassword="ksjdfkljs";
	   }
           $authen = ldap_authen($authenzone[$i],$authenou[$j],$_POST['user'];,$_POST['pass'];);
           if($authen=="pass"){
                $i=count($authenzone);
                $j=count($authenou);
           }else{
                $j+=1;
           }
     }
     $i+=1;
}
if($authen=="pass"){
	//header("Location: check_new_user.php?ilogin=$ilogin&ipassword=$ipassword");
	$check=mysql_query("SELECT * FROM users WHERE login='$iusername' AND STRCMP(password,'".$ipassword."')=0 AND active=1;");	

	if(mysql_num_rows($check)==0){
		header ("Location: index.php?fail=1");
		exit;
	}else{
			$person=mysql_fetch_array($check);
			//mysql_query("UPDATE users set lastlogin=".time()." WHERE id=".$person["id"].";");
			$_SESSION['logged_in'] = 1;
			$_SESSION['susername'] = $iusername;
			$_SESSION['suid'] = $person["id"];
			//$_SESSION['logged_in'] = 1;
			
			header ("Location: main.php?first=1");
			?>
			<!--<meta http-equiv="refresh" content="0;url=main.php">-->
			<?
			//session_register("slogin");
			//session_register("spassword");	
			//header("Location: main.php");
	}
} else {
	$check=mysql_query("SELECT * FROM users WHERE login='$iusername' AND STRCMP(password,'".$ipassword."')=0 AND active=1;");	

	if(mysql_num_rows($check)==0){
		header ("Location: index.php?fail=1");
		exit;
	}else{
			$person=mysql_fetch_array($check);
			//mysql_query("UPDATE users set lastlogin=".time()." WHERE id=".$person["id"].";");
			$_SESSION['logged_in'] = 1;
			$_SESSION['susername'] = $iusername;
			$_SESSION['suid'] = $person["id"];
			//$_SESSION['logged_in'] = 1;
			
			header ("Location: main.php?first=1");
			?>
			<!--<meta http-equiv="refresh" content="0;url=main.php">-->
			<?
			//session_register("slogin");
			//session_register("spassword");	
			//header("Location: main.php");
	}	
}



?>


