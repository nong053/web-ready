<? ob_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("../config.inc.php");
$action=$_GET['action'];

if($action="delete"){
$product_id=$_GET['product_id'];
$productcat_id=$_GET['productcat_id'];

$path_thumbnail="../product/".$productcat_id."/".$product_id."/thumbnail/";
$path_big_picture="../product/".$productcat_id."/".$product_id."/";

			if(!$handle=opendir($path_thumbnail)){
			
			}else
			
			{
				$imagesFile=array();
				while(false!==($file=readdir($handle))){
					if($file !="." && $file !=".."){
					$thumbnailsFile=$path_thumbnail."/".$file;
					$big_picture_File=$path_big_picture."/".$file;
					unlink("$thumbnailsFile");
					unlink("$big_picture_File");
				}

			}
			closedir($handle);//ต้องปิดทุกครั้งไม่งั้นลบfolderไม่ได้
		}




	if(is_dir($path_thumbnail)){
	rmdir("$path_thumbnail");
	} 
	if(is_dir($path_big_picture)){
	rmdir("$path_big_picture");
	}


$strSQL="delete from product where product_id=$product_id";
mysql_query($strSQL);
//header("Location:index.php?page=product&prdductcat_id=$productcat_id");
echo"<script> window.location=\"index.php?page=ecommerce_system&select_ecommerce=product&productcat_id=$productcat_id\"</script>";
//header(window.location=\'index.php?page=ecommerce_system&select_ecommerce=product&productcat_id=$productcat_id\');

}//action==delete
?>
<?php if($action=="edit")
$product_id=$_POST['product_id'];
$productcat_id=$_POST['productcat_id'];
$product_name=$_POST['product_name'];
$product_detail=$_POST['product_detail'];
$product_price=$_POST['product_price'];
$product_promotion=$_POST['product_promotion'];
$product_amount=$_POST['product_amount'];
$product_date=date("D-M-y:H:i:s");


      $strSQL="update product set product_name='$product_name',product_detail='$product_detail',product_price='$product_price',product_promotion='$product_promotion',product_amount='$product_amount',product_date='$product_date' where product_id=$product_id";
	  $result=mysql_query($strSQL);
	  if(!$result){
	  echo "error".mysql_error();
	  }
?>