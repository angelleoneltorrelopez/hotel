<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'tipo-habitacion-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'tipo_habitacioncol',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45, 'placeholder'=>'Nombre',)))); ?>

	<?php echo $form->textFieldGroup($model,'tarifa',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>