<?php
class Register extends CActiveRecord
{
	public $username;
	public $email;
	public $password;
	public $repit_password;
	public $birthday;

	/*public static $types=array("Operation","Task","Role");
	public $name;
	public $description;
	public $type=2;*/

	public static function model($ClassName=__CLASS__)
	{
		return parent::model($ClassName);
	}

	public function tableName()
	{
		return "usuario";
	}

	public function rules()
	{
		return array(
            array('username, email, password, repit_password','required','message'=>'Este campo es requerido'),
            array('username','match','pattern'=>'/^[a-z0-9áéíóúàèìòùäëïöüñ\_]+$/i',
                  'message'=>'Error, sólo letras, números y guiones bajos'),
            array('email','email','message'=>'El formato de email es incorrecto'),
            //array('password, repit_password', 'length', 'min'=>4, 'max'=>60),
            //array('password','match','pattern'=>'/^.[8,16]$/','message'=>'Sólo letras y números'),
            array('password','match','pattern'=>'/^[az0-9]+$/i','message'=>'Sólo letras y números'),
            array('repit_password','compare','compareAttribute'=>'password',
            	  'message'=>'El password no coincide'),
            //array('repit_password','compare_pass'),
            array("username","unique","attributeName"=>"username","className"=>"Users","message"=>"El usuario   no está disponible!"),
            array("email","unique","attributeName"=>"email","className"=>"Users","message"=>"El email no está disponible!"),
            array('username','compare_name'),
            //array("birthday","date","allowEmpty"=>false),
            //array('email','email_exist'),
            //array('password','match','pattern'=>'/^[az0-9]+$/i','message'=>'Sólo letras y números'),
            //array("birthday","allowEmpty"=>false),
            //www.yiiframework.com/wiki/56/reference-model-rules-validation
		);
	}

	/*public function compare_pass($attribute,$params)
	{
		if ($this->repit_password!=='password') 
			{
				$this->addError('password','Las contraseñas no coinciden');
			}
	}*/

	/*public function email_exist($attribute,$params)
	{
		$table=Users::find()->where('email=:email',[':email'=>$this->email]);

		if ($table->count()==1) 
		{
			$this->addError($attribute,'El email seleccionado no existe');
		}
	}*/

	public function compare_name($attribute,$params)
	{
		$conex=Yii::app()->db;

		$consult="Select username From usuario Where username='".$this->username."'";

		$result=$conex->createCommand($consult);
		$row=$result->query();


		foreach ($row as $data) 
		{
			if ($this->username===$data['username']) 
			{
				$this->addError('username','Usuario no disponible');
				break;
			}
		}
	}


	/*public function getSelectName()
	{
		return $this->name." ".$this->id;
	}*/
}
?>