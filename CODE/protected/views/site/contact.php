<?php 
$this->bread_crumbs=array(
	array('url'=>Yii::app()->createUrl('site/home'),'title'=>Language::t('Trang chủ')),
	array('url'=>'','title'=>Language::t('Liên hệ')),
)
?>
<?php  
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile(Yii::app()->request->getBaseUrl(true).'/js/front/contact.js', CClientScript::POS_END);
?>
			<div class="_column-middle">
            	<div class="__column-middle overflow-hidden">
                	<p class="lien-he">&nbsp;</p>
                    <div class="news-detail">
                    	<p>Bệnh viện Y học cổ truyền Trung ương là bệnh viện đầu ngành về YHCT - Trung tâm hợp tác về y học cổ truyền (YHCT) của Tổ chức y tế thế giới tại Việt Nam. Bệnh viện có 23 khoa phòng, 3 trung tâm được chia thành 3 khối: lâm sàng, cận lâm sàng, và khối các phòng ban chức năng.</p>
                        <p class="clear-10">&nbsp;</p>
                        <b>Add: </b><font>29 Nguyễn Bỉnh Khiêm, Hà Nội.</font>
                        	<p class="clear-5">&nbsp;</p>
                        <b>Tel: </b><font>84-4-38263616.</font>
                      	  <p class="clear-5">&nbsp;</p>
                        <b>Fax: </b><font>84-4- 38229353.</font>
                        	<p class="clear-5">&nbsp;</p>
                    </div>
                    	<p class="clear-15">&nbsp;</p>
                    <div class="box-lien-he floatleft">
	                    <?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'contact-form form','style'=>'display:block'))); ?>
	                     <?php
	    					foreach(Yii::app()->user->getFlashes() as $key => $message) {
	        					echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	    					}
						?>
	 					<div class="row fix-inline">
	                        <?php echo $form->labelEx($model,'fullname'); ?>
	                        <?php echo $form->textField($model,'fullname',array('style'=>'width:288px;')); ?>	
							<?php echo $form->error($model, 'fullname'); ?>		
	                    </div>
	                    <div class="row fix-inline">
	                   		<?php echo $form->labelEx($model,'email'); ?>
	                        <?php echo $form->textField($model,'email',array('style'=>'width:288px;')); ?>	
							<?php echo $form->error($model, 'email'); ?>	
	                    </div>
	                    <div class="row fix-inline">
	                        <?php echo $form->labelEx($model,'phone'); ?>
	                        <?php echo $form->textField($model,'phone',array('style'=>'width:288px;')); ?>	
							<?php echo $form->error($model, 'phone'); ?>
	                    </div>
	                    <div class="row fix-inline">
	                        <?php echo $form->labelEx($model,'address'); ?>
	                        <?php echo $form->textField($model,'address',array('style'=>'width:288px;')); ?>	
							<?php echo $form->error($model, 'address'); ?>
	                    </div>
	                    <div class="row fix-inline">
	                     <?php echo $form->labelEx($model,'content'); ?>
	                     <?php echo $form->textField($model,'content',array('style'=>'width:288px; min-height:100px;')); ?>	
						 <?php echo $form->error($model, 'content'); ?>
	                     </div>              
	                    <div class="row">
	                        <input type="submit" value="Gửi đi" class="btn-next floatright" name="btn-submit" />
	                    </div>
	                <?php $this->endWidget(); ?>
                    </div>
					<br>
                    <div class="box-map floatleft">
                    	<img src="<?php echo Yii::app()->request->getBaseUrl(true)?>/images/front/map.jpg" alt="" />
                    </div>
                </div>
            </div>
