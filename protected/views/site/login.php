<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>


<div class="container text-center" >
	<div class=" d-flex align-items-center justify-content-center">
<div class='card'  align="center">
	<div class="row">
		<div class="form-group col-sm-12 col-md-12">

			</div>
			</div>

<div class="row">
	<div class="form-group col-sm-4 col-md-4">
		</div>
	<div class="form-label-group col-sm-4 col-md-4">
<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'login-form',
	'htmlOptions' => array('class' => 'well', 'style'=>'background-color:rgba(24, 53, 255, 0.29); '),
	'enableClientValidation'=>true,
	'focus'=>array($model,'username'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php	echo	CHtml::image(Yii::app()->baseUrl."/images/user.svg",'PDF',array( 'style' => 'width: 40%; height: 25%')); ?>
<h1>Login</h1>
<br>
	<div class="row">
		<div class="form-group col-sm-2">
			</div>
		<div class="form-label-group col-sm-8">
		<?php echo $form->textFieldGroup($model,'username',array('labelOptions' => array("label" => false),'widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-2">
			</div>
		<div class="form-label-group col-sm-8">
		<?php echo $form->passwordFieldGroup($model,'password',array('labelOptions' => array("label" => false),'widgetOptions'=>
		array('htmlOptions'=>array('class'=>'form-control')))); ?>
</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-1">
			</div>
		<div class="form-label-group col-sm-8">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-2">
			</div>
		<div class="form-label-group col-sm-8">
		<button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
	</div>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->
</div>
</div>
</div>
</div>
<?php
$baseUrl = Yii::app()->baseUrl;

  $cs = Yii::app()->getClientScript();


  $cs->registerCssFile($baseUrl.'/bootstrap.min.css');
	$cs->registerCssFile($baseUrl.'/floating.css');
?>
