
 <!-- <link rel="stylesheet" type="text/css" href="css/style.css">-->
  <link rel="stylesheet" type="text/css" href="css/jquery_ad-gallery.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="jquery/jquery.ad-gallery.js?rand=509"></script>
  <script type="text/javascript" src="jquery/common.js"></script>

  <script type="text/javascript">
  $(function() {
    $('img.image1').data('ad-desc', 'Whoa! This description is set through elm.data("ad-desc") instead of using the longdesc attribute.<br>And it contains <strong>H</strong>ow <strong>T</strong>o <strong>M</strong>eet <strong>L</strong>adies... <em>What?</em> That aint what HTML stands for? Man...');
    $('img.image1').data('ad-title', 'Title through $.data');
    $('img.image4').data('ad-desc', 'This image is wider than the wrapper, so it has been scaled down');
    $('img.image5').data('ad-desc', 'This image is higher than the wrapper, so it has been scaled down');
    var galleries = $('.ad-gallery').adGallery();
    $('#switch-effect').change(
      function() {
        galleries[0].settings.effect = $(this).val();
        return false;
      }
    );
    $('#toggle-slideshow').click(
      function() {
        galleries[0].slideshow.toggle();
        return false;
      }
    );
    galleries[0].addAnimation('wild',
      function(img_container, direction, desc) {
        var current_left = parseInt(img_container.css('left'), 10);
        var current_top = parseInt(img_container.css('top'), 10);
        if(direction == 'left') {
          var old_image_left = '-'+ this.image_wrapper_width +'px';
          img_container.css('left',this.image_wrapper_width +'px');
          var old_image_top = '-'+ this.image_wrapper_height +'px';
          img_container.css('top', this.image_wrapper_height +'px');
        } else {
          var old_image_left = this.image_wrapper_width +'px';
          img_container.css('left','-'+ this.image_wrapper_width +'px');
          var old_image_top = this.image_wrapper_height +'px';
          img_container.css('top', '-'+ this.image_wrapper_height +'px');
        };
        if(desc) {
          desc.css('bottom', '-'+ desc[0].offsetHeight +'px');
          desc.animate({bottom: 0}, this.settings.animation_speed * 2);
        };
        img_container.css('opacity', 0);
        return {old_image: {left: old_image_left, top: old_image_top, opacity: 0},
                new_image: {left: current_left, top: current_top, opacity: 1},
                easing: 'easeInBounce',
                speed: 2500};
      }
    );
  });
  function debug(str) {
    if(window.console && window.console.log && jQuery.browser.mozilla) {
      console.log(str);
    } else {
      $('#debug').show().val($('#debug').val() + str +'\n');
    }
  }
  </script>
  <style type="text/css">
  #gallery {
    padding: 10px;
    background: #e1eef5;
  }
  #comment-form {
    width: 100%;
  }
  #error {
    display: none;
    background: #FFF;
    position: absolute;
    left: 100px;
    top: 100px;
    width: 480px;
    height: 250px;
    padding: 10px;
    border: 1px solid #CCC;
  }
  </style>
  
 
  
    <div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper">
      </div>
      <div class="ad-controls">
      </div>
      <div class="ad-nav">
        <div class="ad-thumbs">
          <ul class="ad-thumb-list">






  <?
//จัดการกับรูปภาพ
$productcat_id=$_GET['productcat_id'];
$product_id=$_GET['product_id'];
//echo"productcat_id$productcat_id";
//echo"product_id$product_id";

	$thumbnailsPath="product/$productcat_id/$product_id/thumbnail";
	$bigpath="product/$productcat_id/$product_id";
		if(!is_dir($thumbnailsPath)){
		
		}else{ //else
		if($handle= opendir($thumbnailsPath)){
		$imagesFiles = array();
		while(false!=($file=readdir($handle))){
				if($file!="." && $file!=".."){
					$thumbnailsFile = $thumbnailsPath."/".$file;
					$picbig = $bigpath."/".$file;
					$fileType = pathinfo($thumbnaisFile);//แสดงpath
					
					$fileType = strtolower($fileType['extension']);//แสดงpathพร้อม แสดงนามสกุล
					
					$allowedtypes=array("png","jpeg","jpg","gif");
				
					if(is_file($thumbnailsFile) && in_array($fileType,$allowedtypes))
					{
					$imagesFiles[]=$thumbnailsFile;
					echo"hello";
						
					}
					
					
				
			
			
			//echo"thumbnailsFilethumbnailsFile$thumbnailsFile<br>";	
			
			//check type pic
			$pathinfo=pathinfo($thumbnailsFile);
			$name_pic=$pathinfo['extension'];
			//echo"name_pic$name_pic";
					if($name_pic=="gif" or $name_pic=="png" or $name_pic=="jpg" ){
					?>
        			
                    
                     <li>
             			 <a href="<?=$picbig?>">
                			<img src="<?=$thumbnailsFile?>" width="80" >
              			</a>
            		</li>
       				<?
					}
				}
			}
			closedir($handle);
		}
		/*sort($imagesFiles);
		if(count($imagesFiles)>0){
		$thumbnailsFile = $imagesFiles[0];
		
		//echo"thumbnailsFilethumbnailsFile$thumbnailsFile<br>";
		}*/
		//$i++;
	}//else
	
	//ปิดจัดการรูปภาพ
	?>
 
             
                        
                      </ul>
                      
                      
                      
                      
                    
                      
                      
        </div>

      </div>
    </div>
  
   

