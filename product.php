<style>
#pic_small a{
	color:#333;
	text-decoration:none;
}
#pic_txt a{
	color:#333;
	text-decoration:none;
}

</style>
 
	 <!--สินค้าที่น่าสนใจ-->
	 <!--ผีเสื้อบินไปบินมา
		<embed style="left: 0px; width: 1000px; position: absolute; top: 0px; height: 900px;" src="http://imgfree.21cn.com/free/flash/9.swf" type="application/octet-stream" wmode="transparent" quality="high" align="3" height="1000" width="1"></embed> -->
  <div id="dev_table">
	 <?php 
	 include("config.inc.php");
	 $productcat_id=$_GET['productcat_id'];
	 if($productcat_id){
	 $strSQL="select * from product where productcat_id='$productcat_id' order by product_name";
	 }else{
	 $strSQL="select * from product order by product_name";
	 }
	 $result=mysql_query($strSQL);
	 while($rs=mysql_fetch_array($result)){
	 $product_name=$rs[product_name];
	 $product_title=$rs[product_title];
	 
	 $product_id=$rs[product_id];
	 $product_price=$rs[product_price];
	 $productcat_id=$rs[productcat_id];
	 $rows=mysql_num_rows($result);

	$thumbnailsPath="product/".$productcat_id."/".$product_id."/thumbnail/";
	$big_picture="product/".$productcat_id."/".$product_id."/";
		if(!is_dir($thumbnailsPath)){
		
		}else{ //else
		if($handle= opendir($thumbnailsPath)){
		$imagesFiles = array();
		while(false!=($file=readdir($handle))){
				if($file!="." && $file!=".."){
					$thumbnailsFile = $thumbnailsPath."/".$file;
					$picture_big =  $big_picture."/".$file;
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
		
				
     <div id="pic_all " style="float:left; background-color:#FFF; margin-left:5px; margin-top:5px; width:100; height:300px; border:#ccc solid 1px;">
     
        
        <img src="<?=$thumbnailsFile?>" border="0"  height="188" /><br>
        <div id="pic_txt" style="padding:5px;">
        <a href="index.php?page=product_detail&product_id=<?=$product_id?>&productcat_id=<?=$productcat_id?>">
       
       <div id="txt" style="padding:1px;"> <img src="admin/images/knowledgebase.gif" border="0" />คลิ๊กดูรายละเอียด</div>
        </a>
        </div>
        <hr />
        <div id="pic_small">
        	<a href="index.php?page=product_detail&product_id=<?=$product_id?>&productcat_id=<?=$productcat_id?>" >
       
        	
			<b><?=$product_name?></b> <br>
            <div id="title_product" style="width:180px; padding:3px;">
        	<?
            if(strlen($product_title)>51){
			$product_title =mb_substr($product_title,0,50,"UTF-8")."...";
			echo"$product_title";
			}else{
			echo $product_title;
			}
			
			?>
            </div>
        	</a>
       
        </div>
        
       
     </div>    

<?php }?>	
<br style="clear:both" />
<br style="clear:both" />
</div>
  