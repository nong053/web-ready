<?
if($_SESSION['cus_name']!=""){
	header("location:index.php?page=confrim");
}

?>
<div id="div_play">
กรุณาล็อกอินหรือสมัครสมาชิกก่อน<br>
หากยังไม่ได้เป็นสมาชิก <a href="index.php?page=rule">คลิกที่นี่</a>
</div>