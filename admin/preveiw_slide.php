
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
#div_preview{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:13px;
}
</style>
<div id="div_preview">
<?

require("class_mysql.php");
$db=new database();
if($_GET['want']=="preview"){
	
	$slide_position=$_GET['slide_position'];
	//echo"object_position------->$object_position";
	$result_preview = $db->selectSQL("slide_picture where slide_position='$slide_position'");
	$rs_preview=mysql_fetch_array($result_preview);
	$preview_object=$rs_preview[slide_picture_object];
	echo"preview_object---->$preview_object";
	$img="../slide_picture/$preview_object";
	echo"<br>$img";
	if(!$preview_object){
		echo"ไม่มีไฟล์ข้อมูล";
	}else{
	?>
    
    <img src="<?=$img?>" />
    <a href="preveiw_slide.php?del_file=<?=$img?>&slide_position=<?=$slide_position?>">ลบไฟล์นี้</a>
    <?
	}
	
	
}
if($_GET['del_file']){
	
	@unlink($_GET['del_file']);
	include("../config.inc.php");
	$slide_position=$_GET['slide_position'];
	//echo"object_position$object_position";
	$strSQL="update slide_picture set slide_picture_object='' where slide_position='$slide_position'";
	mysql_query($strSQL);
	
	
	
}
?>
</div>