<?php

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

$hls =$mxdata['stream']['hls']['high'];
$dash =$mxdata['stream']['dash']['high'];
$hlst =$mxdata['stream']['thirdParty']['hlsUrl'];
$dasht =$mxdata['stream']['thirdParty']['dashUrl'];
$hurl = "https://llvod.mxplay.com/".$hls;
$durl = "https://llvod.mxplay.com/".$dash;


 $apii = array("id" => $id, "type" => $type, "title" => $mtitle, "description" => $mdes, "releaseDate" => $relese, "images" => $img, "hls" => $hurl, "dash" => $durl, "hlsUrl" => $hlst, "dashUrl" => $dasht);

 $api =json_encode($apii, JSON_UNESCAPED_SLASHES);


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

  echo $err;
}




