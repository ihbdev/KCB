<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>Yii::app()->createUrl('news/index'),'title'=>Language::t('Tin tức')),
	array('url'=>'','title'=>isset($cat)?Language::t($cat->name):Language::t('Tất cả tin tức')),
)
?>
		<div class="_column-middle">
            	<div class="__column-middle overflow-hidden">
					<?php
            			$cat=Category::model()->findByPk($cat->id);
 						$cat_parent=Category::model()->findByPk($cat->parent_id);
 					?>
 					<div class="category">
            			<p id="small"><?php echo $cat_parent->name?></p><br>
                		<p id="big"><?php echo $cat->name?></p>
                	</div>
                    <div class="new-feature display-block overflow-hidden">
		                <?php $this->widget('iPhoenixListView', array(
							'dataProvider'=>$list_news,
							'itemView'=>'_news_1',
							'template'=>"{items}\n{pager}",
		            		'pager'=>array('class'=>'iPhoenixLinkPager'),
		            		'itemsCssClass'=>'news-list',
		            		'pagerCssClass'=>'pages-inner',
						)); 
						?> 
					</div>

					<div class="sub-news-feature overflow-hidden">
						<?php $this->widget('wBanner',array('code'=>Banner::CODE_SERVICE,'view'=>'banner-service'));?>
					</div>

					<div class="list-news overflow-hidden">
                     	<div class="_list-news overflow-hidden">
							<?php $this->widget('iPhoenixListView', array(
								'dataProvider'=>$list_news,
								'itemView'=>'_news_2',
								'template'=>"{items}\n{pager}",
			            		'pager'=>array('class'=>'iPhoenixLinkPager'),
			            		'itemsCssClass'=>'news-list',
			            		'pagerCssClass'=>'pages-inner',
							)); 
							?> 
                        </div>
                     </div>
                </div>
            </div>