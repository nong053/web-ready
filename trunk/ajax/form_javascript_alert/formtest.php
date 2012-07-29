<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<script language="javascript">
function fncSubmit(strPage)
{	
	msg = "";
	if(document.form1.rdo1.checked == false && document.form1.rdo2.checked == false )
	{
		/*alert('Please Click Radio Option ');*/
		msg += "กรุณาcheck radio \n";
		/*return false;*/
	}
	if(document.form1.text1.value==""){
		/*alert('Please Click TEXT');*/
		msg += "กรุณาcheck text \n";
		/*return false;*/
	}
	if (msg != "") {
		msg = "กรุณากรอกรายละเอียดดังนี้ \n" +msg;
		alert(msg);
		return false;
	}
	document.form1.submit();
}
</script>
<form action="page.cgi" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
Radio 1 
  <input name="rdoCheckbox" type="radio" id="rdo1" value="Y">
  <br>
Radio 2 
<input name="rdoCheckbox" type="radio" id="rdo2" value="Y">
<br>
<input type="text" name="name" id="text1">
<br>
<input name="btnSubmit" type="submit" value="Submit" >
</form>
</body>
</html>