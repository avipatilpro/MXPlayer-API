<?php

// © Avishkar Patil
// Change Output According Your Requirements
// DO NOT REMOVE Credit
// DON'T ASK FOR PLAYER CODES HERE ALL THINGS CREATE IT

$url =$_GET['c'];
if($url !=""){
$uid = str_replace('https://www.mxplayer.in/', '/', $url); 
$murl =file_get_contents("https://seo.mxplay.com/v1/api/seo/get-url-details?url=$uid");

$mx =json_decode($murl, true);
$id =$mx['data']['id'];
$type =$mx['data']['type'];
$title =$mx['data']['title'];
$des =$mx['data']['description'];
header("Content-Type: application/json");


$mxurl =file_get_contents("https://api.mxplay.com/v1/web/detail/video?type=$type&id=$id&platform=com.mxplay.desktop&device-density=2&userid=30bb09af-733a-413b-b8b7-b10348ec2b3d&content-languages=hi,mr,pa,bn,en,ml,kn,gu,te,ta");

$mxdata =json_decode($mxurl, true);
$mtitle =$mxdata['title'];
$mdes =$mxdata['description'];
$relese =$mxdata['releaseDate'];
$imgu =$mxdata['imageInfo'][1]['url'];
$img = "https://isa-1.mxplay.com/".$imgu;
$vhash = $mxdata['stream']['videoHash'];

$dasht = $mxdata['stream']['thirdParty']['dashUrl'];
$alt = $mxdata['stream']['altBalaji']['dashUrl'];
$h = $mxdata['stream']['dash']['high'];
$b = $mxdata['stream']['dash']['base'];
$m = $mxdata['stream']['dash']['main'];


$hu = $mxdata['stream']['thirdParty']['hlsUrl'];
$ab = $mxdata['stream']['altBalaji']['hlsUrl'];
$x = $mxdata['stream']['hls']['high'];
$y = $mxdata['stream']['hls']['base'];
$z = $mxdata['stream']['hls']['main'];

 
//--------- DONT THINK ABOYT THIS ------//

if (empty($h)) {
}
else
{$dash=$h;}
  if (empty($b)) {
}
  else
{$dash=$b;}

  if (empty($m)) {
}
else
{$dash=$m;}


if (empty($alt)) {
}
else
{$dd=$alt;}

if (empty($dasht)) {
}
else
{$dd=$dasht;}


if (preg_match("/https/", $dash))
{$url = $dash;}
else
{$url = "https://llvod.mxplay.com/" . $dash;}

if (is_null($dash)){
$dplay = $dd;
}
 else
 {$dplay = $url;}

// Final OutPut Is $dplay ( DRM URL)


if (empty($x)) {
}
else
{$hls =$x;}
  if (empty($y)) {
}
  else
{$hls=$y;}

  if (empty($z)) {
}
else
{$hls=$z;}


if (empty($ab)) {
}
else
{$hh=$ab;}

if (empty($hu)) {
  }
else
{$hh=$hu;}



if (preg_match("/https/", $hls))
{$xyz = $hls;}
else
{$xyz = "https://llvod.mxplay.com/" . $hls;}
 
if (is_null($hls))
{$hplay = $hh;}
else
{ $hplay = $xyz;}



// Fianl output is $hplay (HLS URL)


 
 //--------- DONT THINK ABOYT THIS ------//
 
 

 $apii = array("id" => $id, "type" => $type, "title" => $mtitle, "description" => $mdes, "releaseDate" => $relese, "images" => $img, "videoHash" => $vhash, "hls" => $hplay, "dash" => $dplay);

 $api =json_encode($apii, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);


$ex= array("error" => "Something went wrong, Check URL" );
$err =json_encode($ex);

if($id ==""){
echo $err;
}
else{
  header("X-UA-Compatible: IE=edge");
  header("Content-Type: application/json");

echo $api;
}
}
else{
  $ex= array("error" => "Something went wrong, Check URL" );
  $err =json_encode($ex);
 
 // © Avishkar Patil

  echo $err;
}




