<? session_start(); ob_start();
require("config.inc.php");
require("class_mysql.php");
$db = new database();
$cus_id=$_SESSION['cus_id'];
$strSQL="select * from counter";
	$result = mysql_query($strSQL);
	$result1= mysql_fetch_array($result);
	$counter=$result1[counter];
	$_SESSION['counter'] = $counter;
	$num_run=$_SESSION['counter']; // echo ค่าของ conter
	$counter_new=$counter+1;

	$strSQL2="update counter set counter='$counter_new'";
	$result2 =mysql_query($strSQL2);
	$time=86400;
	setcookie("order","$num_run",$time);
	
	$order_date=date("d-m-y:H:i:s");
	$order_status="ยืนยันการสั่งซื้อ";

$strNum=0;
$strTotal=0;

for($i=0;$i<=count($_SESSION["strProductID"]);$i++)
{
//============ เลือกว่ารายการสินค้าใดบ้าง
$result_product = $db->tableSQL("product where product_id='".$_SESSION["strProductID"]["$i"]."'");
$rs_product=mysql_fetch_array($result_product);
if($rs_product)
{
$strNum++;
								//$bgcolor=($i++%2)?'#ffffff':'#ccc';
								
?>
									
                                 
                                        <? $strNum;?>
                                       <? $product_id=$rs_product["product_id"];?>
                                      	<? $rs_product["product_name"];?>
                                   
                                        <? number_format($rs_product["product_price"], 2,'.',',');?>
                                     
                                        <? number_format($rs_product["product_send_price"], 2,'.',',');?>
                                    
                                        <? $strQuanlity_success= $_SESSION["strQuanlity"]["$i"];?>
                                    
                                        <? $total_this_product = ($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"];
										echo"total_this_product:$total_this_product";
										?>
                                    
                                  <?
								  $strTotal=$strTotal+(($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"]);
								  echo"<br>";
								  
$strSQL_order_detail="insert into 
order_detail(order_detail_amount 	,order_detail_cost,product_id,order_id)values('$strQuanlity_success','$total_this_product','$product_id','$num_run')";
	$result_order_detail=mysql_query($strSQL_order_detail);
	if(!$result_order_detail){
		echo"error result_order_detail".mysql_error();
	}
}
}

                              
$strNum;
$strTotal_success=number_format($strTotal, 2,'.',',');
                                        
$strSQL_cus_order="insert into 	cus_order(order_id,order_date,order_status,order_sumprice,cus_id)values('$num_run','$order_date','$order_status','$strTotal_success','$cus_id')";
	$cus_order=mysql_query($strSQL_cus_order);
	if(!$cus_order){
		echo"error cus_order".mysql_error();
	}else{
		// delete session $_SESSION["strProductID"]
		//$_SESSION["strProductID"]="";
		//$_SESSION["strQuanlity"]="";
		
	$_SESSION["strP"]="";
	$_SESSION["strProductID"]="";
	$_SESSION["strQuanlity"]="";
	session_write_close();
		
		echo"<meta http-equiv=\"refresh\" content=\"0; URL='index.php?page=home'\">";
	}
?>
                          
                                    
                                         
	
	
    
    
    
    
    
    
    
    
    
    
    
    
