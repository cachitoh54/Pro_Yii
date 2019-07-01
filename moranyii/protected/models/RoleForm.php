<?php
class RoleForm extends CFormModel
{
	public static $types=array("Operation","Task","Role");
	public $name;
	public $description;
	public $type=2;

	public function rules()
	{
		return array(
			// Todos los validators del CORE.
			//array("name,type","required"),
			//array("description","ext.MyValidator","word"=>"this"),
			array("name,type","required","message"=>"Está mal!!! {attribute}"), 
			//array("name,type","required","message"=>"Está mal!!! {attribute}"),  
			// El validator acepta varios parametros en común como por ejemplo "massage" como se ve en el código donde // puedes personalizar tus mensajes, tambien pues acceder por un placeholder al atributo al que se está  // refiriendo como se muestra igualmente el el código con "{attribute}"" que es en esta caso "name".

			//array("description","safe"),

			//array("description","system.validators.CRequiredValidator","word"=>"this"),
			// Usar "system.validators.CRequiredValidator" equivala a usar "required", ya uqe este es un acceso directo
			// a las clases esta basada validator en los archivos de validación del framework.

			            // Otros ejemplos de validación.

			//array("description","numerical","allowEmpty"=>false,"integerOnly"=>true),
			// Estos son de solo números, de vacios y de solo enteros entre otras validaciones.

			//array("description","email"),

			//array("description","exist","attributeName"=>"username","className"=>"Users","message"=>"El {attribute} //está mal..."),
			// Este es para consultar si existe un atributo en una tabla de la BBDD.

			//array("description","unique","attributeName"=>"username","className"=>"Users"),

			//array("description","filter","filter"=>"strtoupper"),  | Este es para colocar en mayuscula las letras 
			// escripa en el campo en cuestión.

			//array("description","filter","filter"=>"trim"), // Este es en caso que el usuario deje espacios en blanco // de los lados en el campo de texto y este los elimina.

			// Direccion de consulta del manual de YII (https://www.yiiframework.com/wiki/56/reference-model-rules-validation#validation-rules-reference)

			             // Esto es para las reglas de validación en el modelo.
			array("description","validando"),
		);
	}

	public function validando($attribute,$params)
	{
		//Countries::model()  | Aca pueden hacer consultas a otros modelos com el ejemplo de esta al principio para 
		// luego hacer sus filtros, ya que es muy flexible el framework.
		if($this->$attribute=="test")
			$this->addError($attribute,"Estos no puede ser test.");
	}
}
?>