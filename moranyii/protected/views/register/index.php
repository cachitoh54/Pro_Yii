<h1>Create New User</h1>
<div class='form'>
<?php $form=$this->beginWidget('CActiveForm', array(
     'method'=>'post',
     'action'=>Yii::app()->createUrl('views/register/index'),
     'id'=>'form',
     'enableClientValidation'=>true,
     'enableAjaxValidation'=>true,
     'clientOptions'=>array(
          'validateOnSubmit'=>true,
     ),
)); ?>
     <b>Usuario:</b><br>
     <?php echo $form->textField($model,"username",array("class"=>"input-block-level","placeholder"=>"Username"));?>
     <?php echo $form->error($model,"username");?>
     <br>
     <b>Email:</b><br>
     <?php echo $form->textField($model,"email",array("class"=>"input-block-level","placeholder"=>"Email"));?>
     <?php echo $form->error($model,"email");?>
     <br>
     <b>Contraseña:</b><br>
     <?php echo $form->passwordField($model,"password",array("class"=>"input-block-level","placeholder"=>"Password"));?>
     <?php echo $form->error($model,"password");?>
     <br>
     <b>Repetir Contraseña:</b><br>
     <?php echo $form->passwordField($model,"repit_password",array("class"=>"input-block-level","placeholder"=>"Repit Password"));?>
     <?php echo $form->error($model,"repit_password");?>
     <br>
     <?php echo CHtml::submitButton("Registrarme",array("class"=>"btn btn-primary pull-right"));?>
     <?php $this->endWidget();?> 
    </form>
</div>

<!-- <div class="well"> -->
    