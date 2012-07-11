<?require("../../include/global_login.php");

if($courses==""){

        $courses=0;

}

$check=mysql_query("SELECT * FROM wp WHERE users=".$person["id"]." AND courses=$courses AND admin=1;");

//$check2=mysql_query("SELECT * FROM groups WHERE id=$groups;");

//if(($person["admin"]==1 || mysql_num_rows($check)!=0 || mysql_result($check2,0,"users")==$person["id"]) && $courses!=0){

 if($update!="true"){

/*        if($courses==0){

                $course["id"]=0;

                $course["name"]="";

                $course["active"]=1;

                $course["applyopen"]=1;

                $course["info"]="";

                $course["users"]=$person["id"];

        }else{

                $check=mysql_query("SELECT * from groups where id=$groups;");

                $course=mysql_fetch_array($check);

        }*/

        ?>

        <html>

        <head>

                <title>Share your calendar...</title>

        <script language="javascript">

        function startup(){

                document.course.elements["cal_share[]"].options[0]=null;

                document.course.elements["users[]"].options[0]=null;

        }

        function addadmin(){

                for(a=document.course.elements["users[]"].options.length-1;a>-1;a--){

                        if(document.course.elements["users[]"].options[a].selected){

                                document.course.elements["cal_share[]"].options[document.course.elements["cal_share[]"].options.length]=new Option(document.course.elements["users[]"].options[a].text,document.course.elements["users[]"].options[a].value);

                                document.course.elements["users[]"].options[a]=null;

                        }

                }

                mark_all();

        }

        function removeadmin(){

                for(a=document.course.elements["cal_share[]"].options.length-1;a>-1;a--){

                        if(document.course.elements["cal_share[]"].options[a].selected){

                                document.course.elements["users[]"].options[document.course.elements["users[]"].options.length]=new Option(document.course.elements["cal_share[]"].options[a].text,document.course.elements["cal_share[]"].options[a].value);

                                document.course.elements["cal_share[]"].options[a]=null;

                        }

                }

                mark_all();

        }

        function mark_all(){

                for(a=0;a<document.course.elements["cal_share[]"].options.length;a++){

                        document.course.elements["cal_share[]"].options[a].selected=true;

                }

        }



        function sendform(){

                mark_all();

                if(confirm('Make sure that all the members are selected (highlighted) in the memberslist.\nOK to send?')){

                        document.course.submit();

                }

        }

        </script>

        <link rel="STYLESHEET" type="text/css" href="../../css.php">

        </head>

        <body bgcolor="#ffffff" onLoad="startup()">

                <table border="0" cellpadding="5" cellspacing="5" align="center">

                <form action="users.php" method="post" name="course">

                <input type="hidden" name="courses" value="<?echo $courses?>">

                <input type="hidden" name="update" value="true">

                <tr>

                        <td colspan="3" class="h3" align="center"><b>Share your calendar...</b></td>

                </tr>

                <tr>

                        <td colspan="3" class="main" align="center">&nbsp;</td>

                </tr>

<!--                 <?if($courses<1){?>


                <?}?>


                <?

                if($courses>0){

                                //Only courses

                        $users=mysql_query("SELECT DISTINCT u.id,u.firstname,u.surname,u.login FROM users u,wp WHERE u.active=1 AND
wp.courses=$courses AND wp.users=u.id AND u.id<> ".$person["id"]." ORDER BY u.firstname ASC,u.surname ASC;");

                }else{

                                //All users

               //         $users=mysql_query("SELECT DISTINCT u.* FROM users u,wp WHERE u.active=1 AND u.id<> ".$person["id"]." ORDER BY u.surname ASC,u.firstname ASC;");
         $users=mysql_query("SELECT DISTINCT u.id,u.firstname,u.surname,u.login FROM users u WHERE u.active=1 AND u.id<> ".$person["id"]." ORDER BY u.firstname ASC,u.surname ASC;");
                }

                $admins=mysql_query("SELECT DISTINCT u.id,u.surname,u.firstname,u.login FROM users u,calendar_share c WHERE c.users=".$person["id"]." AND c.shared_user=u.id AND u.active=1 ORDER BY u.firstname ASC, u.surname ASC;");

                ?>

                <tr>

                        <td colspan="3" class="main" align="center">

                                <table border="0" cellpadding="2" cellspacing="0">

                                        <tr>

                                                <td align="center" class="small" valign="top">

                                                        <b>Members</b><br>

                                                        <select multiple name="cal_share[]" size="15">

                                                        <option value="0">----------------------------

                                                        <?

                                                        while($row=mysql_fetch_array($admins)){

                                                                ?><option value="<?echo $row["id"]?>"><?echo
$row["firstname"]."_".$row["surname"]."_(".$row["login"].")"?><?

                                                        }

                                                        ?>

                                                        </select>

                                                </td>

                                                <td align="center" class="small" valign="top">

                                                        <br><br>

                                                        <input type="button" value=" << " onClick="addadmin()">

                                                        <br><br>

                                                        <input type="button" value=" >> " onClick="removeadmin()">

                                                </td>

                                                <td align="center" class="small" valign="top">

                                                        <b>Other users</b><br>

                                                        <select multiple name="users[]" size="15">

                                                        <option value="0">----------------------------

                                                        <?

                                                        if(mysql_num_rows($admins)!=0){

                                                                mysql_data_seek($admins,0);

                                                        }

                                                        $mypos=0;

                                                        while($row=mysql_fetch_array($users)){

                                                                $show=1;

                                                                if($mypos<mysql_num_rows($admins)){

                                                                        if(mysql_result($admins,$mypos,"id")==$row["id"]){

                                                                                $show=0;

                                                                                $mypos++;

                                                                        }

                                                                }

                                                                if($show==1){

                                                                        ?><option value="<?echo $row["id"]?>"><?echo
$row["firstname"]."_".$row["surname"]."_(".$row["login"].")"?><?

                                                                }

                                                        }

                                                        ?>

                                                        </select>

                                                </td>

                                        </tr>

                                </table>

                        </td>

                </tr>

                <tr>

                        <td colspan="3" align="center" class="small" valign="top">

                                <input type="button" value="  U p d a t e  " onClick="sendform()">

                        </td>

                </tr>

        </form>

        <tr>

                <td colspan="3" class="main"><a href="set_rights.php"><img src="../../images/arrow.gif" width="7" height="7" alt="" border="0"> <b>View permissions</b></a></td>

        </tr>

        </table>

        </body>

        </html>

        <?

 }else{

                /*********************************************************

                *        function mail_users

                *        Send mail to new users beeing added

                **********************************************************/

        function mail_users($email,$firstname, $surname){

                global $SERVER_NAME,$path,$person;

                $mailbody=$firstname.",\n";

                $mailbody.="You have been been granted permission to share the calendar of ".$person["firstname"]." ".$person["surname"].".\n\n";

                $mailbody.="The calendar can be found at the location below.\n";

                $mailbody.="Just click on the calendar icon either under the Personal tab or in any of the courses you are attending ";

                $mailbody.=" and select the requested user in the drop-down main on the left.\n";

                $mailbody.="URL:                 http://".$SERVER_NAME."/$path/\n";



                        //********* DEBUG *********

//                echo "Send to:".$firstname." ".$surname."<br>";

//                echo nl2br($mailbody)."<hr>";

                        //********* DEBUG *********

                mail($email,"LearnLoop shared calendar",$mailbody,"From:LearnLoop@$SERVER_NAME");

        }//end function



         $get_old=mysql_query("SELECT shared_user FROM calendar_share WHERE users=".$person["id"].";");

        $users=array();

        $new_users=array();

        while($row=mysql_fetch_array($get_old)){

                $users[]=$row["shared_user"];

        }



        if(is_array($cal_share)){

                $share=$cal_share;

                while(list($key,$val)=each($cal_share)){

                        $found=0;

                        for($i=0;$i<sizeof($users);$i++){

                                if($users[$i]==$val){

                                        $found=1;

                                }

                        }

                        if($found==0){

                                $new_users[]=$val;

                        }

                }

        }

for($i=0;$i<sizeof($new_users);$i++){

        $mails=mysql_query("SELECT email, firstname, surname FROM users WHERE id=".$new_users[$i].";");

        $u=mysql_fetch_array($mails);

        $username=$u["firstname"]." ".$u["surname"];

        mail_users($u["email"],$u["firstname"],$u["surname"]);

}

        mysql_query("DELETE FROM calendar_share WHERE users=".$person["id"].";");

        if(is_array($share)){

                while(list($key,$val)=each($share)){

//                echo $val."<br>";

                        mysql_query("INSERT INTO calendar_share(users,shared_user) VALUES(".$person["id"].",$val);");

                }

        }



/*                <html>

                <head>

                        <title>updated</title>

                <script language="javascript">

                        function update(){

                                top.ws_main.location.reload();

                        }

                </script>

                <link rel="STYLESHEET" type="text/css" href="../../css.php">

                </head>

                <body onLoad="update()" bgcolor="#ffffff">

                <div align="center" class="main">Calendar distributed...</div>

                </body>

                </html>

*/

        header("Status: 302 Moved Temporarily");

        header("Location:  set_rights.php");

 }

?>
