
					<?php if($index<5):?>
						<?php if($index==0):?>
						<div class="_new-feature floatleft">
                            <a href="<?php echo $data->url?>"><?php echo $data->getThumb_url('introimage_big');?></a>
                            <a class="font-weight" href="<?php echo $data->url?>"><?php echo $data->title?></a>
                        </div>
                        <?php endif;?>
                        <div class="__new-feature floatleft">
                        	 <a class="buttlet-arrow padding-left_10" href="<?php echo $data->url?>"><?php echo iPhoenixString::createIntrotext($data->title,15);?></a>
                           	 <hr class="line-dots" />
                         </div>
					<?php endif;?>
