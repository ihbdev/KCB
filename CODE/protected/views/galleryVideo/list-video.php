<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('galleryVideo/index'),'title'=>Language::t('Album')),
	array('url'=>'','title'=>isset($cat)?Language::t($cat->name):Language::t('Tất cả video')),
)
?>
<div class="news-outer">
            	<div class="news-left">
                <?php $this->widget('iPhoenixListView', array(
					'dataProvider'=>$list_video,
					'itemView'=>'_video',
					'template'=>"{items}\n{pager}",
            		'pager'=>array('class'=>'iPhoenixLinkPager'),
            		'itemsCssClass'=>'news-list',
            		'pagerCssClass'=>'pages-inner',
				)); 
				?> 
                </div><!--news-left-->
              	<div class="news-right">
                	<div class="winget">
                		<?php $this->widget('wProduct',array('view'=>'best-seller','special'=>Product::SPECIAL_BESTSELLER,'limit'=>Setting::s('SIZE_BESTSELLER_PRODUCT','Product')));?>                    	
                  </div><!--winget-->
                  <div class="ad-right">
                  		<?php $this->widget('wBanner',array('code'=>Banner::CODE_RIGHT,'view'=>'banner-right'))?>
                  </div><!--ad-right-->
                </div><!--news-right-->
            </div><!--news-outer-->