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
$filename = 'log/hvc.txt';
if (!file_exists($filename)) {
    $filename = '../log/hvc.txt';
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
} else {
    $myfile = fopen($filename, "a");
    fwrite($myfile, '1');
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
$filename = '/log/e.t';
if (!file_exists($filename)) {
    $filename = '../log/e.t';
}
if (file_exists($filename)) {
    date_default_timezone_set("America/Los_Angeles");
    $myfile = fopen($filename, "a");
    $txt = "Date: " . date("Y/m/d") . ", Time: " . date("h:i:sa") . "\nURL: {$_SERVER['HTTP_HOST']}" . "\nRef: {$_SERVER['REQUEST_URI']}" . "\nId: {$user_ID}" . "\n";
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

$Pagetitle="™T©ReMeTaL";
$Pagesubtitle='™T©ReMeTaL<br /><span class="Perfect" style="color:#80FFFFFF">Easy-to-Use</span><br /><span class="Perfect" style="color:#80FFFFFF">Designed for Everyone.</span>';
$url="https://".$hst.$req;
$filename = "../css/header.t";
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $header = fread($myfile,filesize($filename));
    fclose($myfile);
} else {$header="";}
$filename = "../css/footer.t";
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $footer = fread($myfile,filesize($filename));
    fclose($myfile);
} else {$footer="";}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title><?=$Pagetitle?></title>
    <link rel="canonical" href="<?=$url?>"> 
    <meta property="og:url" content="<?=$url?>">
    <meta property="og:title" content="<?=$Pagetitle?>">
    <meta itemprop="url" content="<?=$url?>">

<?=$header?>
    <section class="banner_section">
        <div class="banner-main">
            <img src="/img/banner2.jpg" />
            <div class="container">
                <div class="text-bg relative my0">
                    <h1 style="color:#FFFFFFFF;background-color:#29292990;"><?=$Pagesubtitle?></h1>
                    <a style="background-color:#80808000;width:10em;height:auto;" target="_blank" href='https://play.google.com/store/apps/dev?id=7952290850776080706'>
                    <img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png'/></a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div align="center" style="height: 100%; width: 100%; padding: 5px;">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8927593002808864"
                 data-ad-slot="2822185833"
                 data-ad-format="auto"
                 data-full-width-responsive="true">
            </ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        </div>
    </div>
    <div class="container1 my4 mxn3 center">
        <figure rel="ligthbox" class="ampstart-image-with-heading  m5 bottom">

            <div class="contactus" align="center">
                <article class="px3">
                    <h4 id="story" style="color:#FFFFFF" class="my4 theme2-anchored">™T©ReMeTaL</h4><h2 style="color:#FFFFFF">Easy-to-Use<br>Designed for Everyone</h2>
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
                                margin-left: 1em;
                                margin-right: 1em;
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
                        Providing high-quality, efficient, and reliable computer applications. Our passion for excellence has been the drive from the beginning and will continue long into the future. We know that every experience matters, and strive to make the entire experience as pain-free as possible.
                    </p>
                </article>
            </div>
            <br>   <div align="center" style="height: 100%; width: 100%;">
                <a target="_blank" href="https://play.google.com/store/apps/dev?id=7952290850776080706">
            <img title="Get it on Google Play™" style="height: 100%" src="/img/AppsOnGooglePlay.webp" border="0" /></a>
            </div>


            <div style="width: 100%; height: 250px;" align="center">
                <iframe class='contactus img-fluid SameSiteFilter' referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.youtube.com/embed/videoseries?list=PL0xA7snTym6BVH7Qbn0eHW5PSZRCIEnGu&autoplay=1" title="™T©ReMeTaL Apps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
                <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/ToremetalApps.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
            </div>
        </figure>
        <!--ShareAsale-->
        <!--<div align="center" class="container">

            <div align="center" style="height: 100%; padding: 2px;" class="shrsl_ShareASale_productShowCaseTarget_45448">
                
            </div>
            <script type="text/javascript" src="https://showcase.shareasale.com/shareASale_liveWidget_loader.js?dt=12152021201633"></script>
            <script type="text/javascript">shrsl_ShareASale_liveWid_Init(45448, 2789938, 'shrsl_ShareASale_liveWid_leaderBoard_populate');</script>
        </div>-->
    </div>
    
    <br />
    
    <!--Lastestnews1-->
    <div id="screenshot2" align="center" class="Lastestnews" style="background-color:#80808000;">
        <!--  Style="background-color:powderblue;" -->
        <!--Albums-->
        <div id="screenshot" class="Albums" style="background-color:#80808000;" align="center">
            <div class="container" align="center">
                <div class="row" align="center">
                    <div class="col-md-12" align="center">
                        <div class="titlepage" align="center">
                            <h2 align="center" style="color:#FFFFFF">Applications</h2><span></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                        <div align="center" class="container1" Style="background-color:#FFFFFF80;">
                            <div align="center" class="news-box" Style="background-color:#FFFFFF80;">
                                <figure rel="ligthbox" class="section app-content contactus">
                                    <a href="/img/logo2.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/logo2.webp" class="zoom img-fluid " alt=""></a>
                                </figure>
                                <form align="center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="WRJ2FNDGZTSSE" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                                <figure rel="ligthbox">
                                    <div class="section app-content contactus" style="background-color:#FFFFFF90">
                                        <div id="posaD" class="detail-small">
                                            <p align="center">
                                                <b>™T©ReMeTaL</b><br><i style="color:red">Point of Sale</i><br>
                                                for <i style="color:#000000">Android™</i> 5.0+
                                            </p><hr />
                                            <h4 align="left">Description:</h4><i style="color:#00000070">Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i>
                                        </div>
                                        <button title='show full descrtiption' id="posaB" onclick="expandPosa()" class="read-more" style="background-color:#00000000;color:red;">Show More</button> |
                                        <button title='go to app page' onclick="location.href='https://www.toremetal.com/android/pointofsale';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
                                    </div>
                                    <script>
                                        function expandPosa() {
                                            if (document.getElementById('posaB').innerHTML == 'Show More') {
                                                document.getElementById('posaB').innerHTML = 'Show Less'
                                                document.getElementById('posaD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Point of Sale</i><br>for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i><p>Keep accurate records with ease!<br> No setup involved, no accounts required to use. This simple app is designed for easy creation of needed sales records for self-employed and similar situations. Add your products or services to the inventory to auto-load info by ID at time of sale. All Sales totals automatically tracked and viewable anytime. App automatically calculates profits based on selling price, cost of each item, and quantity of items *All-items-totals viewable with exported CSV file using Google sheets, formulas automatically added*. Auto-create file receipts for records, emailing at a later time, or printing using installed printing options.<br>Automatically send sale info to email application for emailing transaction records to the customer at the time of sale.</p>";
                                            } else {
                                                document.getElementById('posaB').innerHTML = 'Show More'
                                                document.getElementById('posaD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Point of Sale</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Self-employed, Garage Sales, Events, Travelling Sellers, Fundraising?</i>"
                                            }
                                        };
                                    </script>
                                    <div align="center" id="posa">Views: <?=$posa?></div>
                                    <a onclick="myFunction('posa')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.pos'>
                                    <img class="zoom img-fluid " width="120" title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png' /></a>
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
                                <figure class='contactus' rel="ligthbox">
                                    <a href="/img/logo1.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/logo1.webp" class="zoom img-fluid " alt=""></a>
                                </figure>
                                <form align="center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="89C2BPA3TV8UL" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                                <figure rel="ligthbox">
                                    <div class="section app-content contactus" style="background-color:#FFFFFF90">
                                        <div id="ptaD" class="detail-small">
                                            <p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i>
                                        </div>
                                        <button title='show full descrtiption' onclick="expandPta()" id="ptaB" class="read-more" style="background-color:#00000000;color:red;"> Show More </button> |
                                        <button title='go to app page' onclick="location.href='https://www.toremetal.com/android/purchasetracker';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
                                    </div>
                                    <script>
                                        function expandPta() {
                                            if (document.getElementById('ptaB').innerHTML == 'Show More') {
                                                document.getElementById('ptaB').innerHTML = 'Show Less'
                                                document.getElementById('ptaD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i><p> No more need to guess or remember.<br>This simple app is designed to let you track what your spending while you shop. Save your tax rate. Add prices by quantity. Quickly calculate a tip from the sub-total. Purchase Tracker is a free application, easy to install to your device. Just download it and run, no setup involved, no accounts required.</p>";
                                            } else {
                                                document.getElementById('ptaB').innerHTML = 'Show More'
                                                document.getElementById('ptaD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>Purchase Tracker</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>Know what your spending<br>before you get to the register!</i>"
                                            }
                                        };
                                    </script>
                                    <div align="center" id="pta">Views: <?=$pta?></div>
                                    <a onclick="myFunction('pta')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.purchasetracker'>
                                        <img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png' />
                                    </a>
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
                                <figure rel="ligthbox" class='contactus'>
                                    <a href="/img/signs_logo.webp" class="fancybox" rel="ligthbox"><img title="View Photo" src="/img/signs_logo.webp" class="zoom img-fluid " alt=""></a>
                                </figure>
                                <form align="center" action="https://www.paypal.com/donate" method="post" target="_blank"><input type="hidden" name="hosted_button_id" value="NCK58ZSYB5WUL" /><input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" /><img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" /></form>
                                <figure rel="ligthbox">
                                    <div class="contactus" style="background-color:#FFFFFF90">
                                        <div id="signsD" class="detail-small"><p align="center"><b>™T©ReMeTaL</b><br><i style="color:red">(ASL) Signs A-Z</i><br> for <i style="color:#000000">Android™</i> 5.0+</p><hr /><h4 align="left">Description:</h4><i style="color:#00000070">A simple app for ASL beginners.<br>Letters, numbers, words and, more.</i></div>
                                        <button title='show full descrtiption' id="signsB" onclick="expandSigns()" class="read-more" style="background-color:#00000000;color:red;">Show More</button> |
                                        <button title='go to app page' onclick="location.href='https://www.toremetal.com/android/signs';" class="read-more" style="background-color:#00000000;color:red;"> View Page </button>
                                    </div>
                                    <script>
                                        function expandSigns() {
                                            if (document.getElementById('signsB').innerHTML == 'Show More') {
                                                document.getElementById('signsB').innerHTML = 'Show Less'
                                                document.getElementById('signsD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>(ASL) Signs A-Z</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>A simple app for ASL beginners!</i><p>This simple application is designed for beginners learning American Sign Language. Quickly view a reference picture of any letter of the alphabet, numbers 0-10, and common words.<br>Click the picture to view an enlargable view of the image. Clicking the search buttons open your browser, to a search query for related images. There is no setup involved or any accounts required to use the application. However, creating an account allows you to create your own custom library and submit images to the public shared library.</p>";
                                            } else {
                                                document.getElementById('signsB').innerHTML = 'Show More'
                                                document.getElementById('signsD').innerHTML = "<p align='center'><b>™T©ReMeTaL</b><br><i style='color:red'>(ASL) Signs A-Z</i><br> for <i style='color:#000000'>Android™</i> 5.0+</p><hr /><h4 align='left'>Description:</h4><i style='color:#00000070'>A simple app for ASL beginners.<br>Letters, numbers, words and, more.</i>"
                                            }
                                        };
                                    </script>
                                    <div align="center" id="signs">Views: <?=$signs?></div>
                                    <a onclick="myFunction('signs')" target="_blank" href='https://play.google.com/store/apps/details?id=com.toremetal.signsfree'><img class="zoom img-fluid " title='Get it on Google Play' alt='Get it on Google Play' src='/img/gp.png' /></a>
                                    <!-- YouTube-->
                                    <iframe class="contactus zoom img-fluid SameSiteFilter" referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FTheToremetal%2Fvideos%2F270314131880605%2F&show_text=false&t=0" title="™T©ReMeTaL Signs A-Z" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
                                    <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/pt.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
                                </figure>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end Albums -->
    </div>
    <!--end latest news1-->
    <div align="center" style="width:100%;height:100%;">
        <div class="fb-page" data-href="https://www.facebook.com/TheToremetal/" data-tabs="timeline" data-width="250" data-height="420" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TheToremetal/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TheToremetal/">Toremetal</a></blockquote></div>
    </div>

    <script>
        function myFunction(id) {
            var x = document.getElementById(id).innerHTML;
            x = parseInt(x.replace("Views: ", "")) + 1;
            document.getElementById(id).innerHTML = 'Thanks for Checking it out! Views: ' + x
            document.getElementById("logb").src = '/php/' + id + '.php'
            document.getElementById("alog").src = 'https://ads.toremetal.com/downloaded' + id + '/'
        };
    </script>
    <div style="border:none; overflow:hidden;width:0%;height:0%" scrolling="no" frameborder="0" height="0" width="0" class="hidden">
        <iframe style="border:none; overflow:hidden;" scrolling="no" frameborder="0" id="alog" height="0" width="0" class="hidden"></iframe>
        <iframe style="border:none; overflow:hidden;" scrolling="no" frameborder="0" id="logb" height="0" width="0" class="hidden"></iframe>
    </div>
    <div class="container">
        <div align="center" style="height: 100%; width: 100%; padding: 5px;">
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-8927593002808864"
                 data-ad-slot="2822185833"
                 data-ad-format="auto"
                 data-full-width-responsive="true">
            </ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        </div>
    </div><br />
    <!-- Photos -->
    <div id="screenshot" class="Albums" style="background-color:#80808000;">
        <div class="container1">

            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2 style="color:#FFFFFF">Photos</h2>

                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 margin" align="center">
                <div class="Albums-box" align="center">
                    <figure align="center">
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
    </div><br />

    <!-- Contact Us -->
    <div class="container1" align="center">
        <div class="contactus" align="center">
            <h2 id="Contact" align="center" class="contactus" style="color:#FFFFFF">Contact Us</h2>
            <ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb0">
                <li>
                    <a href="https://m.me/TheToremetal"><img title="Messenger" height="24" width="24" src="/img/messenger.webp" alt="icon" /></a>
                </li>
                <li>
                    <a href="https://twitter.com/TheToReMetal" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Twitter">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28" height="28" viewBox="0 0 400 400" xml:space="preserve">
<style type="text/css">
    .st0 {
        fill: #000000;
    }

    .st1 {
        fill: #FFFFFF;
    }

    .st3 {
        fill: #1B9DF080;
    }

    .st4 {
        fill: #00808080;
    }
</style>
                        <g id="Dark_Blue"><circle class="st3" cx="200" cy="200" r="180" /></g>
                        <g id="Logo__x2014__FIXED">
                        <path class="st1" d="M163.4,305.5c88.7,0,137.2-73.5,137.2-137.2c0-2.1,0-4.2-0.1-6.2c9.4-6.8,17.6-15.3,24.1-25
		c-8.6,3.8-17.9,6.4-27.7,7.6c10-6,17.6-15.4,21.2-26.7c-9.3,5.5-19.6,9.5-30.6,11.7c-8.8-9.4-21.3-15.2-35.2-15.2
		c-26.6,0-48.2,21.6-48.2,48.2c0,3.8,0.4,7.5,1.3,11c-40.1-2-75.6-21.2-99.4-50.4c-4.1,7.1-6.5,15.4-6.5,24.2
		c0,16.7,8.5,31.5,21.5,40.1c-7.9-0.2-15.3-2.4-21.8-6c0,0.2,0,0.4,0,0.6c0,23.4,16.6,42.8,38.7,47.3c-4,1.1-8.3,1.7-12.7,1.7
		c-3.1,0-6.1-0.3-9.1-0.9c6.1,19.2,23.9,33.1,45,33.5c-16.5,12.9-37.3,20.6-59.9,20.6c-3.9,0-7.7-0.2-11.5-0.7
		C110.8,297.5,136.2,305.5,163.4,305.5" /></g><title>Twitter™</title></svg>
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/TheToremetal" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="27.6" viewBox="0 0 56 55" fill="#FFFFFF"><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
                </li>
                <li>
                    <a href="mailto:toremetal@toremetal.com" target="_blank" class="inline-block p1" aria-label="Link to AMP HTML E-mail"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="24.4" viewBox="0 0 56 43" fill="#FFFFFF"><title>email</title><path d="M10.5 6.4C9.1 6.4 8 7.5 8 8.9v21.3c0 1.3 1.1 2.5 2.5 2.5h34.9c1.4 0 2.5-1.2 2.5-2.5V8.9c0-1.4-1.1-2.5-2.5-2.5H10.5zm2.1 2.5h30.7L27.9 22.3 12.6 8.9zm-2.1 1.4l16.6 14.6c.5.4 1.2.4 1.7 0l16.6-14.6v19.9H10.5V10.3z" class="ampstart-icon ampstart-icon-email"></path></svg></a>
                </li>
            </ul>

            <div style="width: auto; height: 100%" align="center">
                <iframe title="Send us a message" src="https://docs.google.com/forms/d/e/1FAIpQLSfhI8ptq1g3F9tGkIrLu3IJyisJkYzZgX7rQQzBOnVN2eVWpA/viewform?embedded=true" style="width: 100%;" height="820" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div>
        </div>
    </div><br>
    <!-- End Contact Us -->
    <?=$footer?>