<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script>
/*get ajax*/
var xmlReq;
function getResult(txt){
	/*alert(txt);*/
	if(window.XMLHttpRequest){
		xmlReq = new XMLHttpRequest();
	}else{
		xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlReq.onreadystatechange = callBackget;
	xmlReq.open("GET",txt+new Date().getTime(),true);
	xmlReq.send(null);
}
function callBackget(){
	if(xmlReq.readyState !=4){
	document.getElementById("Result").innerHTML="LOADING...";
	}else if(xmlReq.status==200){
	document.getElementById("Result").innerHTML=xmlReq.responseText;
	location.reload(true);
	}
}

/*post ajax*/
function postResult(txt){
	/*alert(txt);*/
	if(window.XMLHttpRequest){
	xmlReq = new XMLHttpRequest();
	}else{
	xmlReq = new ActiveXOject("Microsoft.XMLHTTP");
	}
	xmlReq.onreadystatechange = callBackpost;
	xmlReq.open("POST",txt,true);
	xmlReq.setRequestHeader("content-Type","application/x-www-form-urlencoded");/*?????*/
	xmlReq.send("jobcat_position="+document.form1.jobcat_position.value+"&jobcat_title="+document.form1.jobcat_title.value+"&jobcat_detail="+document.form1.jobcat_detail.value+"&action="+document.form1.action.value+"&jobcat_id="+document.form1.jobcat_id.value);	
}
function callBackpost(){
	if(xmlReq.readyState!=4){
	document.getElementById("Result").innerHTML="LOADING..";
	
	}else if(xmlReq.status==200){
	/*document.form1.test.value="";*/
	document.form1.jobcat_position.value="";
	document.form1.jobcat_title.value="";
	document.form1.jobcat_detail.value="";
	document.getElementById("Result").innerHTML=xmlReq.responseText;
	location.reload(true);
	
	}
}

</script>


<style>
#devtext_name{
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
</style>

<table boder="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
    	<td>
        <div id="devtext_name">
        <center>
        ลำดับที่
        </center>
        </div>
        </td>
        <td>
        <div id="devtext_name">
        ตำแหน่งงาน
        </div>
        </td>
        <td>
        <div id="devtext_name">
        เกี่ยวกับงาน
        </div>
        </td>
        <td>
        <div id="devtext_name">
        รายละเอียด
        </div>
        </td>
        <td>
        <div id="devtext_name">
        จัดการ
        </div>
        </td>
        
    </tr>
    <?php
    $strSQL="select * from jobcat";
	$result=mysql_query($strSQL);
	$i=1;
	while($rs=mysql_fetch_array($result)){
	?>
    <tr>
    	<td>
        <center>
        <?=$i?>
        </center>
        </td>
        <td>
        <?=$rs[jobcat_position]?>
        </td>
        <td>
        <?=$rs[jobcat_title]?>
        </td>
        <td>
        <?=$rs[jobcat_detail]?>
        </td>
        <td>
        <a href="#" onclick="getResult('action_job_company.php?action=del&jobcat_id=<?=$rs[jobcat_id]?>&')">
        ลบ
        </a>&nbsp;
        <a href="index.php?page=job_system&select_page=job_company_edit_del&action=edit&jobcat_id=<?=$rs[jobcat_id]?>">
        แก้ไข
        </a>
        </td>
    </tr>
    <?
	$i++;
	}
	?>
</table>
<div id="Result">
</div>
<br style="clear:both">


<?
$action=$_GET['action'];
if($action=="edit"){
	$jobcat_id=$_GET['jobcat_id'];
	/*$jobcat_position=$_GET['jobcat_position'];
	$jobcat_title=$_GET['jobcat_title'];
	$jobcat_detail=$_GET['jobcat_detail'];*/
	
	
	$strSQL="select * from jobcat where jobcat_id='$jobcat_id'";
	$result=mysql_query($strSQL);
	$rs2=mysql_fetch_array($result);
	
	
	/*echo"webdir_cat<br>";
	echo"$cat_webdir_title<br>";
	echo"$webdir_id<br>";*/
	
?>
<form name="form1" method="post">
<table>
	<tr>
    	<td>
        ตำแหน่งงาน
        </td>
        <td>
        <input type="txt"  name="jobcat_position" value="<?=$rs2[jobcat_position]?>"/>
        </td>
    </tr>
    <tr>
    	<td>
        เกี่ยวกับงาน
        </td>
        <td>
        <input type="txt"  name="jobcat_title" value="<?=$rs2[jobcat_title]?>"/>
        </td>
    </tr>
    <tr>
    	<td>
        รายละเอียด
        </td>
        <td>
        <textarea name="jobcat_detail"><?=$rs2[jobcat_detail]?></textarea>
        </td>
    </tr>
   
</table>
<table>
	<tr>
    	<td>
        <input name="action" value="edit" type="hidden">
        <input name="jobcat_id" value="<?=$rs2[jobcat_id]?>" type="hidden">
        <input type="button" onclick="postResult('action_job_company.php')" value="click here" />
        </td>
    </tr>
</table>
</form>
<?
}
?>
