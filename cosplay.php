<!DOCTYPE html>
<html>
  <head>
    <title>API - Nguyễn Quốc Vinh</title>
	<link href="https://i.imgur.com/J5hXwiA.png" rel="icon" type="image/x-icon" /><meta content='Web API By JustGon' property='og:description'/><meta content='https://i.imgur.com/J5hXwiA.png' property='og:image'/>
  </head>
<?php
function getRandomFromArray($ar) {
mt_srand( (double)microtime() * 1000000 );
$num = array_rand($ar);
return $ar[$num];
}

function getImagesFromDir($path) {
$images = array();
if ( $img_dir = @opendir($path) ) {
while ( false !== ($img_file = readdir($img_dir)) ) {
if ( preg_match("/(\.gif|\.jpg|\.png|\.gif)$/", $img_file) ) {
$images[] = $img_file;
}
}
closedir($img_dir);
}
return $images;
}

$root = '';
$path = 'uploads/cosplay/';
$imgList = getImagesFromDir($root . $path);
$img = getRandomFromArray($imgList);
?>
<?php
$pipi = array(
"data" => "https://api.demo.repl.co/uploads/cosplay/".$img,
"author" => "Nguyễn Quốc Vinh",
);
$json = json_encode($pipi);
print($json);
?>
</html>