<style>
#devtext_title{	
	padding:5px;
	font-weight:bold;
	font-size:13px;
	border-top:#dedede solid 1px;
	border-bottom:#dedede solid 1px;
	background:#efefef;
}
#devtext a{
	color:#000;
	text-decoration:none;

	 
}
</style>
<? 
$id_cat_youtupe=$_GET['id_cat_youtupe'];
//echo"id$id_cat_youtupe<br>";
include("../config.inc.php");

?>
<table border="0"  width="100%"  cellpadding="0" cellspacing="0">
<tr bgcolor="#CCCCCC">
	<td  align="center">
    <div id="devtext_title">
   ลำดับที่ 
   </div>
    </td>
    <td>
    <div id="devtext_title">
   ชื่อวีดีโอ
   </div>
    </td>
    
     <td>
     <div id="devtext_title">
    รูปภาพ
    </div>
    </td>
    <td>
    <div id="devtext_title">
    จัดการ
    </div>
    </td>
</tr>
<? 
$strSQL="select * from youtupe where id_cat_youtupe='$id_cat_youtupe'";
$result=mysql_query("$strSQL");
$i=1;
while($rs=mysql_fetch_array($result)){
$embed=$rs[embed_youtupe ];
$title_youtupe=$rs[title_youtupe];
$id_youtupe=$rs[id_youtupe];

	$thumbnailsPath="../youtupe/".$id_cat_youtupe."/".$rs[id_youtupe]."/thumbnail";
		if(!is_dir($thumbnailsPath)){
		
		}else{ //else
		if($handle= opendir($thumbnailsPath)){
		$imagesFiles = array();
		while(false!=($file=readdir($handle))){
				if($file!="." && $file!=".."){
					$thumbnailsFile = $thumbnailsPath."/".$file;
					$fileType = pathinfo($thumbnaisFile);//แสดงpath
					$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
					$allowedtypes=array("png","jpeg","jpd","gif");
				
					if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
					{
					$imagesFiles[]=$thumbnailsFile;
					}
			
				}
			}
			closedir($handle);
		}
		sort($imagesFiles);
		if(count($imagesFiles)>0){
		$thumbnailsFile = $imagesFiles[0];
		}
		
	}//else
	//ปิดจัดการรูปภาพ

?>

<tr>
	<td align="center">
    <?=$i?>
    </td>
	<td>
    <?=$title_youtupe?>
    </td>
  
    <td>
    <img src="<?=$thumbnailsFile?>" width="100" height="100" />
    </td>
    <td>
    <a href="del_youtube.php?id_youtupe=<?=$id_youtupe?>&action=del&id_cat_youtupe=<?=$id_cat_youtupe?>">
    ลบ
    </a>
    ,
    <a href="index.php?page=vdo_system&select_page=youtube&id_cat_youtupe=<?=$id_cat_youtupe?>&id_youtupe=<?=$id_youtupe?>&action=edit">
    แก้ไข
    </a>
    </td>
</tr>

<?
$i++;
}
?>

</table>

<?
if($action=="edit"){
	$id_youtupe=$_GET['id_youtupe'];
	//echo"action$action";
	//echo"id_youtupe";
	require("class_mysql.php");
	$db = new database();
	$result = $db->selectSQL("youtupe where id_youtupe='$id_youtupe'");
	$rs=mysql_fetch_array($result);
	$vdo=$rs[embed_youtupe];
	$title_vdo=$rs[title_youtupe];
	
	$submit="แก้ไขข้อมูล";
	$action="edit";
}else{
	$submit="เพิ่มข้อมูล";
	$vdo="";
	$title_vdo="";
	$action="add";
}
?>

<form method="post" action="action_youtube.php" enctype="multipart/form-data">
<table width="100%">
	<tr>
    	<td>เพิ่มวีดีโอ(You tube embed)
        </td>
        <td><input type="text" name="vdo" value="<?=$vdo?>" /></td>
    </tr>
    <tr>
    	<td>หัวข้อวีดีโอ
        </td>
        <td><input type="text" name="title_vdo" value="<?=$title_vdo?>" />
        </td>
    </tr>
    
    <tr>
    	<td>รูปภาพ
        </td>
        <td><input type="file" name="product_file[]" />
        
        </td>
    </tr>
    
    <tr>
    	<td>
        </td>
        <td>
        
        <input type="hidden" name="id_cat_youtupe" value="<?=$id_cat_youtupe?>" />
        <input type="hidden" name="action" value="<?=$action?>" />
        <input type="hidden" name="id_youtupe" value="<?=$id_youtupe?>" />
        <input type="submit" name="submit" value="<?=$submit?>" />
        
        </td>
    </tr>
</table>
</form>
