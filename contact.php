<? session_start();?>
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
	function check_form(confrim){
		
		 var form_alert="";
		if(document.form_contact.contact_fullname.value==""){
			form_alert+="กรอกชื่อด้วยครับ\n";
		}
		if(document.form_contact.contact_title.value==""){
			form_alert+="กรอกหัวข้อที่ต้องการติดต่อด้วยครับ\n";
		}
		if(document.form_contact.contact_detail.value==""){
			form_alert+="กรอกรายละเอียดด้วยครับ\n";
		}
		if(document.form_contact.contact_tel.value==""){
			form_alert+="กรอกเบอร์โทรด้วยครับ\n";
		}
		if(document.form_contact.contact_confrim.value != confrim){
			form_alert+="กรอกข้อมูลนหัสยืนยันไม่ถูกต้องครับ\n";
		}
		if(form_alert!=""){
			alert(form_alert);
			return false;
		}else{
		document.form_contact.submit();
		}
		
	}
</script>
<form action="contact_process.php" method="post" name="form_contact">
<div class="content_form_member">
		<div id="content">
		<div id="lable_text">
			<div id="lable"></div>
			<div id="text">
			<h4>กรอกข้อมูลเพื่อติดต่อสอบถาม</h4>
			<br style="clear:both" />
			</div>
			
		</div>
	</div>


	<div id="content">
	
	
		<div id="lable_text">
			<div id="lable">
			ชื่อ
			</div>
			<div id="text">
			<input type="text" name="contact_fullname" />
			<font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
		</div>	
		
		<div id="lable_text">
			<div id="lable">
			หัวข้อ
			</div>
			<div id="text">
			<input type="text" name="contact_title" />
			<font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
		</div>	
		
		<div id="lable_text">
			<div id="lable">
			รายละเอียด
			</div>
			<div id="text">
			<textarea name="contact_detail" rows="5"></textarea>
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			<br style="clear:both" />
		</div>
		

		
	
	
	
	</div><!-- content-->
	
	<div id="content">
		<div id="lable_text">
			<div id="lable">
			เบอร์โทร
			</div>
			<div id="text">
			<input type="text" name="contact_tel" width="100" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
			</div>
			
		</div>
		
		<div id="lable_text">
			<div id="lable">
			ที่อยู่
			</div>
			<div id="text">
			<textarea name="contact_address" rows="5"></textarea>
			</div>
			
		</div>
		
		<div id="lable_text">
			<div id="lable">
			E-mail
			</div>
			<div id="text">
			<input type="text" name="contact_email" />
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
			<input type="text" name="contact_confrim" />
            <font color="#FF0000" style="margin-left:5px;">*</font>
           
			</div>
			
		</div>
		
		
         <div id="lable_text">
			<div id="lable">
			<br />
			</div>
			<div id="text">
			
            <font color="#FF0000" style="margin-left:5px; margin-right:5px;">*</font>จำเป็นต้องกรอก
           
			</div>
			<br style="clear:both" />
            
            
		</div>

	</div><!-- content-->
	
	<div id="content">
		<div id="lable_text">
			<div id="lable"></div>
			<div id="text">
			
			<input type="button" value="ส่งข้อมูล" onclick="check_form(<?=$confrim?>)" />
            <input type="reset"  value="Clear"/>
			<br style="clear:both" />
			</div>
			
		</div>
	</div>
</div>
</form>
