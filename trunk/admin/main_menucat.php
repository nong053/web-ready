<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><title>จัดการ เมนูหลัก(Management Menu)</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- ajax post-->
<script language="javascript" src="ajax.js"></script>
<script language="javascript">
function doajax(mydata){
	
	var ajax1=createAjax(); 
	var check22="";
	ajax1.onreadystatechange=function(){
		if(ajax1.readyState==4 && ajax1.status==200){
			
			document.getElementById('myplace').innerHTML=ajax1.responseText;
			
			document.form1.menu_name.value="";
			/*document.form1.menu_detail.value="";*/
			document.form1.menu_link.value="http://www.";
			alert('บันทึกข้อมูลเรียบร้อยแล้ว');
			location.reload(true);


			
		}else{
			return false;
		}
	}
	ajax1.open("POST","action_menu_system.php",true);
	ajax1.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	msg = "";
	
	if(document.form1.menu_name.value==""){
		/*alert('Please Click TEXT');*/
		msg += "กรุณากรอก ชื่อเมนูด้วยครับ\n";
		/*return false;*/
	}

	if (msg != "") {
		msg = " \n" +msg;
		alert(msg);
		return false;
		
	} else{
		
	ajax1.send("menu_name="+document.form1.menu_name.value+"&menu_link="+document.form1.menu_link.value+"&action_menu="+document.form1.action_menu.value+"&main_menu_id="+document.form1.main_menu_id.value+"&plugin="+document.form1.plugin.value);
	}
}

<!-- ajax post -->
<!-- ajax get-->
var xmlReq;

function GetResult(text){
	
	if(window.XMLHttpRequest){
		xmlReq = new XMLHttpRequest();
	}else{
		xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlReq.onreadystatechange = callBack;
	
	xmlReq.open("GET",text+new Date().getTime(),true);
	xmlReq.send(null);
}
function callBack(){
	if(xmlReq.readyState !=4){
		document.getElementById("resultArea1").innerHTML = "loading...";
		document.getElementById("imgLoading").style.display = '';
        
	}else{
		document.getElementById("imgLoading").style.display = 'none';
		document.getElementById("resultArea1").innerHTML = "";
		if(xmlReq.status ==200){
		document.getElementById("resultArea").innerHTML = xmlReq.responseText;
		location.reload(true);
		}
	}
}
</script>

<!-- ajax get-->
<!-- CKE-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<!-- CKE-->
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
</head>

<body>

<? include("../config.inc.php");
   
?>

<div id="dev_text" style="font-size:13px; font-weight:bold; color:#FFF; padding:5px; background-color:#333;">จัดการ เมนูหลัก(Management Menu)</div>


<div class="content_about_us" style="background-color:#FFF;">
	<div id="about_us">
 
<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table1">
    	<tr>
        	
            <td width="11%">
             <div id="devtext_name">
             <center>
             ลำดับ.
             </center>  
            </div>       
            </td>
            <td width="24%">
             <div id="devtext_name">ชื่อเมนู</div>        
            </td>
            <td width="50%">
             <div id="devtext_name">รูปแบบ</div>        
            </td>
            <td width="15%">
             <div id="devtext_name">จัดการ</div>
            </td>
        </tr>
<? 
include("../config.inc.php");
$action_menu=$_GET['action_menu'];
if($action_menu=="edit"){
$main_menu_id=$_GET['main_menu_id'];
$strSQL="select * from main_menu where main_menu_id=$main_menu_id";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
$menu_detail_edit=$rs[menu_detail];
$main_menu_name_edit=$rs[main_menu_name];
$main_menu_link_edit=$rs[main_menu_link];
$main_menu_detail_edit=$rs[main_menu_detail];
$main_menu_id=$rs[main_menu_id];
$action_menu="edit";
$http="";
}else{
	$action_menu="add";
	$http="http://";
}
$strSQL="select * from main_menu";
$result=mysql_query($strSQL);
$i=1;
while($rs=mysql_fetch_array($result)){
$menu_detail=$rs[main_menu_detail];
$menu_name=$rs[main_menu_name];
$menu_del_id=$rs[main_menu_id];
$menu_link=$rs[main_menu_link];
$menu_plugin=$rs[plugin];
$action_menu_del="del";
?>	
<tr>
	<td>
   <center> <?=$i?>
   </center>
    </td>
    <td>
 
     <?
        if(strlen($menu_name)>30){
		$menu_name=mb_substr($menu_name,0,30,"UTF-8")."...";
		}else{
		$menu_name=$menu_name;
		}
		echo"$menu_name";
		?>
    </td>
    <td>
    
   
    <?
	
	/*if($menu_detail==""){
        if(strlen($menu_detail)>30){
		$menu_detail=mb_substr($menu_detail,0,30,"UTF-8")."...";
		}else{
		$menu_detail=$menu_detail;
		}
		if($menu_link!="http://www."){echo"ลิงไปที่เว็บไซต์ $menu_link";}
		
	}else{
	echo"$menu_detail";
	}*/
	
	if($menu_detail !=""){
		if(strlen($menu_detail)>30){
		$menu_detail=mb_substr($menu_detail,0,30,"UTF-8")."...";
		}else{
		$menu_detail=$menu_detail;
		}
		echo"$menu_detail";
		
	}else if($menu_plugin !=""){
		echo"$menu_plugin";
	}else{
		echo"ลิงไปที่เว็บไซต์ $menu_link";
	}
	?>
    </td>
    <td>
    
<a onClick="GetResult('action_menu_system.php?action_menu_del=<?=$action_menu_del?>&menu_del_id=<?=$menu_del_id?>&')" href="#">
<img src="../images_system/b_drop.png" border="0" />
</a>


    &nbsp;
    
    <a href="index.php?page=menu_system&action_menu=edit&main_menu_id=<?=$menu_del_id?>">
    <img src="../images_system/b_edit.png"  border="0"/>
    </a>
    </td>
</tr>
<?
$i++;
}
?>
</table>
<br style="clear:both" />
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table border="0" cellpadding="2" cellspacing="2" width="600">
    	
        <tr>
        	<td width="600">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	<b>ชื่อเมนู</b>
            </td>
        </tr>
        <tr>
            <td>
           
            
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <input type="text" name="menu_name" value="<?=$main_menu_name_edit?>" />
            </td>
        </tr>
        <tr>
            	<td>
               <!-- <input type="radio" value="internal"  name="select_type_menu"/>-->
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ลิงค์ไปเว็บอื่นๆตัวอย่างเช่น http://www.google.com
                </td>
          </tr>
            <td>
             
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="menu_link" value="<?=$http?><?=$main_menu_link_edit?>" style="color:#999; width:200px; background-color:#FFC;"  />
            
           
            
             
            </td>
        </tr>
         <tr>
            <td>
           <!-- <input type="radio" value="external"  name="select_type_menu"/>-->
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  ส่วนสริม(Plugin)
            
           
            
             
            </td>
        </tr>
         <tr>
            <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          <select name="plugin">
          <option value="">
            เลือกส่วนเสริม
            </option>
          	<option value="index.php?page=product">
            Product
            </option>
            <option  value="#">
            Hotel
            </option>
            <option  value="#">
            Map
            </option>
            <option  value="article">
            บทความ
            </option>
          </select>
            
           
            
             
            </td>
        </tr>
        <tr>
        	<td>
            <br>
            </td>
        </tr>
          
      
        
            <tr>
            	
                <td>
                <input type="hidden" value="<?=$action_menu?>" name="action_menu" />
                <input type="hidden" value="<?=$main_menu_id?>"  name="main_menu_id"/>
                <input type="button" name="Button" value="Save" onclick="doajax()" />
                <!--<input type="reset" value="Reset"/>-->
                <?
				if($action_menu==edit){
				?>
                <input type="button" name="Button" value="Go to Add" onclick="window.location.href='index.php?page=menu_system'" />
                <? 
				}
				?>
                </td>
            </tr>
        </tr>
    </table>
    
    </form>
    </div>
</div>
<p id="resultArea"></p>
<div id="resultArea1"></div>
<div id="resultArea"></div>
<div id="imgLoading" style="display:none;"><img src="../ajax/pic_indecator/ajax-loader.gif"></div>

<p id="myplace"></p>
</body>
</html>