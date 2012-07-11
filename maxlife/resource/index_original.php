<?
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
    
                  <h1>Tumblelog example</h1>
                                                  
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
            
            <div id="tumblelog" class="clearfix">
            
              <div class="story col2">
                <h2>Last Day Dream</h2>
                <p>
                  <object width="460" height="265"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=4155700&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=ff4000&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=4155700&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=ff4000&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="460" height="265"></embed></object>
                </p>
            
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
              </div>
            
            
              <div class="story col1">
                <blockquote>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </blockquote>
                <p>&mdash; Marcus Aurelius</p>
              </div>
            
              <div class="story col1">
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> 
                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p>Lorem ipsum dolor sit amet.</p>
            
              </div>
            
              <div class="story col2">
                <p>
                  <a href="http://www.flickr.com/photos/george_eastman_house/3123693806/in/set-72157611386593623"><img src="http://farm4.static.flickr.com/3121/3123693806_4cb1ca16d9.jpg" alt="" /></a>
                </p>
              </div>
            
              <div class="story col1">
                <p>
                  <a href="http://www.flickr.com/photos/george_eastman_house/3123692308/in/set-72157611386593623">
                    <img src="http://farm4.static.flickr.com/3282/3123692308_9e81bc4d14.jpg" alt="" />
                  </a>
                </p>
                <p>[PARENTS MAGAZINE, GIRL WITH CAT]</p>
              </div>
            
              <div class="story col1">
                <blockquote>
                  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
                </blockquote>
            
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            
            
              <div class="story col2">
                <object width="460" height="265"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=6185327&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=6185327&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="460" height="265"></embed></object>
              </div>
            
              <div class="story col2">
                <h2>Ut enim ad minim veniam</h2>
                <ul>
                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                   <li>Aliquam tincidunt mauris eu risus.</li>
                   <li>Vestibulum auctor dapibus neque.</li>
                </ul>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. <a href="#">Mauris placerat eleifend leo.</a> Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
              </div>
            
              <div class="story col3">
                <h3>Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.</h3>      
            
            
                <h3>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. <a href="#">Mauris placerat eleifend leo.</a></h3>
              </div>
            
              <div class="story col1">
                <h3>feugiat vitae, ultricies eget</h3>
                <a href="http://www.flickr.com/photos/library_of_congress/2179137415/"><img src="http://farm3.static.flickr.com/2109/2179137415_0e63ebb36e_m.jpg" alt="" /></a>
              </div>
            
              <div class="story col2">
                <h2>A Tremendous Celebration</h2>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
                <ol>
                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                   <li>Aliquam tincidunt mauris eu risus.</li>
                   <li>Vestibulum auctor dapibus neque.</li>
                </ol>
            
              </div>
            
            
              <div class="story col2">
                <h2>And of Deliberate Consequences</h2>
            
                <ol>
                   <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                   <li>Aliquam tincidunt mauris eu risus.</li>
                   <li>Vestibulum auctor dapibus neque.</li>
                </ol>
            
                <h3>Aenean ultricies mi</h3>
            
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
            
                <h3>Vestibulum tortor quam</h3>
            
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
            
              </div>
            
              <div class="story col1">
                <blockquote>
                  <p>Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. 
            
                  </p>
                </blockquote>
              </div>
            
              <div class="story col1">
                <p>
                  <a href="http://www.flickr.com/photos/library_of_congress/2179136893/" title="Women workers install fixtures and assemblies to a tail fuselage section of a B-17F bomber at the Douglas Aircraft Company, Long Beach, Calif. Better known as the &quot;Flying Fortress,&quot; the B-17F is a later model of the B-17 which distinguished itself in acti by The Library of Congress, on Flickr"><img src="http://farm3.static.flickr.com/2186/2179136893_a12b3ace56_m.jpg" alt="Women workers install fixtures and assemblies to a tail fuselage section of a B-17F bomber at the Douglas Aircraft Company, Long Beach, Calif. Better known as the &quot;Flying Fortress,&quot; the B-17F is a later model of the B-17 which distinguished itself in acti"></a>
                </p>
                <p>
            
                  Women workers install fixtures and assemblies to a tail fuselage section of a B-17F bomber at the Douglas Aircraft Company, Long Beach, Calif. Better known as the "Flying Fortress," the B-17F is a later model of the B-17 which distinguished itself in action in the South Pacific, over Germany and elsewhere. It is a long range, high altitude heavy bomber, with a crew of seven to nine men, and with armament sufficient to defend itself on daylight missions
                </p>
              </div>
            
              <div class="story col1">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
              </div>
            
              <div class="story col1">
                <p>
                  <a href="http://www.flickr.com/photos/library_of_congress/2178407555/"><img src="http://farm3.static.flickr.com/2008/2178407555_9a9bcfe31f_m.jpg" height="240" alt="" /></a>
                </p>
              </div>
            
            
              <div class="story col3">
                 <object width="700" height="394"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=7174318&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=7174318&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="700" height="394"></embed></object>
              </div>
            
              <div class="story col1">
                <blockquote>
                  <p>Sing, O goddess, the anger of Achilles son of Peleus, that brought countless ills upon the Achaeans. Many a brave soul did it send hurrying down to Hades, and many a hero did it yield a prey to dogs and vultures, for so were the counsels of Jove fulfilled from the day on which the son of Atreus, king of men, and great Achilles, first fell out with one another.</p>
                </blockquote>
            
                <cite><a href="http://classics.mit.edu/Homer/iliad.1.i.html">Homer &mdash; The Iliad</a></cite>
              </div>
            
              <div class="story col1">
                <h2>Aliens attack South Dakota</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <blockquote><p>Yes, it did happen.</p></blockquote>
            
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            
            
            
              </div>
              <div class="story col1">
                <h2>Aliens attack South Dakota</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <blockquote><p>Yes, it did happen.</p></blockquote>
            
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            
            
            
              </div>
              <div class="story col1">
                <h2>Aliens attack South Dakota</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <blockquote><p>Yes, it did happen.</p></blockquote>
            
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            
            
            
              </div>
              <div class="story col1">
                <h2>Aliens attack South Dakota</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <blockquote><p>Yes, it did happen.</p></blockquote>
            
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            
            
            
              </div>
              <div class="story col1">
                <h2>Aliens attack South Dakota</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <blockquote><p>Yes, it did happen.</p></blockquote>
            
                <p><em>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</em> consequat. <strong>Duis aute irure dolor in reprehenderit</strong> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            
            
            
              </div>
              <div class="story col3">
                 <object width="700" height="394"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=7174318&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=7174318&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=1&amp;color=dd4499&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="700" height="394"></embed></object>
              </div>
            
              <div class="story col3">
                 <p style="float: right; margin-left: 20px"><a href="http://www.flickr.com/photos/george_eastman_house/3122875223/in/set-72157611386593623/"><img src="http://farm4.static.flickr.com/3197/3122875223_917b1ccafc.jpg" alt="McCall Cover, Joan Caulfield" /></a></p>
                <h2>And then, there is this.</h2>
                 <p class="caption"><a href="http://www.flickr.com/photos/george_eastman_house/3122875223/in/set-72157611386593623/"><em>McCall Cover, Joan Caulfield</em> by Nickolas Muray</a></p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
              <div class="story col1">
                <h2>Resource 1</h2>
                <img src="../images/resource_icon.png" border="0" width="20" height="150">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>                
              </div>
              <div class="story col1">
                <h2>Resource 2</h2>
                <img src="../images/resource_icon.png" border="0" width="20" height="150">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>                
              </div>
            <div class="story col1">
                <h2>Resource 3</h2>
                <img src="../images/resource_icon.png" border="0" width="20" height="150">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>                
              </div>
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