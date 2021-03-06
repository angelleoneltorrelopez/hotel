<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-compra-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>
<div class="form-row">
    <div class="form-group col-md-9">
<?php echo $form->labelEx( $model,'id_empleado', array('class'=>'className') ); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
						'model'=>$model,
						'attribute'=>'id_empleado',
						'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
						'options' => array('width' => '100%',),
		)); ?>
</div>
<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'fecha_solicitud',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
	'value'=>date('Y-m-d'),'readOnly'=>'readOnly','maxlength'=>255)))); ?>
</div>
</div>
<div class="form-row">
    <div class="form-group col-md-9">
<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>
</div>
</div>
<?php $this->endWidget(); ?>
