﻿<style>
.answer{
	width:auto;
	height:auto;
	margin:0px;
	padding:0px;
}
.answer #bg_title_answer{
	width:auto;
	height:auto;
	
}
.answer #bg_title_answer #title_answes{
	/*width:auto;
	height:auto;
	padding:5px;
	border:#CCC 2px solid;
	background-color:#900;
	color:#FFF;
	font-weight:bold;
	
	font-size:14px;*/
	border-bottom:#5E88A3 0.2em solid;
	height:40px;
	color:#5E88A3;
	font-weight:bold;
	font-size:13px;
	padding-top:0PX;
	background-image:url(images/sub_maxgxl.jpg);
}
.answer #bg_title_answer #answer{
	padding:5px;
	border:#CCC 1px dotted;
}
#title{
		/*background-image:url(images/main_menu.gif);*/
		/*padding:5px;
		font-size:13px;
		font-weight:bold;
		color:#FFF;
		background-color:#CCC;
		width:750px;*/
		
	border-bottom:#5E88A3 0.2em solid;
	height:50px;
	color:#5E88A3;
	font-weight:bold;
	font-size:13px;
	padding-top:0PX;
	background-image:url(images/sub_atp3.jpg);
	}
	
</style>
<!-- CKE-->
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<!-- CKE-->
   <?php 
include("config.inc.php");
$topic_id=$_GET['topic_id'];
$strSQL = "select * from topic where topic_id=$topic_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
/*echo $rs[topic_detail];*/
?>
<div class="answer">
	<div id="bg_title_answer">
		<div id="title_answes">
      ตั้งกระทู้โดย:<?=$rs[topic_name]?>&nbsp;&nbsp;<?=$rs[topic_update]?>
    	</div>
        <div id="answer">
        <?=$rs[topic_subject]?><br>
        <?=$rs[topic_detail]?>
        </div>
    </div> 
    <br style="clear:both" />
    
<?php

$strSQL2="select * from answer where topic_id=$topic_id";
$result2=mysql_query($strSQL2);
if(!$result2){
	echo"data emty";
	}
while($rs2=mysql_fetch_array($result2)){	
?>
    
    <div id="bg_title_answer">
		<div id="title_answes">
         ตอบโดย:<?=$rs2[ans_name]?>&nbsp;&nbsp;<?=$rs2[ans_update]?>
    	</div>
        <div id="answer">
         <?=$rs2[ans_detail]?>
        </div>
    </div> 
    
<?
}
?>

<form action="process_answer.php" method="post">
 	<div id="bg_title_answer">
    
		<div id="title_answes">
        ตอบกระทู้
    	</div>
        <table >
      <!-- <tr>
       		<td width="31">
            รหัส
        	</td>
        	<td width="203">
            <input type="text" name="ans_name" style="margin:2px;">
        	</td>
       </tr>-->
       <tr>
       		<td>
            ชื่อ
        	</td>
        	<td>
            <input type="text" name="ans_name" style="margin:2px;">
        	</td>
       </tr>
       <tr>
       		<td>
            
        	</td>
        	<td>
            
        	</td>
       </tr>
       </table>
        <div id="answer">
         <!--CKEditor-->
	  <textarea  id="ans_detail" name="ans_detail"  style="margin:5px;"><?=$ans_detail?></textarea>
	  <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'ans_detail',{

          
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
      <br style="clear:both" />
       <input type="hidden" name="topic_id" value="<?=$topic_id?>" />
      <table> 
      
        <tr>
       		<td>
            
        	</td>
        	<td>
            <input type="submit" value="ตอบกระทู้" />
        	</td>
       </tr>
       </table>
      
        </div>
    </div> 
	</form>
 </div>
   