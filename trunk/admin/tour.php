﻿<? @session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.bg_admin{
	width:auto;
	height:auto;
}
.bg_admin #box_admin{
	width:795px;
	height:auto;
}
.bg_admin #box_admin #bg_bt_top{
	width:795px;
	background-image:url(../images_system/bg_admin_top_795_44.png);
	height:44px;
}
.bg_admin #box_admin #bg_bt_top #bg_bt{
	width:auto;
	height:auto;
	float:left;
	padding-top:11px;
	padding-left:10px;

}







/*นี้คือlINKที่ต้องการ */
.bg_admin #box_admin #bg_bt_top #bg_bt ul {
	padding:0;
	margin:0px 0px 0px 0px;
	list-style:none;
	
	
	
	
}

.bg_admin #box_admin #bg_bt_top #bg_bt li{
	display:inline;
	background-color:5c9ccc;
	width:auto;
	height:29px;
	float:left;
	margin-left:2px;
	padding-top:0px;
	border-left:#CCC 1px solid;
	border-right:#CCC 1px solid;
	border-top:#CCC 1px solid;
	
	
	
	
}
.bg_admin #box_admin #bg_bt_top #bg_bt li #devtext{
	padding-top:5px;
}

.bg_admin #box_admin #bg_bt_top #bg_bt ul li a {
	display:block;
	padding:0px 15px 0px 15px;
	text-decoration:none;
	color:#000;
	
	height:auto;
	font-weight:bold;
	margin-top:0px;
	
/* มุมโค้ง
	
-moz-border-radius-topleft:15px;
-moz-border-radius-bottomright:15px;
-moz-border-radius-topright:0;
-moz-border-radius-bottomleft:0;
-webkit-border-top-left-radius:15px;
-webkit-border-bottom-right-radius:15px;
-webkit-border-top-right-radius:0;
-webkit-border-bottom-left-radius:0;
*/	
/* มุมโค้ง*/	
}

.bg_admin #box_admin #bg_bt_top #bg_bt ul li a:hover {
	/*color:#666;*/
	background:#FFC;
	padding:0px 15px 0px 15px;
	height:29px;
	float:left;
	display:block;
	
}


/*นี้คือlINKที่ต้องการ */



/* show เมื่อเลือก*/
#select {
	background:#FFF;
	padding:0px 0px 0px 0px;
	height:29px;
	float:left;
	display:block;
	
/*	
	-moz-border-radius-topleft:15px;
-moz-border-radius-bottomright:15px;
-moz-border-radius-topright:0;
-moz-border-radius-bottomleft:0;
-webkit-border-top-left-radius:15px;
-webkit-border-bottom-right-radius:15px;
-webkit-border-top-right-radius:0;
-webkit-border-bottom-left-radius:0;
	
 มุมโค้ง*/	
}

/* show เมื่อเลือก*/


.bg_admin #box_admin #bg_bt_top #bg_bt #bt1{
	background-image:url(../images/bt_170_31.png);
	width:auto;
	height:31px;
	float:left;
}
.bg_admin #box_admin #bg_bt_top #bg_bt #bt2{
	background-image:url(../images/bt2__12_31.png);
	width:12px;
	height:31px;
	float:left;
}
.bg_admin #box_admin #bg_conent{
	background-image:url(../images_system/bg_admin_center_795_2.png);
	width:auto;
	height:auto;
}
.bg_admin #box_admin #bg_conent #contnt{
	padding:5px;
	padding-left:10px;
}
.bg_admin #box_admin #bg_footer{
	background-image:url(../images_system/bg_Admin_foter_795_23.png);
	width:795px;
	height:23px;
}

</style>

<div class="bg_admin">
	<div id="box_admin">
    	<div id="bg_bt_top">
        
        
        
        
        
        <?
		$select_tour=$_GET['select_tour'];
		switch($select_tour){
			case'add_tour' :$select1="select";break;
			case'add_pictour' :$select2="select";break;
			case'show_tour' :$select3="select";break;
			case'edit_tour' :$select4="select";break;
			case'show_order_tour' :$select5="select";break;
			
			default:$select1="select";
			break;
		}
		?>
        
        
        <div id="bg_bt">
        
         	<ul>
            		<li>
                		<div id="<?=$select1?>">
              		 		<a href="index.php?page=tour&select_tour=add_tour">
                            <div id="devmagin" style="margin:5px;">
              			 	เพิ่มทัวร์
                     		</div>
              			 	</a>
                    	 </div>
                 
               		 </li>
                	
                    	
                     <li>
                		<div id="<?=$select2?>">
              		 		<a href="index.php?page=tour&select_tour=add_pictour">
                            <div id="devmagin" style="margin:5px;">
              			 	จัดการรูปภาพ
                     		</div>
              			 	</a>
                    	 </div>
                 
               		 </li>
                     
                     <li>
                		<div id="<?=$select3?>">
              		 		<a href="index.php?page=tour&select_tour=show_tour">
                            <div id="devmagin" style="margin:5px;">
              			  	แสดงข้อมูล
                     		</div>
              			 	</a>
                    	 </div>
                 
               		 </li>
                     
                     <li>
                		<div id="<?=$select4?>">
              		 		<a href="index.php?page=tour&select_tour=edit_tour">
                            <div id="devmagin" style="margin:5px;">
              			 	แก้ไขข้อมูล
                     		</div>
              			 	</a>
                    	 </div>
                 
               		 </li>
                     
                     <li>
                		<div id="<?=$select5?>">
              		 		<a href="index.php?page=tour&select_tour=show_order_tour">
                            <div id="devmagin" style="margin:5px;">
              			 	ข้อมูลการจอง
                     		</div>
              			 	</a>
                    	 </div>
                 
               		 </li>
            		
               
            </ul>
        
        
        
        </div>
        
        
        
        
        
       
            
            
            
            
        </div>
        <div id="bg_conent">
        	<div id="contnt">
        	  
        <?
		
		switch($select_tour){
			case'add_tour' :include("add_tour.php");break;
			case'add_pictour' :include("add_pictour.php");break;
			case'show_tour' : include("show_tour.php");break;
			case'edit_tour' : include("edit_tour.php");break;
			case'show_order_tour' : include("show_order_tour.php");break;
			
			
			default:include("add_tour.php");
			break;
		}
		?>
            </div>
        </div>
        
        <div id="bg_footer">
        </div>
    </div>
</div>