<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<!-- sexy ligthbox-->
<script src="mootools.js" type="text/javascript"></script>
<script src="sexylightbox.packed.js" type="text/javascript"></script>
<link rel="stylesheet" href="sexylightbox.css" type="text/css" media="all" />

<script type="text/javascript">
  window.addEvent('domready', function(){
    new SexyLightBox();
    new SexyLightBox({find:'sexywhite',color:'white', OverlayStyles:{'background-color':'#000'}});
  });
</script>
<!-- sexy ligthbox-->

<!-- -->
<style type="text/css">
 #dev_picturetext{
	 padding:5px;
	 background-color:#09C;
	 color:#FFF;
	 font-size:15px;
	 
	 font-weight:bold;
 }
  #dev_picturetext2{
	 padding:5px;
	 font-size:14px;
	 font-weight:bold;
	 float:left;
	 width:130px;
 }
 #dev_check{
	 border:#CCC dotted 1px;
	 float:left;
	 width:auto;
	 padding:5px;
	 padding-left:20px;
	 padding-right:20px;
	 -moz-border-radius:5px;
	-webkit-border-radius:15px;
	 
	 
 }
 #dev_picturelink a{
	 color:#000;
	 text-decoration:none;
 }
 #dev_submit{
	 padding:5px;
	 border:#999 1px solid;
 }
 #dev_title{
	border:#09C 5px solid;
	background-color:#09F;
	-moz-border-radius:5px;
	-webkit-border-radius:15px;
	padding:5px;
	color:#FFF;
	font-weight:bold;
}
-->
</style>
</head>

<body>
<?
include_once("../config.inc.php");
$cus_id=$_GET['cus_id'];
$detail_cus=$_GET['detail_cus'];
if($detail_cus=="detail_cus"){
$strSQL="select * from customer where cus_id='$cus_id'";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
include_once("../class_mysql.php");
$db = new database();
$result_customer = $db->tableSQL("customer where cus_id='$cus_id'");
$rs_customer = mysql_fetch_array($result_customer);

?>

<div id="dev_title">
ข้อมูลสมาชิก
</div>
<form method="post" action="member_action.php" enctype="multipart/form-data">
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
        <div id="dev_picturetext2">
        ชื่อ-นามสกุล:
        </div>
        <div id="dev_picturetext2">
        <img src="../member_img/<?=$rs_customer[cus_pic]?>"  border="0" width="100"/><br>
        <? 
		if($_GET['action2']=="edit"){
			$submit="บันทึกการแก้ไข";
			?>
            <input type="file" name="cus_pic" />
         	<input type="text" name="cus_fullname" value="<?=$rs[cus_fullname]?>"/>  
            <? 
		}else{
			$submit="แก้ไข";
		?>
        <?
		echo $rs[cus_fullname];
        }
		?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        อนุญาติให้ใช้งาน:
        </div>
        <div id="dev_check">
         	
         	<?=$rs[cus_enable]?>
           
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        E-mail:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_email" value="<?=$rs[cus_email]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_email]?>
          <?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        User:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_user" value="<?=$rs[cus_user]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_user]?>
            <?
			}
			?>
        </div>
        </td>
     </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        Pass:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_pass" value="<?=$rs[cus_pass]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_pass]?>
         <?
			}
			?>
        </div>
        </td>
     </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        บริษัท:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_company" value="<?=$rs[cus_company]?>"/>
            <? 
			}else{
			?>
        	 <?=$rs[cus_company]?>
        	<?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        ที่อยู่:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_address" value="<?=$rs[cus_address]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_address]?>
         <?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        เบอร์โทร:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_tel" value="<?=$rs[cus_tel]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_tel]?>
         <?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        แฟกซ์:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	<input type="text" name="cus_fax" value="<?=$rs[cus_fax]?>"/>
            <? 
			}else{
			?>
         <?=$rs[cus_fax]?>
         <?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        หมายเหตุ:
        </div>
        <div id="dev_check">
        <? 
			if($_GET['action2']=="edit"){
			
			?>
            	
                <textarea name="cus_other"><?=$rs[cus_other]?></textarea>
            <? 
			}else{
			?>
         <?=$rs[cus_other]?>
         <?
			}
			?>
        </div>
        </td>
    </tr>
    <tr>
    	<td>
        <div id="dev_button" style="margin-left:140px;"> 
			<?
			if($_GET['action2']=="edit"){//บันทึกไปแกไข
			?>
            <input type="submit" value="<?=$submit?>" />
            <input type="hidden" value="<?=$cus_id?>" name="cus_id" />
            <input type="hidden" value="edit" name="action" />
            <input type="button" onclick="parent.location='index.php?page=member_system'" value="ยกเลิกการแก้ไข" />
            <?
			}else{
			?>
            <!-- แก้ไข-->
           <input type="button" onclick="parent.location='index.php?page=member_system&cus_id=<?=$cus_id?>&detail_cus=detail_cus&action2=edit'"  value="<?=$submit?>"/>
            <input type="button" onclick="parent.location='index.php?page=member_system'"  value="ย้อนกลับ"/>
           <?
			}
		   ?> 
           
            </div>
        </td>
    </tr>
</table>
</form>
<? 
}else{
?>
<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td>
        <center>
        <div id="dev_picturetext">
        ลำดับ
        </div>
        </center>
        </td>
        <td>
         <div id="dev_picturetext">
        ชื่อ-นามสกุล
        </div>
        </td>
        <td>
         <div id="dev_picturetext">
        เปิดใช้งาน
        </div>
        </td>
        <td>
         <div id="dev_picturetext">
        User
        </div>
        </td>
        
        <td>
         <div id="dev_picturetext">
        Password
        </div>
        </td>
        <td>
        <center>
         <div id="dev_picturetext">
        จัดการ
        </div>
        </center>
        </td>
        
    </tr>
    <tr>
    	<td>
         
        </td>
    </tr>
    
<?

$strSQL="select * from customer";
$result=mysql_query($strSQL);
$i=1;
$j=1;
while($rs=mysql_fetch_array($result)){
$bgcolor=($j++%2)?'#FFFFCC':'#FFFFFF';
//echo"color$bgcolor";
?>
	<tr bgcolor="<?=$bgcolor?>" >
    	<td>
        <center>
        <?=$i?>
        </center>
        </td>
        <td>
        <?=$rs[cus_fullname]?>
        
        </td>
        <td>
        <div id="dev_picturelink">
        
        <a href="member_action.php?cus_id=<?=$rs[cus_id]?>&action2=check_member&order_status=<?=$rs[cus_enable]?>&TB_iframe=true&height=210&width=315" rel="sexylightbox">
        <img src="images/announcement.gif" border="0" />
        <?=$rs[cus_enable]?>
        </a>
        </div>
        </td>
        <td>
        <?=$rs[cus_user]?>
        
        </td>
        <td>
        <?=$rs[cus_pass]?>
        
        </td>
        <td>
        <div id="dev_picturelink">
        <center>
       
        <a href="index.php?page=member_system&cus_id=<?=$rs[cus_id]?>&detail_cus=detail_cus" />
        <img src="images/knowledgebase.gif" border="0" />
       <!-- <img src="images/b_edit.png"  border="0"/>-->
        ดูข้อมูล
        </a>
        <a href="member_action2.php?cus_id=<?=$rs[cus_id]?>&action=del">
        <img src="images/b_drop.png" border="0" />
        ลบ 
        </a>
        </center>
        </div>
        </td>
    </tr>
	
<?

$i++;
}
?>
</table>
<?
}//if
?>
</body>
</html>