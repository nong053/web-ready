
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
require("class_mysql.php");
$db=new database();
if($_GET['want']=="preview"){
	
	$object_position=$_GET['object_position'];
	//echo"object_position$object_position";
	$result_preview = $db->selectSQL("object_system where object_position='$object_position'");
	$rs_preview=mysql_fetch_array($result_preview);
	$preview_object=$rs_preview[object_name];
	echo"preview_object$preview_object";
	$img="../object_system/$preview_object";
	?>
    <img src="<?=$img?>" />
    <a href="#">ลบไฟลล์นี้</a>
    <?
	
	
}
?>