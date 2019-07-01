<?php
class CountriesController extends Controller
{
    public function actionIndex()
    {
    	#Yii::import("me.test.*");  // Este ejemplo es con mi priopio "Alias" creado en el archo main.php de config
    	//que está en Yii::setPathOfAlias y en la línea del "array import".
    	//Yii::import("ext.test.*");  // Esto es para importar clases que esten dentro del mismo directorio. 
    	//Yii::import("ext.test.Test");  // Este es un ejemplo.
    	//Yii::import("application.Test");
    	#echo Yii::getPathOfAlias("application")."</br>"; // protected     |Estos son los PathAlias más utilizados
    	#echo Yii::getPathOfAlias("webroot")."</br>";  // root             |y nos sirven para obtener la ruta de
    	#echo Yii::getPathOfAlias("ext")."</br>";  // protected/extensions |los directorios y/o clases que hallamos
    	#echo Yii::getPathOfAlias("zii")."</br>";  // framework/zii        |ubicados en cualquiera de estos sitios.
    	/*$me=new Test;
    	$me2=new Test2;
    	echo $me->hi();
    	echo $me2->hi();*/
    	#include(dirname(__FILE__)."/Tu_clase.php");  //Con lo anterior me evito de escribir la ruta.
    	//echo Yii::app()->happy->hi();
        //--------------------------------------------------------------------------------------------------------
    	/*if(Yii::app()->request->isAjaxRequest)
    	{
    		//Sí es una petición de Ajax, hace determinada cosa.
    	}*/

    	/*if(Yii::app()->request->isPostRequest)   Lo mismo se haría sí utilizamos Post.
    	{}*/

    	/*$test=Yii::app()->request->getPost("test","defaulValue");  // $_POST["test"]
    	$test=Yii::app()->request->getQuery("test","defaulValue"); // $_GET["tset"]  | Para busar los Path de las Url.
    	$test=Yii::app()->request->getParam("test","defaulValue"); // $_POST["test"] y/o $_GET["test"]*/
   
    	/*echo Yii::app()->request->baseUrl.'</br>';
    	echo Yii::app()->request->requestUri.'</br>';
    	echo Yii::app()->request->pathInfo.'</br>';
    	echo Yii::app()->request->urlReferrer.'</br>';      | Así para buscar los Path de las url request.
    	echo Yii::app()->request->queryString.'</br>';
    	echo Yii::app()->request->userAgent.'</br>';
    	echo Yii::app()->request->userHost.'</br>';
    	echo Yii::app()->request->userHostAddress.'</br>';
*/
        //--------------------------------------------------------------------------------------------------------
    	/*Yii::app()->request->sendFile().'</br>';
    	Yii::app()->request->redirect("http://").'</br>';        | Así para eviar cabeceras.
    	Yii::app()->request->redirect("/site/index").'</br>';*/
        //--------------------------------------------------------------------------------------------------------
        #echo Yii::app()->user->name;
        //--------------------------------------------------------------------------------------------------------

        #Yii::app()->authManager->createRole("admin");
        #Yii::app()->authManager->assign("admin",2);
        /*echo Yii::app()->user->id;
        if(Yii::app()->authManager->checkAccess("admin",Yii::app()->user->id))
             echo "Hola desde outhmanager!</br>";
        if(Yii::app()->user->checkAccess("admin"))
            echo "Hola desde user!";*/

        if(isset($_GET["excel"]))
        {
            $model=Countries::model()->findAll();                               // Esto es para exportar de la BBDD
            $content=$this->renderPartial("excel",array("model"=>$model),true); // a excel.
    	    Yii::app()->request->sendFile("myExcel.xls",$content);
        }
    	
    	$countries=Countries::model()->findAll();
    	$this->render("index",array("countries"=>$countries));
    }

    public function actionCreate()
    {
    	$model=new Countries();
    	if(isset($_POST["Countries"]))
		{
			$model->attributes=$_POST["Countries"];
			if($model->save())
			{
				Yii::app()->user->setFlash("success","País guardado correctamente.");
				$this->redirect(array("index"));
			}
		}
    	$this->render("create",array("model"=>$model));
    }

    public function actionUpdate($id)
	{
		$model=Countries::model()->findByPk($id);
		if(isset($_POST["Countries"]))
		{
			$model->attributes=$_POST["Countries"];
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
		$model=Countries::model()->deleteByPk($id);
		$this->redirect(array("index"));
	}

	public function actionView($id)
	{
		$model=Countries::model()->findByPk($id);
		$this->render("view",array("model"=>$model));
	}

	public function actionEnabled($id)
	{
		$model=Countries::model()->findByPk($id);
		if($model->status==1)
			$model->status=0;
		else
			$model->status=1;
		$model->save();
		$this->redirect(array("index"));
	}
}
?>