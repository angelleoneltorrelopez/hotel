<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'mantenimiento-form',
	'type' => 'vertical',
	'htmlOptions' => array('class' => 'well', 'style'=>'background-color:rgba(150, 154, 182, 0.29)'),
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="form-row">
    <div class="form-group col-md-4">
			<?php echo $form->labelEx( $model,'id_empleado', array('class'=>'className') ); ?>
					<?php $this->widget('bootstrap.widgets.TbSelect2',array(
									'model'=>$model,
									'attribute'=>'id_empleado',
									'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
									'options' => array('width' => '100%'),
									'disabled' => true,

					)); ?>
	</div>
	<div class="form-group col-md-4">
		<?php echo $form->labelEx( $model,'id_departamento', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'id_departamento',
								'data'=>CHtml::listData(Departamentos::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%'),
								'disabled' => true,
				)); ?>
</div>
<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),
	'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
</div>
</div>
<div class="form-row">
		<div class="form-input col-md-12">
<?php echo $form->textFieldGroup($model,'objeto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','maxlength'=>255)))); ?>
</div>
</div>
<div class="form-row">
		<div class="form-input col-md-12">
	<?php echo $form->textAreaGroup($model,'diagnostico', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span15','readonly'=>'readonly')))); ?>
</div>
</div>
	<div class="form-row">
	    <div class="form-group col-md-12">
				<?php echo $form->textAreaGroup($model,'solucion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8','readonly'=>'readonly')))); ?>
</div>
</div>


	<div class="row">
		<div class="col-md-2">
		<div class="form-actions">
			<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					'context'=>'primary',
					'label'=>$model->isNewRecord ? 'Crear' : 'Confirmar',
					'icon'=>$model->isNewRecord ? 'plus-sign' : 'folder_close',
				)); ?>
		</div>
		</div>
<div class="col-md-2">
	<label class="form-check-label" for="exampleCheck1">Aprovar</label>
<?php echo $form->radioButton($model,'autorizacion_jefe',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)); ?>
</div>

<div class="col-md-2">
	<label class="form-check-label" for="exampleCheck1">Denegar</label>
<?php echo $form->radioButton($model,'autorizacion_jefe',array('value'=>2,'class'=>'form-check-input','uncheckValue'=>null));?>
</div>


</div>
<?php $this->endWidget(); ?>
