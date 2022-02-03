<?php
$target_file="photo.config";
if (file_exists($target_file)) {
    $int = (int)1;
    $myfile = fopen($target_file, "r");
    $photos = '[{"id":"'.$int++.'","img_src":"'.fgets($myfile).'","img_val":"'.fgets($myfile).'"}';
    while(! feof($myfile)) {
        $photos = $photos.',{"id":"'.$int++.'","img_src":"'.fgets($myfile).'","img_val":"'.fgets($myfile).'"}';
    }
    fclose($myfile);
    $photos = $photos . "]";
} else {
    $photos = "";
}
?>
<?=$photos ?>