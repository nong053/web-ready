﻿<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? ob_start();
include("../config.inc.php");
$action2=$_GET['action'];
$id_myvdo2=$_GET['id_myvdo'];
$id_catmyvdo2=$_GET['id_catmyvdo'];
$pic_myvdo2=$_GET['pic_myvdo'];
$vdo_myvdo2=$_GET['vdo_myvdo'];


$action1=$_POST['action'];

$id_catmyvdo=$_POST['id_catmyvdo'];
//echo"id_catmyvdo$id_catmyvdo";
$name_myvdo=$_POST['name_myvdo'];


if($action1=="add"){
	
	if($name_myvdo==""){//check ค่าว่าง
				echo"<script>alert(\"กรุณาใส่ชื่อวีดีโอ\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
	}

			$size_pic=$_FILES['pic_vdo']['size'];
			
			$size_vdo=$_FILES['myvdo']['size'];
			$name_pic=$_FILES['pic_vdo']['name'];
			$myvdo_name=$_FILES['myvdo']['name'];
			
			$vdo_myvdo=$myvdo_name;//vdo name
			
			$pic_myvdo=$_FILES['pic_vdo']['name'];//picture name
			
			
			
			
			
			
			
			
			
			
			//check type pic
			$pathinfo=pathinfo($name_pic);
			$name_pic=$pathinfo['extension'];
			//check ค่าว่าง
			if($name_pic==""){
				echo"<script>alert(\"กรุณาอัปโหลดภาพด้วยครับ\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
				
			}
			//check ค่าว่าง
			
			
			
			if($name_pic != "jpg" and $name_pic !="png" and $name_pic != "gif")
			{
				echo"<script>alert(\"อนุญาติให้อัปโหลดเฉพาะไฟล์ jpg,png,gif\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
			}
			//check type pic
			
			//check type vdo
			$pathinfo=pathinfo($myvdo_name);
			$myvdo_name=$pathinfo['extension'];
			
			
			if($myvdo_name==""){
				echo"<script>alert(\"อัปโหลดไฟล์วีดีโอ flv ด้วยครับ\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
			}
			//echo"myvdo_name$myvdo_name<br>";
			if($myvdo_name!="flv"){
				echo"<script>alert(\"อนุญาติให้อัปโหลดเฉเพาะไฟล์วีดีโอ flv\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
			}
			//check type vdo	
			
			if($size_pic>1000000){//1M
				echo"<script>alert(\"ขนาดไฟล์ภาพใหญ่เกินไปครับ\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
			}else if($size_vdo>10000000)//10M
			
			{
				echo"<script>alert(\"ขนาดไฟล์วีดีโอใหญ่เกินไปครับ\");</script>";
				echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
				exit();
			}

			//position
			$strSQL2="select * from myvdo";
			$result2=mysql_query($strSQL2);
			if(!$result2){
				echo"erorr".mysql_error();
			}else{
			$num=mysql_num_rows($result2);
			$position_myvdo=$num+1;
				
			}//position
			
			
			//chang namevdo
			//chang namepic
			$strname = strrev($pic_myvdo);
			
			$f=time().".".strrev($strname[0].$strname[1].$strname[2]);
			
			$pic_myvdo=$f;
			
			$strname = strrev($vdo_myvdo);
			$f=time().".".strrev($strname[0].$strname[1].$strname[2]);
			$vdo_myvdo=$f;
			
			//chang namevdo
			//chang namepic
			
			
			$strSQL="insert into myvdo(id_catmyvdo,name_myvdo,vdo_myvdo,pic_myvdo,position_myvdo)values('$id_catmyvdo','$name_myvdo','$vdo_myvdo','$pic_myvdo','$position_myvdo')";
			
			$result=mysql_query($strSQL);
			if(!$result){
				echo"error".mysql_error();
			}else{
				$strSQL2="select * from myvdo where name_myvdo='$name_myvdo'";
				$result2=mysql_query($strSQL2);
				$rs2=mysql_fetch_array($result2);
				$id_myvdo=$rs2[id_myvdo];
			}
			
			
			
			$myvdo_path="../myvdo/$id_catmyvdo/$id_myvdo/";
			if(!is_dir($myvdo_path)){
				umask(0);
				
			mkdir($myvdo_path,0777);
			}
			
			$myvdo_path="../myvdo/$id_catmyvdo/$id_myvdo/pic_vdo/";
			if(!is_dir($myvdo_path)){
				umask(0);
				
			if(mkdir($myvdo_path,0777)){
				
				if(copy($_FILES["myvdo"]["tmp_name"],"../myvdo/$id_catmyvdo/$id_myvdo/$vdo_myvdo")){
	copy($_FILES["pic_vdo"]["tmp_name"],"../myvdo/$id_catmyvdo/$id_myvdo/pic_vdo/$pic_myvdo");
	echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
}//if copy
				
				
				}//if mkdir
			}//if!is_dir


}//add


if($action2=="del"){
//echo"here del";
//echo"id_myvd2o=$id_myvdo2<br>";
//echo"id_catmyvdo2=$id_catmyvdo2<br>";
//echo"pic_myvdo2=$pic_myvdo2";
//echo"vdo_myvdo2=$vdo_myvdo2";



	
	
	
	
	/* ลบรูปภาพ cat*/
	function remove_dir($dir) { 
	$handle = opendir($dir); 
	while (false!==($item = readdir($handle))) { 
		if($item != '.' && $item != '..') { 
			if(is_dir($dir.'/'.$item))  { 
				remove_dir($dir.'/'.$item); 
			}else{ 
				unlink($dir.'/'.$item); 
			} 
		} 
	} 
	closedir($handle); 
	if(rmdir($dir)) { 
		$success = true; 
	}        
	return $success; 
	} 
	
	
	
	//$myvdo_cat_path = iconv("UTF-8","windows-874",$id_catmyvdo);
	$catmyvdo_path = "../myvdo/" . $id_catmyvdo2 . "/".$id_myvdo2."/";
	if (is_dir($catmyvdo_path)){
		remove_dir($catmyvdo_path);
	}
/* catลบรูปภาพ*/
	
	$strSQL="delete from myvdo where id_myvdo=$id_myvdo2";
	$result=mysql_query($strSQL);
	if(!$result){
	echo"error".mysql_error();
	}else{
		echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo2\";</script>";
				exit();
	}
		
	
	
}

if($action1=="edit"){
	$position_myvdo=$_POST['position_myvdo'];
	$id_myvdo=$_POST['id_myvdo'];
	$name_myvdo=$_POST['name_myvdo'];
	echo"here is edit";
	$strSQL="update myvdo set name_myvdo='$name_myvdo',position_myvdo='$position_myvdo' where id_myvdo=$id_myvdo";
	$result=mysql_query($strSQL);
	if(!$result){
		echo"error".mysql_error();
	}else{
		echo"<script>window.location=\"index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=$id_catmyvdo\";</script>";
		//index.php?page=vdo_system&select_page=myvdo&id_catmyvdo=56
				exit();
	}
}
?>

