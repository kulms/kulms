<?
session_start();
//header ('Content-type: text/html; charset=utf-8');
require_once '../connectdb.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<title>M@xLife, Kasetsart University's Powerful e-Learning Suite</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="../assets/stylesheets/master.css" />

<!--[if IE 8]>
<link rel="stylesheet" href="assets/stylesheets/ie8.css" />
<![endif]-->
<!--[if !IE]><!-->
<script src="../assets/javascripts/iscroll.js"></script>
<!--<![endif]-->
<script src="../assets/javascripts/jquery.js"></script>
<script src="../assets/javascripts/master.js"></script>
<script src="../assets/javascripts/jqModal.js"></script>

<script src="../assets/javascripts/jquery.simplemodal.js"></script>
<script src="../assets/javascripts/basic.js"></script>

	<!--<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/base/jquery-ui.css">-->
    <link rel="stylesheet" type="text/css"  href="../assets/stylesheets/base/jquery.ui.all.css" />
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>-->
    <script type="text/javascript" src="../assets/javascripts/jquery-ui-1.8.19.custom.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    
    
</head>
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
        <a href="../logout.php" class="float_right button">
			Sign out
		</a>
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
				Resource Lists
			</h3>
		  <hr />          
            <section id="content">    
               
              <!--<h1>Tumblelog example</h1>-->
              <!--                                    
             <div id="copy">
              <p>A tumblelog is a good example of a typical use case for Masonry.</p>
              <p>There are three sizes of columns used:</p>
            
            <div class="highlight"><pre><code class="css"><span class="nf">#tumblelog</span> <span class="nc">.col1</span> <span class="p">{</span> <span class="k">width</span><span class="o">:</span> <span class="m">220px</span><span class="p">;</span> <span class="p">}</span>
            <span class="nf">#tumblelog</span> <span class="nc">.col2</span> <span class="p">{</span> <span class="k">width</span><span class="o">:</span> <span class="m">460px</span><span class="p">;</span> <span class="p">}</span>
            <span class="nf">#tumblelog</span> <span class="nc">.col3</span> <span class="p">{</span> <span class="k">width</span><span class="o">:</span> <span class="m">700px</span><span class="p">;</span> <span class="p">}</span>
            </code></pre>
            </div>
            
            
              <p>With 10px of margin on right and left sides that makes for a grid with columns 240px wide. The imagesLoaded plugin is used to trigger Masonry once all images are loaded</p>
            
            <div class="highlight"><pre><code class="javascript"><span class="kd">var</span> <span class="nx">$tumblelog</span> <span class="o">=</span> <span class="nx">$</span><span class="p">(</span><span class="s1">&#39;#tumblelog&#39;</span><span class="p">);</span>
            
            <span class="nx">$tumblelog</span><span class="p">.</span><span class="nx">imagesLoaded</span><span class="p">(</span> <span class="kd">function</span><span class="p">(){</span>
              <span class="nx">$tumblelog</span><span class="p">.</span><span class="nx">masonry</span><span class="p">({</span>
                <span class="nx">columnWidth</span><span class="o">:</span> <span class="mi">240</span>
              <span class="p">});</span>
            <span class="p">});</span>
            </code></pre>
            </div>            
            
            </div>
            -->
            <?		
			// module_type =3
            //$sql="SELECT * FROM resources WHERE courses = '".$course."' ORDER BY id";
			$sql="SELECT DISTINCT mt.picture, m.id, m.users, m.active, m.name, m.info, mt.url, mt.url_admin, m.updated, m.updated_users, m.created, mt.id AS mt_type
			FROM modules m, wp, modules_type mt
			WHERE (
			wp.courses ='".$_GET['course']."'
			AND wp.modules = m.id
			AND m.modules_type = mt.id
			AND m.modules_type = 3
			AND wp.cases =0
			AND wp.groups =0
			)
			ORDER BY m.name
			";
            //echo $sql;
            
            $result = mysql_query($sql);
            ?>
            <div id="tumblelog" class="clearfix">                        
			<? while($row=mysql_fetch_array($result))
			{
			?>	
              <div class="story col1">
                <h2><? echo $row["name"];?></h2>
                <img src="../images/resource_icon.png" border="0" >
                  <br>
				  <p><strong>Description:</strong> <? echo $row["info"];?></p>
                  <p><a href="documents.php?course=<? echo $_GET['course'];?>&mid=<? echo $row["id"];?>">show detail</a> ...</p>
              </div>
			<?
			}
            ?>
            </div> <!-- /#tumblelog -->
                        
            <script src="js/jquery-1.7.1.min.js"></script>
            <script src="jquery.masonry.min.js"></script>
            <script>
              $(function(){
            
                var $tumblelog = $('#tumblelog');
              
                $tumblelog.imagesLoaded( function(){
                  $tumblelog.masonry({
                    columnWidth: 240
                  });
                });
              
              });
            </script>
                <!--
                <footer id="site-footer">
                  jQuery Masonry by <a href="http://desandro.com">David DeSandro</a>
                </footer>
                -->
              </section> <!-- #content -->
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
    <form action="" class="abs header_lower chrome_light">
		<input type="search" id="q" name="q" placeholder="Search..." />
	</form>       	
	<?
	require "menu.php";
    ?>		
	<div class="abs footer_lower chrome_light">
		<a href="#" class="icon icon_gear2 float_left"></a>
		<span class="float_right gutter_right">version 1.0</span>
	</div>
</div>
</body>
</html>