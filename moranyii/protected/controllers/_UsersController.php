<?php

class UsersController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $defaultAction='admin';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				#'controllers'=>array('users'),
				'actions'=>array('index','view','assign'),
				'users'=>array('*'), //´...ó 'users'=>array('cachitoh54'), sí se desea a un usuario logeado.
				#'ips'=>array('255.255.255'), // Esto sí se desea otorgar o denegar permisos la las "IP".
				#'verbs'=>array('POST'), // ...ó GET, DELETE, PUT etc.
				#'expression'=>function($user,$rule){return $user->id==1;},
				#'roles'=>array('super'), // Este es para el super administrador, que al cual se le dará permiso a todo y se obiaría el de "user".

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update'),
				'roles'=>array('admin'),
				#'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$role=new RoleForm;
        
        if (isset($_POST["ajax"]) and $_POST["ajax"]==="role-form") 
        {
        	echo CActiveForm::validate($role);  // Esto para validar del lado del usuario y del servidor y esta
        	Yii::app()->end();                  // el CAactiveForm provee un método estático llamado "validate".
        }

		if(isset($_POST["RoleForm"]))
		{
			$role->attributes=$_POST["RoleForm"];
			if($role->validate())
			{
				Yii::app()->authManager->createRole($role->name,$role->description);
				Yii::app()->authManager->assign($role->name,$id);
				#$role->type;
				$this->redirect(array("view","id"=>$id));
			}
		}

		// Diferencia entre "render" y "renderPartial".
		// render: muestra la vista y todo el contenido del leyout.
		// renderPartial: sólo se muestra el contenido de la vista, el HTML que se encrusta en el leyout.

		/*$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
			'role'=>$role,
		));
        Yii::app()->end();*/
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'role'=>$role,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAssign($id)
	{
		if(Yii::app()->authManager->checkAccess($_GET["item"],$id))
			Yii::app()->authManager->revoke($_GET["item"],$id);
		else
			Yii::app()->authManager->assign($_GET["item"],$id);
		$this->redirect(array("view","id"=>$id));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
