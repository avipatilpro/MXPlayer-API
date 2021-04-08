<?php
error_reporting(0);
$vid =$_GET['c'];

if (!$vid){
   exit("<h3>ERROR NOT FOUND<br><br>You Entered Worng MX Player ID or Not Entered ID Here</h3><br><h4> Use Correct Format ➸ <code>https://mx.avipatilpro.repl.co/?c=MXPLAYER_ID_HERE</code><br><br><a href='https://www.mxplayer.in/'>Go To MXPlayer Site</a> <br><br><br> <h4> ➤ Created by <a href='https://github.com/avipatilpro'>Avi Patil</a></h4> ");
  
}

$api =file_get_contents("https://api.mxplay.com/v1/web/detail/video?type=movie&id=$vid&platform=com.mxplay.desktop&device-density=2&userid=30bb09af-733a-413b-b8b7-b10348ec2b3d&platform=com.mxplay.mobile&content-languages=hi,en,ta");
$apis =json_decode($api);
$title =$apis->title;
$des =$apis->description;
$url =$apis->stream->hls->high;
$burl =$apis->stream->hls->base;
$turl =$apis->stream->thirdParty->hlsUrl;
$purl =$apis->gifVideoUrlInfo[0]->url;
$img1 =$apis->imageInfo[2]->url;
$img2 =$apis->imageInfo[0]->url;
$act1 =$apis->contributors[0]->name;
$act2 =$apis->contributors[1]->name;
$act3 =$apis->contributors[2]->name;
$act4 =$apis->contributors[3]->name;


if($url ==""){
$status ="invalid error";
}
else{
$status="ok";
}

header("Content-Type: application/json");

echo  "Title : ${title}\n\n";
echo "Description : ${des}\n\n\n\n";

echo "Video_URL_1 : ${burl}${turl}\n\n";
echo "Video_URL_2 : https://llvod.mxplay.com/" + mediaUrl";

echo "IMG_1 : https://isa-1.mxplay.com/${img1}\n\n";
echo "IMG_2 : https://isa-1.mxplay.com/${img2}\n\n\n";

echo "Actors : ${act1} , ${act2} , ${act3} , ${act4}\n\n\n\n\n";

echo "--> Created By Avishkar Patil ";
