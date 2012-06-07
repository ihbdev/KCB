 <div class="box-search">
 	<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>false,'action'=>Yii::app()->createUrl('search/news'))); ?>	
 		<?php echo $form->textField($search,'name',array('class'=>'text','onfocus'=>'javascript:if(this.value==\'Tìm kiếm...\'){this.value=\'\';};','onblur'=>'javascript:if(this.value==\'\'){this.value=\'Tìm kiếm...\';};')); ?>	
 	   <input name="" type="submit" value="" class="floatleft icon-search btn-search" />
    <?php $this->endWidget(); ?>
 </div>