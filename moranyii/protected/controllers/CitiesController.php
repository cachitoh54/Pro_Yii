<?php
class CitiesController extends Controller
{
    public function actionIndex()
    {

        if(isset($_GET["excel"]))
        {
            $model=Cities::model()->findAll();                               // Esto es para exportar de la BBDD
            $content=$this->renderPartial("excel",array("model"=>$model),true); // a excel.
    	    Yii::app()->request->sendFile("myExcel.xls",$content);
        }
    	
    	$cities=Cities::model()->findAll();
    	$this->render("index",array("cities"=>$cities));
    }

    public function actionCreate()
    {
    	$model=new Cities();
    	if(isset($_POST["Cities"]))
		{
			$model->attributes=$_POST["Cities"];
			if($model->save())
			{
				Yii::app()->user->setFlash("success","Ciudad guardado correctamente.");
				$this->redirect(array("index"));
			}
		}
    	$this->render("create",array("model"=>$model));
    }

    public function actionUpdate($id)
	{
		$model=Cities::model()->findByPk($id);
		if(isset($_POST["Cities"]))
		{
			$model->attributes=$_POST["Cities"];
			if($model->save())
			{
				Yii::app()->user->setFlash("success","Actualizado!");
				$this->redirect(array("index"));
			}
			else 
				Yii::app()->user->setFlash("error","No se actualizó el registro.");
		}
		$this->render("update",array("model"=>$model));
	}

	public function actionDelete($id)
	{
		$model=Cities::model()->deleteByPk($id);
		$this->redirect(array("index"));
	}

	public function actionView($id)
	{
		$model=Cities::model()->findByPk($id);
		$this->render("view",array("model"=>$model));
	}

	public function actionEnabled($id)
	{
		$model=Cities::model()->findByPk($id);
		if($model->status==1)
			$model->status=0;
		else
			$model->status=1;
		$model->save();
		$this->redirect(array("index"));
	}
}
?>