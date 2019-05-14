<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'habitaciones-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx( $model,'tipo_habitacion', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$model,
				        'attribute'=>'tipo_habitacion',
				        'data'=>CHtml::listData(TipoHabitacion::model()->findAll(array('order'=>'tipo_habitacioncol')), 'id_tipo_habitacion', 'tipo_habitacioncol'),
								'options' => array('width' => '100%',),
				)); ?>

	<?php echo $form->textFieldGroup($model,'numero',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>11)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
