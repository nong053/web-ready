<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if(($_GET["Action"])=="Send")
/*$strSQL="insert into product_payment_check(product_payment_check_fullname,product_payment_check_email)VALUES('1','2')";
		$result=mysql_query($strSQL);*/

{
require("config.inc.php");
		$strSQL="INSERT INTO product_payment_check(product_payment_check_fullname,product_payment_check_email,product_payment_check_tel,product_payment_check_other,product_payment_check_date,product_payment_check_time,product_payment_check_bankname,product_payment_check_invoice)values('$_POST[txtName]','$_POST[txtEmail]','$_POST[txtTel]','$_POST[txtDesc]','$_POST[txtDate]','$_POST[txtTime]','$_POST[txtBank]','$_POST[txtOrderNo]')";
		
		$result=mysql_query($strSQL);
		if($result) {echo"ok sucess";}else{
			echo "error---------------".mysql_error();
		}
	
		$header= "Content-type: text/html; charset=windows-874\n"; 
		$header.="from: $_POST[txtEmail] ";
		$subject = "แจ้งการชำระเงินหมายเลขสั่งซื้อ [$_POST[txtOrderNo]]";
		$msg="<u>แจ้งการชำระเงินหมายเลขสั่งซื้อ [$_POST[txtOrderNo]]</u>";
		$msg.="<br><br>=============================";
		$msg.="<br><br>หมายเลขสั่งซื้อ : $_POST[txtOrderNo] ";
		$msg.="<br>ชื่อ : $_POST[txtName] ";				
		$msg.="<br>อีเมล์ : $_POST[txtEmail] ";						
		$msg.="<br>หมายเลขโทรศัพท์ : $_POST[txtTel] ";
		$msg.="<br>วันที่-เวลา : $_POST[txtDate],$_POST[txtTime] ";
		$msg.="<br>รายละเอียด : $_POST[txtDesc] ";																								
		$msg.="<br><br>=============================";

		$msg.="<br>โดย : $_POST[txtName]";		
		$msg.="<br>=============================";
		
		
		//require("class_mysql.php");
		$db = new database();
		$result_admin= $db->tableSQL("admin where admin_status=3");
		$rs_admin = mysql_fetch_array($result_admin);
		$admin_email=$rs_admin[admin_email];
		@mail($admin_email,$subject,$msg,$header);									
						
						
	echo "<script language=\"JavaScript\"> ";
	echo "	alert('ทางเราได้รับข้อมูลของคุณเรียบร้อยแล้ว');window.location='index.php';";
	echo "	</script> ";												

}


?>
<script language="JavaScript">
		function checkvalue()
		{
			var check="";
			if(document.form_payment.txtOrderNo.value == "")
				{
				check+='กรุณากรอก [หมายเลขสั่งซื้อ]\n';
				
				
				}
									
			if(document.form_payment.txtName.value == "")
				{
				check+='กรุณากรอก [ชื่อของคุณ]\n';
				
				
				}
									
			if(document.form_payment.txtEmail.value == "")
				{
				check+='กรุณากรอก [อีเมล์]\n';
				
				
				}
									
			if(document.form_payment.txtTel.value == "")
				{
				check+='กรุณากรอก [หมายเลขโทรศัพท์]\n';
				
				
				}
									
			if(document.form_payment.txtDate.value == "")
				{
				check+='กรุณากรอก [วันที่]\n';
				
				
				}
									
			if(document.form_payment.txtTime.value == "")
				{
				check+='กรุณากรอก [เวลา]\n';
			
				
				}																											
									
			
				
																											
			if(check !=""){
				alert(check);
				document.form_payment.txtOrderNo.focus();
				return false;
				}else{
				document.form_payment.submit();	
				}					
									
	 }
</script>
                                      <form name="form_payment" method="post" action="index.php?page=customer_area&select_member=payment&Action=Send">
 
                                        <table width="504" border="0">
                                          <tr> 
                                            <td width="217">หมายเลขสั่งซื้อ</td>
                                            <td width="277"><input name="txtOrderNo" type="text" id="txtOrderNo" size="40" class="txtbox">
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td width="217">ธนาคาร</td>
                                            <td width="277"><input name="txtBank" type="text" id="txtBank" size="40" class="txtbox">
                                             </td>
                                          </tr>
                                          <tr> 
                                            <td>ชื่อของคุณ</td>
                                            <td><input name="txtName" type="text" id="txtName" class="txtbox">
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td>อีเมล์ของคุณ</td>
                                            <td><input name="txtEmail" type="text" id="txtEmail" class="txtbox">
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td valign="top">เบอร์โทรศัพท์</td>
                                            <td><input name="txtTel" type="text" id="txtTel" class="txtbox">
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td valign="top">วันที่ -เวลา</td>
                                            <td><input name="txtDate" type="text" class="txtbox" id="txtDate" size="10">
                                              -
<input name="txtTime" type="text" class="txtbox" id="txtTime" size="10">
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td valign="top">รายละเอียด</td>
                                            <td><textarea name="txtDesc" cols="40" rows="8" class="txtbox" id="txtDesc"></textarea>
                                              <font color="#FF0000">*</font></td>
                                          </tr>
                                          <tr> 
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                          </tr>
                                          <tr> 
                                            <td>&nbsp;</td>
                                            <td><input name="btnSubmit" type="button" id="btnSubmit" value="Submit" onclick="checkvalue()" class="button"> 
                                              <input name="btnReset" type="reset" id="btnReset" value="Reset" class="button"></td>
                                          </tr>
                                        </table>
                                      </form>
                                   