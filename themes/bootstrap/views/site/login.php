<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<style>
.form	{
    background-image: url('images/aimar.gif');
    background-repeat: no-repeat;
    /*background-attachment: fixed;*/
    background-position: center;
		background-size: 30%;
}
</style>

<body>



<h1>Login</h1>

<p>Porfavor complete el siguiente formulario con sus credenciales Aimar:</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'focus'=>array($model,'username'),
)); ?>

	<!-- <p class="note">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->textFieldRow($model,'username'); ?>

	<?php echo $form->passwordFieldRow($model,'password',array(
        //'hint'=>'Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>',
    )); ?>

	<?php echo $form->checkBoxRow($model,'rememberMe'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
            'icon'=>'icon-off icon-white'
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


</div>
