<? ob_start();
$db=new database();
?>
<?php 
//require("class_mysql.php");

$result_intro = $db->selectSQL("intro_style");
$rs_intro=mysql_fetch_array($result_intro);
$intro_num=@mysql_num_rows($rs_intro);
$intro_bg=$rs_intro[intro_bg];
$intro_repeat=$rs_intro[intro_repeat];
$intro_color=$rs_intro[intro_color];
$intro_detail=$rs_intro[intro_detail];
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<!-- สี-->
<script language=JavaScript src="javascript/picker.js"></script>
<!-- สี-->
<div id="box_style">
<div id="box_style_l" style="float:left">
<form method="post" action="style_intro_process.php" name="intro" enctype="multipart/form-data">
<table>
	<tr>
    	<td>
        รูปพื้นหลัง
        </td>
    <tr>
    </tr>
        <td>
        <input type="file"  name="intro_bg"/>
         <a href="preview_intro_style.php?want=previews&TB_iframe=true&height=350&width=500" rel="sexylightbox">
        preview
        </a>
        </td>
    </tr>
   <tr>
    	<td>
        รูปแบบพื้นหลัง
        </td>
     <tr>
    </tr>
        <td>
		<?
		 
		 switch($intro_repeat){
			 case'inherit':$selected_repeat1="selected";break;
			 case'no-repeat':$selected_repeat2="selected";break;
			 case'repeat':$selected_repeat3="selected";break;
			 case'repeat-x':$selected_repeat4="selected";break;
			 case'repeat-y':$selected_repeat5="selected";break;
			 case'':$selected_repeat0="selected";break;
			 
			
		 }
		 
		 ?>
         <select name="intro_repeat">
         
         	<option value="" <?=$selected_repeat0?>>
            ไม่เลื่อก
            </option>
         	<option value="inherit" <?=$selected_repeat1?>>
            inherit
            </option>
            <option value="no-repeat" <?=$selected_repeat2?>>
            no-repeat
            </option>
            <option value="repeat" <?=$selected_repeat3?>>
            repeat
            </option>
            <option value="repeat-x" <?=$selected_repeat4?>>
            repeat-x
            </option>
            <option value="repeat-y" <?=$selected_repeat5?>>
            repeat-y
            </option>
         </select>
        </td>
    </tr>
    <tr>
    	<td>
        สีพื้นหลัง
        </td>
    <tr>
    </tr>
        <td>
        <input type="Text" name="intro_color" value="<?=$intro_color?>">
       <a href="javascript:TCP.popup(document.forms['intro'].elements['intro_color'])"><img width="15" height="13" src="../images_system/App_Store.png" border="0"></a>
        </td>
    </tr>
    <tr>
    	<td>
        จัดการหน้าIntro
        </td>
     <tr>
    </tr>
        <td>
         <!--CKEditor-->
    <textarea cols="80" id="intro_detail" name="intro_detail" rows="10" ><?=$intro_detail?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'intro_detail',{

          
            filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?Type=Images',
            filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?Type=Flash',
            filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

            } );
        //]]>
    </script>
    <!--CKEditor-->
        </td>
    </tr>
   
    <tr>
    	<td>
        
        </td>
     <tr>
    </tr>
        <td>
        <input type="submit"  value="Submit"/>
        </td>
    </tr>
</table>
</form>
</div>
<div id="box_style_r" style="float:left;">
	<div id="detail_style" style="width:auto; padding:5px; border:#CCC 1px solid; background-color:#FFC">
Detail ...
    </div>
</div>
<br style="clear:both" />
</div>