<html>
	<header>
    	<meta http-equiv="content-type" content="text/html charset=utf-8;">
    	<title>Product List</title>
    </header>
    <body>
    	<?
		require("class_mysql.php");
		$db = new database();
		$result = $db->tableSQL("product");
		
		?>
        <table>
        	<thead bgcolor="#FFFFCC">
            	<tr>
                	<th>
                    ลำดับ
                    </th>
                    <th>
                    ชื่อสินค้า
                    </th>
                    <th>
                    ราคาสินค้า
                    </th>
                    <th>
                    สั่งชื้อ
                    </th>
                </tr>
            </thead>
            <tbody>
            <?
				$i=1;
				while($rs=mysql_fetch_array($result)){
					
				
			?>
            	<tr>
                	<td>
                    <?=$i?>
                    </td>
                    <td>
                    <?=$rs[product_name];?>
                    </td>
                    <td>
                    <?=$rs[product_price]?>
                    </td>
                    <td>
                    <a href="cart_nong.php?ProductID=<?=$rs[product_id]?>">
                    สั่งซื้อ
                    </a>
                    </td>
                </tr>
                <?
				$i++;
				}
				?>
            </tbody>
           </table>
        </table>
    </body>
</html>