<?  ob_start(); session_start();?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php

include("config.inc.php");
require("class_mysql.php");
$db = new database();

$cus_email=$_POST['cus_email'];
$cus_user=$_POST['cus_user'];
$cus_password=$_POST['cus_pass'];
$cus_company=$_POST['cus_company'];
$cus_fullname=$_POST['cus_fullname'];
$cus_address=$_POST['cus_address'];
$cus_tel=$_POST['cus_tel'];
$cus_fax=$_POST['cus_fax'];
$cus_other=$_POST['cus_other'];

			
			


//picture
$path_object="./member_img/";
	if(!is_dir($path_object)){
	umask(0);
	mkdir($path_object,777);
}
$file_member=$_FILES["cus_pic"]["name"];//--ต้องแก้ไข

if($file_member){

$file_name=$file_member;//--ต้องแก้ไข

	

	$file_array=explode(".",$file_name);
	$file_1=$file_array[0];
	$file_2=$file_array[1];
	$file_1=strtolower($file_1);
	$file_2=strtolower($file_2);
	$now=date("dmyihs");
	$file_1=$file_1.$now.'.'.$file_2;
	
	
	
	if($file_2 =="jpg" or $file_2=="gif" or $file_2=="png" or $file_2=="jpeg" or $file_2=="swf"){
			if(is_dir($path_object))
			{
			$object_picture=$file_1;
			
			copy($_FILES["cus_pic"]["tmp_name"],"./member_img/".$object_picture);//--ต้องแก้ไข
				
				
				//delete
				/*$unlink="../object_system/$object_name_edit";
				if($unlink){
				@unlink($unlink);*///@ไม่ต้องการให้มันฟอ้งถ้าไม่มีไฟลล์ให้ลบ
				//file_exists();ใช้ function นี้ตรวจสอบก่อนว่ามีไฟลล์ใหลบมั้ย
				
				
				}
}


}else{
	//picture member default
	$object_picture="";
	
}
//picture


$cus_date=date("d-m-y:h:i:s");
$strSQL="insert into customer(cus_email,cus_user,cus_pass,cus_company,cus_fullname,cus_address,cus_tel,cus_fax,cus_pic,cus_other,cus_date)VALUES('$cus_email','$cus_user','$cus_password','$cus_company','$cus_fullname','$cus_address','$cus_tel','$cus_fax','$object_picture','$cus_other','$cus_date')";
$sucess=mysql_query($strSQL)or die(mysql_error());

if($sucess){

$result_cus=$db->tableSQL("customer where cus_user ='$cus_user'");
$re_cus = mysql_fetch_array($result_cus);
$_SESSION['cus_id']=$re_cus[cus_id];
$_SESSION['cus_user']=$re_cus[cus_user];
$_SESSION['cus_pass']=$re_cus[cus_password];
$_SESSION['cus_name']=$re_cus[cus_fullname];




$result_admin= $db->tableSQL("admin where admin_status=3");
$rs_admin = mysql_fetch_array($result_admin);


	//ส่งmailให้ผู้ดูแลระบบ
		$strTo = $result_admin[admin_email];
		$strSubject = "สมัครสมาชิก";
		$strHeader =$result_admin[admin_website] ;
		$strMessage = "เข้าไปตรวจสอบระบบ Back office ด้วยครับ คุณ.$cus_fullname.สมัครสมาชิก:.ชื่อเข้าใช้ระบบ$cus_user.รหัสผ่าน.$cus_password";
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //		
		
		
		
		//ส่งให้สมาชิก
		$strTo2 = $cus_email;
		$strSubject2 = "สมัครสมาชิก";
		$strHeader2 =$result_admin[admin_website] ;
		$strMessage2 = " คุณ.$cus_fullname.ได้ทำการสมัครสมาชิกเว็บไชต์:$result_admin[admin_website]เรียบร้อยแล้ว.ชื่อเข้าใช้ระบบ$cus_user.รหัสผ่าน.$cus_password";
		$flgSend = @mail($strTo2,$strSubject2,$strMessage2,$strHeader2);  // @ = No Show Error //

}else{
	echo"error".mysql_error();
}
echo"<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo"<script>window.location=\"index.php?page=cart\";</script>";
?>