<style>


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
$product_promotion_price=$rs[product_promotion_price];
$product_promotion_detail=$rs[product_promotion_detail]; 	


	$thumbnailsPath="product/".$productcat_id."/".$product_id."/thumbnail/";
	$big_picture="product/".$productcat_id."/".$product_id."/";
		if(!is_dir($thumbnailsPath)){
		
		}else{ //else
		if($handle= opendir($thumbnailsPath)){
		$imagesFiles = array();
		$i=0;
		$count=1;
		while(false!=($file=readdir($handle))){
				if($file!="." && $file!=".."){
					$thumbnailsFile = $thumbnailsPath."/".$file;
					$picture_big =  $big_picture."/".$file;
					$fileType = pathinfo($thumbnaisFile);//แสดงpath
					$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
					$allowedtypes=array("png","jpeg","jpg","gif");
					/*if(is_file($thumbnailsFile)&& in_array($fileType,$allowedtypes))
					{
					$imagesFiles[i]=$thumbnailsFile;
					}
					$imagesFiles[i]=$thumbnailsFile;
					*/
					
					if(is_file($thumbnailsFile)){
					echo"-------------$i--------------";
					$imagesFiles[$i]=$thumbnailsFile;
					$count+=1;
					}
					
					
					/*echo"+$imagesFiles[i]";
					echo"thumbnailsFile:$thumbnailsFile";*/
			
				}
				$i++;
				
				
				
			}
			closedir($handle);
		}
		/*sort($imagesFiles);
		if(count($imagesFiles)>0){
		$thumbnailsFile = $imagesFiles;
		}*/
		
	}
?>
<?
	for($i=2; $i<=$count; $i++){//รอบที่0 = . รอบที่1= .. 
	
		echo"<br>$i:$imagesFiles[$i]<br>";
	}
?>


        <img src="<?=$picture_big?>" />
       
       
        <table>
        	<tr>
            	<td>
                </td>
                <td><b>
                <?=$product_name?>
                </b>
                </td>
            </tr>
            <tr>
            	<td>
                </td>
                <td>
                <?=$product_price?>
                </td>
            </tr>
        </table>
      
    <?=$product_detail?>
