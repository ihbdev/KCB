<?php $this->widget('wSearch');?> 
 <div class="big-title"><label><?php echo Language::t('Kết quả tìm kiếm')?></label></div>
            	<?php $this->widget('iPhoenixListView', array(
					'dataProvider'=>$result,
					'itemView'=>'_view',
					'template'=>"{items}\n{pager}",
            		'pager'=>array('class'=>'iPhoenixLinkPager'),
            		'itemsCssClass'=>'product-list',
            		'pagerCssClass'=>'pages-inner',
				)); ?>          	               