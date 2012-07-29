<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/about_us.css" rel="stylesheet" type="text/css">
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
<?php 
include("../config.inc.php");
//include("fckeditor/fckeditor.php");
$strSQL="select * from home";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
$home_detail=$rs[home_detail];
$home_title=$rs[home_title];
$home_detail_eng=$rs[home_detail_eng];

?>
<div class="content_about_us">
	<div id="about_us">
    
    <table>
    <? $strSQL5 = "select * from banner_sum where pic_type='home'";
	$result5=mysql_query($strSQL5);
	$num5=mysql_num_rows($result5);
	while($rs5=mysql_fetch_array($result5)){	
	$pic_name=$rs5[pic_name];
	$pic_id=$rs5[pic_id];
	
	?>
	<img src="../mypicture/<?=$pic_name?>" height="100" />
    <a href="delete_picture.php?page=home&pic_id=<?=$pic_id?>">
    <img src="images/b_drop.png" border="0" />ลบ.
    </a>
    <?
	}
	?>
    
    <tr>
    	<td>
        </td>
        <td>
        </td>
     </tr>
    </table>
   
  

<!--
     <form name="form1" method="post" action="add_picture.php" enctype="multipart/form-data">
   <table>
   		<tr>
        	<td>
            อัปโหลด รูปภาพ
            </td>
        </tr>
        <tr>
        	<td>
            <input type="file" name="filUpload">
            </td>
           <td>
           	<input type="hidden" name="pic_type" value="home" >
            <input name="btnSubmit" type="submit" value="Submit">
            
           </td>
        </tr>
       
   </table>
   </form>  
   
 -->  
   
   
   
  <form action="process_home.php" method="post" enctype="multipart/form-data">        
     <table>     
          <tr>
        	
            <td>
            <div id="about_us_div" style="width:600px;">
           	  <? //$home_title?>
             
              <? //$home_detail?>
            </div>
           
            <br style="clear:both">
            </td>
        </tr>
          
        <tr>
        	<td>รายละเอียดเพิ่มเติม
        	</td>
        </tr>
        <tr>
        	<td>
            <!--CKEditor-->
    <textarea cols="80" id="home_detail" name="home_detail" rows="10" ><?=$home_detail?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'home_detail',{

          
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
        	<td>Detail English
        	</td>
        </tr>
           <tr>
        	<td>
            <!--CKEditor-->
    <textarea cols="80" id="home_detail_eng" name="home_detail_eng" rows="10" ><?=$home_detail_eng?></textarea>
    <script type="text/javascript">
        //<![CDATA[
            CKEDITOR.replace( 'home_detail_eng',{

          
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
        </table>
  
    
    
    
    
   
    <table border="0" cellpadding="0" cellspacing="0" width="600">
    	
      
          
       
        <tr>
        	
            <td>
           
            </td>
            <tr>
            	
                <td>
                <input type="hidden" value="add" name="action" />
                <input type="submit" value="submit">
                </td>
            </tr>
        </tr>
    </table>
    </form>
    </div>
</div>

