<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include("config.inc.php");
$ans_detail=$_POST['ans_detail'];
$ans_update=$_POST['ans_update'];
$ans_name=$_POST['ans_name'];

$topic_id_=$_POST['topic_id'];
$strSQL="insert into answer(ans_detail,ans_update,ans_name,topic_id)values('$ans_detail','$ans_update','$ans_name','$topic_id')";
$result=mysql_query($strSQL);
if(!$result){echo"error".mysql_error();}else{
	header("Location:index.php?page=answer");
?>