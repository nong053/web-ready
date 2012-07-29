<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/about_us.css" rel="stylesheet" type="text/css">
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<?php 
include("../config.inc.php");
//include("fckeditor/fckeditor.php");
$strSQL="select * from about";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
$about_detail=$rs[about_detail];
$about_title=$rs[about_title];
$about_detail_eng=$rs[about_detail_eng];
?>
<div class="content_about_us">
	<div id="about_us">

<!--
     <form name="form1" method="post" action="add_picture.php" enctype="multipart/form-data">
   <table>
   		<tr>
        	<td>
            upload รูปภาพ
            </td>
        </tr>
        <tr>
        	<td>
            <input type="file" name="filUpload">
            </td>
           <td>
           	<input type="hidden" name="pic_type" value="about" >
            <input name="btnSubmit" type="submit" value="Submit">
            
           </td>
        </tr>
       
   </table>
   </form>  
 -->  
   
    
    
    
    
    
    
    <form action="process_about.php" method="post"> 
    <table border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	
            <td>
            <div id="about_us_div" style="width:600px;">
           	  <? //$about_title?>
             
              <? //$about_detail?>
            </div>
           
            <br style="clear:both">
            </td>
        </tr>
        <tr><td>รายละเอียดเพิ่มเติม
            </td>
        </tr>
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="80" id="about_detail" name="about_detail" rows="10" ><?=$about_detail?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'about_detail',{

          
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
       
       <tr><td>Detail
            </td>
        </tr>
        <tr>
        	
            <td>




<!--CKEditor-->
    <textarea cols="80" id="about_detail_eng" name="about_detail_eng" rows="10" ><?=$about_detail_eng?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'about_detail_eng',{

          
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
                <input type="submit" value="ตกลง">
                </td>
            
        </tr>
    </table>
    </form>
    </div>
</div>

