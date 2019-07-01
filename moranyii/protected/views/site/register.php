<h1>Create New User</h1>
<strong class='text-info'><?php echo $msg; ?></strong>
<div class='well'>
<?php $form=$this->beginWidget('CActiveForm', array(
	'method'=>'post',
	'action'=>Yii::app()->createUrl('site/register'),
	'id'=>'form',
	'enableClientValidation'=>true,
     'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
     <b>Usuario:</b><br>
     <?php echo $form->textField($model,"username",array("placeholder"=>"Username"));?>
     <?php echo $form->error($model,"username");?>
     <br>
     <b>Email:</b><br>
     <?php echo $form->textField($model,"email",array("placeholder"=>"Email"));?>
     <?php echo $form->error($model,"email");?>
     <br>
     <b>Contraseña:</b><br>
     <?php echo $form->passwordField($model,"password",array("placeholder"=>"Password"));?>
     <?php echo $form->error($model,"password");?>
     <br>
     <b>Repetir Contraseña:</b><br>
     <?php echo $form->passwordField($model,"repit_password",array("placeholder"=>"Repit Password"));?>
     <?php echo $form->error($model,"repit_password");?>
     <br>
     <?php echo CHtml::submitButton("Registrarme",array("class"=>"btn btn-primary pull-left"));?>
     <?php $this->endWidget();?> 
    </form>
</div>
