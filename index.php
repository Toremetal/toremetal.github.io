<?php
header('Location: https://toremetal.com/home/');
//header('Location: https://www.toremetal.com');
if (isset($_COOKIE['tdli'])) {
    $login="Submit";
} else {
    $login="log-in";
}
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
    $txt = "______________ \n";
    fwrite($myfile, $txt);
    fclose($myfile);
}

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

//header('Location: https://www.toremetal.com/');

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

        $cookie_name = "cookieControl";
    if(isset($_COOKIE[$cookie_name])) {
        $user_ID = $_COOKIE[$cookie_name];
    } else if(isset($_COOKIE["analytics_ga"])) {
        $user_ID = $_COOKIE["analytics_ga"];
    } else if(isset($_COOKIE["_ga"])) {
        $user_ID = $_COOKIE["_ga"];
    } else {
        $myfile = fopen("../vc.txt", "r") or die("ERROR!");
        $session = fgets($myfile);
        fclose($myfile);
        $user_ID = 'TM1.1.' . 1000*(int)$session . '.' . 1000*(int)$session;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--<meta name="csrf-token" content="JIfR3ODbubCp48xHVlzpxLmyBcyP2mw6YTpnv1BD">-->
    <meta name="referrer" content="no-referrer-when-downgrade">
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


<!--<script data-ad-client="ca-pub-8927593002808864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
</script>-->
<!--<script>(adsbygoogle=window.adsbygoogle||[]).pauseAdRequests=1;</script>-->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-149650262-1"></script> 

<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->

<script type="text/javascript" src="/js/jquery.min.js"></script>
<!--src="/js/jquery.ihavecookies.js">-->
<script type="text/javascript">
/*!
 * ihavecookies - jQuery plugin for displaying cookie/privacy message
 * v0.3.2
 *
 * Copyright (c) 2018 Ketan Mistry (https://iamketan.com.au)
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
(function($) {

    /*
    |--------------------------------------------------------------------------
    | Cookie Message
    |--------------------------------------------------------------------------
    |
    | Displays the cookie message on first visit or 30 days after their
    | last visit.
    |
    | @param event - 'reinit' to reopen the cookie message
    |
    */
    $.fn.ihavecookies = function(options, event) {

        var $element = $(this);

        // Set defaults
        var settings = $.extend({
            cookieTypes: [
                {
                    type: 'Site Preferences',
                    value: 'preferences',
                    description: 'These are cookies that are related to your site preferences, e.g. remembering your username, site colours, etc.'
                },
                {
                    type: 'Analytics',
                    value: 'analytics',
                    description: 'Cookies related to site visits, browser types, etc.'
                },
                {
                    type: 'Marketing',
                    value: 'marketing',
                    description: 'Cookies related to ads and marketing, e.g. Ad Targeting'
                }
            ],
            title: '™T©ReMeTaL &#x1F36A; Cookies and Privacy',
            message: 'Cookies allow you to personalize your experience and tell us which (of our) webpages people visit. <br> By clicking “Accept”, you agree <br>™T©ReMeTaL can store cookies on your device and disclose or sell information in accordance to our:<br>',
            link: 'https://www.toremetal.com/cookie-policy',
            linkp: 'https://www.toremetal.com/privacypolicy',
            delay: 500,
            expires: 30,
            moreInfoLabel: 'Cookie Policy',
            moreInfoLabelp: 'Privacy Policy<br>',
            acceptBtnLabel: 'Accept:Cookies/Policies',
            advancedBtnLabel: 'Cookie Options',
            cookieTypesTitle: 'When you visit any of our websites, the site may store or retrieve information on your browser, mostly in the form of cookies. This information might be about you, your preferences, or your device, and is primarily used to provide better products and service. The information does not usually directly identify you, but it can give you a more personalized experience.<br>Because we respect your right to privacy, you can choose to dis-allow any non-essential cookies.<br>Note: Blocking cookies may impact your ™T©ReMeTaL experience.',
            fixedCookieTypeLabel:'Necessary',
            fixedCookieTypeDesc: 'These are cookies that are essential for the website to work correctly.',
            onAccept: function(){
                var myPreferences = $.fn.ihavecookies.cookie();
                console.log('The following preferences were saved...');
                console.log(myPreferences);
            },
            uncheckBoxes: true
        }, options);
            
        var myCookie = getCookie('cookieControl');
        var myCookiePrefs = getCookie('cookieControlPrefs');
        if (!myCookie || !myCookiePrefs || event == 'reinit') {
            // Remove all instances of the cookie message so it's not duplicated
            $('#gdpr-cookie-message').remove();

            // Set the 'necessary' cookie type checkbox which can not be unchecked
            var cookieTypes = '<li><input type="checkbox" name="gdpr[]" value="necessary" checked="checked" disabled="disabled"> <label title="' + settings.fixedCookieTypeDesc + '">' + settings.fixedCookieTypeLabel + '</label></li>';

            // Generate list of cookie type checkboxes
            preferences = JSON.parse(myCookiePrefs);
            $.each(settings.cookieTypes, function(index, field) {
                if (field.type !== '' && field.value !== '') {
                    var cookieTypeDescription = '';
                    if (field.description !== false) {
                        cookieTypeDescription = ' title="' + field.description + '"';
                    }
                    cookieTypes += '<li><input type="checkbox" id="gdpr-cookietype-' + field.value + '" name="gdpr[]" value="' + field.value + '" data-auto="on"> <label for="gdpr-cookietype-' + field.value + '"' + cookieTypeDescription + '>' + field.type + '</label></li>';
                }
            });

            // Display cookie message on page
            var cookieMessage = '<div id="gdpr-cookie-message"><h4>' + settings.title + '</h4><p>' + settings.message + ' <a href="' + settings.link + '">' + settings.moreInfoLabel + '</a> & <a href="' + settings.linkp + '">' + settings.moreInfoLabelp + '</a><br><div id="gdpr-cookie-types" style="display:none;"><h5>' + settings.cookieTypesTitle + '</h5><ul>' + cookieTypes + '</ul></div><p><button id="gdpr-cookie-accept" type="button">' + settings.acceptBtnLabel + '</button><button id="gdpr-cookie-advanced" type="button">' + settings.advancedBtnLabel + '</button></p></div>';
            setTimeout(function(){
                $($element).append(cookieMessage);
                $('#gdpr-cookie-message').hide().fadeIn('slow', function(){
                    // If reinit'ing, open the advanced section of message
                    // and re-check all previously selected options.
                    if (event == 'reinit') {
                        $('#gdpr-cookie-advanced').trigger('click');
                        $.each(preferences, function(index, field) {
                            $('input#gdpr-cookietype-' + field).prop('checked', true);
                        });
                    }
                });
            }, settings.delay);

            // When accept button is clicked drop cookie
            $('body').on('click','#gdpr-cookie-accept', function(){
                // Set cookie
                dropCookie('<?=$user_ID?>', settings.expires);

                // If 'data-auto' is set to ON, tick all checkboxes because
                // the user hasn't clicked the customise cookies button
                $('input[name="gdpr[]"][data-auto="on"]').prop('checked', true);

                // Save users cookie preferences (in a cookie!)
                var prefs = [];
                $.each($('input[name="gdpr[]"]').serializeArray(), function(i, field){
                    prefs.push(field.value);
                });
                setCookie('cookieControlPrefs', encodeURIComponent(JSON.stringify(prefs)), 365);

                // Run callback function
                settings.onAccept.call(this);
            });

            // Toggle advanced cookie options
            $('body').on('click', '#gdpr-cookie-advanced', function(){
                // Uncheck all checkboxes except for the disabled 'necessary'
                // one and set 'data-auto' to OFF for all. The user can now
                // select the cookies they want to accept.
                $('input[name="gdpr[]"]:not(:disabled)').attr('data-auto', 'off').prop('checked', false);
                $('#gdpr-cookie-types').slideDown('fast', function(){
                    $('#gdpr-cookie-advanced').prop('disabled', true);
                });
            });

        } else {
            var cookieVal = '<?=$user_ID?>';
            if (myCookie == 'false') {
                cookieVal = false;
            }
            dropCookie(cookieVal, settings.expires);
        }

        // Uncheck any checkboxes on page load
        if (settings.uncheckBoxes === true) {
            $('input[type="checkbox"].ihavecookies').prop('checked', false);
        }

    };

    // Method to get cookie value
    $.fn.ihavecookies.cookie = function() {
        var preferences = getCookie('cookieControlPrefs');
        return JSON.parse(preferences);
    };

    // Method to check if user cookie preference exists
    $.fn.ihavecookies.preference = function(cookieTypeValue) {
        var control = getCookie('cookieControl');
        var preferences = getCookie('cookieControlPrefs');
        preferences = JSON.parse(preferences);
        if (control === false) {
            return false;
        }
        if (preferences === false || preferences.indexOf(cookieTypeValue) === -1) {
            return false;
        }
        return true;
    };

    /*
    |--------------------------------------------------------------------------
    | Drop Cookie
    |--------------------------------------------------------------------------
    |
    | Function to drop the cookie with a boolean value of true.
    |
    */
    var dropCookie = function(value, expiryDays) {
        setCookie('cookieControl', value, expiryDays);
        $('#gdpr-cookie-message').fadeOut('fast', function() {
            $(this).remove();
        });
    };

    /*
    |--------------------------------------------------------------------------
    | Set Cookie
    |--------------------------------------------------------------------------
    |
    | Sets cookie with 'name' and value of 'value' for 'expiry_days'.
    |
    */
    var setCookie = function(name, value, expiry_days) {
        var d = new Date();
        d.setTime(d.getTime() + (expiry_days*24*60*60*1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
        return getCookie(name);
    };

    /*
    |--------------------------------------------------------------------------
    | Get Cookie
    |--------------------------------------------------------------------------
    |
    | Gets cookie called 'name'.
    |
    */
    var getCookie = function(name) {
        var cookie_name = name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(cookie_name) === 0) {
                return c.substring(cookie_name.length, c.length);
            }
        }
        return false;
    };

}(jQuery));
    </script>
    <script type="text/javascript">
    var options = {
            title: '™T©ReMeTaL &#x1F36A; Cookies and Privacy',
            message: 'Cookies allow you to personalize your experience and tell us which (of our) webpages people visit. <br> By clicking “Accept”, you agree <br>™T©ReMeTaL can store cookies on your device and disclose or sell information in accordance to our:<br>',
            link: 'https://www.toremetal.com/cookie-policy',
            linkp: 'https://www.toremetal.com/privacypolicy',
            delay: 500,
            expires: 30,
            moreInfoLabel: 'Cookie Policy',
            moreInfoLabelp: 'Privacy Policy<br>',
            acceptBtnLabel: 'Accept:Cookies/Policies',
            advancedBtnLabel: 'Cookie Options',
            cookieTypesTitle: 'When you visit any of our websites, the site may store or retrieve information on your browser, mostly in the form of cookies. This information might be about you, your preferences, or your device, and is primarily used to provide better products and service. The information does not usually directly identify you, but it can give you a more personalized experience.<br>Because we respect your right to privacy, you can choose to dis-allow any non-essential cookies.<br>Note: Blocking cookies may impact your ™T©ReMeTaL experience.',
            fixedCookieTypeLabel:'Necessary',
            fixedCookieTypeDesc: 'These are cookies that are essential for the website to work correctly.',
        onAccept: function(){
            //document.getElementById("logb").src='php/gagid.php';
            var myPreferences = $.fn.ihavecookies.cookie();
            console.log('The following preferences were saved...');
            console.log(myPreferences);
            console.save(myPreferences, 'test.txt');
        },
            uncheckBoxes: true
    }

    $(document).ready(function() {
        $('body').ihavecookies(options);
        
        if ($.fn.ihavecookies.preference('analytics') === true) {
            console.log('Consent: Analytic cookies are allowed.');
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);};
            gtag('js', new Date());
            gtag('config', 'UA-149650262-1', {
                cookie_flags: 'domain=<?=$hst?>;secure;samesite=none'
            });
            gtag('config', 'UA-149650262-1', {'cookie_prefix': 'analytics'});
            gtag('consent', 'default', {'analytics_storage': 'denied', 'region': ['US-CA']});
            gtag('consent', 'default', {'analytics_storage': 'granted'});
            
            
            
            //gtag('set', {'cookie_flags': 'SameSite=None;Secure'});
            //gtag('config', 'UA-149650262-1', {'cookie_prefix': 'analytics'});
            //gtag('config', 'UA-149650262-1', {'cookie_domain': ''});<?=""//'$hst'?>
            //gtag('config', 'UA-149650262-1', {'cookie_update': false});
            //gtag('set', {'user_id': 'USER_ID'});//setuser() 'USER_ID'
            //gtag('consent', 'default', {'ad_storage': 'denied', 'region': ['US-CA']});
            //gtag('consent', 'default', {'ad_storage': 'denied'});
            //gtag('consent', 'update', {'analytics_storage': 'denied','region': ['US-CA']});
            //gtag('consent', 'update', {'analytics_storage': 'granted'});
           //document.getElementById("alog").src='php/an.php'
            //ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
            //document.getElementById("ihavecookiesBtn").innerHTML=innerHTML+'a'
            // document.getElementById("pta").innerHTML=gtag('get', {'user_id': 'USER_ID'})+" : "+setuser()
            //if (window['ga-disable-UA-149650262-1'] == true) {
                window['ga-disable-UA-149650262-1'] = false
            //}
        } else {
            window['ga-disable-UA-149650262-1'] = true;
            //document.getElementById("alog").src='php/nan.php'
        }
        
        if ($.fn.ihavecookies.preference('marketing') === true) {
            console.log('Consent: marketing cookies are allowed.');
            //(adsbygoogle=window.adsbygoogle||[]).pauseAdRequests=0;
            if ($.fn.ihavecookies.preference('analytics') === true) {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('consent', 'default', {'ad_storage': 'denied','region': ['US-CA']});
                gtag('consent', 'default', {'ad_storage': 'granted'});
            };
            //document.getElementById("alog").src='php/ad.php'
            //document.getElementById("ihavecookiesBtn").innerHTML='&#x1F36A; m'
        } else {
            if ($.fn.ihavecookies.preference('analytics') === true) {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('consent', 'default', {'ad_storage': 'denied'});
                gtag('set', 'url_passthrough', true);
            //gtag('consent', 'update', {'ad_storage': 'denied','region': ['US-CA']});
            }
            //(adsbygoogle=window.adsbygoogle||[]).requestNonPersonalizedAds=1;
            //(adsbygoogle=window.adsbygoogle||[]).pauseAdRequests=0;
            //document.getElementById("alog").src='php/nad.php'
        }

        if ($.fn.ihavecookies.preference('preferences') === true) {
            console.log('Consent: preference cookies are allowed.');
            //document.getElementById("alog").src='php/pf.php'
        } else {
            //document.getElementById("alog").src='php/npf.php'
        }

        $('#ihavecookiesBtn').on('click', function(){
            $('body').ihavecookies(options, 'reinit');
        });
    });
    </script>
<!--<script data-ad-client="ca-pub-8927593002808864" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
</script>-->
  

<!--
<script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    googletag.defineOutOfPageSlot('/22493804016/Hm-Pg', 'div-gpt-ad-1627335813415-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.enableServices();
  });
</script>
-->
</head>
<body class="main-layout" style="background-color:#29292990; color:#FFFFFF">

    <!-- header -->
    <header style="height:100%;">
        <!-- loader  -->
    <div class="loader_bg" style="background-color:#29292990">
        <div class="loader"><img src="img/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
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
                        <!--style="width:100%;height:100%;white-space:nowrap;overflow-x:auto;overflow-y:auto"-->
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main" >
                                        <li class="active"><a title="Home" href="http://toremetal.com">Home</a>
                                        </li>
                                        <li><a title="Check Out Apps on ™T©ReMeTaL" href="/apps/">Apps</a>
                                        </li>
                                        <li> <a title="GET IT ON Google Play" href="https://play.google.com/store/apps/dev?id=7952290850776080706">Play-Store</a>
                                        </li>
                                        <!--<li> <a href="https://www.toremetal.com/android"> Android</a> </li>-->
                                        <!--<li> <a href="https://ads.toremetal.com/musicians">Music </a> </li>-->
                                        <li style="width:235px;height:100%;color:#00000080"><!--color:#00000080-->
                                        <script async src="https://cse.google.com/cse.js?cx=partner-pub-8927593002808864:1031426169"></script>
                                            <div style="width:235px;height:100%;" id="search" class="gcse-searchbox-only">loading...</div></li>
                                        <nav class="sub-menu" align="center">
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
</li>
<li><a href="/androids/createaccount/"><?=$login?></a></li>
</ul>
                         </nav>
                                         <!--<li> <a href="https://www.toremetal.com/contact">Contact</a> </li>
                                        <li> <a href="#contact">Login</a> </li>-->
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
                    <!--<a href="#">Download Now</a>-->
                </div>
            </div>
        </div>
    </section>

   <div class="container1 my4 mxn3 center">
       <figure  rel="ligthbox" class="ampstart-image-with-heading  m5 bottom">

       <div class="contactus" align="center">
          <article class="px3">
<h4 id="story" style="color:#FFFFFF" class="my4 theme2-anchored">™T©ReMeTaL</h4><h2 style="color:#FFFFFF" >Easy-to-Use Applications<br>Designed for Everyone</h2>
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
          <iframe class='contactus img-fluid SameSiteFilter' referrerpolicy="SameSite:None; Secure" style="height: 100%; width: 100%" src="https://www.youtube.com/embed/UtRdmcVEL1E?&autoplay=1" title="™T©ReMeTaL Apps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; cross-origin-isolated" allowfullscreen></iframe>
          <!--<video preload="auto" autoplay muted style="align: center; width: 100%; height: 100%; position: center; align: center;" controls controlsList="nodownload"><source src="/media/ToremetalApps.mp4" type="video/mp4">Your browser does not support the video tag.</video>-->
       </div>
       </figure>
       <!--ShareAsale-->
       <div align="center" style="height: 100%; width: 100%" class="container1"><a target="_blank" href="https://shareasale.com/r.cfm?b=1730046&amp;u=2789938&amp;m=104322&amp;urllink=&amp;afftrack="><img title="McAfee - Powerful Security for today's online threats" style="height: 100%; width: 100%" src="/img/McAfee.webp" border="0" /></a>
       </div>
   </div>

<!--Lastestnews1-->
<div id="screenshot2" align="center" class="Lastestnews" style="background-color:#80808000;"><!--  Style="background-color:powderblue;" -->
    <!--Albums-->
    <div id="screenshot" class="Albums" style="background-color:#80808000;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2 style="color:#FFFFFF" >Applications</h2><span></span>
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
                           <div align="center" id="posa">Downloads: <?=$posa?></div>
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
                              <div align="center" id="pta">Downloads: <?=$pta?></div>
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
                              <div align="center" id="signs">Downloads: <?=$signs?></div>
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
        document.getElementById(id).innerHTML='Thanks for Checking it out! Downloads: ' + x
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
<!-- class="hidden" -->

<!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
<!--<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-8927593002808864"
     data-ad-slot="2822185833"
     data-ad-format="auto"
     data-full-width-responsive="true">
</ins>-->

<!--</div>-->

    <!-- Photos -->
    <div id="screenshot" class="Albums" style="background-color:#80808000;">
        <div class="container1">

            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2 style="color:#FFFFFF" >Photos</h2>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 margin" style="align:center">
                <div class="Albums-box" style="align:center">
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
       <div align="center" style="height: 100%; width: 100%" class="container1"><a target="_blank" href="https://shareasale.com/r.cfm?b=1303105&amp;u=2789938&amp;m=43951&amp;urllink=&amp;afftrack="><img title="SEO PowerSuite - Recomended by industry experts worldwide." style="height: 100%; width: 100%" src="/img/sps-partnership-728x90eng.png" border="0" /></a>
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
              <iframe title="Send us a message" src="https://docs.google.com/forms/d/e/1FAIpQLSfhI8ptq1g3F9tGkIrLu3IJyisJkYzZgX7rQQzBOnVN2eVWpA/viewform?embedded=true" style="width: 100%;" height="760" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
          </div>
       </div>
    </div><br>
    <!-- End Contact Us -->

<!-- Messenger Chat Plugin Code -->
    <div id="fb-root" align="center" style="height: 100%; width: 100%"></div>

    <!-- Your Chat Plugin code
    <div id="fb-customer-chat" class="fb-customerchat" align="center" style="height: 100%; width: 100%">
    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "226195990786734");
      chatbox.setAttribute("attribution", "biz_inbox");
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v11.0'
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
    </div> -->
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
      <div title="Cookie Settings" style="text-align: left;position: fixed;z-index:9999999;bottom: 50px;width: auto;left: 1%;cursor: pointer;line-height: 0;display:block !important;">
<button id="ihavecookiesBtn" style="background-color:#80808000; font-size:30px; height:100%">&#x1F36A;</button>
      </div>
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

<script>
(function(console){

console.save = function(data, filename){
    document.getElementById("alog").src='php/save.php'
}
/*    if(!data) {
        console.error('Console.save: No data')
        return;
    }

    if(!filename) filename = 'console.json'

    if(typeof data === "object"){
        data = JSON.stringify(data, undefined, 4)
    }

    var blob = new Blob([data], {type: 'text/json'}),
        e    = document.createEvent('MouseEvents'),
        a    = document.createElement('a')

    a.download = filename
    a.href = window.URL.createObjectURL(blob)
    a.dataset.downloadurl =  ['text/json', a.download, a.href].join(':')
    e.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null)
    a.dispatchEvent(e)*/


   //document.getElementById("posa").innerHTML='test1!'
  //document.getElementById("alog").src='https://ads.toremetal.com/downloadedposa/'
  
})(console)
</script>
<script>
    class SameSiteFilter extends GenericFilterBean {
@Override
public void doFilter (ServletRequest request, ServletResponse response, FilterChain chain) throws IOException, ServletException {
    HttpServletResponse resp = (HttpServletResponse) response;
    String cookie = resp.getHeader("Set-Cookie");
    if (cookie != null) {
        resp.setHeader("Set-Cookie", cookie + "; SameSite=none; Secure; Access-Control-Allow-Origin: *");//HttpOnly;SameSite=none; Secure");
    }
    chain.doFilter(request, response);
}
        
    }
</script>
</body>

</html>