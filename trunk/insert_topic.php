<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

$topic_subject=$_POST['topic_subject'];
$topic_detail=$_POST['topic_detail'];

$topic_name=$_POST['topic_name'];

$topic_update=date("y-m-d H:i:s");


if(!$topic_name){
echo"<script>alert(\"กรุณากรอกชื่อด้วยครับ\");</script>";
echo"<script>window.location=\"index.php?page=new_topic\";</script>";
exit();
}

include("config.inc.php");
$strSQL="insert into topic(topic_subject,topic_detail,topic_update,topic_name)values('$topic_subject','$topic_detail','$topic_update','$topic_name')";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}else{
	/*header("Location:index.php?page=webboard");*/
	echo"<script>window.location=\"index.php?page=webboard\";</script>";
}
?>