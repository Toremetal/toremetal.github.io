<?php
//header('Location: https://www.toremetal.com/');
$loginAddress="/androids/createaccount/";
if (isset($_COOKIE['account'])) {
    $login="Publish";
} else {
    $login="log-in";
}
$loginAddress2="/signs/?signssubmission";
$login2="ASL-Pics";

$hst = $_SERVER['HTTP_HOST'];
$req = $_SERVER['REQUEST_URI'];
//if ($req == "/?yt") {
//    $myfile = fopen("/log/yt.t", "r") or die("ERROR!");
//    $txt = fgets($myfile);
//    fclose($myfile);
//    $myfile = fopen("/log/yt.t", "w") or die("ERROR!");
//    fwrite($myfile, 1+(int)$txt);
//    fclose($myfile);
//}
//if ($req == "/?fb") {
//    $myfile = fopen("/log/fb.t", "r") or die("ERROR!");
//    $txt = fgets($myfile);
//    fclose($myfile);
//    $myfile = fopen("/log/fb.t", "w") or die("ERROR!");
//    fwrite($myfile, 1+(int)$txt);
//    fclose($myfile);
//}
$filename = '../vc.txt';
if (!file_exists($filename)) {
    $filename = 'vc.txt';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $txt = fgets($myfile);
    fclose($myfile);
    $myfile = fopen($filename, "w");
    fwrite($myfile, 1+(int)$txt);
    fclose($myfile);
    $myfile = fopen($filename, "r");
    $session = fgets($myfile);
    fclose($myfile);
}
if(isset($_COOKIE["_ga"])) {
    $user_ID = $_COOKIE["_ga"];
} else if(isset($_COOKIE["analytics_ga"])) {
    $user_ID = $_COOKIE["analytics_ga"];
} else {
    $user_ID = 'TM1.1.' . 1000*(int)$session . '.' . 1000*(int)$session;
    //setcookie($cookie_name, $user_ID, time()+86400*30, '/');
    //setcookie($cookie_name, $user_ID, time()+86400*365*2, '/');
}
$filename = '../e.t';
if (!file_exists($filename)) {
    $filename = 'e.t';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "a");
    $txt = "Date: " . date("Y/m/d") . "\n";
    fwrite($myfile, $txt);
    $txt = "Time: " . date("h:i:sa") . "\n";
    fwrite($myfile, $txt);
    $txt = "Ref: {$_SERVER['REQUEST_URI']}" . "\n";
    fwrite($myfile, $txt);
    $txt = "URL: {$_SERVER['HTTP_HOST']}" . "\n";
    fwrite($myfile, $txt);
    $txt = "Id: {$user_ID}" . "\n";
    fwrite($myfile, $txt);
    $txt = "______________ \n";
    fwrite($myfile, $txt);
    fclose($myfile);
}
//header('Location: http://www.toremetal.com/');
$filename = '../log/posa.txt';
if (!file_exists($filename)) {
    $filename = 'log/posa.txt';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $posa = fgets($myfile);
    fclose($myfile);
}


$filename = '../log/pta.txt';
if (!file_exists($filename)) {
    $filename = 'log/pta.txt';
} 
if (file_exists($filename)) {
$myfile = fopen($filename, "r");
$pta = fgets($myfile);
fclose($myfile);
}

$filename = '../log/signs.txt';
if (!file_exists($filename)) {
    $filename = 'log/signs.txt';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $signs = fgets($myfile);
    fclose($myfile);
}
$i = 12;
$bytes = openssl_random_pseudo_bytes($i, $cstrong);
$hex = bin2hex($bytes);
$bytes = openssl_random_pseudo_bytes($i, $cstrong);
$hex1 = bin2hex($bytes);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">-->
<!--
  ~   ************************************************************************
  ~    toremetal.com : Copyright (c) 2021 ™T©ReMeTaL.
  ~   ************************************************************************
  ~
  ~    Licensed under the Apache License, Version 2.0 (the "License");
  ~    you may not use this file except in compliance with the License.
  ~    You may obtain a copy of the License at
  ~
  ~    http://www.apache.org/licenses/LICENSE-2.0
  ~
  ~    Unless required by applicable law or agreed to in writing, software
  ~    distributed under the License is distributed on an "AS IS" BASIS,
  ~    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  ~    See the License for the specific language governing permissions and
  ~    limitations under the License.
  ~
  ~   ************************************************************************
  -->
  <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<html lang="en-US" itemscope itemtype="http://schema.org/WebPage">-->
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>™T©ReMeTaL</title>
<meta name="description" content="Easy-to-Use Applications, Designed for Everyone."> 
<meta name="keywords" content="Point of Sale, Purchase Tracker, Signs, ReMeTaL, ™T©ReMeTaL"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<!--<meta name="viewport" content="width=device-width, minimum-scale=0.1, maximum-scale=1.0, user-scalable=yes">-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=1" />
<meta name="HandheldFriendly" content="true" />
<!--<meta name="csrf-token" content="JIfR3ODbubCp48xHVlzpxLmyBcyP2mw6YTpnv1BD">-->
    <!--<meta name="referrer" content="no-referrer-when-downgrade">-->
    <!--'always', 'default', 'never', 'origin-when-crossorigin', 'no-referrer', 'no-referrer-when-downgrade', 'origin', 'origin-when-cross-origin', 'same-origin', 'strict-origin', 'strict-origin-when-cross-origin', or 'unsafe-url'.-->
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
    <link rel="canonical" href="/index.php">
    <link rel="icon" href="/img/logo.png" type="image/png">
    <link rel="icon" href="/img/logo.webp" type="image/webp">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- fevicon
    <link rel="icon" href="images/fevicon.png" type="image/gif" /> -->
    <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="/css/cookies.css" type="text/css">
    <script type="application/ld+json"> {
      "@context": "http://schema.org/",
      "@type": "MobileApplication",
      "name": "™T©ReMeTaL-Apps",
      "operatingSystem": "ANDROID",
      "identifier": "https://play.google.com/store/apps/dev?id=7952290850776080706",
      "image": "img/gpsbl.png",
      "thumbnailUrl": "/img/logo.png",
      "applicationCategory": "Apps",
      "description": "Easy-to-Use Applications, Designed for Everyone.",
      "publisher": {
        "@type": "Thing",
        "name": "™T©ReMeTaL"
      }
    } </script> 
<style>

.ampstart-footer .ampstart-social-follow li:last-child {
  margin-right: 0
}
.list-reset {
  list-style: none;
  padding-left: 0
}
.flex {
  display: -ms-flexbox;
  display: flex
}

@media (min-width:40.06rem) {
  .sm-flex {
    display: -ms-flexbox;
    display: flex
  }
}

@media (min-width:52.06rem) {
  .md-flex {
    display: -ms-flexbox;
    display: flex
  }
}

@media (min-width:64.06rem) {
  .lg-flex {
    display: -ms-flexbox;
    display: flex
  }
}

.flex-column {
  -ms-flex-direction: column;
  flex-direction: column
}

.flex-wrap {
  -ms-flex-wrap: wrap;
  flex-wrap: wrap
}

.items-start {
  -ms-flex-align: start;
  align-items: flex-start
}

.items-end {
  -ms-flex-align: end;
  align-items: flex-end
}

.items-center {
  -ms-flex-align: center;
  align-items: center
}
.justify-start {
  -ms-flex-pack: start;
  justify-content: flex-start
}

.justify-end {
  -ms-flex-pack: end;
  justify-content: flex-end
}

.justify-center {
  -ms-flex-pack: center;
  justify-content: center
}

.justify-between {
  -ms-flex-pack: justify;
  justify-content: space-between
}

.justify-around {
  -ms-flex-pack: distribute;
  justify-content: space-around
}

.justify-evenly {
  -ms-flex-pack: space-evenly;
  justify-content: space-evenly
}

.content-start {
  -ms-flex-line-pack: start;
  align-content: flex-start
}

.content-end {
  -ms-flex-line-pack: end;
  align-content: flex-end
}

.content-center {
  -ms-flex-line-pack: center;
  align-content: center
}

.content-between {
  -ms-flex-line-pack: justify;
  align-content: space-between
}

.content-around {
  -ms-flex-line-pack: distribute;
  align-content: space-around
}

.content-stretch {
  -ms-flex-line-pack: stretch;
  align-content: stretch
}
:root {
    --blue: #007bff;
    --indigo: #6610f2;
    --purple: #6f42c1;
    --pink: #e83e8c;
    --red: #dc3545;
    --orange: #fd7e14;
    --yellow: #ffc107;
    --green: #28a745;
    --teal: #20c997;
    --cyan: #17a2b8;
    --white: #fff;
    --gray: #6c757d;
    --gray-dark: #343a40;
    --primary: #007bff;
    --secondary: #6c757d;
    --success: #28a745;
    --info: #17a2b8;
    --warning: #ffc107;
    --danger: #dc3545;
    --light: #f8f9fa;
    --dark: #343a40;
    --breakpoint-xs: 0;
    --breakpoint-sm: 576px;
    --breakpoint-md: 768px;
    --breakpoint-lg: 992px;
    --breakpoint-xl: 1200px;
    --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
    --font-family-monospace: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
}
html {
    -webkit-tap-highlight-color: transparent;
    -webkit-text-size-adjust: 100%;
    font-family: sans-serif;
    line-height: 1.15;
    scroll-behavior: smooth;
    display: block;
}
body {
    display: block;
    margin: 8px;
}
* {
    box-sizing: border-box !important;
    border: none;
}
*, *::after, *::before {
    box-sizing: border-box;
}
*, ::after, ::before {
    box-sizing: border-box;
}
</style>

<script>
    class SameSiteFilter extends GenericFilterBean {
@Override
public void doFilter (ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException {
    HttpServletResponse resp = (HttpServletResponse) response;
    String cookie = resp.getHeader("Set-Cookie");
    if (cookie != null) {
        resp.setHeader("Set-Cookie", cookie + "; HttpOnly;SameSite=none; Secure");
    }
    chain.doFilter(request, response);
}}
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149650262-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-149650262-1');
        //gtag('set', {'user_id': 'USER_ID'});
    gtag('config', 'UA-149650262-1', {'cookie_prefix': 'analytics'});
    gtag('config', 'UA-149650262-1', {cookie_flags: 'domain=<?=$_SERVER['HTTP_HOST']?>;secure;samesite=none'});
</script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" crossorigin="anonymous"></script> 
<!--<script>(adsbygoogle=window.adsbygoogle||[]).pauseAdRequests=1;</script>-->
<script async src="https://cse.google.com/cse.js?cx=partner-pub-8927593002808864:1031426169"></script>
<!--<script async src="//cse.google.com/cse.js?cx=partner-pub-8927593002808864:1031426169" crossorigin="anonymous"></script>-->
</head>
<body class="main-layout" style="background-color:#29292990; color:#FFFFFF" align="center">
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
    <!-- header -->
    <header class="header" align="center" style="height: 100%; width: 100%; padding: 0px; margin: 0px;">
        <!-- loader  -->
    <div align="center" style="height: 100%; width: 100%; align: center;">
    <div class="loader_bg" align="center" style="background-color: #29292990; height: 250px; width: 250px; align: center;">
        <div class="loader" align="center" style="height: 240px; width: 240px; align: center;"><img src="/img/loading.gif" alt="loading" /></div>
    </div>
    </div>
    <!-- end loader -->
        <!-- header inner -->
        <div >
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-10 col-sm-10">
                        <!--style="width:100%;height:100%;white-space:nowrap;overflow-x:auto;overflow-y:auto"-->
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <div class="logo_section"><div class="full">
                            <div class="center-desk">
                                <div class="logo" style="white-space:nowrap; padding:var(--universal-padding) calc(2 * var(--universal-padding))">
                                <li><span class="h1 block bold caps my1" style="color:#808080;"><a title="www.toremetal.com" href="https://www.toremetal.com"><img src="/img/favicon.png" alt="logo" height="72" width="72"/></a><a style="font-size:1.5rem;" title="www.toremetal.com" href="https://www.toremetal.com">™T©ReMeTaL</a></span></li>
                                </div>
                            </div>
                        </div></div>
                                    <ul class="menu-area-main" >.
                                    
                                    
                                    
                                    
                                        <!--<li class="active"><a title="www.toremetal.com" href="https://www.toremetal.com">www.toremetal.com</a>
                                        </li>-->
                                        <li><a title="Check Out Apps on ™T©ReMeTaL" href="/apps/">Apps</a>
                                        </li>
                                        <li> <a title="GET IT ON Google Play" href="https://play.google.com/store/apps/dev?id=7952290850776080706">Play-Store</a>
                                        </li>
                                        <li style="width:230px;color:#00000080"><!--color:#00000080-->
                                            <div id="search" class="gcse-searchbox-only">loading...</div></li>
                                        <!--<li> <a href="https://www.toremetal.com/android"> Android</a> </li>-->
                                        <!--<li> <a href="https://ads.toremetal.com/musicians">Music </a> </li>-->
                                        <!--<li style="width:235px;height:100%;color:#00000080">
                                            <div style="width:235px;height:100%;" id="search" class="gcse-searchbox-only">loading...</div></li>-->
                                        
                                        <!--<nav class="sub-menu" align="center">-->
                         <ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb0">
                         <li><a href="https://www.youtube.com/channel/UCgyGtbmWqdeSc_JVvENQwsA"><!--<img title="YouTube" src="/img/yt.webp" alt="icon" height="32" width="32" />-->
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
</li>
<li>
<a href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Google Play™" src="/img/play_store.webp" alt="logo" height="22" width="22"/></a>
</li>
<li>
<a href="https://www.facebook.com/TheToremetal" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 14222 14222"><circle cx="7111" cy="7112" r="7111" fill="#000000"/><path d="M9879 9168l315-2056H8222V5778c0-562 275-1111 1159-1111h897V2917s-814-139-1592-139c-1624 0-2686 984-2686 2767v1567H4194v2056h1806v4969c362 57 733 86 1111 86s749-30 1111-86V9168z" fill="#FFFFFF"/>
<title>facebook™</title></svg>
</a>

</li>
<li>
<a href="https://m.me/TheToremetal"><img title="Messenger™" height="24" width="24" src="/img/messenger.webp" alt="icon" /></a>
</li><li><a href="<?=$loginAddress?>"><?=$login?></a></li>
</ul>
                         <!--</nav>-->
                                         <!--<li> <a href="https://www.toremetal.com/contact">Contact</a> </li>
                                        <li> <a href="#contact">Login</a> </li>-->
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo" style="white-space:nowrap; padding:var(--universal-padding) calc(2 * var(--universal-padding))">
                                <li><span class="h1 block bold caps my1" style="color:#808080;"><a title="www.toremetal.com" href="https://www.toremetal.com"><img src="/img/favicon.png" alt="logo" height="72" width="72"/></a><a style="font-size:1.25rem;" title="www.toremetal.com" href="https://www.toremetal.com">™T©ReMeTaL</a></span></li>
                                </div>
                            </div>
                        </div>
                    </div>-->


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
                    <h1 style="color:#0a60ffFF"><br>™T©ReMeTaL<br>
                    <span class="Perfect" style="color:#FFFFFF">Easy-to-Use</span><br><span class="Perfect" style="color:#FFFFFF">Designed for Everyone.</span></h1>
                    <a style="background-color:#80808000;" target="_blank" href='https://play.google.com/store/apps/dev?id=7952290850776080706'>
                    <img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                    <!--<a href="#">Download Now</a>-->
                </div>
            </div>
        </div>
    </section><br>
<div  class="container">
<div align="center" style="height: 100%; width: 100%; padding: 5px; align: center;"> 
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8927593002808864" 
     data-ad-slot="2822185833" 
     data-ad-format="auto" 
     data-full-width-responsive="true">
</ins>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div></div>
   <div class="container1 my4 mxn3 center">
       <figure  rel="ligthbox" class="ampstart-image-with-heading  m5 bottom">

       <div class="contactus" align="center">
          <article class="px3">
<h4 id="story" style="color:#FFFFFF" class="my4 theme2-anchored">™T©ReMeTaL</h4><h2 style="color:#FFFFFF" >Easy-to-Use<br>Designed for Everyone</h2>
<p class="mb0">
<style>
element.style {

}
.mb1 {
    margin-bottom: .5rem;
}
p {
    padding: 0;
    margin: 0;
}
* {
    box-sizing: border-box;
}
p {
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
}
.ampstart-subtitle, body {
    line-height: 1.75;
    letter-spacing: normal;
}
body {
    background: #1d1d1d;
    color: #fff;
    font-family: Lora,serif;
    min-width: 315px;
    overflow-x: hidden;
    -webkit-font-smoothing: antialiased;
}
html {
    font-family: sans-serif;
    line-height: 1.15;
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}
.ampstart-dropcap:first-letter {
    color: #fff;
    font-size: 2.25rem;
    font-weight: 700;
    float: left;
    overflow: hidden;
    line-height: 2.25rem;
    margin-left: 0;
    margin-right: .5rem;
}
</style>
<p align="left" style="color:#FFFFFF" class="mb1 ampstart-dropcap">Founded on one purpose:</p><p style="color:#FFFFFF" class="mb1" align="justify">
Providing high-quality, efficient, and reliable computer applications. Our passion for excellence has been the drive from the beginning and will continue long into the future. We know that every experience matters, and strive to make the entire experience as pain-free as possible.</p>
          </article>
       </div>
<br>   <div align="center" style="height: 100%; width: 100%;" ><a target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Get it on Google Play™" style="align: center; height; 100%" src="/img/AppsOnGooglePlay.webp" border="0" /></a>
       </div>
       
       
       <div style="width: 100%; height: 250px;" align="center">
          <iframe class='contactus img-fluid SameSiteFilter' referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.youtube.com/embed/videoseries?list=PL0xA7snTym6BVH7Qbn0eHW5PSZRCIEnGu&autoplay=1" title="™T©ReMeTaL Apps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
          <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/ToremetalApps.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
       </div>
       </figure>
       <!--ShareAsale-->
       <div align="center" class="container">

<div align="center" style="height: 100%; padding: 2px;"  class="shrsl_ShareASale_productShowCaseTarget_45448"></div>
<script type="text/javascript"  src="https://showcase.shareasale.com/shareASale_liveWidget_loader.js?dt=12152021201633"></script>
<script type="text/javascript">shrsl_ShareASale_liveWid_Init(45448, 2789938, 'shrsl_ShareASale_liveWid_leaderBoard_populate');</script> 
       </div>
   </div><br>
<div align="center" style="width:100%;height:100%;align:center;">
<div class="fb-page" data-href="https://www.facebook.com/TheToremetal/" data-tabs="timeline" data-width="250" data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TheToremetal/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TheToremetal/">Toremetal</a></blockquote></div>
</div>

<!--Lastestnews1-->
<div id="screenshot2" align="center" class="Lastestnews" style="background-color:#80808000;"><!--  Style="background-color:powderblue;" -->
    <!--Albums-->
    <div id="screenshot" class="Albums" style="background-color:#80808000;" align="center" >
        <div class="container" align="center" >
            <div class="row" align="center" >
                <div class="col-md-12" align="center" >
                    <div class="titlepage" align="center" >
                        <h2 align="center" style="color:#FFFFFF" >Applications</h2><span></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div align="center" class="container1" Style="background-color:#FFFFFF80;">
                       <div align="center" class="news-box" Style="background-color:#FFFFFF80;">
                      <figure rel="ligthbox" class="section app-content contactus"><a href="/img/logo2.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/logo2.webp" class="zoom img-fluid " alt=""></a>
                      </figure>
                         <form style="align:center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="WRJ2FNDGZTSSE" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                         <figure rel="ligthbox"><!--<h2>™T©ReMeTaL<span>Point of Sale</span> for Android™</h2><p>Garage Sales, Travelling Sellers, Events, Fundraising, and more! Keep accurate records with ease!</p>-->
                           <!--<iframe style="height:100%; width:100%" src="PosD.html" title="Description" frameborder="0"></iframe>-->
                           <!--<embed type="text/html" src="/img/PosD" style="height: 100%; width: 100%;">-->
<!--<div class="card fluid idma" Style="background-color:#FFFFFF00;"> 
    <div class="st9" Style="background-color:#FFFFFF00;">-->
        <div class="section app-content contactus" style="background-color:#FFFFFF90"> 
          <div id="posaD" class="detail-small"><p align="center"><b>™T©ReMeTaL</b><br><i style="color:red">Point of Sale</i><br> 
for <i style="color:#000000">Android™</i> 5.0+</p><hr />
<h4 align="left">Description:</h4><i style="color:#00000070">Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i><!--
<p>Keep accurate records with ease!<br> No setup involved, no accounts required to use. This simple app is designed for easy creation of needed sales records for self-employed and similar situations. Add your products or services to the inventory to auto-load info by ID at time of sale. All Sales totals automatically tracked and viewable anytime. App automatically calculates profits based on selling price, cost of each item, and quantity of items (All-items-totals viewable with exported CSV file using Google sheets, formulas automatically added). Auto-create file receipts for records, emailing at a later time, or printing using your device's existing printing options. Automatically send sale info to email application for emailing transaction records to the customer at the time of sale.</p>-->
          </div> 
<button title='show full descrtiption' id="posaB" onclick="expandPosa()" class="read-more" style="background-color:#00000000;color:red;">Show More</button> | 
<button title='go to app page' onclick="location.href='http://toremetal.com/androids/?=posa';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
        </div> 
    <!--</div> 
</div>-->
<script>
function expandPosa() {
    if (document.getElementById('posaB').innerHTML == 'Show More') {
        document.getElementById('posaB').innerHTML='Show Less'
        document.getElementById('posaD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Point of Sale</i><br>for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i><p>Keep accurate records with ease!<br> No setup involved, no accounts required to use. This simple app is designed for easy creation of needed sales records for self-employed and similar situations. Add your products or services to the inventory to auto-load info by ID at time of sale. All Sales totals automatically tracked and viewable anytime. App automatically calculates profits based on selling price, cost of each item, and quantity of items *All-items-totals viewable with exported CSV file using Google sheets, formulas automatically added*. Auto-create file receipts for records, emailing at a later time, or printing using installed printing options.<br>Automatically send sale info to email application for emailing transaction records to the customer at the time of sale.</p>";
    } else {
        document.getElementById('posaB').innerHTML='Show More'
        document.getElementById('posaD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Point of Sale</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i>"
    }
};
</script>
                           <a onclick="myFunction('posa')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.pos'><img class="zoom img-fluid " width="120px" title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                           <div align="center" id="posa">Views: <?=$posa?></div>
                           <!-- YouTube -->
                           <iframe class="contactus zoom img-fluid SameSiteFilter" referrerpolicy="SameSite: None; Secure" style="height: 100%; width: 100%;" src="https://www.youtube.com/embed/nHrCai8OfZs" title="™T©ReMeTaL Point of Sale" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
                           <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/pos.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
                         </figure>
                       </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div align="center" class="container1" Style="background-color:#FFFFFF80;">
                       <div align="center" class="news-box" Style="background-color:#FFFFFF80;">
                    <figure class='contactus' rel="ligthbox"><a href="/img/logo1.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/logo1.webp" class="zoom img-fluid " alt=""></a>
                    </figure>
                           <form align="center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="89C2BPA3TV8UL" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                           <figure rel="ligthbox">
<!--<div class="card fluid idma" Style="background-color:#FFFFFF00;"> 
    <div class="st9" Style="background-color:#FFFFFF00;">-->
        <div class="section app-content contactus" style="background-color:#FFFFFF90"> 
          <div id="ptaD" class="detail-small"> 
          <p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i><!--<p> No more need to guess or remember.<br>This simple app is designed to let you track what your spending while you shop. Save your tax rate. Add prices by quantity. Quickly calculate a tip from the sub-total. Purchase Tracker is a free application, easy to install to your device. Just download it and run, no setup involved, no accounts required.</p>-->
          </div> <!--onclick="expandPta()"-->
<button title='show full descrtiption' onclick="expandPta()" id="ptaB" class="read-more" style="background-color:#00000000;color:red;"> Show More </button> | 
<button title='go to app page' onclick="location.href='http://toremetal.com/androids/?=pta';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
        </div> 
    <!--</div> 
</div>-->
<script>
function expandPta() {
    if (document.getElementById('ptaB').innerHTML == 'Show More') {
        document.getElementById('ptaB').innerHTML='Show Less'
        document.getElementById('ptaD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i><p> No more need to guess or remember.<br>This simple app is designed to let you track what your spending while you shop. Save your tax rate. Add prices by quantity. Quickly calculate a tip from the sub-total. Purchase Tracker is a free application, easy to install to your device. Just download it and run, no setup involved, no accounts required.</p>";
    } else {
        document.getElementById('ptaB').innerHTML='Show More'
        document.getElementById('ptaD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i>"
    }
};
</script>
                              <a onclick="myFunction('pta')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.purchasetracker'>
                              <img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                              <div align="center" id="pta">Views: <?=$pta?></div>
                              <!-- YouTube -->
                              <iframe class="contactus zoom img-fluid SameSiteFilter" referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.youtube.com/embed/pw0R4KaU5Do" title="™T©ReMeTaL Purchase Tracker" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
                              <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/pt.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
                           </figure>
                       </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div align="center" class="container1" Style="background-color:#FFFFFF80;">
                       <div align="center" class="news-box" Style="background-color:#FFFFFF80;">
                    <figure rel="ligthbox" class='contactus'><a href="/img/signs_logo.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/signs_logo.webp" class="zoom img-fluid " alt=""></a>
                    </figure>
                           <form align="center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="NCK58ZSYB5WUL" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                           <figure rel="ligthbox">

<!--<div class="card fluid idma st9" Style="background-color:#FFFFFF00;"> -->
    <!--<div class="st9" Style="background-color:#FFFFFF00;">-->
        <div class="contactus" style="background-color:#FFFFFF90"> 
          <div id="signsD" class="detail-small"><p align="center"><b>™T©ReMeTaL</b><br><i style="color:red">(ASL) Signs</i><br> for <i style="color:#000000">Android™</i> 4.4+</p><hr /><h4 align="left">Description:</h4><i style="color:#00000070">A simple app for ASL beginners!</i><!--<p>This simple application is designed for beginners learning American Sign Language. Quickly view a reference picture of any letter of the alphabet or for the numbers 0-10.<br>Clicking or tapping the button below the picture prompts your device's internet browser, to open a search query for further demonstration of the selection. There is no setup involved or any accounts required to use the application.</p>--></div> 
<button title='show full descrtiption' id="signsB" onclick="expandSigns()" class="read-more" style="background-color:#00000000;color:red;">Show More</button> | 
<button title='go to app page' onclick="location.href='http://toremetal.com/androids/?=signs';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
        </div> 
    <!--</div> -->
<!--</div>-->

<script>
function expandSigns() {
    if (document.getElementById('signsB').innerHTML == 'Show More') {
        document.getElementById('signsB').innerHTML='Show Less'
        document.getElementById('signsD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>(ASL) Signs</i><br> for <i style='color:#000000'>Android™</i> 4.4+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>A simple app for ASL beginners!</i><p>This simple application is designed for beginners learning American Sign Language. Quickly view a reference picture of any letter of the alphabet or for the numbers 0-10.<br>Clicking or tapping the button below the picture prompts your device's internet browser, to open a search query for further demonstration of the selection. There is no setup involved or any accounts required to use the application.</p>";
    } else {
        document.getElementById('signsB').innerHTML='Show More'
        document.getElementById('signsD').innerHTML="<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>(ASL) Signs</i><br> for <i style='color:#000000'>Android™</i> 4.4+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>A simple app for ASL beginners!</i>"
    }
};
</script>

<a onclick="myFunction('signs')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.signsfree'><img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                              <div align="center" id="signs">Views: <?=$signs?></div>
                              <!-- YouTube
                              <iframe class="zoom img-fluid " referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.youtube.com/embed/pw0R4KaU5Do" title="™T©ReMeTaL Purchase Tracker" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
                              -->
                              <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/pt.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
                           </figure>
                           <!--<figure rel="ligthbox"><a target="_blank" href="https://www.toremetal.com/android/pointofsale"><img style="height: 100%; width: 100%"src="https://drive.google.com/uc?id=1rsIDUSUYJGpMVV9UAxAWu2AwwyjwRpe4" class="zoom img-fluid " alt=""></a></figure>-->
                       </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end Albums -->
</div>
<!--end latest news1-->
<!--<script>
function count() {
   document.getElementById("alog").src='https://ads.toremetal.com/count';
};
</script>-->
<script>
    function myFunction(id) {
        var x = document.getElementById(id).innerHTML;
        x = parseInt(x.replace("Downloads: ", ""))+1;
        document.getElementById(id).innerHTML='Thanks for Checking it out! Views: ' + x
        document.getElementById("logb").src='php/' + id + '.php'
        document.getElementById("alog").src='https://ads.toremetal.com/downloaded' + id + '/'
    };
</script>


<!--<script>
function myFunction3(){
  var x = document.getElementById("ad1").innerHTML;
  document.getElementById("ad1").innerHTML=x + '<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8927593002808864" data-ad-slot="2822185833" data-ad-format="auto" data-full-width-responsive="true">loading...</ins>'
};
</script>-->
<!--<button onclick="myFunction3()">Show Ads</button>-->

<!--<div align="center" id="ad1" style="height:100%; width: 100%;">-->
<div style="border:none; overflow:hidden;width:0%;height:0%" scrolling="no" frameborder="0" height="0" width="0" class="hidden">
<iframe style="border:none; overflow:hidden;" scrolling="no" frameborder="0" id="alog" height="0" width="0" class="hidden"></iframe>
<iframe style="border:none; overflow:hidden;" scrolling="no" frameborder="0" id="logb" height="0" width="0" class="hidden"></iframe>
</div>
<div  class="container">
<div align="center" style="height: 100%; width: 100%; padding: 5px; align: center;"> 
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8927593002808864" 
     data-ad-slot="2822185833" 
     data-ad-format="auto" 
     data-full-width-responsive="true">
</ins>
<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
</div>
</div><br>
    <!-- Photos -->
    <div id="screenshot" class="Albums" style="background-color:#80808000;">
        <div class="container1">

            <div class="row">
                <div class="col-md-12">
                    <!--<div class="titlepage">
                        <h2 style="color:#FFFFFF" >Photos</h2>
                        <span></span>
                    </div>-->
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 margin" style="align:center">
                <div class="Albums-box" style="align:center"><h1 align="center" style="color:#FFFFFF" >Photos</h1>
                        <figure style="align:center">
                            <a href="/img/logo1.webp" class="fancybox" rel="ligthbox">
                                <img title="View Photo" src="/img/logo1.webp" class="zoom img-fluid " alt="">
                            </a>
                          <span class="hoverle">
                           <a href="/img/logo1.webp" class="fancybox" rel="ligthbox"><img title="View Photos" src="/img/search.webp"></a>
                           <a href="/img/logo2.webp" class="fancybox" rel="ligthbox"></a>
                           <a href="/img/logo3.webp" class="fancybox" rel="ligthbox"></a>
                           <a href="/img/logo4.webp" class="fancybox" rel="ligthbox"></a>
                           <a href="/img/logo5.webp" class="fancybox" rel="ligthbox"></a>
                           <a href="/img/logo.webp" class="fancybox" rel="ligthbox"></a>
                          </span>
                        </figure>
                </div>
            </div>

        </div>
    </div>
    <!-- end Photos -->

       <!--ShareASale SEO-->
       <div align="center" style="height: 100%; width: 100%" class="container1">
<?PHP
    /*$id = 'home';
    $task = 'ad3';
    $servername = "localhost";
    $username = "u509817757_lu";
    $password = "|)@zz3weRjX)Cdk";
    $database = "u509817757_items";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `$task` FROM `pages` WHERE title = '$id'";
    $result = $conn->query($sql);
    foreach ($result as $row) {
        echo $row[0];
    }*/
?>
<a target="_blank" href="https://shareasale.com/r.cfm?b=1303105&amp;u=2789938&amp;m=43951&amp;urllink=&amp;afftrack="><img title="SEO PowerSuite - Recomended by industry experts worldwide." style="height: 100%; width: 100%" src="/img/sps-partnership-728x90eng.png" border="0" /></a>
       </div><br>

    <!-- Contact Us -->
    <div class="container1" align="center">
       <div class="contactus" align="center"><h2 id="Contact" align="center" class="contactus" style="color:#FFFFFF" >Contact Us</h2>
        <ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb0">
          <li><a href="https://m.me/TheToremetal"><img title="Messenger" height="24" width="24" src="/img/messenger.webp" alt="icon" /></a>
          </li>
          <li><a href="https://twitter.com/TheToReMetal" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Twitter"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28" height="28" viewBox="0 0 400 400" xml:space="preserve">
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
		C110.8,297.5,136.2,305.5,163.4,305.5"/></g><title>Twitter™</title></svg></a>
          </li>
          <li><a href="https://www.facebook.com/TheToremetal" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="27.6" viewBox="0 0 56 55" fill="#FFFFFF" ><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
          </li>
          <li><a href="mailto:toremetal@toremetal.com" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML E-mail"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="24.4" viewBox="0 0 56 43" fill="#FFFFFF" ><title>email</title><path d="M10.5 6.4C9.1 6.4 8 7.5 8 8.9v21.3c0 1.3 1.1 2.5 2.5 2.5h34.9c1.4 0 2.5-1.2 2.5-2.5V8.9c0-1.4-1.1-2.5-2.5-2.5H10.5zm2.1 2.5h30.7L27.9 22.3 12.6 8.9zm-2.1 1.4l16.6 14.6c.5.4 1.2.4 1.7 0l16.6-14.6v19.9H10.5V10.3z" class="ampstart-icon ampstart-icon-email"></path></svg></a>
          </li>
        </ul>

          <div style="align: center; width: 100%; height: 100%" >
              <iframe title="Send us a message" src="https://docs.google.com/forms/d/e/1FAIpQLSfhI8ptq1g3F9tGkIrLu3IJyisJkYzZgX7rQQzBOnVN2eVWpA/viewform?embedded=true" style="width: 100%;" height="820" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
          </div>
       </div>
    </div><br>
    <!-- End Contact Us -->


    <!-- /22493804016/Hm-Pg
<div id='div-gpt-ad-1627335813415-0'>
  <script>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1627335813415-0'); });
  </script>
</div> -->
    
    
  <!-- Start Footer -->
<div class="address">
<footer class="ampstart-footer flex flex-column items-center px3 "><!-- style="background-color:#42577e80;"-->
   <!-- Copyright -->
   <div class="container1" align="center" style="background-color:#49494900"><br>
       <div align="center" style="height: 100%; width: 100%;" >
            <a target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img title="Get it on Google Play™" style="align: center; height; 100%" src="/img/AppsOnGooglePlay.webp" border="0" /></a>
       </div><br>

                    <!--<div class="col-lg-6 col-md-6 col-sm-12 width">
                        <div class="address">
                            <h3>Get In Touch</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Name" type="text" name="Name">
                                    </div>
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Phone" type="text" name="Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Email" type="text" name="Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea class="textarea" placeholder="Message" type="text" name="Message"></textarea>
                                    </div>
                                    <div class="col-sm-12">
                                        <button class="send">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>-->

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
       
       <a href="https://www.youtube.com/channel/UCgyGtbmWqdeSc_JVvENQwsA"><!--<img title="YouTube" src="/img/yt.webp" alt="icon" height="32" width="32" />-->
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
        <!--<li><a href="mailto:toremetal@toremetal.com" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML E-mail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="18.4" viewBox="0 0 56 43"><title>email</title><path d="M10.5 6.4C9.1 6.4 8 7.5 8 8.9v21.3c0 1.3 1.1 2.5 2.5 2.5h34.9c1.4 0 2.5-1.2 2.5-2.5V8.9c0-1.4-1.1-2.5-2.5-2.5H10.5zm2.1 2.5h30.7L27.9 22.3 12.6 8.9zm-2.1 1.4l16.6 14.6c.5.4 1.2.4 1.7 0l16.6-14.6v19.9H10.5V10.3z" class="ampstart-icon ampstart-icon-email"></path></svg></a></li>-->
      </ul>
      <form action="https://www.paypal.com/donate" method="post" target="_top"><input type="hidden" name="hosted_button_id" value="NCK58ZSYB5WUL" /><input type="image" src="/img/btn_donateCC_LG.webp" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="PayPal" border="0" src="/img/btn_donateCC_LG.webp" width="1" height="1" />
      </form>

      <small style="align: center">   <!--<h2 align="center"><a href="http://toremetal.com/#Contact">Contact-Us</a></h2>-->
        <a href="https://www.toremetal.com/termsandconditions">Terms-of-Use</a> | 
        <a href="/privacy-policy/">Privacy-Policy</a> | 
        <a href="/cookiepolicy/">Cookie-Policy</a> | 
        <a href="/disclaimer/">Disclaimer</a> | 
        <a href="/ad-settings/?fc=alwaysshow">Ads Settings</a>
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

      <div style="text-align: left;position: fixed;z-index:9999999;bottom: 0;width: auto;right: 5%;cursor: pointer;line-height: 0;display:block !important;">
         <a title="Easy-to-Use Applications, Designed for Everyone. GET IT ON Google Play" target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706"><img src="/img/footer-logo.webp" alt="www.toremetal.com"></a>
      </div>
      <!--<div title="Cookie Settings" style="text-align: left;position: fixed;z-index:9999999;bottom: 15px;width: auto;right: 6%;cursor: pointer;line-height: 0;display:block !important;">
<button id="ihavecookiesBtn" style="background-color:#80808000; font-size:30px; height:100%">&#x1F36A;</button>
      </div>-->
   </div>
   <!-- End Copyright -->
</footer>    
</div><!--class="footer"-->

<!-- End Footer -->
    <!-- Javascript files -->
    <script src="/js/plugin.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>