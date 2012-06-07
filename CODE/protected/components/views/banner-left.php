<?php foreach ($list_images as $image_id):?>
<?php $image = Image::model ()->findByPk ( $image_id );?>
<div class="adv-right display-block">
	<a href="<?php echo $image->url?>">
		<img src="<?php echo $image->getUrlOrigin()?>" />
	</a>
</div>
<?php endforeach;?>