
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
	
	
	$result_preview = $db->selectSQL("box_style");
	$rs_preview=mysql_fetch_array($result_preview);
	$preview_object=$rs_preview[box_header];
	echo"preview_object---->$preview_object";
	$img="../object_system/$preview_object";
	if(!$preview_object){
		echo"ไม่มีไฟล์ข้อมูล";
	}else{
	?>
    
    <img src="<?=$img?>" />
    <a href="preview_box_style.php?del_file=<?=$img?>">ลบไฟล์นี้</a>
    <?
	}
	
	
}
if($_GET['del_file']){
	
	@unlink($_GET['del_file']);
	include("../config.inc.php");
	$strSQL="update box_style set box_header=''";
	mysql_query($strSQL);
	
	
	
}
?>
</div>