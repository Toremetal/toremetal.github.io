<?php
/* ***************************************************\
*      ***** ™T©ReMeTaL - SEO Solutions! *****        *
*         Automated SiteMaps and Robots.txt           *
*             { ©2022-20** ™T©ReMeTaL }               *
*          * ** [ServerSide PHP code] ** *            *
*    Note: This Solution Auto-Writes files for,       *
* Sitemap.xml, Sitemap.html, Robots.txt and, NavMenu. *
* *****************************************************
*  |   Use: map_mySite("../"                        |
*  |https://mywebsite.com/sub-directory/thisfile.php|
*  |   Use: map_mySite("."                          |
*  |      https://mywebsite.com/thisfile.php        |
*  --------------------------------------------------
*   This code will display all directories for the website containing it.|
*  *  * (No matter how many directories). This is achieved by cloning,   |
*    Allowing it to create a new instance of itself for every directory. |
* ***********************************************************************
*           [Site Map Info:]
*  -------------------------------------------
***     <*changefreq> `optional
*  How frequently the page is likely to change.
*  This value provides general information to
*  search engines and may not correlate exactly
*  to how often they crawl the page.
*  Valid values are:
*    [always, hourly, daily, weekly, monthly, yearly, never].
*  Use value "always" to describe dynamic documents.
*  The value "never" should be used to describe archived URLs.
*************************************************************|
***     <*priority> `optional	
* The priority of a URL relative to other URLs on your site.
* Valid values range from 0.0 to 1.0. This value lets
* search engines know the pages most important for crawlers.
*  ** The default priority of a page is 0.5. **
*  Homepage, product information, landing pages.
*     1.0 - 0.8
*  News articles, some weather services, blog posts, etc.
*     0.7 - 0.4
*  FAQs, outdated, old press, static pages relevant to keep.
*     0.3 - 0.0
* ********************************************************|
*  [ Entity Escaping.]
*  ##  Your Sitemap file must be UTF-8 encoded!  ##
* (you can generally do this when you save the file).
* As with all XML files, any data values (including URLs)
* must use entity escape codes for the characters.
* Name------Character--Escape Code.
* Ampersand---- & ------ &amp;
* Single Quote- ' ------ &apos;
* Double Quote- " ------ &quot;
* Greater Than- > ------ &gt;
* Less Than---- < ------ &lt;
* ************************ */

/* * Instance Variables ******
 */
$siteMap;
$robots;
$myError;

/* * Static Values *****
 */
$url = $_SERVER['HTTP_HOST'];

/* * Write-Ops. ****
 */
$writeXmlSiteMap = true;
$writeRobot = true;
$writeHtmlSiteMap = true;

/* * Display-Ops. ***
 */
$showMap = true;
$showXmlMap = false;
$showError = false;

/* SiteMap date. **
 */
$mydate = getdate(date("U"));
$lastMod = $mydate[year]."-".chk_addZero($mydate[mon])."-".chk_addZero($mydate[mday])."T".chk_addZero($mydate[hours]).":".chk_addZero($mydate[minutes]).":".chk_addZero($mydate[seconds])."+00:00";


/* ****************************************|
   * * * * The Processing function. * * * *
  **************************************** */
function map_mySite($dir = ".", $url, $lastMod, $writeRobot, $writeHtmlSiteMap) {
    if (is_dir($dir)){
        foreach (scandir($dir) as $dir1) {
            if (is_dir($dir."/".$dir1)) {
                 /* ( Ignore Directory Flag: noindex.txt ) Folders containing a noindex.txt (empty file) will be excluded from output. */
                if (!file_exists($dir."/".$dir1."/noindex.txt") && $dir1 != "." && $dir1 != ".." && $dir1 != "...") {
                    $siteMap=$siteMap.'<url>
<loc>'.$url.str_replace("//","/",str_replace("./","/",str_replace("../","/",$dir."/".$dir1))).'/</loc>
<changefreq>Daily</changefreq>
<priority>0.50</priority>
<lastmod>'.$lastMod.'</lastmod>
</url>
';
    if ($writeRobot) {
        if ($dir1 != "css" && $dir1 != "js") {
            $robotsfilename = get_robotstxt();
            $robotsfile = fopen($robotsfilename, "a");
            fwrite($robotsfile, "Allow: ".str_replace("//","/",str_replace("./","/",str_replace("../","/",$dir."/".$dir1)))."/\r\n");
            fclose($robotsfile);
            $robotsfile = null;
        }
    }
    if ($writeHtmlSiteMap) {
        $lnkStr = str_replace("//","/",str_replace("./","/",str_replace("../","/",$dir."/".$dir1)));
        $htmlfile = fopen('sitemap.html', "a");
        fwrite($htmlfile, '<li><a title="'.$dir1.'" href="'.$lnkStr.'">'.$dir1.'</a></li>');
        fclose($htmlfile);
        $htmlfile = null; 
    }
                    $siteMap = $siteMap.map_mySite($dir."/".$dir1, $url, $lastMod, $writeRobot, $writeHtmlSiteMap);
                }
            }
        }
    }
  return $siteMap;
}
/* [End function map_mySite()].
**************************** */


/* ****************************************************************|
  *    The calling sequence.
  * @param: $sitemap -Output string.
  * @param: $url -Website URL.
  * @param: $lastMod -Last Updated.(This example uses current date)
  * @function map_mySite(".",$url,$lastMod)-Directory Iterator.
  ************************************************************** */
    if ($writeRobot) {
        $myError=$myError.backup_File(get_robotstxt());
        $robots='User-agent: *
Allow: /*.js
Allow: /*.css
Allow: /*.svg
Allow: /*.png
Allow: /*.webp
Allow: /*.ico
Allow: /js/*.js
Allow: /css/*.css
';
        $robotsfilename = get_robotstxt();
        $robotsfile = fopen($robotsfilename, "w");
        fwrite($robotsfile, $robots);
        fclose($robotsfile);
        $robotsfile = null;
    }

    if ($writeHtmlSiteMap) {
        wrt_html();
    }

    $siteMap = $siteMap.map_mySite("../", $url, $lastMod, $writeRobot, $writeHtmlSiteMap);

    if ($writeHtmlSiteMap) {
        fn_html();
    }

$siteMaphead = '<?xml version="1.0" encoding="UTF-8" ?>
<urlset
 xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
 xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
 xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
<loc>'.$url.'/</loc>
<lastmod>'.$lastMod.'</lastmod>
<changefreq>Daily</changefreq>
<priority>1.00</priority>
</url>
';
    if ($writeRobot) {
        $robots='

Disallow: /
';
        $robotsfilename = get_robotstxt();
        $robotsfile = fopen($robotsfilename, "a");
        fwrite($robotsfile, $robots);
        fclose($robotsfile);
        $robotsfile = null;
    }
$siteMap=$siteMaphead.$siteMap.'</urlset>';

if ($writeXmlSiteMap) {
    $filename = "../sitemap.xml";
    if (file_exists($filename)) {
        backup_File($filename);
    } elseif (file_exists("sitemap.xml")) {
        $filename = "sitemap.xml";
        backup_File($filename);
    }
    try {
        $myfile = fopen($filename, "w");
        fwrite($myfile, $siteMap);
        fclose($myfile);
        $myError=$myError."
  <!-- ================================
    FILE CREATE SUCCESS:[(SiteMap.xml)]
   ================================ -->";
    } catch(Exception $e) {
        $myError=$myError.'
  <!-- =====================================
    ERROR:[(SiteMap)]: ' .$e->getMessage()."
   ===================================== -->";
    }
  /* ************************************************** */
    if ($showError) {echo $myError;}
}

if ($showMap) {
    if (!$showXmlMap) {
        header('Location: sitemap.html');
    } else {
        header("Content-type: text/xml");
        echo $siteMap;
    }
}

$siteMap = null;


  /* *********************************** |
   *  *  @function chk_addZero($val)  *
   * Formats date/time with leading zero.
   *         @param $val (int),
   *        $val < 10  (0.$val)
   *         @return (String),
   *        Return ($val) value.
   * ************************ */
function chk_addZero($val) {
    if ($val <10) {
        return "0".$val;
    } else {
        return $val;
    }
}
/* [End function chk_addZero()].
***************************** */


  /* *********************************** |
   *   **** @function backup_File() ****
   *   [file_name: '$filename'.backup]
   *  Create a backup of the '$filename'
   * before overwriting. *Best Practices.
   *   @param $filename (String),
   *      The '$filename' file location.
   *   @return (String),
   *      : Returns success value.
   * *********************************** */
function backup_File($filename) {
    try {
        if (file_exists($filename)) {
            $mydate = getdate(date("U"));
            /* * ($dbu : Date Backed Up) logged in the backup. * */
            $dbu="(".chk_addZero($mydate[mon])."-".chk_addZero($mydate[mday])."-".$mydate[year].")";
            $myfile = fopen($filename, "r");
            $backuptxt = fread($myfile,filesize($filename));
            fclose($myfile);
            $mybackupfile = fopen($filename.".backup.txt", "w");
            fwrite($mybackupfile, "Backup Date: ".$dbu." \r\n ".$backuptxt);
            fclose($mybackupfile);
            return "
  <!-- =================================
    BACKUP SUCCESSFUL:[(".$filename.".backup)]
   ================================= -->";
        }
        return "File Not Found!";
    } catch(Exception $be) {
        return '
  <!-- =====================================
    BACKUP ERROR:[('.$filename.')]: ' .$be->getMessage()."
   ===================================== -->";
    }
}
/* [End function backup_File()].
**************************** */


  /* ************************************************ |
   *     @function get_robotstxt().
   *  Check if the robot file exists in the current
   *  directory or default to the parent directory.
   *   Best Practice:
   *    Use this as the default file (index.php) in a
   *    sitemap directory, Relative URL: (ex. /sitemap).
   * ************************************************ */
    function get_robotstxt() {
        if (file_exists("robots.txt")) {
            return "robots.txt";
        }
        return "../robots.txt";
    }
   /* [End function get_robotstxt()].
   ******************************* */


  /* *************************** |
   *     @function wrt_html().
   *  Write the html sitemap file.
   * ************************** */
function wrt_html() {
    $filenm = "sitemap.html";
    if (file_exists($filenm)) {
        backup_File($filenm);
    }
    $filenm = null;
    $url = $_SERVER['HTTP_HOST'];
    $mydate = getdate(date("U"));
    $dbu="(".chk_addZero($mydate[mon])."-".chk_addZero($mydate[mday])."-".$mydate[year].")";
        $htheader='<!doctype html><html lang="en"><head><meta charset="utf-8" /><title>SiteMap: '.$url.'  ™T©ReMeTaL - SEO Solutions:(toremetal.com)</title><meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

<link rel="preconnect" href="https://fonts.googleapis.com" />
    <link crossorigin rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English+SC&display=swap" rel="stylesheet" />
<style>
html {
    background-image: url("/img/background-sitemap.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    padding: 30px;
}
body, header, li, p, h1, h2, sub {
    font-family: "IM Fell English SC", serif;
    font-size: 18px;
    color: whitesmoke;
    box-sizing: border-box;
    box-shadow: 1px 1px 2px rgba(0,0,0,0.31);
    padding: 6px 12px;
    margin:4px;
    border: 1px ridge whitesmoke;
    border: 1px groove gold;
    border-radius: 5px;
    background-color: #49494990;
    border-style: ridge inset !important;
    width:fit-content;
    text-shadow:0.5px 0.5px 0.5px blue, 0 0 1em darkred, 0 0 0.2em red;
    font-weight:300;
}
ol {
    padding-left: 24px;
}
a {
    font-family: "IM Fell English SC", serif;
    font-size: 18px;
    color: whitesmoke;
    padding: 6px 12px;
    margin: 4px;
    width: fit-content;
    text-shadow: 0.5px 0.5px 0.5px blue, 0 0 1em darkred, 0 0 0.2em red;
    font-weight: 300;
}
a:hover {
    box-shadow: 0.5px 0.5px 1px rgba(0,0,0,0.09);
    text-shadow:0.25px 0.25px 0.25px blue, 0 0 1em darkred, 0 0 0.12em red;
}
</style></head><body><header><h2 style="font-size:large;">Site Map</h2><h1 style="font-size:xx-large;">'.$url.'</h1><p><sup style="font-size:smaller;color:gold;">Last updated: '.$dbu.'</sup></p><h3><a href="https://'.$url.'">Home: <sub>'.$url.'</sub></a></h3><nav><ol>';
        $htmlfile = fopen('sitemap.html', "w");
        fwrite($htmlfile, $htheader);
        fclose($htmlfile);
        $htmlfile = null;
    }
   /* [End function wrt_html()].
   *************************** */


  /* *************************** |
   *     @function fn_html().
   * finish the html sitemap file.
   * ************************** */
    function fn_html() {
        $htfooter='<li style="font-size:small;color:#b3e5fc;">pages <sup>(Including Home Pg.)</sup></li></ol></nav></header><div></div><footer><script>function yr() { const d = new Date(); return d.getFullYear(); }</script><small title="&#169;2022&#8482;T&#169;ReMeTaL" style="font-weight:normal;color:red;text-align: left;position: fixed;z-index:8;bottom: 6px;left: 5px;cursor: default;line-height: 0;display:block !important;font-size: 14px;">&#169;<script>document.write(yr())</script>&#8482;T&#169;ReMeTaL - <a href="https://toremetal.com" style="text-decoration:none;margin:0;padding:0;"><sup style="font-size:smaller;color:aqua">toremetal.com</sup></a> - Automated SEO Solutions.</small></footer></body></html>';
        $htmlfile = fopen('sitemap.html', "a");
        fwrite($htmlfile, $htfooter);
        fclose($htmlfile);
        $htmlfile = null;
    }
   /* [End function wrt_html()].
   *************************** */

?>