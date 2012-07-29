<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AJAX Test 02</title>
<script type="text/javascript">
var xmlReq;

function ShowResult1(){

	
	if(window.XMLHttpRequest){
		xmlReq = new XMLHttpRequest();
	}else{
		xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlReq.onreadystatechange = callBack;
	
	xmlReq.open("GET","ajax_timer_service.php?page=ttt&" +new Date().getTime(),true);
	xmlReq.send(null);
	
}
function ShowResult2(){

	
	if(window.XMLHttpRequest){
		xmlReq = new XMLHttpRequest();
	}else{
		xmlReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlReq.onreadystatechange = callBack;
	
	xmlReq.open("GET","ajax_timer_service.php?page=ttt&" +new Date().getTime(),true);
	xmlReq.send(null);
	
}
function callBack(){
	if(xmlReq.readyState !=4){
		document.getElementById("resultArea1").innerHTML = "loading...";
		document.getElementById("imgLoading").style.display = '';
	}else{
		document.getElementById("imgLoading").style.display = 'none';
		if(xmlReq.status ==200){
			document.getElementById("resultArea").innerHTML = xmlReq.responseText;
		}
	}
}
</script>

</head>
<input type="button" id="bt1" value="show timer curent" onClick="ShowResult1()">
<?
$page1="ajax_timer_service.php";
?>
<a onClick="ShowResult2()" href="#">nong</a>
<div id="resultArea1"></div>
<div id="resultArea"></div>
<div id="imgLoading" style="display:none;"><img src="images/loading.gif"></div>


<body>

</body>
</html>
