<?
//header ('Content-type: text/html; charset=utf-8');
require_once 'connectdb.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>M@xLife, Kasetsart University's Powerful e-Learning Suite</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="assets/stylesheets/master.css" />

<!--[if IE 8]>
<link rel="stylesheet" href="assets/stylesheets/ie8.css" />
<![endif]-->
<!--[if !IE]><!-->
<script src="assets/javascripts/iscroll.js"></script>
<!--<![endif]-->
<script src="assets/javascripts/jquery.js"></script>
<script src="assets/javascripts/master.js"></script>
<!--<script src="assets/javascripts/jqModal.js"></script>-->

<script src="assets/javascripts/jquery.simplemodal.js"></script>
<script src="assets/javascripts/basic.js"></script>

</head>
<!--
<script type="text/javascript">
	// <![CDATA[	
	
	
	$(document).ready(function() {
	  $('#dialog').jqm();
	});
	
	
	$(document).ready(function() {
	  $('#ex2').jqm({ajax: 'news_ajax.php', trigger: 'a.ex2trigger'});
	});
		
	$(document).ready(function() {
	  
	  // notice that you can pass an element as the target 
	  //  in addition to a string selector.
	  var t = $('#ex4 div.jqmdMSG');
	  
	  $('#ex4').jqm({
		trigger: 'a.ex4Trigger',
		ajax: '@href', /* Extract ajax URL from the 'href' attribute of triggering element */
		target: t,
		modal: true, /* FORCE FOCUS */
		onHide: function(h) { 
		  t.html('Please Wait...');  // Clear Content HTML on Hide.
		  h.o.remove(); // remove overlay
		  h.w.fadeOut(888); // hide window
		  
		},
		overlay: 0});
	  
	   // nested dialog
	   $('#ex4c').jqm({modal: true, overlay: 10, trigger: false});
	   
	  // Close Button Highlighting Javascript provided in ex3a.
	  
	  // Work around for IE's lack of :focus CSS selector
	  if($.browser.msie)
		$('input')
		  .focus(function(){$(this).addClass('iefocus');})
		  .blur(function(){$(this).removeClass('iefocus');});
	  
	});
	/*
	$().ready(function() {
  		$('#ex2').jqm({ajax: 'examples/2.html', trigger: 'a.ex2trigger'});
	});
	*/
	// ]]>
</script>
-->
<body>
<div id="main" class="abs">
	<div class="abs header_upper chrome_light">
		<span class="float_left button" id="button_navigation">
			Navigation
		</span>
        <!--
		<a href="#" class="float_left button">
			Back
		</a>
		<a href="#" class="float_right button">
			Sign out
		</a>
        -->
        <a href="#" class="icon icon_book float_left"></a>
		<span >M@xLife Kasetsart University e-Learning Suite</span>
	</div>
    <!--
	<div class="abs header_lower chrome_light">
		<a href="#" class="icon icon_refresh"></a>
		<a href="#" class="icon icon_redo"></a>
		<a href="#" class="icon icon_loopback"></a>
		<a href="#" class="icon icon_squiggle"></a>
		<a href="#" class="icon icon_shuffle"></a>
		<a href="#" class="icon icon_magnifying_glass"></a>
		<a href="#" class="icon icon_map_marker"></a>
		<a href="#" class="icon icon_chat"></a>
		<a href="#" class="icon icon_chat2"></a>
		<a href="#" class="icon icon_medical"></a>
		<a href="#" class="icon icon_clock"></a>
		<a href="#" class="icon icon_eye"></a>
		<a href="#" class="icon icon_target"></a>
		<a href="#" class="icon icon_tag"></a>
		<a href="#" class="icon icon_tags"></a>
	</div>
    -->
	<div id="main_content" class="abs">
		<div id="main_content_inner">
			<h3>
				ข่าวประชาสัมพันธ์
			</h3>
		  <hr />
            <table class="kunews" align="center" width="100%">
                    <thead>
                        <tr>
                            <th colspan="4"><strong><img src="assets/images/icons_dark/124-bullhorn.png" width="16" height="16"> คณะ                           </strong></th>
                        </tr>
                        <tr>
                            <th width="13%" ><strong>รายวิชา</strong></th>
                            <th width="58%" ><strong>ข่าวประกาศ</strong></th>
                            <th width="17%" ><strong>ผู้ประกาศ</strong></th>
                            <th width="12%" ><strong>วันที่ประกาศ                              
                            </strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--
                        <tr>
                            <td>&nbsp;</td>
                            <td><a href="#" class="jqModal">view simple</a> ...
                              <div class="jqmWindow" id="dialog"> <a href="#" class="jqmClose">Close</a>
                                <hr>
                                <em>READ ME</em>
                                This is a "vanilla plain" jqModal window. Behavior and appeareance extend far beyond this.
                                The demonstrations on this page will show off a few possibilites. I recommend walking
                                through each one to get an understanding of jqModal <em>before</em> using it. <br />
                                <br />
                                You can view the sourcecode of examples by clicking the Javascript, CSS, and HTML tabs.
                                Be sure to checkout the <a href="README">documentation</a> too! <br />
                                <br />
                                <em>NOTE</em>; You can close windows by clicking the tinted background known as the "overlay".
                                Clicking the overlay will have no effect if the "modal" parameter is passed, or if the
                          overlay is disabled. </div></td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        -->
                        <!--
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;                            
                            <a href="#" class="ex2trigger">view ajax</a>
                                ...
                                <div class="jqmWindow" id="ex2">
                                Please wait... <img src="inc/busy.gif" alt="loading" />
                                </div>
                            
                            </td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                      </tr>
                      -->
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                              <div id='container'>
                                    <!--
                                    <div id='logo'>
                                        <h1>Simple<span>Modal</span></h1>
                                        <span class='title'>A Modal Dialog Framework Plugin for jQuery</span>
                                    </div>
                                    -->
                                    <div id='content'>
                                        <div id='basic-modal'>
                                            <h3>Basic Modal Dialog</h3>
                                            <p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
                                            <input type='button' name='basic' value='Demo' class='basic'/> or <a href='#' class='basic'>Demo</a>
                                        </div>                                                                                
                                        <!-- modal content -->                                        
                                        <!--
                                        <div id="basic-modal-content">
                                            <h3>Basic Modal Dialog</h3>
                                            <p>For this demo, SimpleModal is using this "hidden" data for its content. You can also populate the modal dialog with an AJAX response, standard HTML or DOM element(s).</p>
                                            <p>Examples:</p>
                                            <p><code>$('#basicModalContent').modal(); // jQuery object - this demo</code></p>
                                            <p><code>$.modal(document.getElementById('basicModalContent')); // DOM</code></p>
                                            <p><code>$.modal('&lt;p&gt;&lt;b&gt;HTML&lt;/b&gt; elements&lt;/p&gt;'); // HTML</code></p>
                                            <p><code>$('&lt;div&gt;&lt;/div&gt;').load('page.html').modal(); // AJAX</code></p>
                                        
                                            <p><a href='http://www.ericmmartin.com/projects/simplemodal/'>More details...</a></p>
                                        </div>
                                        -->
                                		<?
										$id = 12345;
										include ('news_modal.php');
										//require ('news_modal.php?news=1');
                                        ?>
                                        <!-- preload the images -->
                                        <div style='display:none'>
                                            <img src='assets/images/basic/x.png' alt='' />
                                        </div>
                                    </div>
                                    <!--
                                    <div id='footer'>
                                        &copy; 2010 Eric Martin | <a href='http://www.ericmmartin.com/'>ericmmartin.com</a> | <a href='http://twitter.com/ericmmartin'>@ericmmartin</a> | <a href='http://twitter.com/simplemodal'>@simplemodal</a>
                                    </div>
                                    -->
                                </div>
                          </td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td>
                          <div id='container'>
                                    <div id='content'>
                                        <div id='basic-modal'>
                                            <h3>Basic Modal Dialog</h3>
                                            <p>A basic modal dialog with minimal styling and no additional options. There are a few CSS properties set internally by SimpleModal, however, SimpleModal relies mostly on style options and/or external CSS for the look and feel.</p>
                                            <input type='button' name='basic' value='Demo' class='basic'/> or <a href='#' class='basic'>Demo</a>                                            
                                        </div>                                                                                
                                        <!-- modal content -->                                        
                                        <!--
                                        <div id="basic-modal-content">
                                            <h3>Basic Modal Dialog</h3>
                                            <p>For this demo, SimpleModal is using this "hidden" data for its content. You can also populate the modal dialog with an AJAX response, standard HTML or DOM element(s).</p>
                                            <p>Examples:</p>
                                            <p><code>$('#basicModalContent').modal(); // jQuery object - this demo</code></p>
                                            
                                        </div>                                        
                                        -->
                                		<?
										$id = 1234567890;
										include ('news_modal.php');
                                        ?>
                                        <!-- preload the images -->
                                        <div style='display:none'>
                                            <img src='assets/images/basic/x.png' alt='' />
                                        </div>
                                    </div>
                            </div>
                          </td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>                        
                    </tbody>
                </table>
          <!--<table width="100%" cellpadding="5" cellspacing="0" align="center" class="tdGreen">-->
          <table class="kunews" align="center" width="100%">
          	<thead>
                <tr > 
                <!--
                  <td width="15%" align="center" bordercolor="#99CCFF"><b><u>รายวิชา</u></b></td>
                  <td width="52%" align="center" bordercolor="#99CCFF"><b><u>ข่าวประกาศ</u></b></td>
                  <td width="20%" align="center" bordercolor="#99CCFF"><b><u>ผู้ประกาศ</u></b></td>
                  <td width="13%" align="center" bordercolor="#99CCFF"><b><u>วันที่ประกาศ</u></b></td>
                -->
                    <th width="13%" ><strong>รายวิชา</strong></th>
                    <th width="58%" ><strong>ข่าวประกาศ</strong></th>
                    <th width="17%" ><strong>ผู้ประกาศ</strong></th>
                    <th width="12%" ><strong>วันที่ประกาศ</strong></th>
                </tr>
            </thead>    
            <?
           $color=0;								   
               // $news_c=mysql_query("SELECT nc.txt_news,nc.courses, c.name FROM news_courses as nc, courses as c WHERE nc.courses=c.id AND nc.news_area=1 and nc.expired_date>=now() AND c.active=1 ORDER BY nc.id desc LIMIT 0, 5;");
               /*  nc.id,nc.subject,nc.title,nc.courses
                $news_c=mysql_query("SELECT nc.id, nc.txt_news,nc.courses, nc.post_date, c.name, c.section, kf.id AS faculty, kf.FAC_NAME, kf.NAME_ENG, u.id AS uid, u.title, u.firstname, u.surname  
                                                                FROM news_courses as nc, courses as c , users u , ku_faculty kf
                                                                WHERE nc.courses=c.id AND nc.news_area=1 and nc.expired_date>=now() AND c.active=1 AND u.id=c.users AND kf.id=u.fac_id 
                                                                ORDER BY u.fac_id, nc.id DESC;");
                */			
                $news_c=mysql_query("SELECT  nc.id,nc.subject ,nc.title AS title_news ,nc.courses, nc.post_date, c.name, c.section, kf.id AS faculty, kf.FAC_NAME, kf.NAME_ENG, u.id AS uid, u.title, u.firstname, u.surname  
                                                                FROM news_courses as nc, courses as c , users u , ku_faculty kf
                                                                WHERE nc.courses=c.id AND nc.news_area=1 and nc.expired_date>=now() AND c.active=1 AND u.id=c.users AND kf.id=u.fac_id 
                                                                ORDER BY u.fac_id, nc.id DESC;");									
                if (mysql_num_rows($news_c) != 0) {
                
                    if($row_news=mysql_fetch_array($news_c))
                    {										  
                         $faculty = $row_news["faculty"];
                         $news_id = $row_news["id"];
                    ?>
            <tr  bgcolor="#99CC33" > 
              <td colspan="5"  class="tdGreen">
              <table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <thead>
                      <tr> 
                        <th width="11%" align="center"><font color="#FFFFFF"><b><u>คณะ</u></b></font><b><font color="#FFFFFF"></font></b></th>
                        <th width="89%"><b><font color="#FFFFFF"><?php echo $row_news["FAC_NAME"]; ?></font></b></th>
                      </tr>
                  <thead>
                  
                </table>
                </td>
            </tr>
            <tr bgcolor="#C8FF91" VALIGN="top"> 
              <td class="tdG"><img src="../images/right_green.gif"  alt="" border="0" width="10" height="10">&nbsp;<? echo $row_news["name"]; ?> 
                <?php if($row_news["section"] != "") echo " (".$row_news["section"].")";?>
              </TD>
              <td class="tdG">
              <?php //echo $row_news["txt_news"];  ?>
              <a   class="AS" href="#" onClick="NewWindow('../courses/news_detail.php?id=<? echo $row_news["id"] ;?>&courses=<? echo $row_news["courses"] ;?>','name','650','500','yes');return false" > 
                <? echo $row_news["subject"];?>
                </a><br>
                
                <? 	
                    
                     if(strlen($row_news["title_news"])>100) {
                        echo nl2br(substr($row_news["title_news"],0,100))."...";
                     }  else {
                        echo nl2br($row_news["title_news"]);
                        }
                    ?>
              </td>
              <td align="center" class="tdG"> <a  href="#" onClick="NewWindow('../personal/info_fpage.php?userid=<? echo  $row_news["uid"];?>&page=1','name','650','500','yes');return false" > 
                <?php echo $row_news["title"].$row_news["firstname"]."  ".$row_news["surname"];  ?> 
                </a> </td>
              <td align="center"><?php echo $row_news["post_date"];  ?></td>
            </tr>
            <?
                        $color = 1; 
                     }
                     
                    while($row_news=mysql_fetch_array($news_c)){												
                        if ($faculty == $row_news["faculty"]) {
                            if ($news_id != $row_news["id"]) {
                                if ($color == 0) {									
                                ?>
            <tr bgcolor="#C8FF91" VALIGN="top"> 
              <td class="tdG"><img src="../images/right_green.gif"  alt="" border="0" width="10" height="10">&nbsp;<? echo $row_news["name"]; ?> 
                <?php if($row_news["section"] != "") echo " (".$row_news["section"].")";?>
              </TD>
              <td class="tdG">
              <?php //echo $row_news["txt_news"];  ?>
              <a   class="AS" href="#" onClick="NewWindow('../courses/news_detail.php?id=<? echo $row_news["id"] ;?>&courses=<? echo $row_news["courses"] ;?>','name','650','500','yes');return false" > 
                <? echo $row_news["subject"];?>
                </a><br>
                
                <? 	
                    
                      if(strlen($row_news["title_news"])>100) {
                        echo nl2br(substr($row_news["title_news"],0,100))."...";
                     }  else {
                        echo nl2br($row_news["title_news"]);
                        }
                    ?>
              </TD>
              <td align="center" class="tdG"> <a  href="#" onClick="NewWindow('../personal/info_fpage.php?userid=<? echo  $row_news["uid"];?>&page=1','name','650','500','yes');return false" > 
                <?php echo $row_news["title"].$row_news["firstname"]."  ".$row_news["surname"];  ?> 
                </a> </TD>
              <td align="center"><?php echo $row_news["post_date"];  ?></TD>
            </tr>
            <?php	    
                                    $color = 1;
                                } else {									
                                ?>
            <tr  VALIGN="top"> 
              <td class="tdG"><img src="../images/right_green.gif"  alt="" border="0" width="10" height="10">&nbsp;<? echo $row_news["name"]; ?> 
                <? if($row_news["section"] != "") echo " (".$row_news["section"].")";?>
              </TD>
              <td class="tdG">
              <? //echo $row_news["txt_news"]; ?>
              <a   class="AS" href="#" onClick="NewWindow('../courses/news_detail.php?id=<? echo $row_news["id"] ;?>&courses=<? echo $row_news["courses"] ;?>','name','650','500','yes');return false" > 
                <? echo $row_news["subject"];?>
                </a><br>
                
                <? 	
                    
                     if(strlen($row_news["title_news"])>100) {
                        echo nl2br(substr($row_news["title_news"],0,100))."...";
                     }  else {
                        echo nl2br($row_news["title_news"]);
                        }
                    ?>
              </TD>
              <td align="center" class="tdG"> <a  href="#" onClick="NewWindow('../personal/info_fpage.php?userid=<? echo  $row_news["uid"];?>&page=1','name','650','500','yes');return false" > 
                <?php echo $row_news["title"].$row_news["firstname"]."  ".$row_news["surname"];  ?> 
                </a> </TD>
              <td align="center"><?php echo $row_news["post_date"];  ?></TD>
            </tr>
            <?  
                                    $color = 0;
                                }
                            }
                        } else {
                                $faculty = $row_news["faculty"];
                                $news_id = $row_news["id"];
                                $color = 0;												
                        ?>
            <tr  bgcolor="#99CC00" > 
              <td colspan="5" class="tdGreen"><table width="100%" border="0" cellspacing="0" cellpadding="1">
                  <thead>
                      
                        <th width="11%" align="center"><font color="#FFFFFF"><b><u>คณะ</u></b></font><b><font color="#FFFFFF"></font></b></th>
                        <th width="89%"><b><font color="#FFFFFF"><?php echo $row_news["FAC_NAME"]; ?></font></b></th>
                      
                  <thead>
                </table></td>
            </tr>
            <?php		
                                if ($color == 0) {									
                                        ?>
            <tr bgcolor="#C8FF91" VALIGN="top"> 
              <td class="tdG"><img src="../images/right_green.gif"  alt="" border="0" width="10" height="10">&nbsp;<? echo $row_news["name"]; ?> 
                <?php if($row_news["section"] != "") echo " (".$row_news["section"].")";?>
              </TD>
              <td bgcolor="#C8FF91" class="tdG">
              <?php //echo $row_news["txt_news"];  ?>
              <a   class="AS" href="#" onClick="NewWindow('../courses/news_detail.php?id=<? echo $row_news["id"] ;?>&courses=<? echo $row_news["courses"] ;?>','name','650','500','yes');return false" > 
                <? echo $row_news["subject"];?>
                </a><br>
                
                <? 	
                    
                      if(strlen($row_news["title_news"])>100) {
                        echo nl2br(substr($row_news["title_news"],0,100))."...";
                     }  else {
                        echo nl2br($row_news["title_news"]);
                        }						  					?>
              </TD>
              <td align="center" class="tdG"> <a  href="#" onClick="NewWindow('../personal/info_fpage.php?userid=<? echo  $row_news["uid"];?>&page=1','name','650','500','yes');return false" > 
                <?php echo $row_news["title"].$row_news["firstname"]."  ".$row_news["surname"];  ?> 
                </a> </TD>
              <td align="center"><?php echo $row_news["post_date"];  ?></TD>
            </tr>
            <?php	    
                                            $color = 1;
                                        } else {									
                                        ?>
            <tr  VALIGN="top"> 
              <td class="tdG"><img src="../images/right_green.gif"  alt="" border="0" width="10" height="10">&nbsp;<? echo $row_news["name"]; ?> 
                <? if($row_news["section"] != "") echo " (".$row_news["section"].")";?>
              </TD>
              <td class="tdG">
              <? //echo $row_news["txt_news"]; ?>
              <a   class="AS" href="#" onClick="NewWindow('../courses/news_detail.php?id=<? echo $row_news["id"] ;?>&courses=<? echo $row_news["courses"] ;?>','name','650','500','yes');return false" > 
                <? echo $row_news["subject"];?>
                </a><br>
                
                <? 	
                    
                      if(strlen($row_news["title_news"])>100) {
                        echo nl2br(substr($row_news["title_news"],0,100))."...";
                     }  else {
                        echo nl2br($row_news["title_news"]);
                        }
                    ?>
              </TD>

              <td align="center" class="tdG"> <a  href="#" onClick="NewWindow('../personal/info_fpage.php?userid=<? echo  $row_news["uid"];?>&page=1','name','650','500','yes');return false" > 
                <?php echo $row_news["title"].$row_news["firstname"]."  ".$row_news["surname"];  ?> 
                </a> </TD>
              <td align="center"><?php echo $row_news["post_date"];  ?></TD>
            </tr>
            <?  
                                            $color = 0;
                                        }
                        }																								
                        
                   } // end while
            }
           ?>
          </table>
          <!--
          <table class="kunews" align="center" width="100%">
              <thead>
                <tr>
                  <th colspan="4"><strong><img src="assets/images/icons_dark/124-bullhorn.png" width="16" height="16"> คณะ </strong></th>
                </tr>
                <tr>
                  <th width="13%" ><strong>รายวิชา</strong></th>
                  <th width="58%" ><strong>ข่าวประกาศ</strong></th>
                  <th width="17%" ><strong>ผู้ประกาศ</strong></th>
                  <th width="12%" ><strong>วันที่ประกาศ </strong></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
            -->          
            <!--    
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
            -->
	  </div>
	</div>
	<div class="abs footer_lower chrome_light">
		<!--
        <a href="#" class="float_left button">
			Foo
		</a>
		<a href="#" class="float_left button">
			Bar
		</a>
		<a href="#" class="icon icon_bird float_right"></a>        
        -->
        <a href="#" class="icon icon_network float_right"></a>
		<!--<a href="#">Kasetsart University</a>-->
        Kasetsart University
	</div>
</div>
<div id="sidebar" class="abs">
	<span id="nav_arrow"></span>
	<div class="abs header_upper chrome_light">
		Main Menu
	</div>
    
	<!--
    <form action="" class="abs header_lower chrome_light">
		<input type="search" id="q" name="q" placeholder="Search..." />
	</form>
    -->
    <!--
    <form action="" class="abs header_lower chrome_light">
		<input type="text" id="login" name="login" placeholder="login..."/><br>
        <input type="text" id="password" name="password" placeholder="password..."/>
	</form>
    -->
    <!--
    <form action="login.php" enctype="multipart/form-data" method="post" class="abs header_lower chrome_light">
        <table class="login" align="center">
            <thead>
                <tr>
                    <th><img src="assets/images/icons_dark/54-lock.png" width="20" height="24"></th>
                    <th>                      
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Username
                    </td>
                    <td>
                        <input type="text" id="user" name="user" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password
                  </td>
                    <td>
                        <input type="password" id="pass" name="pass" />
                    </td>
              </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Submit" />&nbsp;
                        <input type="reset" value="Reset" /></td>
                </tr>                        
            </tbody>
        </table>
    </form>
    -->
	<div id="sidebar_content" class="abs">
		<div id="sidebar_content_inner">
			<ul id="sidebar_menu">
				<li id="sidebar_menu_home" class="active">
					<a href="#"><span class="abs"></span>Home</a>
				</li>
				
                <li>
					<a href="ilogins.php">Login</a>
				</li>
                <!--
				<li>
					<a href="#">News Courses</a>
					<ul>
						<li>
							<a href="#">123456-1</a>
							<ul>
								<li>
									<a href="#">News-1</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">News-2</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">News-3</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">123456-2</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">123456-3</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Documents Courses</a>
					<ul>
						<li>
							<a href="#">123456-1</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">123456-2</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">123456-3</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">123456-4</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Primary Link Title Here</a>
					<ul>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Primary Link Title Here</a>
					<ul>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Primary Link Title Here</a>
					<ul>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Secondary Link Title Here</a>
							<ul>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">Tertiary Link Title Here</a>
									<ul>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
										<li>
											<a href="#">Quaternary Link Title Here</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
					</ul>
				</li>
                -->
			</ul>
		</div>
	</div>
	<div class="abs footer_lower chrome_light">
		<a href="#" class="icon icon_gear2 float_left"></a>
		<span class="float_right gutter_right">version 1.0</span>
	</div>
</div>
</body>
</html>