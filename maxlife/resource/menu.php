<?php
//header ('Content-type: text/html; charset=utf-8');
//session_start();
require_once '../connectdb.php'; 

//$course_sql = "";
if($_GET['course']!= 0){
//$course_sql = " AND c.id = ".$course."";
$sqlc="SELECT c.id, c.name, c.section
		FROM courses c
		WHERE c.id = ".$_GET['course']."
		 ORDER BY c.id";
} else {
$sqlc="SELECT c.id, c.name, c.section
		FROM courses c
		WHERE c.id
		IN (
			SELECT DISTINCT wp.courses
			FROM wp, users u
			WHERE wp.users = u.id AND u.id =  '".$_SESSION['suid']."'
			ORDER BY wp.courses
		) ORDER BY c.id";
}
//echo $sqlc;		

$qc=mysql_query($sqlc);
//$rowc = mysql_fetch_array($qc);
//$course_id = mysql_result($qc,0,"id");

//echo $susername;
?>

<?
if($_GET['course']!= 0){
?>
<div id="sidebar_content" class="abs">
    <div id="sidebar_content_inner">
        <ul id="sidebar_menu">
            <li id="sidebar_menu_home" >
                <a href="../main.php"><span class="abs"></span>Home</a>
            </li>			
            <li>
                <a href="#"><? echo "Login as ".$_SESSION['susername'];?></a>
            </li>                            
            <!--
            <li>
            <a href="#">My Courses</a>
                <ul>
            -->    
                <?
				while($rowc = mysql_fetch_array($qc)){
                ?>
                    <li class="active">
                        <a href="../sub_news.php?course=<? echo $rowc["id"];?>"><? echo $rowc["name"]." [".$rowc["section"]."]";?></a>							
                    </li>
				<?
				}
                ?>                  
            <!--    
                </ul>
            </li>
            -->
            <!--
            <li>
                <a href="#">Manage Courses</a>    
                <ul>
            -->    
                    <li>                        
                        <a href="#">Course Resources</a>
                        <ul>
                        <?
						mysql_data_seek($qc, 0); 
						while($rowc = mysql_fetch_array($qc)){
						?>
							<li>
								<!--<a href="documents.php?course=<? echo $rowc["id"];?>"><? echo $rowc["name"]." [".$rowc["section"]."]";?></a>							-->
                                <a href="index.php?course=<? echo $rowc["id"];?>">Resources List</a>
							</li>
						<?
						}
						?>  
                        </ul>                
                    </li>    
                    <li>
                        <a href="#">Course Tools</a>    
                        <ul>
                            <li>
                                <a href="#">Resources</a>    
                                <ul>
                                    <li>
                                        <a href="#">Create Resources</a>
                                    </li>    
                                    <li>
                                        <a href="#">Delete Resources</a>
                                    </li>    
                                </ul>
                            </li>
                            <li>
                                <a href="#">Assignment</a>    
                                <ul>
                                    <li>
                                        <a href="#">Create Assignment</a>
                                    </li>    
                                    <li>
                                        <a href="#">Delete Assignment</a>
                                    </li>    
                                </ul>
                            </li>
                            <li>
                                <a href="#">Quiz</a>    
                                <ul>
                                    <li>
                                        <a href="#">Create Quiz</a>
                                    </li>    
                                    <li>
                                        <a href="#">Delete Quiz</a>
                                    </li>    
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                    <!--
                    <li>
                        <a href="#">Delete Courses</a>
                    </li>    
                    <li>
                        <a href="#">Apply Courses</a>
                    </li>    
                    <li>
                        <a href="#">Withdraw Courses</a>
                    </li>    
                    -->
            <!--        
                </ul>
            </li>
            -->
            <!--
            <li>
                <a href="#">Documents Courses</a>
                <ul>
                <?
				mysql_data_seek($qc, 0); 
				while($rowc = mysql_fetch_array($qc)){
                ?>
                    <li>
                        <a href="documents.php?course=<? echo $rowc["id"];?>"><? echo $rowc["name"]." [".$rowc["section"]."]";?></a>							
                    </li>
				<?
				}
                ?>                  
                </ul>
            </li>
            -->
        </ul>
    </div>
</div>
<? } else {?>
<div id="sidebar_content" class="abs">
    <div id="sidebar_content_inner">
        <ul id="sidebar_menu">
            <li id="sidebar_menu_home" class="active">
                <a href="main.php"><span class="abs"></span>Home</a>
            </li>			
            <li>
                <a href="#"><? echo "Login as ".$_SESSION['susername'];?></a>
            </li>                            
            <li>
            <a href="#">My Courses</a>
                <ul>
                <?
				while($rowc = mysql_fetch_array($qc)){
                ?>
                    <li>
                        <a href="sub_news.php?course=<? echo $rowc["id"];?>"><? echo $rowc["name"]." [".$rowc["section"]."]";?></a>							
                    </li>
				<?
				}
                ?>                  
                </ul>
            </li>
            <li>
                <a href="#">Manage Courses</a>    
                <ul>
                    <li>
                        <a href="#">Create Courses</a>
                    </li>    
                    <li>
                        <a href="#">Delete Courses</a>
                    </li>    
                    <li>
                        <a href="#">Apply Courses</a>
                    </li>    
                    <li>
                        <a href="#">Withdraw Courses</a>
                    </li>    
                </ul>
            </li>
            <!--
            <li>
                <a href="#">Documents Courses</a>
                <ul>
                <?
				mysql_data_seek($qc, 0); 
				while($rowc = mysql_fetch_array($qc)){
                ?>
                    <li>
                        <a href="documents.php?course=<? echo $rowc["id"];?>"><? echo $rowc["name"]." [".$rowc["section"]."]";?></a>							
                    </li>
				<?
				}
                ?>                  
                </ul>
            </li>
            -->
        </ul>
    </div>
</div>
<? }?>