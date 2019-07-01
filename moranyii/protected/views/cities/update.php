<h1>Actualizando el city #<?php echo $model->id?></h1>
<?php $form=$this->beginWidget("CActiveForm");?>

<b>Nombre</b><br>
<?php echo $form->textField($model,"name");?>
<?php echo $form->error($model,"name");?>
<br>
<b>Nro. del País</b><br>
<?php echo $form->textField($model,"countries_id");?>
<?php echo $form->error($model,"countries_id");?>
<br>
<b>Status</b><br>
<?php echo $form->textField($model,"status");?>
<?php echo $form->error($model,"status");?>
<br>
<?php echo CHtml::submitButton("Actualizar",array("class"=>"btn btn-primary btn-large"));?>
<?php $this->endWidget();?>