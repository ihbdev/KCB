<?php 
$this->bread_crumbs=array(
	array('url'=>'','title'=>Language::t('Trang chủ')),
)
?>
			<div class="_column-middle">
            	<div class="__column-middle overflow-hidden">
                <?php 
                	$criteria=new CDbCriteria;
					$criteria->compare('status', News::STATUS_ACTIVE);
					$criteria->addInCondition('special',News::getCode_special('SPECIAL_REMARK'));
					$criteria->order='id desc';
					$criteria->limit=1;
					$list_news=News::model()->findAll($criteria);
					$this->renderpartial('news-homepage',array(
						'list_news'=>$list_news,
					));	
                ?>
                </div>
            </div>
