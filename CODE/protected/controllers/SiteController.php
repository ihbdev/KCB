<?php

class SiteController extends Controller
{
	/**
	 * @var string the default layout for the views. 
	 */
	public $layout='main';
	public $bread_crumbs=array();

	public function init(){
		parent::init();
		Yii::app()->clientScript->scriptMap['jquery.js'] = false;
		Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
		Yii::app()->session['book-online']=NULL;
		/**
		 * This is the action for register online
		 */
		$model=new Order('create');
		if(isset($_POST['Order'])){
			$model->attributes=$_POST['Order'];
			$time = $_POST['Order']['date'].$_POST['Order']['hour'].':'.$_POST['Order']['min'];
			$model->booked_date =  strtotime(str_replace("/", "-", $time));
			if($model->fullname !='Họ và tên' && $model->phone!='Số điện thoại')
				if($model->save())
					//Yii::app()->user->setFlash('success', Language::t('Đăng ký thành công'));
					Yii::app()->session['book-online'] ='<div class="flash-success" style="height:20px;padding:2px;margin-bottom:1px;">Đăng ký thành công</div>';
		}
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
			$this->layout="error";
			if ($error = Yii::app ()->errorHandler->error) {
				if (Yii::app ()->request->isAjaxRequest)
					echo $error ['message'];
				else
					$this->render( 'error', $error );
			}
	}
	/**
	 * This is the action to handle view home page
	 */
	public function actionContact()
	{
		$model=new Contact('create');
		if(isset($_POST['Contact'])){
			$model->attributes=$_POST['Contact'];
			if($model->save())
				Yii::app()->user->setFlash('success', Language::t('Liên hệ đã được gửi thành công'));
		}
		$this->render( 'contact' ,array('model'=>$model));
	}	
	/**
	 * This is the action to handle view home page
	 */
	public function actionHome()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('status', Product::STATUS_ACTIVE);
		$criteria->order='id desc';
		$criteria->limit=Setting::s('SIZE_REMARK_PRODUCT','Product');
		$list_product=Product::model()->findAll($criteria);
		
		$criteria=new CDbCriteria;
		$criteria->compare('status', Product::STATUS_ACTIVE);
		$criteria->addNotInCondition('catid', array(News::PRESENT_CATEGORY,News::GUIDE_CATEGORY));
		$criteria->order='id desc';
		$criteria->limit=Setting::s('SIZE_HOME_NEWS','News');
		$list_news=News::model()->findAll($criteria);
		$this->render( 'home' ,array('list_news'=>$list_news,'list_product'=>$list_product));
	}
	/**
	 * This is the action to handle view search page
	 */
	public function actionSearch()
	{
		$search=new SearchForm();
		$criteria = new CDbCriteria ();
		if(isset($_POST['SearchForm'])){
			$search->attributes=$_POST['SearchForm'];
			$criteria->compare ( 'name', $search->name, true );
			$criteria->compare ( 'catid', $search->catid );
			if($search->end_price != '')
				$criteria->addCondition('num_price <= '.$search->end_price);
			if($search->start_price != '')
				$criteria->addCondition('num_price >= '. $search->start_price);
		}
		$criteria->order = "id DESC";
		$result=new CActiveDataProvider ( 'Product', array ('criteria' => $criteria, 'pagination' => array ('pageSize' => Setting::s('SEARCH_PAGE_SIZE','Product' ) ) ) );
		$this->render( 'search',array('result'=>$result) );
	}	
	/**
	 * This is the action to handle view home page
	 */
	public function actionLanguage($language)
	{
		Yii::app()->session['language']=$language;
		Yii::app()->request->redirect(Yii::app()->getRequest()->getUrlReferrer());
	}

	/**
	 * This is action for handle dropdownlist dependence
	 */
	public function actionDynamicdoctor()
	{
	//please enter current controller name because yii send multi dim array
		$current_cat = $_POST['Order']['disease'];
		$list_doctor = Yii::app()->session['doctor'];

		foreach($list_doctor as $cat=>$doctor)
		{
			if($current_cat==$cat) {
				foreach($doctor as $id=>$name) $doctors[]=$name;
			}
		}
		if(sizeof($doctors)){
		    foreach($doctors as $value=>$name)
		    {
		        echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($name),true);
		    }
		}
		else echo CHtml::tag('option',
					array('value'=>'none'),CHtml::encode('none'),true);
	}
}