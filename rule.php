<?
$result_rule=$db->tableSQL("customer_rule");
$rs_rule=mysql_fetch_array($result_rule);
echo $rs_rule[cus_rule_th];

?>
<table>
	<tr>
    	<td>
        <input type="button" value="ยอมรับ" onclick="window.location='index.php?page=register&name_title=สมัครสมาชิก'" />
        </td>
        <td>
        <input type="button" value="ไม่ยอมรับ" onclick="window.location='index.php'" />
        </td>
    </tr>
</table>