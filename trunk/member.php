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

$cus_id=$_SESSION['cus_id'];

/*echo"cus_id$cus_id";*/
$db = new database();
$result_customer = $db->tableSQL("customer where cus_id='$cus_id'");
$rs = mysql_fetch_array($result_customer);

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
        <img src="./member_img/<?=$rs[cus_pic]?>"  border="0" width="100"/><br>
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
            <input type="button" onClick="parent.location='index.php?page=customer_area&select_member=member_add'" value="ยกเลิกการแก้ไข" />
            <?
			}else{
			?>
            <!-- แก้ไข-->
           <input type="button" onClick="parent.location='index.php?page=customer_area&cus_id=<?=$cus_id?>&detail_cus=detail_cus&action2=edit'"  value="<?=$submit?>"/>
            <input type="button" onClick="parent.location='index.php?page=customer_area'"  value="ย้อนกลับ"/>
           <?
			}
		   ?> 
           
            </div>
        </td>
    </tr>
</table>
</form>


