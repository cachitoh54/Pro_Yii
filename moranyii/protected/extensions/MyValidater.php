<?php
class MyValidater extends CValidator
{
	// $object es el modelo al cual se le está haciendo la valudación y $attribute es atributos del modelo en cuestion.
	public $word="test";
	public function validateAttribute($object,$attribute)
	{
		if($object->$attribute==$this->word)
			$this->addError($object,$attribute,"Esto es un error!");
	}
}
?>