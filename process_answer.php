﻿<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("config.inc.php");

$ans_detail=$_POST['ans_detail'];
$ans_update=date("d-m-y H:i:s");
$ans_name=$_POST['ans_name'];
$topic_id=$_POST['topic_id'];

if(!$ans_name){
echo"<script>alert(\"กรุณากรอกชื่อด้วยครับ\");</script>";
echo"<script>window.location=\"index.php?page=answer&topic_id=$topic_id\";</script>";
exit();
}

//echo"1$ans_detail<br>";
//echo"2$ans_update<br>";
//echo"3$ans_name<br>";
//echo"4$topic_id<br>";
$strSQL="insert into answer(ans_detail,ans_update,ans_name,topic_id)values('$ans_detail','$ans_update','$ans_name','$topic_id')";
$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
}
echo"<script>window.location=\"index.php?page=answer&topic_id=$topic_id\";</script>";
?>