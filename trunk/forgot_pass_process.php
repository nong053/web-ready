<?
include_once("class_mysql.php");
$db = new database();
$user=trim($_POST['user']);
$email=trim($_POST['email']);
//echo"user$user";
$result_cus = $db->tableSQL("customer where cus_user='$user' and cus_email='$email'");
$num_cus = mysql_num_rows($result_cus);
echo"num_cus$num_cus<br>";
$rs_cus = mysql_fetch_array($result_cus);

$cus_user=$rs_cus[cus_user];
$cus_pass=$rs_cus[cus_pass];
$admin_website=$rs_cus[admin_website];


if(!$rs_cus){
	?>
    <meta http-equiv="refresh" content="0; URL='index.php'" /> 
    <?
}else{
	$to=$email;
	$title="รหัสผ่านในการใช้งาน$admin_website";
	$content="User:$cus_user Password:$cus_pass";
	$header="$admin_website";
	$sendmail=@mail($to,$title,$content,$header);
	if($sendmail){
		echo"<script>alert('สงข้อมูลเรียบร้อยแล้ว');</script>";
	}
	?>
    <meta http-equiv="refresh" content="0; URL='index.php'" /> 
    <?
}



?>