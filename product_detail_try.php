<meta http-equiv="Content-Type" content1="text/html; charset=utf-8" />
 
<style>

#bg_content11{
	width:780px;
	height:auto;
	/*background-color:#0F0;*/
	float:left;
	padding:0px;
	margin:0px;
	float:right;
}
/* #bg_content11 #header_content11{
	width:750px;
	/*background-color:#666;*/
/*	height:70px;
	color:#FFF;
	background-image:url(images/sub_nfuze.jpg);
}
*/
 #bg_content11 #header_product1{
	width:auto;
	border-bottom:#5E88A3 0.2em solid;
	height:50px;
	color:#5E88A3;
	font-weight:bold;
	font-size:13px;
	padding-top:0PX;
	background-image:url(images/sub_nfuze.jpg);
}

 #bg_content11 #header_product1 #title_product1{
	float:left;
}
 #bg_content11 #header_product1 #print_product1{
	float:right;
	font-size:12px;
	font-weight:normal;
	padding-right:5px;
}

 #bg_content11 #header_content11 #link_content11{
	/*padding-bottom:70px;*/
	float:left;
}
 #bg_content11 #content1{
	padding:0px;
	/*background-color:#0FF;*/
}
 #bg_content11 #content1 #bg_product1{
	float:left;
	width:470px;
	height:auto;
	border:#CCC 0.01em solid;
	margin-top:5px;
	padding:0px;
}
 #bg_content11 #content1 #bg_product1 #product_pic1{
	padding:5px;
	margin:5px;
	height:380px;
}
 #bg_content11 #content1 #bg_product1 #product_add_cart1{
	/*border-bottom:#CCC 0.01em solid;*/
	padding:5px;
	margin:5px;
}
 #bg_content11 #content1 #bg_product1 #product_detail_prise1{
	border-bottom:#CCC 0.01em solid;
	padding:5px;
	margin:5px;
}
 #bg_content11 #content1 #bg_product1 #product_detail_other{
	border-bottom:#CCC 0.01em solid;
	padding:5px;
	margin:5px;
}
 #bg_content11 #content1 #bg_product1 #product_detail_other #detial_other{
	width:110px;
	float:left;
	height:10px;
}

 #bg_content11 #content1 #bg_product1_detail{
	float:left;
	width:300px;
	height:auto;
	border:#5E88A3 0.1em solid;
	float:right;
	margin-top:5px;
	margin-right:2px;
}
 #bg_content11 #content1 #bg_product1_detail #txt_product_detail{
	font-weight:bold;
	color:#5E88A3;
	
	
}
</style>
	<?php 
include("config.inc.php");
$product_id=$_GET['product_id'];
$strSQL="select * from product where product_id=$product_id";
$result=mysql_query("$strSQL");
$rs=mysql_fetch_array($result);
$productcat_id=$rs[productcat_id];
$product_name=$rs[product_name];
$product_detail=$rs[product_detail];
$product_price=$rs[product_price];
$product_amount=$rs[product_amount];
	
$product_promotion_price=$rs[product_promotion_price];
$product_promotion_detail=$rs[product_promotion_detail]; 	


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
		
	}
?>
<div id="bg_content11">
    
                                    <div id="header_product1">
                                    	
                                        <div id="title_product1">
                                        <?=$product_name?>
										
                                        </div>
                                        <div id="print_product1">
                                        
                                        Print page
                                        </div>
                                    </div>
                            		<div id="content1">
                                		<div id="bg_product1">
                                        
                                        	<div id="product_pic1">
                                            <!--<img src="<?$picture_big?>" width="450" />-->
                                            <?
											require("gallery_product.php");
											?>
                                            </div>
                                            
                                            <br style="clear:both" />
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                       
                                        
                                        <div id="bg_product1_detail">
                                        	
                                          <div id="txt_product_detail" style="background-color:#CCC; padding:5px;">
                                            	รายละเอียด
                                            </div>
                                        	
                                       <table width="100%" style="margin:5px;">
                                            	<tr>
                                                	<td width="35%">
                                                   ชื่อสินค้า:
                                                    </td>
                                                    <td width="65%" align="right">
                                                    
                                                    <div id="text01" style=" font-weight:bold;  padding-right:20px; ">
                                                    	<b><?=$product_name?></b>
                                                    	</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>ราคา</td>
                                                    <td align="right">
                                                    <!--<a href="index.php?page=basket&pid=<?//$product_id?>&action=add">-->
                                                    <div id="price" style="background-image:url(images/botton_chat_03.jpg); background-repeat:no-repeat;">
                                                    	<div id="text01" style=" font-weight:bold; padding-right:20px; ">
                                                    	<?=$product_price?>
                                                    	</div>
                                                    </div>
                                                    <!--</a>-->
                                                    </td>
                                                </tr>
                                                 <tr>
                                                	<td>จำนวนสินค้า</td>
                                                    <td align="right">
                                                    <div id="price" style="background-image:url(images/botton_chat_03.jpg); background-repeat:no-repeat; ">
                                                    		<div id="text01" style="color:#FFF; font-weight:bold; padding-right:20px; ">
                                                    	<?=$product_amount?>
                                                    		</div>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                	<td>
                                                   
                                                    </td>
                                                    <td align="right">
                                                  <!--  Wholesale vs Retail<img src="images/redQuestion.png"  border="0"/>-->
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                            <div id="txt_product_detail" style="background-color:#CCC; padding:5px;">
                                            	สอบถามเพิ่มเติม
                                            </div>
                                            
                                      <form>
                                      	<table style="margin:5px;">
                                        	<tr>
                                            	<td>
                                                ชื่อ
                                                </td>
                                                <td>
                                                <input type="text"  />
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>
                                                E-mail
                                                </td>
                                                <td>
                                                <input type="text"  />
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>
                                               เบอร์โทร
                                                </td>
                                                <td>
                                                <input type="text"  />
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>
                                              รายละเอียด
                                                </td>
                                                <td>
                                                <textarea></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                            	<td>
                                             
                                                </td>
                                                <td>
                                                <input type="button" value="ส่งข้อมูล" />
                                                </td>
                                            </tr>
                                        </table>
                                        </form>
                                      
                                        
                                        <!-- table-->
                                        <div id="txt_product_detail" style="background-color:#CCC; padding:5px;">
                                            สั่งชื้อสินค้า
                                            </div>
                                        	<div id="product_add_cart1" style="padding:5px;">
                                           	 	 <a href="index.php?page=cart&ProductID=<?=$product_id?>&Pic=<?=$thumbnailsFile?>">add Cart</a>
                                                 
                                                <!--<a href="basket2.php?pid=<?//$product_id?>&action=add">add Cart</a>-->
                                                
                                            </div>
                                        </div>
                                         
                                         
                                      
                                        <br style="clear:both" />
                                        </div>
                                    <br style="clear:both" />
                                    
                                    <?=$product_detail?>
                                    
                                	</div>
                                    <br style="clear:both" />
                            	