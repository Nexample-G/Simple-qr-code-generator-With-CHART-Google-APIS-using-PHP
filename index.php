<?php
/* 
 *  Simple qr code generator With CHART Google APIS using PHP
 *  PHP Tutorial - https://www.youtube.com/c/nexample
 *  YouTube Video - https://youtu.be/duG1hhyqHmU
 *  GitHub - https://github.com/Nexample-G/Simple-qr-code-generator-With-CHART-Google-APIS-using-PHP
 *  Dev: Nexample info.nexample@gmail.com
 *  Date: 10/8/2021 
 */
	session_start();
	$_TITLE = 'NEXAMPLE : Simple Qr G';
	$DR='QR_Images/';
if(isset($_GET['css'])){
	header("Content-type: text/css");
?>
html,body {
	margin:0px;
	margin:0px auto;
	width: 100%;
	height: 100%; 
	background:rgba(255,255,255);
}body {	width: 450px;
	color: rgba(0,0,0, 0.5);
	font:normal 12px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}ul {	margin:50px 0px;
	width: 400px;
	height: auto; 
	float:left;
	padding:25px;
	list-style:none;
	background:rgba(255,255,255, 0.99);
	box-shadow:5px 5px 20px 0px rgba(21,160,246, 0.2);
}ul::before {
	content:"CREATE ONE QR WITH NEXAMPLE";
	color: rgba(21,160,246, 0.7);
	font:bold 16px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}li {	margin:5px 0px;
	width: 380px;
	height: auto; 
	float:left;
	padding:8px;
	background:rgba(255,255,255, 0.99);
	border:solid 1px rgba(21,160,246, 0.3);
}input, select{
	margin:-8px;
	width: calc(100% - 100px);
	height: 20px; 
	float:left;
	padding:8px;
	outline:0;
	background:rgba(0,0,0, 0.0);
	border:solid 0px rgba(0,0,0, 0.1);
}select, [type=submit]{
	width:99px;
	height: 36px; 
	float:right;
	border-left:solid 1px rgba(21,160,246, 0.3);
}.text{	width: calc(100% - 100px);
}.name{	width: calc(100% - 200px);
}[type=submit]{
	width: 94px;
	margin:-8px 0px;
	color: rgba(255,255,255, 0.9);
	background:rgba(21,160,246, 0.9);
	font:bold 13px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}.submit{width: 99px;
	margin-right:-8px;
	margin-left:1px;
}<?php
if(isset($_SESSION['QR'])){
	if($_SESSION['QR'][1]){
	if (file_exists($DR.'.tmp')){
echo '.img{
	height: '.$_SESSION['QR'][0].'px; 
	background:rgba(255,255,255, 0.9) url("'.$DR.'.tmp")no-repeat center center;
	background-size: '.$_SESSION['QR'][0].'px; 
}';
}else{
echo '.img{
	height: auto; 
	text-align:center;
	background:rgba(255,255,255, 0.9);
}.img::before{
	content:"QR File Not Found !";
	color: rgba(255,0,0, 0.3);
	font:bold 16px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}
.text{border-bottom:solid 1px rgba(255,0,0, 0.3);
}';}
}else{
echo '.img{
	height: auto; 
	text-align:center;
	background:rgba(255,255,255, 0.9);
}.img::before{
	content:"Enter Some Text Or URL !";
	color: rgba(255,0,0, 0.3);
	font:bold 16px/20px "Liberation sans", Arial, Helvetica, sans-serif;
}';}}}else{
if(isset($_POST['QR'])){
	if ($_POST['QR'][3]){
	$QR=0;
if(!empty($_POST['QR'][0])){
	$QR='https://chart.googleapis.com/';
	$QR.='chart?chs='.$_POST['QR'][1].'x'.$_POST['QR'][1];
	$QR.='&cht=qr&chl='.$_POST['QR'][0].'&choe=UTF-8';
	$DRI=$DR.'.tmp';$DRT=$QR;
	$_SESSION['QR']=array($_POST['QR'][1],$_POST['QR'][0]);
}}if ($_POST['QR'][4]){
	if(isset($_SESSION['QR'])){
if (file_exists($DR.'.tmp')){
	$iname = preg_replace("/[^0-9 A-Za-z]/",'',$_POST['QR'][2]);
	if(empty($iname)){
	$iname='unknown'.date('h-i-A-d-m-Y');
}	$DRT=$DR.'.tmp';
	$DRI=$DR.$iname.'.png';
	}}}
	file_put_contents($DRI, 
	file_get_contents($DRT));
	header('location: http://'.$_SERVER['HTTP_HOST']);
}else{	$url=$qsz='';
?><!DOCTYPE html><html lang="en-US">
<head>
	<title><?=$_TITLE;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Keywords" content="">
	<meta name="Description" content="">
	<link rel="icon" href="<?=$DR;?>/favicon.png" type="image/x-icon">
	<style>@import url("/?css");</style>
</head><body>
<?php	echo '<ul><li class="img">';
if(isset($_SESSION['QR'])){
	$url=$_SESSION['QR'][1];
if($_SESSION['QR'][0]){
	$qsz=$_SESSION['QR'][0];
}}	echo '</li>';
?> <form method="post" autocomplete="off">
	<li><input type="text" class="text" name="QR[]" placeholder="Enter Your QR Text or URL Here" value="<?=$url;?>">
	<select name="QR[]">
		<option value="<?=($qsz ? $qsz : 200)?>"><?=($qsz ? $qsz : 200)?> PX</option>
		<option value="<?=($qsz == 300 ? 200 : ($qsz == 400 ? 200 : 300))?>"><?=($qsz == 300 ? 200 : ($qsz == 400 ? 200 : 300))?> PX</option>
		<option value="<?=($qsz == 400 ? 300 : ($qsz == 300 ? 400 :  400))?>"><?=($qsz == 400 ? 300 : ($qsz == 300 ? 400 :  400))?> PX</option>
	</select></li>
	<li><input type="text" class="name" name="QR[]" placeholder="Enter QR Image Name">
	<input type="submit" class="submit" name="QR[]" value="Create QR">
	<input type="hidden" name="QR[]">
	<input type="submit" name="QR[]"  value="Save"></li>
</form>
</ul>
</body></html>
<?php }}?> 

