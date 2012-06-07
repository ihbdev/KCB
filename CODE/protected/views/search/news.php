<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>'','title'=>Language::t('Kết quả tìm kiếm')),
)
?>
		<div class="_column-middle">
            <div class="__column-middle overflow-hidden">
				<div class="list-news overflow-hidden">
		        	<div class="_list-news overflow-hidden">
			 			<div class="search-title"><label><?php echo Language::t('Kết quả tìm kiếm')?></label></div>
			            	<?php $this->widget('iPhoenixListView', array(
								'dataProvider'=>$result,
								'itemView'=>'_news',
								'template'=>"{items}\n{pager}",
			            		'pager'=>array('class'=>'iPhoenixLinkPager'),
			            		'itemsCssClass'=>'news-list',
			            		'pagerCssClass'=>'pages-inner',
							)); ?>
					</div>
				</div>
			</div>
		</div>