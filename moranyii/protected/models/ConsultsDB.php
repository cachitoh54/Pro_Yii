<?php
class ConsultsDB
{
	public $cod_verify;

	/*public function tableName()
	{
		return 'usuario';
	}*/

	public function register_user($username,$email,$password)
	{
		$conex=Yii::app()->db;

		$cod_verify=sha1(rand(10000,99999));

		$consult="Insert Into usuario(username,email,password,cod_verify)";
		$consult.="Values";
		$consult.="('$username','$email','$password','$cod_verify')";

		$result=$conex->createCommand($consult)->execute();
	}
}
?> 