<?php 
if(isset($cat))
	$this->bread_crumbs=array(
		array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
		array('url'=>Yii::app()->createUrl('news/list',array('cat_alias'=>$cat->alias)),'title'=>Language::t($cat->name)),
		array('url'=>'','title'=>Language::t($page->title)),
	);
else
	$this->bread_crumbs=array(
		array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
		array('url'=>'','title'=>Language::t($news->title)),
	);
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
                    <div class="news-detail">
                    	<p class="font-weight font-big"><?php echo $page->title?></p>
                        <font class="font-small color"><?php echo date("(D, d/m/Y-h:m)",$page->created_date);?></font>
                        <a href="#" class="icon-print display-inlineblock">&nbsp;</a>
                        <a href="#" class="icon-mail display-inlineblock">&nbsp;</a><br /><br />
                        <?php echo $page->fulltext?>
                    </div>
                    <div class="news-detail margin-top_10">
						<p class="tin-da-dang"><?php echo Language::t('Các tin khác');?>:</p>						
						<?php
	            			$list_similar=$page->list_similar;
	            		?>
						<?php foreach ($list_similar as $similar_news):?>
							<a class="buttlet-arrow padding-left_10" href="<?php echo $similar_news->url?>"><?php echo $similar_news->title?></a><span>(<?php echo date("d/m/Y",$similar_news->created_date); ?>)</span>
							<hr class="line-dots" />
						<?php endforeach;?>
                    </div>
                </div>
            </div>
