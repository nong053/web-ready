<meta http-equiv="content-type" content="text/html; charcet=utf-8" />
<?php 
include("../config.inc.php");
$productcat_id=$_POST['productcat_id'];
$productcat_name=$_POST['productcat_name'];
$productcat_detail=$_POST['productcat_detail'];
$productcat_name_eng=trim($_POST['productcat_name_eng']);
$productcat_detail_eng=trim($_POST['productcat_detail_eng']);

$strSQL="update productcat set productcat_name='$productcat_name',productcat_detail='$productcat_detail',productcat_name_eng='$productcat_name_eng',productcat_detail_eng='$productcat_detail_eng' where productcat_id=$productcat_id";
$result=mysql_query($strSQL);
if(!$result){
echo"nonon".mysql_error();
}else{
	echo"<script>alert(\"Edit Success\");</script>";
	
	echo"<script>window.location=\"index.php?page=ecommerce_system&select_ecommerce=productcat\"</script>";
	exit();	
	echo"<script>window.location=\"index.php?page=ecommerce_system&select_ecommerce=productcat\"</script>";
	
//header("Location:index.php?page=productcat");
/*echo"<script>window.location=\"index.php?page=productcat\";</script>";*/
}
?>