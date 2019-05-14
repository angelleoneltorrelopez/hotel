<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'contratos-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row">
	<div class="form-group col-md-4">
	<?php echo $form->labelEx( $model,'tipo', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'tipo',
								'data'=>CHtml::listData(TipoContrato::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%',),
				)); ?>
</div>



<div class="form-group col-md-4">
	<?php echo $form->labelEx( $model,'empleado', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'empleado',
								'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%',),
				)); ?>
</div>


<div class="form-group col-md-4">
		<?php echo $form->textFieldGroup($model,'fechacreacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
		'value'=>date('Y-m-d'),'readOnly'=>'readOnly','maxlength'=>255)))); ?>
	</div>
	</div>

<div class="row">
	<div class="form-group col-md-4">
<?php echo $form->labelEx( $model,'horario', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'horario',
							'data'=>CHtml::listData(Horarios::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
							'options' => array('width' => '100%',),
			)); ?>
</div>

<div class="form-group col-md-4">
<?php echo $form->labelEx( $model,'puesto_trabajo', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'puesto_trabajo',
							'data'=>CHtml::listData(Puestos::model()->findAll(array('order'=>'titulo')), 'id', 'titulo'),
							'options' => array('width' => '100%',),
			)); ?>
</div>
<div class="form-group col-md-4">
<?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>
array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5')),
'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
</div>


<div class="row">
	<div class="form-group col-md-12">
<?php echo $form->textAreaGroup($model,'observaciones', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>
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
