<? ob_start();
$db=new database();
?>
<?php 
//require("class_mysql.php");

$result_plugin= $db->selectSQL("plugin_on_web");
$rs_plugin=mysql_fetch_array($result_plugin);
$plugint_num=mysql_num_rows($result_plugin);

$plugin_code=$rs_plugin[plugin_code];
$plugin_name=$rs_plugin[plugin_name];
$plugin_position=$rs_plugin[plugin_position];
$plugin_status=$rs_plugin[plugin_status];
$plugin_important=$rs_plugin[plugin_important];

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--สี-->
<script language=JavaScript src="javascript/picker.js"></script>
<!--สี-->
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

<div id="conent_style">
<div id="box_style_l" style="float:left">

<table>
	<tr>
    	<td>
        <b>ลำดับ</b>
        </td>
        <td>
        <b>ส่วนเสริม</b>
        </td>
        <td>
        <b>ตัวอย่าง</b>
        </td>
         <td>
        <b>ตำแหน่ง</b>
        </td>
        <td>
        <b>สถานะ</b>
        </td>
        <td>
        <b>จัดการ</b>
        </td>
    </tr>
<?php 
//require("class_mysql.php");

$result_plugin= $db->selectSQL("plugin_on_web");
$i=1;
while($rs_plugin=mysql_fetch_array($result_plugin)){
$plugint_num=mysql_num_rows($result_plugin);
$plugin_id=$rs_plugin[plugin_id];
$plugin_code=$rs_plugin[plugin_code];
$plugin_name=$rs_plugin[plugin_name];
$plugin_position=$rs_plugin[plugin_position];
$plugin_status=$rs_plugin[plugin_status];
$plugin_important=$rs_plugin[plugin_important];
$action="add";

?>
    <tr>
    	<td>
        <?=$i?>
        </td>
        <td>
        <?=$plugin_name?>
        </td>
        <td>
        picture
        </td>
        <td>
        <?=$plugin_position?>
        </td>
         <td>
        <?=$plugin_status?>
        </td>
        <td>
        <?=$plugin_important?>
        </td>
        <td>
        <?=$plugin_important?>
        </td>
        <td>
        <a href="plugin_process.php?del=del&plugin_id=<?=$plugin_id?>">
        ลบ
        </a>
        <a href="index.php?page=style_system&select_page=picture_style&page_style=plugin&plugin_id=<?=$plugin_id?>&action=edit">
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
if($_GET['action']=="edit"){
	$plugin_id=$_GET['plugin_id'];
$result_plugin= $db->selectSQL("plugin_on_web where plugin_id='$plugin_id'");
$rs_plugin=mysql_fetch_array($result_plugin);
$plugint_num=mysql_num_rows($result_plugin);
$plugin_id=$rs_plugin[plugin_id];
$plugin_code_edit=$rs_plugin[plugin_code];
$plugin_name_edit=$rs_plugin[plugin_name];
$plugin_position_edit=$rs_plugin[plugin_position];
$plugin_status_edit=$rs_plugin[plugin_status];
$plugin_important_edit=$rs_plugin[plugin_important];
$action="edit";
/*echo"edit";
echo"plugin_name_edit$plugin_name_edit";*/
}
?>
<form method="post" action="plugin_process.php">
<table>
	<tr>
    	<td>
        ชื่อ Plugin
        </td>
        <td>
        <input type="text" name="plugin_name" value="<?=$plugin_name_edit?>">
        </td>
    </tr>
    <tr>
    	<td>
        Code Plugin
        </td>
        <td>
       	<textarea name="plugin_code"><?=$plugin_code_edit?></textarea>
        </td>
    </tr>
    <tr>
    	<td>
       
       สถานะ Plugin
        </td>
        <td>
        <?
		 
		 switch($plugin_status_edit){
			 case'ok':$selected_repeat1="selected";break;
			 case'not':$selected_repeat2="selected";break;
		 }
		 
		 ?>
       	<select name="plugin_status">
        	<option value="ok" <?=$selected_repeat1?>>เปิดใช้งาน</option>
            <option value="not" <?=$selected_repeat2?>>ปิดใช้งาน</option>
        </select>
        </td>
    </tr>
    <tr>
    	<td>
        ตำแหน่ง Plugin
        </td>
        <td>
        <?
		 
		 switch($plugin_position_edit){
			 case'left':$selected_repeat1="selected";break;
			 case'right':$selected_repeat2="selected";break;
		 }
		 
		 ?>
       	<select name="plugin_position">
        	<option value="left" <?=$selected_repeat1?>>ด้านซ้าย</option>
            <option value="right" <?=$selected_repeat2?>>ด้านขวา</option>
        </select>
        </td>
    </tr>
    <tr>
    	<td>
        </td>
        <td>
        <input type="hidden" name="action" value="<?=$action?>" />
        <input type="hidden" name="plugin_id" value="<?=$plugin_id?>" />
        <input type="submit">
        </td>
    </tr>
</table>

</form>
</div>
<div id="box_style_r" style="float:left;">
	<div id="detail_style" style="width:450px; padding:5px; border:#CCC 1px solid; background-color:#FFC">
Detail ...
    </div>
</div>
<br style="clear:both" />
</div>
