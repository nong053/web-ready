<?  ob_start(); session_start();?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php

include("config.inc.php");

$contact_fullname=$_POST['contact_fullname'];
$contact_title=$_POST['contact_title'];
$contact_detail=$_POST['contact_detail'];
$contact_address=$_POST['contact_address'];
$contact_tel=$_POST['contact_tel'];
$contact_email=$_POST['contact_email'];
$return=$_POST['return'];
$product_id=$_POST['product_id'];
$productcat_id=$_POST['productcat_id'];




$date_time=date("d-m-y:h:i:s");
$strSQL="insert into contact(contact_fullname,contact_title,contact_detail,contact_address,contact_tel,contact_email,contact_date)VALUES('$contact_fullname','$contact_title','$contact_detail','$contact_address','$contact_tel','$contact_email','$date_time')";
$sucess=mysql_query($strSQL)or die(mysql_error());

if($sucess){

require("class_mysql.php");
$db = new database();
$result_admin= $db->tableSQL("admin where admin_status=3");
$rs_admin = mysql_fetch_array($result_admin);


	//ส่งmail
		$strTo = $result_admin[admin_email];
		$strSubject = "ติดต่อเรา";
		$strHeader =$result_admin[admin_website] ;
		$strMessage = "เข้าไปตรวจสอบระบบ Back office ด้วยครับ คุณ.$contact_fullname.ติดต่อสอบถาม:.$contact_title.รายละเอียด.$contact_detail";
		$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
		
		
}

echo"<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว');</script>";
echo"<script>window.location=\"index.php?page=contact\";</script>";
/*echo"<script>window.location=\"index.php?page=$return\";</script>";*/

?>