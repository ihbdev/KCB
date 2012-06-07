<?php foreach ($list_images as $image_id):?>
<?php $image = Image::model ()->findByPk ( $image_id );?>
 						<div class="_sub-news-feature floatleft">
                            <a href="<?php echo $image->url?>"><img src="<?php echo $image->getUrlOrigin()?>" alt="service" /></a>
                            <a class="font-weight" href="<?php echo $image->url?>"><?php echo $image->title?></a>
                        </div>
						<p class="margin-right_10 floatleft">&nbsp;</p>
<?php endforeach;?>