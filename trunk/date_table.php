<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
div.holder{
	position:relative;
	font-family:tahoma, "Microsoft Sans Serif", Vanessa;
	border:2px solid #999;
	float:left;
	font-size:12px;
	width:175px;
	padding:5px;
}
div.month{
	position:relative;
	display:block;
	height:18px;
	width:100%;
	float:left;
	left:0;
	top:0;
	background:#567; 
	color:#fff; 
	border-bottom:2px solid #89a;
	text-align:center;
}
div.wkday{
	position:relative;
	clear:both;
	float:left;
	height:18px;
	display:block;
	width:100%;
	background:#567; 
	color:#fff; 
	border-bottom:3px solid #234;
}
div.wkday span{
	display:block;
	float:left;
	width:25px;
	text-align:center;	
}
div.box_day {
	position:relative;
	width:100%;
	clear:both;
	float:left;	
	background:#EEEEEE; 
	color:#000;
	word-spacing:8px;
	text-indent:3px;
	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$thai_month_arr=array(   
    "0"=>"",   
    "1"=>"มกราคม",   
    "2"=>"กุมภาพันธ์",   
    "3"=>"มีนาคม",   
    "4"=>"เมษายน",   
    "5"=>"พฤษภาคม",   
    "6"=>"มิถุนายน",    
    "7"=>"กรกฎาคม",   
    "8"=>"สิงหาคม",   
    "9"=>"กันยายน",   
    "10"=>"ตุลาคม",   
    "11"=>"พฤศจิกายน",   
    "12"=>"ธันวาคม"                     
);
//$now_month="2008-11-01";
$now_month=date("Y-m-01");
$mk_time=strtotime($now_month);
$day_no=date("t",$mk_time);
$wan_no=date("w",$mk_time);
$box_day=$day_no+$wan_no;
$rows_week=ceil($box_day/7);
$total_box=$rows_week*7;
function get_day($no_day,$wan_no,$day_no){
	$wan_tee=$no_day-$wan_no;
	if($wan_tee<=0){
		$wan_tee="__";						
		return $wan_tee;
	}else{
		if($wan_tee<=$day_no){
		return str_pad($wan_tee,2,"0",STR_PAD_LEFT);
		}else{
		return "__";
		}
	}
}
?>
<div class="holder">
<div class="month">
<?=$thai_month_arr[intval(date("m"))]?> <?=date("Y")+543?>
</div>
<div class="wkday">
<span>อา</span>
<span>จ</span>
<span>อ</span>
<span>พ</span>
<span>พฤ</span>
<span>ศ</span>
<span>ส</span>
</div>
<?php for($i=1;$i<=$total_box;$i++){ ?>
<?php if($i%7==1){ echo "<div class='box_day'>"; }?>
  <?=get_day($i,$wan_no,$day_no)?>
<?php if($i%7==0 || $i==$total_box){ echo "</div>n"; }?>
<?php } ?>
</div>
<br style="clear:both;" />
</body>
</html>