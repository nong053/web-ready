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

echo"สั่งซื้อเรียบร้อย";

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
	$_SESSION["strQuanlity"][$_SESSION[strP]]=1;
	session_write_close();
	//header("location:$_SERVER[PHP_SELF]");
	header("location:index.php?page=cart");
}	

//============ กรณีลบรายการสั่งซื้อ
if(trim($_GET["action"]) == "Del")
{
	$_SESSION["strProductID"][$_GET[P]]="";
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
								$bgcolor=($i%2)?'#ccc':'#ffffff';
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
								  {?>
                                          &nbsp; 
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




<?

$cus_id=$_SESSION['cus_id'];
echo"cus_id$cus_id<br>";
echo session_id();
$result_customer = $db->tableSQL("customer where cus_id='$cus_id'");
$rs = mysql_fetch_array($result_customer);
?>

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
        <img src="../member_img/<?=$rs_customer[cus_pic]?>"  border="0" width="100"/><br>
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