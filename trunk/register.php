<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link href="./css/form_member.css" rel="stylesheet" type="text/css">-->
<style>
.content_form_member{
width:auto;
border:#CCCCCC 1px solid;
padding:5px;
}
.content_form_member #content{
width:auto;
border:#CCCCCC 1px solid;
margin:5px;
margin-top:5px;
padding-top:5px;
background-color:#EBEBEB;
}
.content_form_member #content #lable_text{
width:auto;
margin-left:20px;
padding:3px;
}
.content_form_member #content #lable_text #lable{
width:100px;
float:left;
}
#content #lable_text #content #lable_text #text{
width:200px;
background-color:#00FF00;
float:left;
}

</style>
<script>
	function check_cus(confrim){
		//alert("confrim"+confrim);
		var check="";
		if(document.form_cus.cus_user.value==""){
			check+="กรุณากรอกชื่อในการเข้าไช้งาน\n";
		}
		if(document.form_cus.cus_pass.value==""){
			check+="กรุณากรอกรหัสผ่าน\n";
		}
		if(document.form_cus.cus_repass.value==""){
			check+="กรุณากรอกหรัสผ่านซ้ำ\n";
		}
		if(document.form_cus.cus_pass.value != document.form_cus.cus_repass.value){
			check+="กรอกรหัสผ่านไม่ตรงกัน\n";
		}
		if(document.form_cus.cus_fullname.value==""){
			check+="กรุณากรอกชื่อ-นามสกุล\n";
		}
		if(document.form_cus.cus_email.value==""){
			check+="กรุณากรอกE-mail\n";
		}
		if(document.form_cus.cus_tel.value==""){
			check+="กรุณากรอกเบอร์โทร\n";
		}
		if(document.form_cus.cus_confrim.value != confrim){
			check+="กรอกหัสยืนยันไม่ถูกต้องครับ\n";
		}
		
		if(check!=""){
			alert(check);
			return false;
		}else{
			document.form_cus.submit();
		}
	}
</script>
<form action="process_member.php" name="form_cus" method="post" enctype="multipart/form-data">
<div class="content_form_member">

	<div id="content">
		<div id="lable_text">
			<div id="lable"></div>
			<div id="text">
			<h4>สมัครสมาชิกเพื่อรับส่วนลดพิเศษ 10-20%</h4>
			
			</div>
			<br style="clear:both" />
		</div>
	</div>

	<div id="content">
	
	
		<div id="lable_text">
			<div id="lable">
			ชื่อเข้าใช้งาน
			</div>
			<div id="text">
			<input type="text" name="cus_user" />
			<font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
		</div>	
		
		<div id="lable_text">
			<div id="lable">
			รหัสผ่าน
			</div>
			<div id="text">
			<input type="text" name="cus_pass" />
			<font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
		</div>	
		
		<div id="lable_text">
			<div id="lable">
			รหัสผ่านซ้ำ
			</div>
			<div id="text">
			<input type="text" name="cus_repass" />
			<font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			<br style="clear:both" />
		</div>
		

		
	
	
	
	</div><!-- content-->
	
	<div id="content">
		<div id="lable_text">
			<div id="lable">
			ชื่อ-นามสกุล:
			</div>
			<div id="text">
			<input type="text" name="cus_fullname" width="100" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			
		</div>
        
        <div id="lable_text">
			<div id="lable">
			รูปภาพ:
			</div>
			<div id="text">
			<input type="file"  name="cus_pic"/>
			</div>
			
		</div>
        
        <div id="lable_text">
			<div id="lable">
			ชื่อบริษัท:
			</div>
			<div id="text">
			<input type="text" name="cus_company" width="100" />
            
			</div>
			
		</div>
        
        <div id="lable_text">
			<div id="lable">
			E-mail
			</div>
			<div id="text">
			<input type="text" name="cus_email" width="100" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			
		</div>
        
        
        <div id="lable_text">
			<div id="lable">
			เบอร์โทร
			</div>
			<div id="text">
			<input type="text" name="cus_tel" width="100" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			
		</div>
        
        <div id="lable_text">
			<div id="lable">
			เบอร์แฟกซ์
			</div>
			<div id="text">
			<input type="text" name="cus_fax" width="100" />
            
			</div>
			
		</div>
		
		<div id="lable_text">
			<div id="lable">
			ที่อยู่
			</div>
			<div id="text">
			
            <textarea name="cus_address"></textarea>
			</div>
			
		</div>
		
		<div id="lable_text">
			<div id="lable">
			อื่นๆ
			</div>
			<div id="text">
			
            <textarea name="cus_other"></textarea>
			</div>
			
		</div>
        
        
        <div id="lable_text">
			<div id="lable">
			<br />
			</div>
			<div id="text">
			<?
			$rand1=rand(1,10);
			$rand2=rand(1,10);
			$confrim=$rand1+$rand2;
			
			$_SESSION['confrim']=$confrim;
			?>
			<b><? echo "$rand1 + $rand2 =?"; ?></b>
			</div>
			
		</div>
         <div id="lable_text">
			<div id="lable">
			กรอกรหัสยืนยัน
			</div>
			<div id="text">
			<input type="text" name="cus_confrim" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			<br style="clear:both" />
		</div>
        

	</div><!-- content-->
	
	<div id="content">
		<div id="lable_text">
			<div id="lable"></div>
			<div id="text">
            
			<input type="reset" value="ยกเลิก" />
			<input type="button" value="สมัครสมาชิก" onclick="check_cus(<?=$confrim?>)" />
            
			
			</div>
			<br style="clear:both" />
		</div>
	</div>
</div>
</form>