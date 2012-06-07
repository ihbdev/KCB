<?php 
Yii::import('zii.widgets.CPortlet');
class wBookOnline extends CPortlet
{
	public function init(){
		parent::init();
		
	}
	protected function renderContent()
	{
		$this->render('book-online');
	}
}
?>

