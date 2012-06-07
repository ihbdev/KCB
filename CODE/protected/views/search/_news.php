
					<div class="_list-news overflow-hidden">
						<a class=" floatleft" href="<?php echo $data->url?>"><?php echo $data->getThumb_url('introimage');?></a>
						<span class="news-description floatleft">
							<a href="<?php echo $data->url?>" class="font-weight"><?php echo $data->title?></a>
							<br><?php echo iPhoenixString::createIntrotext($data->fulltext,100)?>
							<a href="<?php echo $data->url?>" class="btn-next floatright display-block"><?php echo Language::t('Xem tiếp')?></a>
						</span>
					</div>
					<hr class="line-dots" />