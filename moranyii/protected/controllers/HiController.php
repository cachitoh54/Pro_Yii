<?php
#http://localhos/yii/moranyii/hi/index
class HiController extends Controller
{
	public function actionIndex()
	{
		//$model=CActiveRecord::model("Users")->findAll();
		$model=Users::model("Users")->findAll();
		$twitter="@codyii";
		$this->render("index", array("model"=>$model, "twitter"=>$twitter));
	}
}
?>