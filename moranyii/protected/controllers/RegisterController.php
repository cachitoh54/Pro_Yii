<?php
class RegisterController extends Controller
{
    public function actionIndex()
	{
		$model=new Register;

		if (isset($_POST['Register'])) 
		{
			$model->attributes=$_POST['Register'];
			if (!$model->validate()) 
			{
				$model->addError('repit_password','Error al enviar formulario');
			}
			else
			{

			}
		}
		$this->render('register',array('model'=>$model));
	}
}