
			<div class="bg-title title-contact-online">
            	<p><?php echo Language::t('Đăng ký khám trực tuyến');?></p>
            </div>

			<?php
	            $model=Category::model()->findByPk(Category::GROUP_USER_DISEASE);
				$model->group=Category::GROUP_USER_DISEASE;
				$list=$model->list_Categories;
				/* init array to store list doctors and disease room*/
				$list_disease[0] = 'Chọn nhóm bệnh';
				$list_doctor[0] = 'Chọn bác sĩ';

				foreach($list as $list_cat)
				{
					if($list_cat['level'] == 1) {
						$list_disease[$list_cat['name']] = $list_cat['name'];
						$cat_name = $list_cat['name'];;
					}
					if($list_cat['level']==2) {
						$list_doctor[$cat_name][$list_cat['name']] = $list_cat['name'];
						$list_doctor_[$cat_name][] = $list_cat['name'];
					}
				}
				Yii::app()->session['doctor'] = $list_doctor_;
				$model = new Order('create');
			?>
			<div class="contact-online">
			<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>false,'htmlOptions'=>array('class'=>'contact-form form','style'=>'display:block'))); ?>
				<?php
    				foreach(Yii::app()->user->getFlashes() as $key => $message) {
        				echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    				}
				?>
				<div class="row fix-inline">
					<?php echo $form->textField($model,'fullname',array('value'=>'Họ và tên','onblur'=>'js:if(value=="") value = "Họ và tên"','onfocus'=>'if(value=="Họ và tên") value = ""')); ?>	
					<?php echo $form->error($model, 'fullname'); ?>		
				</div>
				<div class="row fix-inline">
					<?php echo $form->textField($model,'phone',array('value'=>'Số điện thoại','onblur'=>'js:if(value=="") value = "Số điện thoại"','onfocus'=>'if(value=="Số điện thoại") value = ""')); ?>	
					<?php echo $form->error($model, 'phone'); ?>
				</div>
				<div class="row fix-inline">
					<?php echo $form->textField($model,'email',array('value'=>'Email','onblur'=>'js:if(value=="") value = "Email"','onfocus'=>'if(value=="Email") value = ""')); ?>	
					<?php echo $form->error($model, 'email'); ?>	
				</div>
				<div class="row fix-inline">
					<?php echo $form->dropDownList($model,'disease',$list_disease,
						array(
							'ajax' => array(
							'type'=>'POST', //request type
							'url'=>Yii::app()->createUrl('site/Dynamicdoctor'), //url to call.
							'update'=>'#Order_doctor', //selector to update
							))
					);?>
					<?php echo $form->error($model, 'disease'); ?>	
				</div>
				<div class="row fix-inline">
					<?php echo $form->dropDownList($model,'doctor',array('0'=>'Chọn bác sĩ'));?>	
					<?php echo $form->error($model, 'doctor'); ?>	
				</div>

				<?php
					$this->widget('application.extensions.jui.EJqueryUiInclude', array('theme'=>'humanity'));
				?>
				<?
					$this->widget('application.extensions.jui.EDatePicker',
			              array(
								'name'=>'Order[date]',
			                    'language'=>'vi',
			                    'mode'=>'focus',
			                    'theme'=>'dotluv',
			              		'dateFormat'=>'dd/mm/yy',
			                    'value'=>date('d/m/Y'),
			                    'htmlOptions'=>array('style'=>'width:75px','size'=>20),
			              		'fontSize'=>'12px',
			                   )
			             );
				?>
				<?php
					$current_h = date('H');
					echo CHtml::dropDownList('Order[hour]','',array($current_h=>$current_h,'08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20'),array('style'=>'width:40px','id'=>'Order_hour','maxlength'=>2));
					echo ' : ';
					echo CHtml::dropDownList('Order[min]','',array('00'=>'00','15'=>'15','30'=>'30','45'=>'45'),array('style'=>'width:40px','id'=>'Order_min','maxlength'=>2));
				 ?>
				 <?php if(Yii::app()->session['book-online']==NULL):?>
				<div class="row">
					<input type="submit" value="Gửi đi" class="btn-submit display-block" name="btn-submit" />
				</div>
				<?php endif;?>
				<?php 
					if(Yii::app()->session['book-online']!=NULL)
						echo (Yii::app()->session['book-online']);
				?>
			<?php $this->endWidget(); ?>
			</div>