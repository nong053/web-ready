<? ob_start(); session_start();   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<link href="template/template1/css/index.css" type="text/css" rel="stylesheet"/>-->
<!-- import jquery and jquery ui start-->
<link href="jQueryUI/css/smoothness/jquery-ui-1.8.20.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="jQueryUI/js/jquery-ui-1.8.20.custom.min.js"></script>
<!-- import jquery and jquery ui end-->

 <script type="text/javascript">
	$(document).ready(function(){
		//alert("ok");
		
		$("input[type=button],input[type=submit]").button();
		var productSearch = ['a1','a2','a3'];
		$("#txtSearch").autocomplete({source:productSearch});
	});
	</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? $name_title=$_GET['name_title'];//is name to call title
## ทำการ require เอาclass database;
			include_once("class_mysql.php");
			$db = new database();		
 		## set logo area.
$main_menu_id2=$_GET['main_menu_id'];
if($_GET['page']=="" ){
$result_seo = $db->tableSQL("seo where 	seo_id = 5");
			$rs_seo = mysql_fetch_array($result_seo);
			$object_seo_id=$rs_seo['seo_id'];
			$object_seo_tag1=$rs_seo['seo_tag1'];
			$object_seo_tag2=$rs_seo['seo_tag2'];
			$object_seo_tag3=$rs_seo['seo_tag3'];
			$object_seo_keyword=$rs_seo['seo_keyword'];
?>
			
			<title><?=$object_seo_tag1?> <?=$object_seo_tag2?> <?=$object_seo_tag3?></title>
            <meta name="Description" content="<?=$object_seo_keyword?>" />
            <meta name="KeyWords" content="<?=$object_seo_tag1?>,<?=$object_seo_tag2?>,<?=$object_seo_tag3?>"/>
<?

}
if($main_menu_id2){
	// echo"main_menu_id2$main_menu_id2";
$result_seo = $db->tableSQL("seo where 	seo_position = '$main_menu_id2'");
			$rs_seo = mysql_fetch_array($result_seo);
			$object_seo_id=$rs_seo['seo_id'];
			$object_seo_tag1=$rs_seo['seo_tag1'];
			$object_seo_tag2=$rs_seo['seo_tag2'];
			$object_seo_tag3=$rs_seo['seo_tag3'];
			$object_seo_keyword=$rs_seo['seo_keyword'];
			$seo="yes";
			?>
            <title><?=$object_seo_tag1?> <?=$object_seo_tag2?> <?=$object_seo_tag3?></title>
            <meta name="Description" content="<?=$object_seo_keyword?>" />
            <meta name="KeyWords" content="<?=$object_seo_tag1?>,<?=$object_seo_tag2?>,<?=$object_seo_tag3?>"/>
            
            

 
            <?
}else{
	$seo="no";
	?>
    <title><?=$name_title?></title>
    <?
}

?>
<style>
a{
	color:#00F;}
</style>


<?
	
 		## set logo area.
			$result_logo = $db->tableSQL("object_system where object_position = 'header_logo'");
			$rs_logo = mysql_fetch_array($result_logo);
			$object_name_logo=$rs_logo['object_name'];
			$object_color_logo=$rs_logo['object_color'];
			$object_width_logo=$rs_logo['object_width'];
			$object_height_logo=$rs_logo['object_height'];
			
		## set header area.
			$result_header = $db->tableSQL("object_system where object_position = 'header_bg'");
			$rs_header = mysql_fetch_array($result_header);
			$object_name_header=$rs_header['object_name'];
			$object_color_header=$rs_header['object_color'];
			$object_width_header=$rs_header['object_width'];
			$object_height_header=$rs_header['object_height'];
			
		## set banner area.
		
			$result_banner = $db->tableSQL("object_system where object_position = 'header_banner'");
			$rs_banner = mysql_fetch_array($result_banner);
			$object_name_banner=$rs_banner['object_name'];
			$object_color_banner=$rs_banner['object_color'];
			$object_width_banner=$rs_banner['object_width'];
			$object_height_banner=$rs_banner['object_height'];
			
		## set bg area.
		
			$result_bg = $db->tableSQL("bg_style");
			$rs_bg = mysql_fetch_array($result_bg);
			$bg_name=$rs_bg['bg_name'];
			$bg_repeat=$rs_bg['bg_repeat'];
			$bg_position=$rs_bg['bg_position'];
			$bg_color=$rs_bg['bg_color'];
			$bg_web_color=$rs_bg['bg_web_color'];
			
		## set main button area.
		
			$result_button = $db->tableSQL("button_style");
			$rs_button = mysql_fetch_array($result_button);
			
			$button_bg =$rs_button['button_bg'];
			$button_bg_color=$rs_button['button_bg_color'];
			
			$button =$rs_button['button'];
			$button_color=$rs_button['button_color'];
			
			$button_over=$rs_button['button_over'];
			$button_over_color=$rs_button['button_over_color'];
			
			$button_overed=$rs_button['button_overed'];
			$button_overed_color=$rs_button['button_overed_color'];
			
			$button_font_color=$rs_button['button_font_color'];
	
			$button_font_over_color=$rs_button['button_font_over_color'];
			$button_width=$rs_button['button_width'];
			$button_hieght=$rs_button['button_hieght'];

		## set box area.
		
			$result_box = $db->tableSQL("box_style");
			$rs_box = mysql_fetch_array($result_box);
			$box_header =$rs_box['box_header'];
			$box_header_color =$rs_box['box_header_color'];
			$box_border_color =$rs_box['box_border_color'];
			$box_border_style =$rs_box['box_border_style'];
			$box_color_bg =$rs_box['box_color_bg'];
			$box_color =$rs_box['box_color'];
			$box_color_over =$rs_box['box_color_over'];
			$box_color_overed =$rs_box['box_color_overed'];
			$box_font_color =$rs_box['box_font_color'];
			
			
		## set box content area.
		
			$result_content = $db->tableSQL("content_style");
			$rs_content = mysql_fetch_array($result_content);
			$content_header =$rs_content['content_header'];
			$content_header_color =$rs_content['content_header_color'];
			$content_border_color =$rs_content['content_border_color'];
			$content_border_style =$rs_content['content_border_style'];
			$content_width =$rs_content['content_width'];
			$content_height =$rs_content['content_height'];
			$content_font_color =$rs_content['content_font_color'];
			$content_bg_color =$rs_content['content_bg_color'];
			
		## set footer area.
		
			$result_footer = $db->tableSQL("footer_style");
			$rs_footer = mysql_fetch_array($result_footer);
			$content_width =$rs_content['content_width'];
			
			$footer_bg =$rs_footer['footer_bg'];
			$footer_repeat =$rs_footer['footer_repeat'];
			$footer_color  =$rs_footer['footer_color'];
			
	 ?>
<style>
@charset "utf-8";
/* CSS Document */
body{
	/*background-color:#000;*/
	padding:0px;
	margin:0px;
	font-family:Tahoma, Geneva, sans-serif;
	font-size:13px;
}
#body{
	width:1000px;
	height:auto;
	margin:auto;
	
}
/*header*/
#body #bg_header{
	//background-color:#00F;
	height:150px;
}
#body #bg_header #logo{
	float:left;
	width:200px;
	height:100px;
}
#body #bg_header #top_banner{
	float:right;
	height:100px;
	width:750px;
	margin:5px;
}
/*/header*/

/*top_menu*/
#body #bg_top_menu{
	
	
}
#body #bg_top_menu #top_menu{
}
#body #bg_top_menu #top_menu ul{
	padding:0px;
	margin-top:2px;
	margin-bottom:2px;
	height:auto;
	background-color:<?=$button_bg_color?>;
	background-image:url(object_system/<?=$button_bg?>);
}
#body #bg_top_menu #top_menu ul li{
	list-style:none;
	text-decoration:none;
	width:<?=$button_width?>px;
	height:<?=$button_hieght?>px;
	float:left;
	display:block;
	
	
	
}
#body #bg_top_menu #top_menu ul li a{
	display:block;
	text-align:center;
	color:<?=$button_font_color?>;
	/*background-color:#999;*/
	padding-left:10px;
	padding:7px;
	background-color:<?=$button_color?>;
	background-image:url(object_system/<?=$button?>);
	text-decoration:none;
	font-weight:bold;
	
}
#body #bg_top_menu #top_menu ul li a:hover{
	color:<?=$button_font_over_color?>;
	
	background-color:<?=$button_over_color?>;
	background-image:url(object_system/<?=$button_over?>);

}
#body #bg_top_menu #top_menu ul li a:visited{
	/*color:#FFF;*/
	
	background-color:<?=$button_overed?>;
	background-image:url(object_system/<?=$button_overed_color?>);
	
	

}
/*/top_menu*/

/*content*/
#body #bg_content{
	/*background-color:#FF0;*/
	height:auto;
}

#body #bg_content #bg_box_left{
	width:200px;
	height:auto;
	float:left;

}
#body #bg_content #bg_box_left #box_left{
	padding-left:2px;
	padding-right:2px;
}



#body #bg_content #bg_box_left #box_left #box_top{
	background-color:<?=$box_header_color?>;
	background-image:url(object_system/<?=$box_header?>);
	height:25px;
	color:<?=$box_font_color?>;
	

}
#body #bg_content #bg_box_left #box_left #box_top #b{
	padding-top:5px;
	font-weight:bold;
}
#body #bg_content #bg_box_left #box_left #box_center{
	background-color:<?=$box_color_bg?>;
	border:1px <?=$box_border_color?> <?=$box_border_style?>;
	width:196px;
     
}
#body #bg_content #bg_box_left #box_left #box_center #box_menu ul{
	padding:0px;
	margin:0px;
	height:auto;
}
#body #bg_content #bg_box_left #box_left #box_center #box_menu ul li{
	list-style:none;
	
	
	

}
#body #bg_content #bg_box_left #box_left #box_center #box_menu ul li a{
	background-color:<?=$box_color_bg?>;
	color:#000;
	display:block;
	text-decoration:none;
	padding:5px;
	
	

}
#body #bg_content #bg_box_left #box_left #box_center #box_menu ul li a:hover{
	background-color:<?=$box_color_overed?>;
	color:#000;
	
}



#body #bg_content #bg_box_right{
	float:right;
	width:800px;
	/*background-color:#F0F;*/
}

#body #bg_content #bg_box_right #bg_content{
	padding-left:5px;
	padding-right:5px;
}
#body #bg_content #bg_box_right #bg_content #content{
	
}
#body #bg_content #bg_box_right #bg_content #content #content_top{
	background-color:<?=$content_header_color?>;
	background-image:url(object_system/<?=$content_header?>);
	height:<?=$content_height ?>px;
	width:<?=$content_width?>px;

}
#body #bg_content #bg_box_right #bg_content #content #content_top #b{
	font-weight:bold;
	padding-top:5px;
	color:<?=$content_font_color?>;
	padding-left:5px;
}
#body #bg_content #bg_box_right #bg_content #content #content_center{
	background-color:<?=$content_bg_color?>;
	border: 1px <?=$content_border_color ?> <?=$content_border_style?>;

}

/*/content*/

/*footer*/
#body #bg_footer{
	background-color:<?=$footer_color?>;
	/*height:100px;*/
	height:auto;
	background-image:url(object_system/<?=$footer_bg?>);
	background-repeat:<?=$footer_repeat?>;
}
#body #bg_footer #menu_footer{
	width:800px;
	
	margin:auto;
}

#body #bg_footer #menu_footer ul{
	padding:0px;
	margin:0px;
	height:auto;
	background-color:<?=$button_bg_color?>;
	background-image:url(object_system/<?=$button_bg?>);
}
#body #bg_footer #menu_footer ul li{
	list-style:none;
	text-decoration:none;
	width:<?=$button_width?>px;
	height:<?=$button_hieght?>px;
	
	float:left;
	display:block;
	
}
#body #bg_footer #menu_footer ul li a{
	display:block;
	text-align:center;
	color:<?=$button_font_color?>;
	background-color:<?=$button_color?>;
	background-image:url(object_system/<?=$button?>);
	padding-left:10px;
	padding:5px;
	font-weight:bold;
	text-decoration:none;
	
}
#body #bg_footer #menu_footer ul li a:hover{
	color:<?=$button_font_over_color?>;
	background-color:<?=$button_over_color?>;
	background-image:url(object_system/<?=$button_over?>);
	
}
#autocomplete{
	float:right;
}
#txtSearch{
	height:22px;
	width:150px;
}

/*/footer*/


</style>


</head>

<body style="background-color:<?=$bg_color?>; background-image:url(object_system/<?=$bg_name?>); background-repeat:<?=$bg_repeat?>;">
	
   
    
    
    
	<div id="body" style="background-color:<?=$bg_web_color?>;">
	<?
	if($_SESSION['cus_name']){
	?>
	  <div id="status_user_online" style="font-size:16px; padding:5px; float:left;">คุณ<?=$_SESSION['cus_name']?>กำลังอยู่ในระบบ  </div>
       <div id="status_user_online" style="font-size:16px; padding:5px; float:right;"><input type="button" onclick="window.location='index.php?logout=logout'"  value="ออกจากระบบ"/> </div>
      <br style="clear:both" />
	  <?
	  }
	  if($_GET['logout']){
		  session_destroy();
		  echo"<script>window.location='index.php'</script>";
	  }
	  ?>
     <div id="bg_header" style="background-color:<?=$object_color_header?>; background-image:url(object_system/<?=$object_name_header?>); height:<?=$object_height_header?>px;">
        
   	   <div id="logo">
           
            <img src="object_system/<?=$object_name_logo?>" width="<?=$object_width_logo?>" height="<?=$object_height_logo?>" />
</div>
            <div id="top_banner" style="background-color:<?=$object_color_banner?>;">
            <img src="object_system/<?=$object_name_banner?>" width="<?=$object_width_logo?>" height="<?=$object_height_logo?>" />
            <div id="autocomplete">
            <form action="" >
            	<table>
                	<tr>
                    	<td>
                        <input type="text" id="txtSearch"  name="txtSearch" />
                        </td>
                        <td>
                        <input type="button" id="btnSubmit" name="btnSubmit" value="ค้นหาข้อมูล" />
                        </td>
                    </tr>
                </table>
            </form>
            </div>
            </div>
            
            <br style="clear:both" />
            
        </div>
        <div id="bg_top_menu">
        	<div id="top_menu">
            	<ul>
              <?
                $result_main_menu = $db->tableSQL("main_menu");
				while($rs_main_menu = mysql_fetch_array($result_main_menu)){
              if($rs_main_menu[plugin]=="article"){
				  $link_main__menu="index.php?page=article&main_menu_id=$rs_main_menu[main_menu_id]";
                  }else if($rs_main_menu[plugin]=="article_ge"){
				  	 $link_main__menu="index.php?page=article&main_menu_id=$rs_main_menu[main_menu_id]&article_ge=article_ge";
				  }else if($rs_main_menu[plugin]=="link"){
					 $link_main__menu="$rs_main_menu[main_menu_link]"; 
				  }else{
					 $link_main__menu="$rs_main_menu[plugin]";
				  }
					 
				
				?>
                	<li>
                    
                    	<a href="<?=$link_main__menu?>&name_title=<?=$rs_main_menu[main_menu_name]?>"><?=$rs_main_menu[main_menu_name]?></a>
                    </li>
                    <?
				}
					?>
                    <li style="float:right; width:120px;">
                    <a href="index.php?page=cart">
                    ตระกร้าสินค้า
                    </a>
                    </li>
                    <br style="clear:both" />
                </ul>
               
            </div> 
        </div>
        <div id="bg_content">
        	<div id="bg_box_left">
            	<div id="box_left">
            		<div id="box_top">
                	<div id="b">หมวดสินค้า</div>
                	</div>
                	<div id="box_center">
                		<div id="box_menu">
                        	<ul>
                            <?
							$result_productcat = $db->tableSQL("productcat");
							while($rs_productcat=mysql_fetch_array($result_productcat)){
                            ?>
                            	<li>
                                <a href="index.php?page=product&productcat_id=<?=$rs_productcat[productcat_id]?>&name_title=<?=$rs_productcat[productcat_name]?>"><font style="padding-left:5px;"><?=$rs_productcat[productcat_name]?></font></a>
                                </li>
                            <?
							}
							?>
                               
                            </ul>
                        </div>
                	</div>
                 </div>
                 <br style="clear:both" />
                 
                 <div id="box_left">
            		<div id="box_top">
                	<div id="b">บทความ</div>
                	</div>
                	<div id="box_center">
                    <div id="box_menu">
                    <font >
                		<ul>
                            <?
							$result_main_menu = $db->tableSQL("main_menu where plugin='article_ge'");
							$rs_main_menu2=mysql_fetch_array($result_main_menu);
							$main_menu_id=$rs_main_menu2[main_menu_id];
							$result_article = $db->tableSQL("article where main_menu_id= '$main_menu_id'");
							while($rs_article=mysql_fetch_array($result_article)){
                            ?>
                            	<li>
                                <a href="index.php?page=article&article_id=<?=$rs_article[article_id];?>&name_title=<?=$rs_article[article_name]?>"><font style="padding-left:5px;"><?=$rs_article[article_name];?></font></a>
                                </li>
                            <?
							}
							?>
                            
                           </ul>
                          
            		</font>	
                   </div>
                	</div>
                 </div>
                 <br style="clear:both" />
                 
                 <div id="box_left">
            		<div id="box_top">
                	<div id="b" style="padding-left:5px;">ลงชื่อเข้าใช้งาน</div>
                	</div>
                	<div id="box_center">
                    <font style="padding:5px;">
                   		<!--form_Login-->
		 <form action="login_process.php" method="post">
		 		<div class="menu_content_login">
		 			<div id="menu_content_login_c" style="padding-left:5px;">
					<table border="0" cellpadding="1" cellspacing="0">
					<tr>
						<td>ชื่อผู้ใช้
						</td>
						<td>
						<input type="text" name="user" size="15" /> 
						</td>
					</tr>
					<tr>
						<td>
						รหัสผ่าน&nbsp;
						</td>
						<td>
						<input type="password" name="pass" size="15" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<input type="submit" name="submit" value="ตกลง"  />
						<br><a href="index.php?page=register">สมัครสมาชิก</a><br>
                        <a href="index.php?page=forgot_pass">ลืมรหัสผ่าน</a><br>
                        <?
						if($_SESSION['cus_id']){
							?>
                            <a href="index.php?page=customer_area&select_member=member_add">ข้อมูลสมาชิก</a><br>
                            <a href="index.php?page=customer_area&select_member=payment">แจ้งการชำระเงิน</a><br>
                            <a href="index.php?page=customer_area&select_member=status_order">สถานะการสั่งซื้อ</a><br>
                            <?
						}
						?>
						</td>
					</tr>
					</table> 
		 			</div>
					
		   </div>
		 </form>
		 <!-- form Login-->
            		</font>	
            			
                	</div>
                 </div>
                <br style="clear:both" />
                
                <div id="box_left">
            		<div id="box_top">
                	<div id="b" style="padding-left:5px;">Link ผู้สนันสนุน</div>
                	</div>
                	<div id="box_center">
                    <font style="padding:5px;">
                		<? 
							$result_banner_sum = $db->tableSQL("banner_sum");
							while($rs_banner_sum=mysql_fetch_array($result_banner_sum)){
							if($rs_banner_sum[pic_link]){
							$link_banner=$rs_banner_sum[pic_link];
							}else{
								$pic_id=$rs_banner_sum[pic_id];
								
								
									$link_banner="index.php?page=banner_detail&pic_id=$pic_id&name_title=รายละเอียด";
								
							
							}
							?>
                            
                            <a href="<?=$link_banner?>">
                            <img src="mypicture/<?=$rs_banner_sum[pic_name];?>" width="190" border="0"/>
							</a>
							<?
							}
                            
						?>
            		</font>	
            			
                	</div>
                 </div>
                <br style="clear:both" />
                
                <div id="box_left">
            		<div id="box_top">
                	<div id="b" style="padding-left:5px;">ส่วนเสริม</div>
                	</div>
                	<div id="box_center">
                    <font style="padding:5px;">
                    <?
					
                		$result_plugin_on_web = $db->tableSQL("plugin_on_web");
						while($rs_plugin_on_web=mysql_fetch_array($result_plugin_on_web)){
							
							echo "<font style=\"font-weight:bold;\">".$rs_plugin_on_web[plugin_name]."</font><br>";
                            echo $rs_plugin_on_web[plugin_code];
							echo"<hr>";
                            
							
						}
					?>
            		</font>	
            			
                	</div>
                 </div>
                <br style="clear:both" />
                
            </div>
            
            <div id="bg_box_right">
            	<div id="bg_content">
                	<div id="content">
     <?
	 if($_GET['page']=="" or $_GET['page']=="home"){
	 ?>
     <!-- img slide-->
	<div id="container"></div>
	<script type="text/javascript" src="swfobject.js"></script>
	<script type="text/javascript">
		var s1 = new SWFObject("imagerotator.swf","rotator","785","200","7");
		s1.addParam("allowfullscreen","true");
		s1.addVariable("file","madrid.xml");
		s1.addVariable("width","785");
		s1.addVariable("height","200");
		s1.write("container");
	</script>
	<!-- img slide-->
    <?
	 }
	?>
                    
                    
                    
                    <?
						
						switch($_GET['page']){
							case"product":$require="product.php"; $title_top="สินค้าทั้งหมด";break;
							case"product_detail":$require="product_detail_try.php";$title_top="รายละเอียดของสินค้า";break;
							
							
							
							case"gallery":$require="gallery.php";$title_top="อัลบั้ลรูปภาพ";break;
							case"article":$require="article.php";$title_top="บทความ";break;
							case"banner_detail":$require="banner_detail.php";$title_top="บทความ";break;
							case"home":$require="home.php";break;
							case"webboard":$require="webboard.php";break;
							case"answer":$require="answer.php";break;
							case"new_topic":$require="new_topic.php";break;
							case"contact":$require="contact.php";break;
							case"cart":$require="cart.php";break;
							case"confrim_order":$require="confrim_order.php";break;
							case"register":$require="register.php";break;
							case"forgot_pass":$require="forgot_pass.php";break;
							case"confrim":$require="confrim.php";break;
							case"pay":$require="pay.php";break;
							case"rule":$require="rule.php";break;
							case"payment":$require="payment.php";break;
							case"customer_area":$require="customer_area.php";break;
							
							
							default:$require="home.php";break;
							
						}
					?>
                		<div id="content_top">
                       
                    	<div id="b" style="padding-left:5px; padding-top:9px;"><?=$name_title?></div>
                    	</div>
                    	<div id="content_center">
                    	<font style="padding:5px;">
                		<?
                        require("$require");
						
						?>
            			</font>	
                    	</div>
                    </div>
                    <br style="clear:both" />
                    
                    <!--
                    <div id="content">
                		<div id="content_top">
                    	<div id="b" style="padding-left:5px; padding-top:9px;">top</div>
                    	</div>
                    	<div id="content_center">
                    	<font style="padding:5px;">
                		<br>
            			<br>
            			<br>
            			<br>
            			<br>
            			<br>
            			<br>
            			<br><br>
            			<br>
            			<br>
            			<br>
            			<br>
            		</font>	
                    	</div>
                    </div>
                    -->
                    <br style="clear:both" />
                    
                </div>
            		
            </div>
            <br style="clear:both" />
            content
            
        </div>
        <div id="bg_footer">
        	<div id="menu_footer">
            	<ul>
                	
                  <?
                $result_main_menu = $db->tableSQL("main_menu");
				while($rs_main_menu = mysql_fetch_array($result_main_menu)){
              if($rs_main_menu[plugin]=="article"){
				  $link_main__menu="index.php?page=article&main_menu_id=$rs_main_menu[main_menu_id]";
                  }else if($rs_main_menu[plugin]=="article_ge"){
				  	 $link_main__menu="index.php?page=article&main_menu_id=$rs_main_menu[main_menu_id]&article_ge=article_ge";
				  }else if($rs_main_menu[plugin]=="link"){
					 $link_main__menu="$rs_main_menu[main_menu_link]"; 
				  }else{
					 $link_main__menu="$rs_main_menu[plugin]";
				  }
					 
				?>
                	<li>
                    
                    	<a href="<?=$link_main__menu?>&name_title=<?=$rs_main_menu[main_menu_name]?>"><?=$rs_main_menu[main_menu_name]?></a>
                    </li>
                    <?
				}
					?>
                </ul>
                <br style="clear:both" />
                <br style="clear:both" />
            </div>
        </div>
    </div>
    <?
$total_items=$_SESSION['total_items'];
echo"$total_items";
?>
</body>
</html>
