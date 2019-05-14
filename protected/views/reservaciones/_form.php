<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'reservaciones-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->datePickerGroup($model,'fecha_ingreso',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	</div>
	<div class="form-group col-md-3">

	<?php echo $form->datePickerGroup($model,'fecha_salida',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	

</div>
<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'id_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	</div>
	<div class="form-group col-md-5">
	<?php echo $form->textFieldGroup($model,'nombre_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>
	<div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'correo_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>
	</div>

</div>

<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'tel_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	</div>
	<div class="form-group col-md-5">
	<?php echo $form->textFieldGroup($model,'nacionalidad_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

	</div>
	<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'cantidad_infantes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	</div>
	<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'cantidad_adultos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	</div>
</div>

<div class="row">

	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'total',array('prepend' => 'Q','widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45,'readonly'=>'readonly')))); ?>

	</div>
	<div class="form-group col-md-9">

	<?php echo $form->labelEx($model,'observaciones',$htmloptions=array('style'=>'font-size:14px;')); ?>
	<?php echo $form->textArea($model,'observaciones',$htmloptions=array('class'=>'form-control'),array('rows'=>30, 'cols'=>50)); ?>
	
	</div>
</div>



<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
