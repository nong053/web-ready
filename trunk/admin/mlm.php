<? session_start();?>
<style>
#devtext_title{
	padding:5px;
	font-weight:bold;
	font-size:13px;
	border-top:#dedede solid 1px;
	border-bottom:#dedede solid 1px;
	background:#efefef;
}
#dev_l{
border-left:#dedede solid 1px;
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
#dev_r{
border-top:#dedede solid 1px;
border-bottom:#dedede solid 1px;
background:#efefef;
border-right:#dedede solid 1px;
	padding:5px;
	font-weight:bold;
	font-size:13px;
}
#dev_link a{
	color:#000;
	text-decoration:none;
}
</style>
<table border="0" cellpadding="0" cellspacing="0" width="100%">

	<tr >
    	<td>
        <div id="devtext_title">
        ลำดับ
        </div>
        </td>
        <td>
        <div id="devtext_title">
        ชื่อผู้ใช้
        </div>
        </td>
        <td>
        <div id="devtext_title">
        รหัสผ่าน
        </div>
        </td>
        <td>
        <div id="devtext_title">
        ชื่อ
        </div>
        </td>
        <td>
        <div id="devtext_title">
        รหัสบัตรประชาชน
        </div>
        </td>
        <td>
       <div id="devtext_title">
        รายละเอียด
        </div>
        </td>
    </tr>
 
<?
include("../config.inc.php");

$member_id_upline2=$_SESSION['member_id_upline'];//id_upline
if($member_id_upline2){
	/*echo"member_id_upline2$member_id_upline2";*/
$strSQL1="select * from member where member_id_upline='$member_id_upline2'";
}else{

$strSQL1="select * from member";
}
$result1=mysql_query($strSQL1);
$i=1;
while($rs1=mysql_fetch_array($result1)){
$member_user=$rs1[member_user];

$strSQL2="select * from member_upline where member_user_upline = '$member_user'";
$result2=mysql_query($strSQL2);
$rs2=mysql_fetch_array($result2);

if($member_id_upline2!=$rs2[member_id_upline]){//ถ้าเป็นรหัส upline ตัวเองไม่ show ข้อมูล
?>

	<tr>
    	<td>
        <center>
        <?=$i?>
        </center>
        </td>
        
        <td>
        <?=$rs1[member_user]?>
        </td>
        
        <td>
        <?=$rs1[member_password]?>
        </td>
        
        <td>
        <?=$rs1[member_fullname]?>
        </td>
        <td>
        <?=$rs1[member_idcard]?>
        </td>
        <td>
        <div id="dev_link">
        <a href="index.php?page=mlm_system&select_mlm=mlm_detail&member_id=<?=$rs1[member_id]?>">
        รายละเอียด
        </a>&nbsp;
        <?
		if($member_id_upline2){
		?>
        <a href="index.php?page=mlm_system&select_mlm=mlm_downline&member_id_upline=<?=$rs2[member_id_upline];?>">
        Downline
        </a>
        <? }?>
        </div>
        </td>
    </tr>
    
    <?
    }
	$i++;
	}
	?>
</table>