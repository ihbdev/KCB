
			<?php foreach ($list_news as $news):?>
				<h1><?php echo $news->title?></h1>
				<p class="clear-10">&nbsp;</p>
				<div class="sub-service floatleft">
					<a href="list tin.html">
                        	<img src="images/front/dich_vu.jpg" alt="" />
                        	<span class="title-service title-sub-service"><p>Đội ngũ Y bác sỹ</p></span>
					</a>
				</div>
                <p class="margin-right_20 floatleft">&nbsp;</p>
				<div class="sub-service floatleft">
                  	<a href="list tin.html">
                	   	<img src="images/front/dich_vu_1.jpg" alt="" />
                    	<span class="title-service title-sub-service"><p>Dịch vụ khám chữa bệnh</p></span>
					</a>
				</div>
                <p class="margin-right_20 floatleft">&nbsp;</p>
				<div class="sub-service floatleft">
                  	<a href="list tin.html">
						<img src="images/front/dich_vu_2.jpg" alt="" />
                        <span class="title-service title-sub-service"><p>Thông tin phản hồi</p></span>
					</a>
				</div>
                <p class="clear-10">&nbsp;</p>
				<?php echo $news->fulltext;?>
			<?php endforeach;?>