<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("../config.inc.php");
$about_detail=$_POST['about_detail'];
$about_detail_eng=$_POST['about_detail_eng'];
$about_title=$_POST['about_title'];


$strSQL="update about set about_title='$about_title',about_detail='$about_detail',about_detail_eng='$about_detail_eng'";
$result=mysql_query($strSQL);
if(!$result){
	echo"error".mysql_error();
}else{
	echo"<script>window.location=\"index.php?page=about\";</script>";
	
	}
?>