<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//header("Cache-Control: no-store, no-cache, must-revalidate"); 
//header("Cache-Control: post-check=0, pre-check=0", false); 
if($_POST['name']!=""){
	echo $_POST['name']." ";
}
if($_POST['email']!=""){
	echo $_POST['email'];
}
?>
