<?php session_start();
require("../config.inc.php");

if(isset($_GET['logout'])){
	session_destroy();
	header("location:../index.php");
}
/*if(!$_SESSION['admin_name']){//กรณี check การloginของ admin
	header("location:../index.php"); 
}*/

$user_downline=$_SESSION['user_downline'];

//echo"user_downline$user_downline";
if($user_downline){
	echo"user_downline$user_downline";
$strSQL="select * from member_upline where member_user_upline='$user_downline'";
$result=mysql_query($strSQL);
$rs=mysql_fetch_array($result);
$member_id_upline=$rs[member_id_upline];
$member_name_upline=$rs[member_name_upline];
echo"member_id_upline$member_id_upline<br>";
echo"member_name_upline$member_name_upline";
$_SESSION['member_id_upline']=$member_id_upline;
$_SESSION['member_name_upline']=$member_name_upline;

//echo"member_id_upline$member_id_upline";
}
?>
<?php /* ob_start(); session_start();
require("../config.inc.php");

if(isset($_GET['logout'])){
	session_destroy();
	header("location:../index.php");
}
/*if(!$_SESSION['admin_name']){
	header("location:../index.php"); 
}
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../admin/css.css" type="text/css" rel="stylesheet"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
<!--
body,td,th {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
body {
	background:#336699 url(images/bg.jpg) top left repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
p{
	padding-right:10px;
	padding-left:10px;
	margin:0px;
	line-height: 1.6em;
}
#header {
	width:940px;
	margin:auto;
}
#header-l {
	padding:38px 0px 37px 0px;
	font-size:24px;
	font-weight:bold;
	color:#FFFFFF;
	width:50%;
	float:left;
}
#header-r {
	color:#FFFFFF;
	text-align:right;
	padding:43px 0px 43px 0px;
	width:50%;
	float:left;
}
#header-r a {
	text-decoration:none;
	font-weight:bold;
	color:#1a4d80;
}
#header-r a:hover {
	color:#FFFFFF;
	text-decoration:underline;
}
#main {
	width:1000px;
	margin:auto;
	background:#FFFFFF;
	border:#013467 solid 5px;
	padding-bottom:30px;
}
#content-l {
	width:190px;
	float:left;
}
#box {
	margin:5px;
}
#box h2 {
	background:#e6ecf8;
	border-top:1px solid #c5d6e8;
	border-right:1px solid #c5d6e8;
	border-left:1px solid #c5d6e8;
	line-height:135%;
	padding:3px 0px 4px 10px;
	font-weight:bold;
	font-size:14px;
	color:#1a4d80;
	display:block;
	margin:0px;
}
#box #box-content {
	background:#e6ecf8;
	/*border-top:1px solid #dedbd1;*/
	border-right:1px solid #c5d6e8;
	border-left:1px solid #c5d6e8;
	padding-top:5px;
	height:auto;
}

/*นี้คือlINKที่ต้องการ */
#box ul {
	padding:0;
	margin:0px 10px 0px 10px;
	list-style:none;
}

#box ul li a {
	display:block;
	padding:5px 5px 5px 5px;
	text-decoration:none;
	color:#333;
}
#box ul li a:hover {
	/*color:#666;*/
	background:#c5d6e8;
}

/*นี้คือlINKที่ต้องการ */




#box p {
	display:block;
}

#box p a {
	text-decoration:none;
	color:#333;
	display:block;
	padding-top:3px;
	padding-bottom:3px;
	border-bottom:1px dotted #c5d6e8;
}
#box p a:hover {
	color:#666;
	text-decoration:underline;
}
#content-r {
	width:795px;
	float:left;
	/*-moz-border-radius:15px;
	-webkit-border-radius:15px;
	border:#999 2px solid; มุมโค้ง*/
}
#content-main {
	margin:5px;
	
}
#content-main h2 {
	font-size:14px;
	color:#1a4d80;
	display:block;
	margin:0px;
	padding-bottom:10px;
	color:#333;
}
.button { 
	width:auto; 
	border:1px solid #999; 
	background: #fff url(images/input.jpg) left bottom repeat-x;
	padding:3px;
}
.text {
	width:220px; 
	border:1px solid #dedede;
	padding:2px 5px;
	background: #fff url(images/input.jpg) left top repeat-x;
}
.page {
	text-decoration:none;
	padding:2px 5px 2px 5px;
	border:#333 solid 1px;
	color:#333;
	font-weight:normal;
}
.page2 {
	text-decoration:none;
	padding:2px 5px 2px 5px;
	color:#333;
}
-->
</style>


<link rel="stylesheet" href="sexylightbox.css" type="text/css" media="all" />
<script type="text/javascript" src="js/slide_menu.js"></script>
<script src="mootools.js" type="text/javascript"></script>
<script src="sexylightbox.packed.js" type="text/javascript"></script>
<script type="text/javascript">
  window.addEvent('domready', function(){
    new SexyLightBox();
    new SexyLightBox({find:'sexywhite',color:'white', OverlayStyles:{'background-color':'#000'}});
  });
</script>



</head>
<body>
<div id="header">
	<div id="header-l">
	  Back Office System</div>
	<div id="header-r">
		ยินดีต้อนรับ, <img src="images/details.gif" width="16" height="16" border="0" align="absbottom" /> <strong>
		<?php
		if($_SESSION['admin_name']){
		?>
		<?=$_SESSION['admin_name']?> <?=$_SESSION['admin_surname']?>
        <?
		}else{
		?>
        <?=$_SESSION['member_name_upline']?>
        <?
		}
		?>
        </strong> <img src="images/logout.gif" width="16" height="16" border="0" align="absbottom" /> <a href="index.php?logout">ออกจากระบบ</a>	</div>
	<br style="clear:both;" />
</div>
<br style="clear:both;" />
<div id="main">
<div id="content-l">
  <div id="box">
		<h2>เมนูหลัก</h2>
		<div id="box-content">
			<ul>
            <?
			if($_SESSION['member_name_upline']){//ถ้าloginเข้ามาในระบบโดย downline ให้มองเห็นเฉพาะckeck downline	
			$default_page="mlm_system.php";//default page
			?>
            <li><a href="index.php?page=mlm_system"><img src="iFile.png" border="0" align="absbottom" /> ธุรกิจเครื่อข่าย</a></li>
            <? 
			}else{
			$default_page="select.php";//default page
			?>
         		  <li><a href="index.php?page=select"><img src="images/pic_small/Settings.png"  border="0" align="absbottom" /> เลือกรายการ</a></li>
            	 <li><a href="index.php?page=home"><img src="images/clientarea.gif" border="0" align="absbottom" /> หน้าแรก</a></li>
				
                
                
                <li><a href="index.php?page=menu_system"><img src="images/pic_small/Macristocracy.png" border="0" align="absbottom" /> จัดการเมนู</a></li>
                <li><a href="index.php?page=layout_system"><img src="images/pic_small/BeejiveIM_alt2.png" border="0" align="absbottom" /> รูปแบบการแสดงผล</a></li>
                
                <li><a href="index.php?page=article_system"><img src="images/pic_small/BeejiveIM_alt2.png" border="0" align="absbottom" /> บทความ</a></li>
                
                 
                
                <li><a href="index.php?page=web_directory"><img src="images/pic_small/Safari.png" border="0" align="absbottom" /> บัญชีเว็บไชต์</a></li>
                
                <li><a href="index.php?page=Knowledge"><img src="images/announcement.gif" border="0" align="absbottom" />	คลังความรู้</a></li>
               <!--<li><a href="index.php?page=begin"><img src="images/clientarea.gif" border="0" align="absbottom" /> เริ่มธุกิจ</a></li>-->
               <!--<li><a href="index.php?page=plan"><img src="images/clientarea.gif" border="0" align="absbottom" /> แผนการตลาด</a></li>-->
                <li><a href="index.php?page=about"><img src="images/details.gif" border="0" align="absbottom" /> เกี่ยวกับเรา</a></li>
                
				<!--<li><a href="index.php?page=productcat"><img src="images/clientarea.gif" border="0" align="absbottom" /> ทัวร์ประเทศต่างๆ</a></li>-->
                
               <!-- <li><a href="index.php?page=product_detail"><img src="images/clientarea.gif" border="0" align="absbottom" /> รายละเอียดสินค้า</a></li>
                
                <li><a href="index.php?page=promote"><img src="images/clientarea.gif" border="0" align="absbottom" /> ประชาสัมพันธ์</a></li>-->
                <!--
                <li><a href="index.php?page=run"><img src="images/clientarea.gif" border="0" align="absbottom" /> ตัววิ่ง</a></li>-->
                
                <li><a href="index.php?page=catmyvdo"><img src="images/downloads.gif" width="16" height="16" border="0" align="absbottom" /> วีดีโอ</a></li>
                
				<li><a href="index.php?page=contact"><img src="images/submit-ticket.gif" width="16" height="16" border="0" align="absbottom" /> ติดต่อเรา</a></li>
				<li><a href="index.php?page=admin"><img src="images/support.gif" width="16" height="16" border="0" align="absbottom" /> ผู้ดูแลระบบ</a></li>
				<!--<li><a href="#"><img src="images/logout.gif" width="16" height="16" border="0" align="absbottom" /> เกี่ยวกับเรา</a></li>
                
				<li><a href="index.php?page=order_checker"><img src="images/knowledgebase.gif" width="16" height="16" border="0" align="absbottom" />ตรวจสอบการสั่งซื้อ</a></li>-->
                
               
               <!-- <li><a href="index.php?page=downline"><img src="images/knowledgebase.gif" width="16" height="16" border="0" align="absbottom" />ตรวจสอบสายงาน</a></li>-->
                
                 <li><a href="index.php?page=banner"><img src="images/order.gif" width="16" height="16" border="0" align="absbottom" />ฺ Banner</a></li>
                 <li><a href="index.php?page=tour"><img  src="images/announcement.gif" width="16" height="16" border="0" align="absbottom" /> ทัวร์ท่องเที่ยว</a></li>
                  <li><a href="index.php?page=webbord"><img src="images/knowledgebase.gif" width="16" height="16" border="0" align="absbottom" /> จัดการเว็บบอร์ด</a></li>
                  <li><a href="index.php?page=picturecat"><img src="images/Maps_alt.png" border="0" align="absbottom" /> อัลบั้ลรูปภาพ</a></li>
                  
                  <li><a href="index.php?page=horoscope"><img src="images/iFile.png" border="0" align="absbottom" /> ระบบดูดวง</a></li>
                  
                  <li><a href="index.php?page=ecommerce_system"><img src="images/iPod_alt.png" border="0" align="absbottom" /> ร้านค้าออนไลน์</a></li>
                  
                   <li><a href="index.php?page=mlm_system"><img src="iFile.png" border="0" align="absbottom" /> ธุรกิจเครื่อข่าย</a></li>
                  
                	 <li><a href="index.php?page=hotel_system"><img src="images/Phone.png" border="0" align="absbottom" /> ระบบจองโรงแรม</a></li>
                     
                     <li><a href="index.php?page=member_system"><img src="images/BeejiveIM_Dalt2.png" border="0" align="absbottom" /> ระบบสมาชิก</a></li>
                     
                     <li><a href="index.php?page=news_system"><img src="images/CamDera.png" border="0" align="absbottom" /> ระบบข่าวสาร(Rss)</a></li>
                     
                     <li><a href="#"><img src="images/Photos.png" border="0" align="absbottom" /> ระบบตกแต่งเว็บ</a></li>
                     
                     <li><a href="#"><img src="images/pic_small/YouTube.png" border="0" align="absbottom" /> ระบบทีวีออนไลน์</a></li>
                     
                     <li><a href="#"><img src="images/pic_small/iPod.png" border="0" align="absbottom" /> ระบบวิทยุออนไลน์</a></li>
                     
                      <li><a href="index.php?page=seo_system"><img src="images/pic_small/Things.png" border="0" align="absbottom" /> ระบบโปรโมทเว็บ(SEO)</a></li>
                      
                       <li><a href="index.php?page=job_system"><img src="images/pic_small/Settings.png" border="0" align="absbottom" /> สมัครงาน</a></li>
						<? }?> <!--ถ้าloginเข้ามาในระบบโดย downline ให้มองเห็นเฉพาะckeck downline-->
			</ul>
            <br style="clear:both" />
		</div>
		<div id="box-footer"></div>
	</div>
</div>
<div id="content-r">
	<div id="content-main">
	   <?
		switch($_GET['page']){
			
			case 'picturecat':
				include("picturecat.php");
				break;
			case 'picture':
				include("picture.php");
				break;
			case 'horoscope':
				include("horoscope.php");
				break;
				
			case 'ecommerce_system':
				include("ecommerce_system.php");
				break;
			case 'product_check_status':
				include("product_check_status.php");
				break;	
				
			case 'member_system':
				include("member_system.php");
				break;
			case 'news_system':
				include("news_system.php");
				break;
				
			case 'webbord':
				include("webbord.php");
				break;
			
			case 'answer':
				include("answer.php");
				break;
			case 'order_checker':
				include("order_checker.php");
				break;	
			case 'order_detail_checker':
				include("order_checker_detail.php");
				break;	
			case 'customer_detail':
				include("customer_detail.php");
				break;	
			case 'order_status':
				include("order_status.php");
				break;
			case 'order_status':
				include("order_status.php");
				break;
			case 'tour':
				include("tour.php");
				break;
			case 'banner':
				include("banner.php");
				break;
				
			case 'myvdo':
				include("myvdo.php");
				break;
				
			case 'catmyvdo':
				include("catmyvdo.php");
				break;

			case 'about':
				include("about.php");
				break;
				
			case 'contact':
				include("contact.php");
				break;
				
			case 'Knowledge':
				include("Knowledge.php");
				break;
				
			case 'admin':
				include("admin.php");
				break;
				
			case 'home':
				include("home.php");
				break;
				
			case 'web_directory':
				include("web_directory.php");
				break;
			case 'mlm_system':
				include("mlm_system.php");
				break;
				
			case 'menu_system':
				include("menu_system.php");
				break;
			case 'article_system':
				include("article_system.php");
				break;
			case 'job_system':
				include("job_system.php");
				break;
			case 'seo_system':
				include("seo_system.php");
				break;
			case 'hotel_system':
				include("hotel_system.php");
				break;
			
			case 'layout_system':
				include("layout_system.php");
				break;	
				
			default:
				include("$default_page");
				break;
				
		}	
	?>
    
	</div>
</div>
<br style="clear:both;" />
</div>

</body>
</html>
