<!-- -->
<style type="text/css">
 #dev_picturetext{
	 padding:5px;
	 background-color:#09C;
	 color:#FFF;
	 font-size:15px;
	 
	 font-weight:bold;
 }
  #dev_picturetext2{
	 padding:5px;
	 font-size:14px;
	 font-weight:bold;
	 float:left;
	 width:130px;
 }
 #dev_check{
	 border:#CCC dotted 1px;
	 float:left;
	 width:auto;
	 padding:5px;
	 padding-left:20px;
	 padding-right:20px;
	 -moz-border-radius:5px;
	-webkit-border-radius:15px;
	 
	 
 }
 #dev_picturelink a{
	 color:#000;
	 text-decoration:none;
 }
 #dev_submit{
	 padding:5px;
	 border:#999 1px solid;
 }
 #dev_title{
	border:#09C 5px solid;
	background-color:#09F;
	-moz-border-radius:5px;
	-webkit-border-radius:15px;
	padding:5px;
	color:#FFF;
	font-weight:bold;
}
-->
</style>
<? //session_start(); ob_start(); require("class_mysql.php");?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<?


$db = new database();

$cus_id=$_SESSION['cus_id'];
//echo"cus_id$cus_id<br>";
//echo session_id();
$result_customer = $db->tableSQL("customer where cus_id='$cus_id'");
$rs = mysql_fetch_array($result_customer);

//echo"ยืนยันการสั่งซื้อ";


if($_POST['BtnPayment']){
	echo"hello my payment";

	echo"order_sumprice$order_sumprice<br>";
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

	
	
	
		
	// loop while for management
	//============ ทำการแสงรายการที่ได้เลือกว่ามีกี่รายการ

//$strNum=0;
//$strTotal=0;

for($i=0;$i<=count($_SESSION["strProductID"]);$i++)
{
//============ เลือกว่ารายการสินค้าใดบ้าง
$result_product = $db->tableSQL("product where product_id='".$_SESSION["strProductID"]["$i"]."'");
$rs_product=mysql_fetch_array($result_product);
if($rs_product)
{
$strNum++;							

               echo"strNum". $strNum;//number-->
			   echo"product_id$product_id".$product_id=$rs_product["product_id"];//<!--prodcu name-->
               echo"product_name". $rs_product["product_name"];//<!--prodcu name-->
               echo"product_price". number_format($rs_product["product_price"], 2,'.',',');//<!-- price-->
               echo"product_send_price". number_format($rs_product["product_send_price"], 2,'.',',');//<!--value send price-->
                echo"<br>strQuanlity------------------$strQuanlity<br>";$strQuanlity=$_SESSION["strQuanlity"]["$i"];//<!-- quanlity-->
				
                number_format(($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"], 2,'.',',');//<!-- sum price send-->
              echo"<br>srttotal".$strTotal=$strTotal+(($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"]);// sum price 
				
				$strSQL_order_detail="insert into 
order_detail(order_detail_amount 	,order_detail_cost,product_id,order_id)values('$strQuanlity','$strTotal','$product_id','$num_run')";
	$result_order_detail=mysql_query($strSQL_order_detail);
	if(!$result_order_detail){
		echo"error result_order_detail".mysql_error();
	}
				
}
}

                              
    $strNum;//<!-- quanlity product-->
    $order_sumprice=number_format($strTotal, 2,'.',',');//<!-- sum price -->
	echo"<br>order_sumprice$order_sumprice<br>";
	$strSQL_cus_order="insert into 	cus_order(order_id,order_date,order_status,order_sumprice,cus_id)values('$num_run','$order_date','$order_status','$order_sumprice','$cus_id')";
	$cus_order=mysql_query($strSQL_cus_order);
	if(!$cus_order){
		echo"error cus_order".mysql_error();
	}
				  
	
	
	
	
?>
ใบสั่งซื้อเลขที่:&nbsp;<?=$num_run?>	
<? }?>					

<form action="process_confrim.php" method="post" name="frmCart" id="frmCart">
                         <table width="100%" height="21" border="0" align="center" cellpadding="2" cellspacing="1" >
                                  <tr  style="font-weight:bold; color:#FFF; background-color:#333;"> 
                                    <td><div align="center">ลำดับ</div></td>
                                    <td>ชื่อสินค้า</td>
                                    <td><div align="center">ราคา</div></td>
                                    <td>ค่าจัดส่ง</td>
                                    <td><div align="center">จำนวน</div></td>
                                    <td><div align="center">รวม</div></td>
                                  </tr>
                                  <?

//============ ทำการแสงรายการที่ได้เลือกว่ามีกี่รายการ

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
								$bgcolor=($i%2)?'#cccccc':'#ffffff';
?>
									
                                  <tr bgcolor="<?=$bgcolor?>"> 
                                    <td width="9%"> <div align="center"> 
                                        <?=$strNum;?>
                                       </div></td>
                                    <td width="48%"> 
                                      <?=$rs_product["product_name"];?>
                                    </td>
                                    <td width="14%"> <div align="right"> 
                                        <?="".number_format($rs_product["product_price"], 2,'.',',');?>
                                      </div></td>
                                    <td width="13%"> 
                                      <div align="right">
                                        <?="".number_format($rs_product["product_send_price"], 2,'.',',');?>
                                      </div></td>
                                    <td width="13%"><div align="center"> 
                                        <?=$_SESSION["strQuanlity"]["$i"];?>
                                      </div></td>
                                    <td width="16%"> <div align="right"> 
                                        <?="".number_format(($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"], 2,'.',',');?>
                                      </div></td>
                                  </tr>
                                  <?
								  $strTotal=$strTotal+(($rs_product["product_price"]+$result_product["product_send_price"])*$_SESSION["strQuanlity"]["$i"]);
}
}
?>
                                </table>
                                <br> <table width="98%" height="21" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#666666">
                                  <tr bgcolor="#FFFFFF"> 
                                    <td><div align="right">จำนวน (รายการ)</div></td>
                                    <td> <div align="right"> 
                                        <?=$strNum;?>
                                      </div></td>
                                  </tr>
                                  <tr bgcolor="#FFFFFF"> 
                                    <td> <div align="right">ราคารวม (บาท)</div></td>
                                    <td width="16%"> <div align="right"> 
                                        <?="".number_format($strTotal, 2,'.',',');?>
                                      </div></td>
                                  </tr>
                                </table></td>
                            </tr>
                            <tr> 
                              <td width="378"><div align="center"><br>
                                     <?
							if($strNum==0)
							{
							echo "<br><center><strong><font color=red>ไม่มีรายการสั่งซื้อ</font></strong></center><br><br>";
							}
							?>
                                          <input name="BtnContinute" type="button" class="button" id="BtnContinute" value="กลับไปแก้ไข" onClick="window.location='index.php?page=cart';">
                                          &nbsp; 
                                          <?
								  if($strNum>0)
								  $order_sumprice=number_format($strTotal, 2,'.',',');
								  {?>
                                          &nbsp; 
                                         
                                          
                                          <input type="hidden" name="order_sumprice" value="<?=$order_sumprice?>" />
                                         
                                          <input name="BtnPayment" type="submit" class="button" id="BtnPayment" value="ยืนยันการสั่งซื้อ">
                                          <? }?>
                                  <br>
                                </div></td>
                            </tr>
                          </table>
                          <p class="style59">&nbsp;</p>
                        </form>

<div id="detail_customer">
</div>






<div id="dev_title">
ข้อมูลสมาชิก
</div>

<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    	<td>
        <div id="dev_picturetext2">
        ชื่อ-นามสกุล:
        </div>
        <div id="dev_picturetext2">
        <img src="./member_img/<?=$rs[cus_pic]?>"  border="0" width="100"/><br>
        <?=$rs[cus_fullname];?>
        </div>
        </td>
    </tr>
  
    <tr>
        <td>
        <div id="dev_picturetext2">
        E-mail:
        </div>
        <div id="dev_check">

         <?=$rs[cus_email]?>

        </div>
        </td>
    </tr>
    
    <tr>
        <td>
        <div id="dev_picturetext2">
        บริษัท:
        </div>
        <div id="dev_check">
      
        	 <?=$rs[cus_company]?>

        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        ที่อยู่:
        </div>
        <div id="dev_check">
      
         <?=$rs[cus_address]?>

        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        เบอร์โทร:
        </div>
        <div id="dev_check">

         <?=$rs[cus_tel]?>

        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        แฟกซ์:
        </div>
        <div id="dev_check">

         <?=$rs[cus_fax]?>

        </div>
        </td>
    </tr>
    <tr>
        <td>
        <div id="dev_picturetext2">
        หมายเหตุ:
        </div>
        <div id="dev_check">
 
         <?=$rs[cus_other]?>

        </div>
        </td>
    </tr>
   
</table>
</form>