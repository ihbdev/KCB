 <?php 
 foreach ($list_catid as $catid){
 	$cat=Category::model()->findByPk($catid);
 	$cat_parent=Category::model()->findByPk($cat->parent_id);
 	$child_categories=$cat->child_categories;
 	$list_child_id=array();
 	//Set itself
 	$list_child_id[]=$catid;
 	foreach ($child_categories as $id=>$child_cat){
 		$list_child_id[]=$id;
 	}
 	$criteria=new CDbCriteria;
	$criteria->compare('status', News::STATUS_ACTIVE);
	$criteria->addInCondition('catid',$list_child_id);
	$criteria->order="order_view DESC,id DESC";
	$criteria->limit=5;
	$list_news=News::model()->findAll($criteria);
	$first_news=new News();
	$introimage=new Image();
	if(sizeof($list_news)>0){
		$first_news=$list_news[0];
 	echo
 	 		'<div class="sub-news margin-right_20 display-inlineblock">
                <div class="hoi-dap">
                	<label id="small">'.$cat_parent->name.'</label><br>
                	<label id="big">'.$cat->name.'</label>
                </div>
                <div class="feature-sub-news">
                	<a class="display-inlineblock" href="'.$first_news->url.'">'.$first_news->getThumb_url('thumb_news').'</a>
                    <span class="display-inlineblock">
                        <a class="display-inlineblock font-weight" href="'.$first_news->url.'">'.iPhoenixString::createIntrotext($first_news->title,10).'</a>
                        <p class="display-inlineblock font-small">'.iPhoenixString::createIntrotext($first_news->introtext,Setting::s('LIST_INTROHOME_LENGTH','News')).'</p>
                    </span>';

    for($i=1;$i<min(5,sizeof($list_news));$i++){
		echo 
		            '<hr class="line-dots" />
		             <a class="font-weight buttlet-arrow padding-left_10" href="'.$list_news[$i]->url.'">'.iPhoenixString::createIntrotext($list_news[$i]->title,10).'</a>';                    	
		}
		echo '         
				</div>
				<a href="'.$cat->url.'" class="btn-next floatright display-block">'.Language::t('Xem tiếp').'</a>
			</div>';
	}	
 }
 ?>