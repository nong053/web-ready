<?
$cus_id=$_SESSION["cus_id"];
$result_order = $db->tableSQL("cus_order where cus_id='$cus_id'");




?>
<?
if($_GET['check_product']=="check_product"){
	$order_id=$_GET['order_id'];
	$result_product = $db->tableSQL("order_detail where order_id='$order_id'");
	
?>
<table>
	<tr>
    	<td>
        ลำดับ
        </td>
        <td>
        สินค้า
        </td>
        <td>
        จำนวน
        </td>
        <td>
        ราคา
        </td>
    </tr>
    <?
	$count_product=1;
	while($rs_product=mysql_fetch_array($result_product)){
		$product_id=$rs_product[product_id];
		$result_product_name = $db->tableSQL("product where product_id='$product_id'");
		$rs_product_name=mysql_fetch_array($result_product_name);
	?>
    <tr>
    	<td>
        <?=$count_product?>
        </td>
        <td>
        <?=$rs_product_name[product_name]?>
        </td>
        <td>
        <?=$rs_product[order_detail_amount]?>
        </td>
        <td>
        <?=$rs_product[order_detail_cost]?>
        </td>
    </tr>
    <?
	$count_product++;
	}
	?>
</table>
<?
}else{
?>
<table>
	<tr>
    	<td>
       <b> ใบสั่งซื้อเลขที่</b>
        </td>
        <td>
       <b> ราคาทั้งหมด</b>
        </td>
        <td>
       <b> วันที่สั่งซื้อ</b>
        </td>
        <td>
       <b> สถานะการสั่งซื้อ</b>
        </td>
	</tr>
    <?
	while($rs_order=mysql_fetch_array($result_order)){
	?>
    <tr>
    	<td>
        <?=$rs_order[order_id]?>
        </td>
        <td>
         <?=$rs_order[order_sumprice]?>
        </td>
        <td>
         <?=$rs_order[order_date]?>
        </td>
        <td>
         <?=$rs_order[order_status]?>
        </td>
        <td>
         <a href="index.php?page=customer_area&select_member=status_order&check_product=check_product&order_id=<?=$rs_order[order_id]?>">รายละเอียด</a>
        </td>
    </tr>
    <?
	}
	?>
    
</table>
<?
}
?>
