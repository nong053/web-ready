<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AJAX Test 02</title>
<script type="text/javascript">
var xmlReq;

function ShowResult(text){
	alert(text);
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
		if(xmlReq.status ==200){
		document.getElementById("resultArea").innerHTML = xmlReq.responseText;
		}
	}
}
</script>

</head>
<?
$test="texzt_get111222";
?>
<input type="button" id="bt1" value="show timer curent" onClick="ShowResult()">
<a onClick="ShowResult('ajax_timer_service.php?test=<?=$test?>&')" href="#">nong</a>
<div id="resultArea1"></div>
<div id="resultArea"></div>
<div id="imgLoading" style="display:none;"><img src="pic_indecator/ajax-loader.gif"></div>


<body>

</body>
</html>
