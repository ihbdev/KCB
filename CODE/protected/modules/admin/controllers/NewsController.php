<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','create','copy','suggestTitle','dynamicCat','checkbox','updateSuggest'),
				'roles'=>array('create'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('reverseStatus','delete'),
				'roles'=>array('update'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new News('write');
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if(!isset($_POST['News']['list_special'])) $model->list_special=array();
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		//Group categories that contains news
		$group=new Category();		
		$group->group=Category::GROUP_NEWS;
		$list=$group->list_categories;
		$list_category=array();
		foreach ($list as $id=>$cat){
			if($cat['lang']==Article::LANG_VI) $list_category[$id]=$cat;
		}
		//Handler list suggest news
		if(!Yii::app()->getRequest()->getIsAjaxRequest())
			Yii::app ()->session ["checked-suggest-list"]=array();
		$this->initCheckbox('checked-suggest-list');
		$suggest=new News('search');
		$suggest->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $suggest->catid=$model->catid;
		if(isset($_GET['SuggestNews']))
			$suggest->attributes=$_GET['SuggestNews'];
			
		$this->render('create',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest
			
		));
	}
	/**
	 * Copy a new model
	 */
	public function actionCopy($id)
	{
		$origin=News::model()->findByPk($id);
		$model=new News('write');		
		$model->introimage=$origin->introimage;
		$model->order_view=$origin->order_view;
		$model->lang=$origin->lang;
		$model->category=$origin->category;
		$model->list_special=$origin->list_special;
		$model->fulltext=$origin->fulltext;
		$model->catid=$origin->catid;
		$model->title=$origin->title.' - Copy ';		
		if($model->save()){
			$model->introimage=Image::copy($model->introimage,$model->id);
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(Yii::app()->user->checkAccess('update', array('post' => $model)))	
		{	
		$model->scenario = 'write';
		// Ajax validate
		$this->performAjaxValidation($model);	
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['News']))
		{
			if(!isset($_POST['News']['list_special'])) $model->list_special=array();
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}
		//Group categories that contains news
		$group=new Category();		
		$group->group=Category::GROUP_NEWS;
		$list=$group->list_categories;
		$list_category=array();
		foreach ($list as $id=>$cat){
			if($cat['lang']==$model->lang) $list_category[$id]=$cat;
		}
		
		//Handler list suggest news
		if(!Yii::app()->getRequest()->getIsAjaxRequest())
			Yii::app ()->session ["checked-suggest-list"]=array_diff(explode(',',$model->list_suggest),array(''));
		$this->initCheckbox('checked-suggest-list');
		$suggest=new News('search');
		$suggest->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $suggest->catid=$model->catid;
		if(isset($_GET['SuggestNews']))
			$suggest->attributes=$_GET['SuggestNews'];
		$this->render('update',array(
			'model'=>$model,
			'list_category'=>$list_category,
			'suggest'=>$suggest
		));		
		}
		else 
			throw new CHttpException(403,Yii::t('yii','You are not authorized to perform this action.'));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionCheckbox($action)
	{
		$this->initCheckbox('checked-news-list');
		$list_checked = Yii::app()->session["checked-news-list"];
		switch ($action) {
			case 'delete' :
				if (Yii::app ()->user->checkAccess ( 'update')) {
					foreach ( $list_checked as $id ) {
						$item = News::model ()->findByPk ( $id );
						if (isset ( $item ))
							if (! $item->delete ()) {
								echo 'false';
								Yii::app ()->end ();
							}
					}
					Yii::app ()->session ["checked-news-list"] = array ();
				} else {
					echo 'false';
					Yii::app ()->end ();
				}
				break;
			case 'copy' :
				foreach ( $list_checked as $id ) {
					$origin = News::model ()->findByPk ( ( int ) $id );
					if (isset ( $origin )) {
						$model = new News ( 'write' );
						$model->introimage = $origin->introimage;
						$model->order_view = $origin->order_view;
						$model->lang = $origin->lang;
						$model->category = $origin->category;
						$model->list_special = $origin->list_special;
						$model->fulltext = $origin->fulltext;
						$model->catid = $origin->catid;
						$model->title = $origin->title . ' - Copy ';
						if($model->save()){
							$model->introimage=Image::copy($model->introimage,$model->id);
							if(!$model->save())
								echo 'false';
								Yii::app ()->end ();
						}
					}
				}
				break;
		}
		echo 'true';
		Yii::app()->end();
		
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->initCheckbox('checked-news-list');
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['catid'])) $model->catid=News::PRESENT_CATEGORY;
		$model->lang=Article::LANG_VI;
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];	
		//Group categories that contains news
		$group=new Category();		
		$group->group=Category::GROUP_NEWS;
		$list=$group->list_categories;
		$list_category=$list;
		/*
		foreach ($list as $id=>$cat){
			if($cat['lang']==Article::LANG_VI) $list_category[$id]=$cat;
		}
		*/		
		$this->render('index',array(
			'model'=>$model,
			'list_category'=>$list_category
		));
	}
	/**
	 * Reverse status of news
	 */
	public function actionReverseStatus($id)
	{
		$src=News::reverseStatus($id);
			if($src) 
				echo json_encode(array('success'=>true,'src'=>$src));
			else 
				echo json_encode(array('success'=>false));		
	}
	/**
	 * Suggests title of news.
	 */
	public function actionSuggestTitle()
	{
		if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
		{
			$titles=News::model()->suggestTitle($keyword);
			if($titles!==array())
				echo implode("\n",$titles);
		}
	}
	/**
	 * Suggests title of news.
	 */
	public function actionDynamicCat()
	{
		$group=new Category();		
		$group->group=Category::GROUP_NEWS;
		$list=$group->list_categories;
		$list_category=array();
		foreach ($list as $id=>$cat){
			$view = "";
							for($i=1;$i<$cat['level'];$i++){
								$view .="---";
							}
			$name=$view." ".$cat['name']." ".$view;
			if($cat['lang']==$_POST['lang']) {
				echo CHtml::tag('option',array('value'=>$id),CHtml::encode($name),true);
			}
		}		
	}
	/*
	 * Init checkbox
	 */
	public function initCheckbox($name_params){
		if(!isset(Yii::app()->session[$name_params]))
			Yii::app()->session[$name_params]=array();	
		if(isset($_POST['list-checked'])){
			$list_new=array_diff ( explode ( ',', $_POST['list-checked'] ), array ('' ));
		 	$list_old=Yii::app()->session[$name_params];
		 	$list=$list_old;
          	foreach ($list_new as $id){
          		if(!in_array($id, $list_old))
               		$list[]=$id;
          	}
          	Yii::app()->session[$name_params]=$list;
		 }
		if(isset($_POST['list-unchecked'])){
			$list_unchecked=array_diff ( explode ( ',', $_POST['list-unchecked'] ), array ('' ));
		 	$list_old=Yii::app()->session[$name_params];
		 	$list=array();
          	foreach ($list_old as $id){
          		if(!in_array($id, $list_unchecked)){
               		$list[]=$id;
          		}
          	}
          	Yii::app()->session[$name_params]=$list;
		 }
	}
	/*
	 * List news suggest 
	 */
	public function actionUpdateSuggest()
	{
		$this->initCheckbox('checked-suggest-list');
		$list_checked = Yii::app()->session["checked-suggest-list"];
		echo implode(',',$list_checked);
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(Yii::app()->getRequest()->getIsAjaxRequest() )
		{
		if( !isset($_GET['ajax'] )  || ($_GET['ajax'] != 'list-news-suggest' && $_GET['ajax'] != 'news-list')){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		}
	}
}
