<? //session_start(); ob_start();?>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<?
//echo session_id();
//require("class_mysql.php");
//echo"ProductID=".$_GET['ProductID'];
$db = new database();

///echo "pic=".$_GET['Pic'];

//echo"count strProductID".count($_SESSION["strProductID"]);

//============ Check ว่ามีซ้ำแล้วหรือยัง
if($_GET["ProductID"] != "")
{
	
	for($i=0;$i<=count($_SESSION["strProductID"]);$i++)
	{
			if($_SESSION["strProductID"][$i] == $_GET["ProductID"])
			{
			header("location:index.php?page=cart");
			exit();//้ามี id ที่ตรงกันไม่ต้องทำอะรัย ภ้ายังไม่มี  id นี้ก็ให้ทำงานต่อ
			}
	}
}
//============ ถ้ามีการเลือกรายการสินค้าให้เก็บลง Session
if(trim($_GET["ProductID"]) != "")
{
	$_SESSION["strP"]=$_SESSION["strP"]+1;
	$_SESSION["strProductID"][$_SESSION[strP]]=$_GET["ProductID"];
	$_SESSION["strProductPIC"][$_SESSION[strP]]=$_GET["Pic"];
	$_SESSION["strQuanlity"][$_SESSION[strP]]=1;
	session_write_close();
	//header("location:$_SERVER[PHP_SELF]");
	header("location:index.php?page=cart");
}	

//============ กรณีลบรายการสั่งซื้อ
if(trim($_GET["action"]) == "Del")
{
	$_SESSION["strProductID"][$_GET[P]]="";
	$_SESSION["strProductPIC"][$_GET[P]]="";
	$_SESSION["strQuanlity"][$_GET[P]]="";
	session_write_close();
	//header("location:$_SERVER[PHP_SELF]");
	header("location:index.php?page=cart");
}	

//============ กรณีการแก้ไขรายการสั่งซื้อ
if(trim($_POST["action"]) == "Update")
{
for($i=0;$i<count($_POST["txtQua"]);$i++)
{	
	$strP=$_POST[txtP][$i];
	$strQ=$_POST["txtQua"][$i];
	
	if($strQ <= 0)
	{
	$strQ=1;
	}
	$_SESSION["strQuanlity"][$strP]=$strQ;
}	
	session_write_close();
	//============ กระโดด Refresh ใหม่อีกรอบ
	//header("location:$_SERVER[PHP_SELF]");
	header("location:index.php?page=cart");
}	
?>		

<form action="" method="post" name="frmCart" id="frmCart">
 <input name="action" type="hidden" id="action" value="Update">
                         <table width="100%" height="21" border="0" align="center" cellpadding="2" cellspacing="1" >
                                  <tr  style="font-weight:bold; color:#FFF; background-color:#333;"> 
                                    <td><div align="center" style="padding:5px;">ลำดับ</div></td>
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
//echo"session".$_SESSION["strProductID"]["$i"];
$result_product = $db->tableSQL("product where product_id='".$_SESSION["strProductID"]["$i"]."'");
$rs_product=mysql_fetch_array($result_product);
$product_title=$rs_product['product_title'];

if($rs_product)
{
	$rows=mysql_num_rows($result_product);
		//echo" rows:$rows";
$strNum++;
								//$bgcolor=($i++%2)?'#ffffff':'#ccc';
								$bgcolor=($i%2)?'#cccccc':'#ffffff';
?>
									
                                  <tr bgcolor="<?=$bgcolor?>"> 
                                    <td width="9%"> <div align="center"> 
                                        <?=$strNum;?>
                                        <a href="javascript:if(confirm('ลบรายการสินค้า')==true){window.location='index.php?page=cart&action=Del&P=<?=$i;?>';}"><img src="images_system/deleteC.gif" width="12" height="11" border="0"></a></div></td>
                                    <td width="48%"> 
                                    <div id="pcicart">
                                       	<div id="productPic" style="float:left;">
                                      		<img src="<?=$_SESSION["strProductPIC"][$i]?>"  border="0" width="100"/>
                                      	</div>
                                        <div id="productName" style="float:left; padding:2px;">
										<b><?=$rs_product["product_name"];?></b>
                                        <div id="product_title" style="width:250px;">
										<?
            								if(strlen($product_title)>70){
											$product_title =mb_substr($product_title,0,70,"UTF-8")."...";
											echo"$product_title";
											}else{
											echo $product_title;
											}
			
										?>
                                        </div>
                                        </div>
                                    </div>
                                      
                                    </td>
                                    <td width="14%"> <div align="right"> 
                                        <?="".number_format($rs_product["product_price"], 2,'.',',');?>
                                      </div></td>
                                    <td width="13%"> 
                                      <div align="right">
                                        <?="".number_format($rs_product["product_send_price"], 2,'.',',');?>
                                      </div></td>
                                    <td width="13%"><div align="center"> 
                                        <input name="txtP[]" type="hidden" id="txtP[]" value="<?=$i;?>">
                                         <input name="txtQua[]" type="text" id="txtQua<?=$strNum;?>" style="width:30px;text-align:right" value="<?=$_SESSION["strQuanlity"]["$i"];?>" maxlength="3" onChange="checknum(this.value,'txtQua<?=$strNum;?>');">
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
                                       <b><?=$strNum;?></b>
                                      </div></td>
                                  </tr>
                                  <tr bgcolor="#FFFFFF"> 
                                    <td> <div align="right">ราคารวม (บาท)</div></td>
                                    <td width="16%"> <div align="right"> 
                                     <b>   <?="".number_format($strTotal, 2,'.',',');?></b>
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
                                  <input name="BtnContinute" type="button" class="button" id="BtnContinute2" value="ซื้อสินค้าต่อ" onClick="window.location='index.php?page=product';">
                                  &nbsp; 
                                  <?
								  if($strNum>0)
								  {?>
                                  <input name="BtnCalu" type="submit" class="button" id="BtnCalu" value="คำนวณเงินใหม่">
                                  &nbsp; 
                                  <input name="BtnPayment" type="button" class="button" id="BtnPayment" value="ชำระเงิน" onClick="window.location='index.php?page=pay'">
                                  <? }?>
                                  <br>
                                </div></td>
                            </tr>
                          </table>
                          <p class="style59">&nbsp;</p>
                        </form>