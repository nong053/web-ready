<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
.topic{
	width:auto;
	height:auto;
}
.topic #bg_topic{
	width:auto;
	height:auto;
	
}
.topic #bg_topic #title_topic{
	width:auto;
	height:auto;
	padding:5px;
	background-image:url(images/bg_title.png);
	color:#FFF;
	font-weight:bold;
	margin:3px;
	font-size:13px;
}
.topic #bg_topic #name_set{
	padding:5px;
}
.topic #bg_topic #name_topic{
	width:auto;
	padding:5px;
}
.topic #bg_topic #detail_topic{
	width:auto;
	height:auto;
	padding:5px;
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

<div id="title">
ถามตอบ->ตั้งคำถาม
</div>
<form action="insert_topic.php" method="post">
<div class="topic">
	<div id="bg_topic">
    	<div id="title_topic">
        ตั้งคำถาม
        </div>
        <div id="name_set">
    	ชื่อ<br><input type="text" name="topic_name">
        </div>
        <div id="name_topic">
        หัวข้อ<br><textarea name="topic_subject" cols="40" rows="2"></textarea>
        </div>
        <div id="detail_topic">รายละเอียด<br>
          <!--CKEditor-->
	  <textarea  id="topic_detail" name="topic_detail" ><?=$topic_detail?></textarea>
	  <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'topic_detail',{

          
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
        </div>
        <input type="submit" value="ตั้งคำถาม" " />
    </div>
</div>
</form>
