<?php 
Yii::import('zii.widgets.CPortlet');
class wCategory extends CPortlet
{
	public function init(){
		parent::init();
		
	}
	protected function renderContent()
	{
		$category=new Category;
		$category->group=Category::GROUP_NEWS;
		$all_list=$category->list_Categories;
		$list_catid=array();
		foreach ($all_list as $id=>$cat){
			if(in_array($cat['special'],Category::getCode_special(Category::SPECIAL_REMARK)))
				$list_catid[]=$id;
		}
		$this->render('category',array(
			'list_catid'=>$list_catid
		));
	}
}
?>

