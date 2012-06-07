  			<div class="slider-wrapper theme-default">
	  			<div id="slider" class="nivoSlider">
	  			<?php $index=0;?>
	  			<?php foreach ($list_images as $id):?>	
	  				<?php 
	  				$index++;
	  				$image = Image::model ()->findByPk ( $id );
	  				?>
	  				 <a href="<?php echo $image->url?>"><img src="<?php echo $image->getThumb('Banner','headline')?>" alt="slider<?php echo $index?>" title="<?php echo $image->title?>" /></a>
	           	<?php endforeach;?>
	           	</div>
			</div><!--slider-wrapper-->
            <div class="slider-control-right"></div>