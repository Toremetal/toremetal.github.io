<?php
$name="";
$name=$_GET['name'];
//echo $name;
//if ($name != "") {
//    setcookie('account', $name, 1, '/;domain='.$hst.';SameSite=Strict');
//}

$cookie_name = "account";
if (!isset($_COOKIE[$cookie_name])) {
    header('Location: /androids/createaccount/');
} else if ($name == "") {
    header('Location: /androids/createaccount/');
}

$hst = $_SERVER['HTTP_HOST'];
$req = $_SERVER['REQUEST_URI'];
$i = 12;
$bytes = openssl_random_pseudo_bytes($i, $cstrong);
$hex = bin2hex($bytes);
$bytes = openssl_random_pseudo_bytes($i, $cstrong);
$hex1 = bin2hex($bytes);
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <title>™T©ReMeTaL - Apps</title>
<meta name="description" content="Easy-to-Use Applications, Designed for Everyone."> 
<meta name="keywords" content="Point of Sale, Purchase Tracker, Signs, ReMeTaL, ™T©ReMeTaL"> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta property="og:image" content="/img/favicon.png">
    <meta property="og:title" content="™T©ReMeTaL">
    <meta property="og:type" content="website">
    <meta property="og:url" content=".toremetal.com/">
    <meta property="og:description" content="Easy-to-Use Applications, Designed for Everyone.">
    <meta itemprop="name" content="™T©ReMeTaL">
    <meta itemprop="description" content="Easy-to-Use Applications, Designed for Everyone.">
    <meta itemprop="url" content=".toremetal.com/">
    <meta itemprop="thumbnailUrl" content="/img/favicon.png">
    <meta itemprop="image" content="/img/favicon.png">
    <meta itemprop="imageUrl" content="/img/favicon.png">
   <link rel="icon" href="/img/logo.png" type="image/png">
   <link rel="icon" href="/img/logo.webp" type="image/webp">
<link rel="canonical" href="http://toremetal.com/Disclaimer"> 
<meta name="theme-color" content="#ffffff"> 
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/css/cookies.css" type="text/css">

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149650262-1"></script> 
<script> 
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-149650262-1');
</script>
</head> 
<body style="background-color:#29292990;height:100%;width:100%;align:center;">
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=218761056974715&autoLogAppEvents=1" nonce="UkA12KSF"></script>
<!-- Messenger Chat Plugin Code -->

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "226195990786734");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<div> 

    <header style="height:100%;">
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo" style="font-size:1.75rem; white-space:nowrap; padding:var(--universal-padding) calc(2 * var(--universal-padding))">
                                <li><span class="h1 block bold caps my1" style="color:#808080;"><img src="/img/favicon.png" alt="logo" height="48" width="48"/>™T©ReMeTaL</span></li>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main" >
<ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb0">
<li>
<a href="/">HOME</a>
</li>
<li>
<a href="/apps/">APPS</a>
</li>
<li><a href="https://www.youtube.com/channel/UCgyGtbmWqdeSc_JVvENQwsA">
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   version="1.1"
   id="Layer_1"
   x="0px"
   y="0px"
   viewBox="0 0 71.412065 50"
   xml:space="preserve"
   inkscape:version="0.91 r13725"
   sodipodi:docname="YouTube_full-color_icon (2017).svg"
   width="26.779524"
   height="18.75"><metadata
     id="metadata33"><rdf:RDF><cc:Work
         rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" /><dc:title>YouTube</dc:title></cc:Work></rdf:RDF></metadata><defs
     id="defs31" />
<sodipodi:namedview
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1"
     objecttolerance="10"
     gridtolerance="10"
     guidetolerance="10"
     inkscape:pageopacity="0"
     inkscape:pageshadow="2"
     inkscape:window-width="1366"
     inkscape:window-height="715"
     id="namedview29"
     showgrid="false"
     fit-margin-top="0"
     fit-margin-left="0"
     fit-margin-right="0"
     fit-margin-bottom="0"
     inkscape:zoom="1.3588925"
     inkscape:cx="-71.668263"
     inkscape:cy="39.237696"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="Layer_1" />
<style type="text/css" id="style3">
	.st0{fill:#FF0000;}
	.st1{fill:#FFFFFF;}
	.st2{fill:#282828;}
</style><g
     id="g5"
     transform="scale(0.58823529,0.58823529)"><path
       class="st0"
       d="M 118.9,13.3 C 117.5,8.1 113.4,4 108.2,2.6 98.7,0 60.7,0 60.7,0 60.7,0 22.7,0 13.2,2.5 8.1,3.9 3.9,8.1 2.5,13.3 0,22.8 0,42.5 0,42.5 0,42.5 0,62.3 2.5,71.7 3.9,76.9 8,81 13.2,82.4 22.8,85 60.7,85 60.7,85 c 0,0 38,0 47.5,-2.5 5.2,-1.4 9.3,-5.5 10.7,-10.7 2.5,-9.5 2.5,-29.2 2.5,-29.2 0,0 0.1,-19.8 -2.5,-29.3 z"
       id="path7"
       inkscape:connector-curvature="0"
       style="fill:#ff0000" /><polygon
       class="st1"
       points="80.2,42.5 48.6,24.3 48.6,60.7 "
       id="polygon9"
       style="fill:#ffffff" /></g><title>YouTube™</title></svg>
</a></li>
<li><a href="https://twitter.com/TheToReMetal" target="_blank">
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28" height="28" viewBox="0 0 400 400" xml:space="preserve">
<style type="text/css">
	.st0{fill:#000000;}
	.st1{fill:#FFFFFF;}
	.st3{fill:#1B9DF080;}
	.st4{fill:#00808080;}
</style>
<g id="Dark_Blue">
	<circle class="st3" cx="200" cy="200" r="200"/>
</g>
<g id="Logo__x2014__FIXED">
	<path class="st1" d="M163.4,305.5c88.7,0,137.2-73.5,137.2-137.2c0-2.1,0-4.2-0.1-6.2c9.4-6.8,17.6-15.3,24.1-25
		c-8.6,3.8-17.9,6.4-27.7,7.6c10-6,17.6-15.4,21.2-26.7c-9.3,5.5-19.6,9.5-30.6,11.7c-8.8-9.4-21.3-15.2-35.2-15.2
		c-26.6,0-48.2,21.6-48.2,48.2c0,3.8,0.4,7.5,1.3,11c-40.1-2-75.6-21.2-99.4-50.4c-4.1,7.1-6.5,15.4-6.5,24.2
		c0,16.7,8.5,31.5,21.5,40.1c-7.9-0.2-15.3-2.4-21.8-6c0,0.2,0,0.4,0,0.6c0,23.4,16.6,42.8,38.7,47.3c-4,1.1-8.3,1.7-12.7,1.7
		c-3.1,0-6.1-0.3-9.1-0.9c6.1,19.2,23.9,33.1,45,33.5c-16.5,12.9-37.3,20.6-59.9,20.6c-3.9,0-7.7-0.2-11.5-0.7
		C110.8,297.5,136.2,305.5,163.4,305.5"/>
</g><title>Twitter™</title>
</svg>
</a>
</li><li>
<a href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Google Play™" src="/img/play_store.webp" alt="logo" height="22" width="22"/></a>
</li><li>
<a href="https://www.facebook.com/TheToremetal" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14222 14222"><circle cx="7111" cy="7112" r="7111" fill="#000000"/><path d="M9879 9168l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4969c362 57 733 86 1111 86s749-30 1111-86V9168z" fill="#FFFFFF"/>
<title>facebook™</title></svg>
</a>
</li><li>
<a href="https://m.me/TheToremetal"><img title="Messenger™" height="24" width="24" src="/img/messenger.webp" alt="icon" /></a>
</li>
</ul>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="banner_section">
        <div class="banner-main">
            <img src="/img/banner2.jpg" />
            <div class="container">
                <div class="text-bg relative my0">
                    <h1 style="color:#0a60ffFF">™T©ReMeTaL<br><span class="Perfect" style="color:#FFFFFF">Easy-to-Use Applications</span><br>Designed for Everyone.</h1>
                    <a style="background-color:#80808000;" target="_blank" href='https://play.google.com/store/apps/dev?id=7952290850776080706'>
                    <img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                </div>
            </div>
        </div>
    </section>
    
<div align="center" style="height:100%;width:100%;align:center;"> 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" crossorigin="anonymous"></script> 
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8927593002808864" 
     data-ad-slot="2822185833" 
     data-ad-format="auto" 
     data-full-width-responsive="true">
</ins>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>

	<div class="container"> 
		<div class="main"> 
			<div class="row">
				<div class="col-sm-2 col-md-2">
				</div>
				<div class="col-sm-12 col-md-8">
        <div class="section app-content contactus" style="background-color:#FFFFFF90;align:justify">
<span class="h1 block bold caps my1">Display your apps on ™T©ReMeTaL</span><hr/>
<div align="center" style="width:100%; height:100%; position: top; border: none; color:white; font-size:100%;">
<div class="col-lg-8 col-md-8 col-sm-12 width">
                        <div class="address">
                            <h4>*App must be available on Google Play*</h4>
                            <form id="myForm">
                                <div class="row">
                                    <div class="col-sm-12">
<input style="width:0%;height:0%;display:none" class="hidden" placeholder="app" type="text" value="app" name="cookie">
<input style="width:0%;height:0%;display:none" class="hidden" id='dev' class="contactus" placeholder="Developer Name" type="text" name="developer" value="<?=$name?>"><h3>Developer: <?=$name?></h3>
                                    </div>
                                    <div class="col-sm-12">
<input style="width:100%" id='app' class="contactus" placeholder="app" type="text" name="app" required>
                                    </div>
                                    <div class="col-sm-12">
<input class="contactus" id='pac' style="width:100%" placeholder="APK-Name com.<?=strtolower($name)?>.___" type="text" name="package" required>
                                    </div>
                                    <div class="col-sm-12">
<input class="contactus" id='tub' style="width:100%" placeholder="(YT)Video Embed Link" type="url" name="utube">
                                    </div>
                                    <div class="col-sm-12">
<input class="contactus" id='api' style="width:100%" placeholder="API-Level(4.4,5.0,11.0)" type="number" step="any" name="api" required>
                                    </div>
                                    <div class="col-sm-12">
                                        
<input class="contactus" id='img' style="width:100%" placeholder="Image Embed Link" type="url" name="image" required>
                                    </div>

                                    <div class="col-sm-12">
<textarea class="textarea" id='des' style="width:100%" placeholder="Short Description" type="text" name="shortDescription" required></textarea>
                                    </div>
                                    <div class="col-sm-12">
<textarea class="textarea" id='fdes' style="width:100%" placeholder="Full Description" type="text" name="Description" required></textarea>
                                    </div>
                                    <div class="col-sm-12">
<button onclick="setCookie('app','value')" formaction="/androids/" method='post' class="send">Submit</button>
                                    </div>
                                 </div>                              
                            </form>
                            <!--<div class="col-sm-2 col-md-2">
				<button onclick='gFile()' type='radio' name='gFile' value="gFile">G-File</button></div>-->
                        </div>
                    </div>
<script>
function gFile() {
    var dfix=document.getElementById("fdes").value;
    dfix=dfix.replace(/\r/g,'');
    dfix=dfix.replace(/\n/g,'');
    dfix=dfix.replace(/'/g,'');
    dfix=dfix.replace(/<br>/g,'');
    document.getElementById("fdes").value=dfix;
    dfix=document.getElementById("des").value;
    dfix=dfix.replace(/\r/g,'');
    dfix=dfix.replace(/\n/g,'');
    dfix=dfix.replace(/'/g,'');
    dfix=dfix.replace(/<br>/g,'');
    document.getElementById("des").value=dfix;
    var imlink=document.getElementById("img").value.replace('https://drive.google.com/file/d/','https://drive.google.com/uc?id=');
    document.getElementById("img").value=imlink.replace('/view?usp=sharing','');
    if (document.getElementById("tub").value=='') {
        document.getElementById("tub").value=document.getElementById("img").value
    }
};
function setCookie(name,value) {
    gFile();
    var value1=document.getElementById("dev").value+'|'+document.getElementById("app").value+'|'+document.getElementById("pac").value+'|'+document.getElementById("tub").value+'|'+document.getElementById("api").value+'|'+document.getElementById("des").value+'|'+document.getElementById("fdes").value+'|'+document.getElementById("img").value;
    var expires = "";
    var date = new Date();
    date.setTime(date.getTime() + 1000);
    expires = "; expires=" + date.toUTCString();
    document.cookie = name + "=" + (value1 || "")  + expires + "; path=/";
}
function handleFormSubmit(send) {
    document.getElementById("myForm").reset();
}</script></div>
<p align="center">By submitting your information you agree to the terms, conditions, and policies of ™T©ReMeTaL.</p>
<p><b>UNDER NO CIRCUMSTANCE SHALL WE HAVE ANY LIABILITY TO YOU FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE USE OF ANY INFORMATION, SERVICE, OR APPLICATION PROVIDED BY ™T©ReMeTaL OR RELIANCE ON ANY INFORMATION, SERVICE, OR APPLICATION PROVIDED BY ™T©ReMeTaL. YOUR USE OF ™T©ReMeTaL SITES, SERVICES, PRODUCTS, INFORMATION AND YOUR RELIANCE ON ANY PROVISION OF ™T©ReMeTaL IS SOLELY AT YOUR OWN RISK.</b></p>
<hr/><div align="right"><i style="color:#FFFFFF90">last updated: 7/12/2021</i></div>


</div>
<?php
if (isset($_COOKIE['account'])) {
    $devname=$_COOKIE['account'];
    if (file_exists('../sub/devs/'.$name)) {
		$file = fopen('../sub/devs/'.$name, 'r');
		echo '<div class="section app-content contactus" style="background-color:#FFFFFF90; align:justify; font-size:1.00rem; white-space:wrap; padding:var(--universal-padding) calc(4 * var(--universal-padding))"><h1>'.$name.' App Submissions</h1><div class="row" style="align:center; font-size:1.00rem; white-space:wrap; padding:var(--universal-padding) calc(4 * var(--universal-padding))">';
		//Output lines until EOF is reached
		while(! feof($file)) {
			$line = fgets($file);
			echo $line;
		}
		fclose($file);
		echo '</div></div>';
	}
}
?>
				</div> 
			</div> 
		</div> 
	</div> 
</div>
<div>
<footer class="ampstart-footer flex flex-column items-center px3 "><!-- style="background-color:#42577e80;"-->
   <!-- Copyright -->
   <div class="container" align="center" style="background-color:#49494900"><br>
       <div align="center" style="height: 100%; width: 100%;" >
            <a target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Get it on Google Play™" style="align: center; height; 100%" src="/img/AppsOnGooglePlay.webp" border="0" /></a>
       </div><br>
      <ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb0">
        <a href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Google Play™" src="/img/play_store.webp" alt="logo" height="22" width="22"/></a>
        <a href="https://twitter.com/TheToReMetal" target="_blank">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28" height="28" viewBox="0 0 400 400" xml:space="preserve">
<style type="text/css">
	.st0{fill:#000000;}
	.st1{fill:#FFFFFF;}
	.st3{fill:#1B9DF080;}
	.st4{fill:#00808080;}
</style>
        <g id="Dark_Blue"><circle class="st3" cx="200" cy="200" r="180"/></g>
        <g id="Logo__x2014__FIXED">
	<path class="st1" d="M163.4,305.5c88.7,0,137.2-73.5,137.2-137.2c0-2.1,0-4.2-0.1-6.2c9.4-6.8,17.6-15.3,24.1-25
		c-8.6,3.8-17.9,6.4-27.7,7.6c10-6,17.6-15.4,21.2-26.7c-9.3,5.5-19.6,9.5-30.6,11.7c-8.8-9.4-21.3-15.2-35.2-15.2
		c-26.6,0-48.2,21.6-48.2,48.2c0,3.8,0.4,7.5,1.3,11c-40.1-2-75.6-21.2-99.4-50.4c-4.1,7.1-6.5,15.4-6.5,24.2
		c0,16.7,8.5,31.5,21.5,40.1c-7.9-0.2-15.3-2.4-21.8-6c0,0.2,0,0.4,0,0.6c0,23.4,16.6,42.8,38.7,47.3c-4,1.1-8.3,1.7-12.7,1.7
		c-3.1,0-6.1-0.3-9.1-0.9c6.1,19.2,23.9,33.1,45,33.5c-16.5,12.9-37.3,20.6-59.9,20.6c-3.9,0-7.7-0.2-11.5-0.7
		C110.8,297.5,136.2,305.5,163.4,305.5"/></g>
        <title>Twitter™</title></svg></a>
        <a href="https://m.me/TheToremetal"><img title="Messenger™" height="24" width="24" src="/img/messenger.webp" alt="icon" /></a>
        <a href="https://www.facebook.com/TheToremetal" target="_blank">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14222 14222"><circle cx="7111" cy="7112" r="7111" fill="#000000"/><path d="M9879 9168l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4969c362 57 733 86 1111 86s749-30 1111-86V9168z" fill="#FFFFFF"/>
        <title>facebook™</title></svg></a>
       
       <a href="https://www.youtube.com/channel/UCgyGtbmWqdeSc_JVvENQwsA">
<svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   version="1.1"
   id="Layer_1"
   x="0px"
   y="0px"
   viewBox="0 0 71.412065 50"
   xml:space="preserve"
   inkscape:version="0.91 r13725"
   sodipodi:docname="YouTube_full-color_icon (2017).svg"
   width="24"
   height="16"><metadata
     id="metadata33"><rdf:RDF><cc:Work
         rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type
           rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
  <dc:title>YouTube</dc:title></cc:Work></rdf:RDF></metadata>
  <defs
     id="defs31" />
<sodipodi:namedview
     pagecolor="#ffffff"
     bordercolor="#666666"
     borderopacity="1"
     objecttolerance="10"
     gridtolerance="10"
     guidetolerance="10"
     inkscape:pageopacity="0"
     inkscape:pageshadow="2"
     inkscape:window-width="1366"
     inkscape:window-height="715"
     id="namedview29"
     showgrid="false"
     fit-margin-top="0"
     fit-margin-left="0"
     fit-margin-right="0"
     fit-margin-bottom="0"
     inkscape:zoom="1.3588925"
     inkscape:cx="-71.668263"
     inkscape:cy="39.237696"
     inkscape:window-x="-8"
     inkscape:window-y="-8"
     inkscape:window-maximized="1"
     inkscape:current-layer="Layer_1" />
  <style
     type="text/css"
     id="style3">
	.st0{fill:#FF0000;}
	.st1{fill:#FFFFFF;}
	.st2{fill:#282828;}
</style><g
     id="g5"
     transform="scale(0.58823529,0.58823529)"><path
       class="st0"
       d="M 118.9,13.3 C 117.5,8.1 113.4,4 108.2,2.6 98.7,0 60.7,0 60.7,0 60.7,0 22.7,0 13.2,2.5 8.1,3.9 3.9,8.1 2.5,13.3 0,22.8 0,42.5 0,42.5 0,42.5 0,62.3 2.5,71.7 3.9,76.9 8,81 13.2,82.4 22.8,85 60.7,85 60.7,85 c 0,0 38,0 47.5,-2.5 5.2,-1.4 9.3,-5.5 10.7,-10.7 2.5,-9.5 2.5,-29.2 2.5,-29.2 0,0 0.1,-19.8 -2.5,-29.3 z"
       id="path7"
       inkscape:connector-curvature="0"
       style="fill:#ff0000" /><polygon
       class="st1"
       points="80.2,42.5 48.6,24.3 48.6,60.7 "
       id="polygon9"
       style="fill:#ffffff" /></g>
        <title>YouTube™</title></svg></a>
      </ul>
      <form action="https://www.paypal.com/donate" method="post" target="_top"><input type="hidden" name="hosted_button_id" value="NCK58ZSYB5WUL" /><input type="image" src="/img/btn_donateCC_LG.webp" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="PayPal" border="0" src="/img/btn_donateCC_LG.webp" width="1" height="1" />
      </form>
      <small style="align: center">
        <a href="https://www.toremetal.com/termsandconditions">Terms-of-Use</a> | 
        <a href="/privacy-policy/">Privacy-Policy</a> | 
        <a href="/cookiepolicy/">Cookie-Policy</a> | 
        <a href="/disclaimer/">Disclaimer</a> | 
        <a href="/ad-settings/">Ads Settings</a>
        <br>
<script>
function yr(){
const d = new Date();
return d.getFullYear();
}
</script>
       <p align="center">©<script>document.write(yr())</script>™T©ReMeTaL</p>
        “Android, Google Play, and the Google Play logo are trademarks of Google LLC.”
      </small>
      <div style="text-align: left;position: fixed;z-index:9999999;bottom: 0;width: auto;left: 0%;cursor: pointer;line-height: 0;display:block !important;">
         <a title="Easy-to-Use Applications, Designed for Everyone. GET IT ON Google Play" target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img src="/img/footer-logo.webp" alt="www.toremetal.com"></a>
      </div>
   </div>
   <!-- End Copyright -->
</footer>
</div>
</body> 
</html>