<style>
#devbord a{
	color:#000;
}
#devtext{
	width:auto;
	height:auto;
	padding:5px;
	border:#CCC 0px solid;
	
	color:#FFF;
	font-weight:bold;
	margin:0px;
	font-size:13px;
	
}
#title{
		
	border-bottom:#5E88A3 0.2em solid;
	height:50px;
	color:#5E88A3;
	font-weight:bold;
	font-size:13px;
	padding-top:0PX;

	}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/webbord.css" rel="stylesheet" type="text/css" />

<title>เว็บบอร์ด</title>
<div id="devbord" style="padding-left:5px;">

        <a href="index.php?page=new_topic">ตั้งกระทู้ถาม</a>
        
       
        
   
   <table width="100%" border="0" cellpadding="0" cellspacing="0" style="font-family: Arial,Helvetica,sans-serif;
font-size:13px;">
    	<tr style="font-weight:bold; background-color:#333; color:#FFF; height:25px; border:#CCC 1px solid; ">
      
        	<td width="104">
            <div id="devtext">
            <center>
              ลำดับ
            </center>
            </div>
            </td>
            <td width="372">
            <div id="devtext">
            หัวข้อ
            </div>
            </td>
            <td width="262">
            <div id="devtext">
            เวลา
            </div>
            </td>
            <td width="327">
            <div id="devtext">
            ตั้งคำถามโดบ
            </div>
            </td>
            <td width="236">
            <div id="devtext">
            <center>ตอบ</center>
            </div>
            </td>
        </tr>
        
       
       
       <?php 
	   
	   include("config.inc.php");
	  
	   include("webbord_split.php");
	   
	   $strSQL="select * from topic order by topic_update desc";
	   //$result=mysql_query($strSQL);
	   $result=pu_query($dbname,$strSQL);
	   $j=1;
	   while($rs=mysql_fetch_array($result)){
		  
		$strSQL2="select * from answer where topic_id=$rs[topic_id] ";
		$result2=mysql_query("$strSQL2");
		$num = mysql_num_rows($result2);
		$bgcolor=($i++%2)?'#ffffff':'#CCCCCC';
	   ?>
        <tr bgcolor="<?=$bgcolor?>">
       
          
         	<td>
            <div id="txt" style="padding:2px;">
            <center><?=$j?></center>
            </div>
            </td>
            
            <td>
            <div id="create017_divtable" style="width:297px;">
            <a href="index.php?page=answer&topic_id=<?=$rs[topic_id]?>">
            <?php 
			
			if(strlen($rs[topic_subject])>80){
				$topic_subject=mb_substr($rs[topic_subject],0,80,"UTF-8")."...";
				echo"$topic_subject";
			}else{
				echo"$rs[topic_subject]";
			}
			?>
            </a>
            </div>
            </td>
            
            <td>
            <?=$rs[topic_update]?>
            </td>
            
            <td>
            <?=$rs[topic_name]?>
            </td>
            
            <td>
            <center>
            <?php //จำนวนคนตอบ
			/*$strSQL3="select * from answer";
			$result=mysql_query($strSQL3);
			$num=mysql_num_rows($result);
			echo"$num";*/
			echo" $num";
			?>
            </center>
            </td>
        </tr>
       <?php
	   $j++;
	   }
	   
	   ?>
    </table>
    <?php 
	
	pu_pageloop();
	?>
</div>