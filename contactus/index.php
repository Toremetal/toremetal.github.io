<?php
$hst = $_SERVER['HTTP_HOST'];
$req = $_SERVER['REQUEST_URI'];
$url="https://".$hst.$req;
$filename = '/log/e.t';
if (!file_exists($filename)) {
    $filename = '../log/e.t';
} 
if (file_exists($filename)) {
    $myfile = fopen($filename, "a");
    date_default_timezone_set("America/Los_Angeles");
    $txt = "Date: " . date("Y/m/d") . ", Time: " . date("h:i:sa") . "\nURL: {$hst}" . "\nRef: {$req}" . "\n______________ \n";
    fwrite($myfile, $txt);
    fclose($myfile);
}
$Pagetitle="™T©ReMeTaL - Contact Us";
$Pagesubtitle="Contact Us";
$filename = "contact.t";
if (file_exists($filename)) {
    $myfile = fopen($filename, "r");
    $pagecontent = fread($myfile,filesize($filename));
    fclose($myfile);
} else {$pagecontent="";}
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
<?=$pagecontent?>
<?=$footer?>