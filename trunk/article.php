<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	#detail_article a{
		color:#00F;
		list-style:none;
		text-decoration:none;
	
	}
	#title{
		font-weight:bold;
	}
	
</style>
<div id="article" style="padding:5px;">
<?php
	$main_menu_id=$_GET['main_menu_id'];
	if($main_menu_id!=""){
		if("article_ge"==$_GET['article_ge']){//ต้องทำการวนลูปข้อมูลออกมาทั้งหมด
			$result_article=$db->tableSQL("article where main_menu_id='$main_menu_id'");
			while($rs_article=mysql_fetch_array($result_article)){
			?>
    		<div id="title">
    		<?=$rs_article[article_name];?>
    		</div>
    		<div id="detail_article" style="padding:5px;">
    		<?
            if(strlen($rs_article[article_title])>100){
				$article=mb_substr($rs_article[article_title],0,100,"UTF-8")."...";
				echo"$article";
				?>
                 <a href="index.php?page=article&article_id=<?=$rs_article[article_id]?>">อ่านเพิ่มเติม</a>
                <?
			}else{
				$article=$rs_article[article_title];
				echo"$article";
			}
			
			?>
            
           
   		 	</div>
            <hr />
            <?
			}
		}else{
			$result_article=$db->tableSQL("article where main_menu_id='$main_menu_id'");
		}
	
	//$rs_article[article_detail];
	$rs_article=mysql_fetch_array($result_article);
	?>
    <div id="title">
    <?=$rs_article[article_name];?>
    </div>
    <div id="detail_article" style="padding:5px;">
    <?=$rs_article[article_detail];?>
    </div>
    <?
    }
	
	
	
	
	
	
	if($_GET['article_id']){
	$article_id = $_GET['article_id'];
	
	
		$result_article=$db->tableSQL("article where article_id='$article_id'");
	//$rs_article[article_detail];
	$rs_article=mysql_fetch_array($result_article);
	?>
    <div id="title">
    <?=$rs_article[article_name];?>
    </div>
    <div id="detail_article" style="padding:5px; border-bottom:#CCC solid 1px;">
  
    
   
		<?
		$article_title= $rs_article[article_title];
		echo"$article_title";
		
		?>
		
		
    </div>
    
<? }?>
	
</div>




















