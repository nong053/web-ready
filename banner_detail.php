
<?
$pic_id=$_GET['pic_id'];
$result_banner_sum = $db->tableSQL("banner_sum where pic_id=$pic_id");
$rs_banner_sum=mysql_fetch_array($result_banner_sum);
$detail_banner=$rs_banner_sum[pic_detail];
echo"<div id=\"banner_detail\" style=\"padding:10px;\">";
echo"$detail_banner";
echo"</div>";
?>
