<? session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

			<?php 
			
include("config.inc.php");	
$strSQL="select * from counter";
$result = mysql_query($strSQL);
$result1= mysql_fetch_array($result);
$counter=$result1[counter];
$_SESSION['counter'] = $counter;
$num=$_SESSION['counter']; // echo ��Ңͧ conter
$counter_new=$counter+1;
$strSQL2="update counter set counter='$counter_new'";
$result2 =mysql_query($strSQL2);
$time=86400;


			?>
			
			
			
			
			
			<!-- insert program here-->
			<?php 
			$product_all=array();
			$cart=$_SESSION['cart'];
			$i=1;
			foreach($cart as $productID=>$qty){
			$strSQL="select * from product where product_id=$productID";
			$result=mysql_query($strSQL);
			$rs=mysql_fetch_array($result);
		
				
				$product_all[$i]=$rs[product_name];
				
			

			
			$i++;
			}
		 	
			
			?>
			
			
		
		
		
	
		
	
	
	
			<?php
			$price=$_SESSION['total_price'];
			if($price>=500){
			$price_delevery=50;
			}else{
			$price_delevery=0;
			}
			/*echo"$price_delevery&nbsp;&nbsp;�ҷ";*/
			?>
			
			<?php
			
			$tax=$price*0.07;
			/*echo"$tax&nbsp;�ҷ";*/
			?>
			
			<?php
			$total_price=$tax+$price+$price_delevery;
			/*echo"$total_price&nbsp;�ҷ";*/
			?>
			


<? 
$youraccount = "support@workphp.com";
$invoice = "$num";
$price ="$total_price";
$postURL ="http://www.workphp.com/payment.php";
?>
<form name="myform" id="myform" method="post" action="https://www.paysbuy.com/paynow.aspx">
<input type="Hidden" Name="psb" value="psb"/>
<input Type="Hidden" Name="biz" value="<?=$youraccount?>"/>
<input Type="Hidden" Name="inv" value="<?=$invoice?>"/>
<input Type="Hidden" Name="itm" value="<? for($i=1; $i<=count($product_all); $i++ ){
			echo"$product_all[$i],";
			}
			?>"/>
<input Type="Hidden" Name="amt" value="<?=$price?>"/>
<input Type="Hidden" Name="postURL" value="<?=$postURL?>"/>
<input type="image" src="https://www.paysbuy.com/imgs/S_click2buy.gif" border="0" name="submit" alt="Make it easier,PaySbuy - it's fast,free and secure!"/>
</form >
<?
echo "<SCRIPT language='JavaScript'>";
echo "document.myform.submit();";
echo "</SCRIPT>";
?>
<? print "javascript: submitform();"  ?>