<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'mantenimiento-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>


	<?php echo $form->labelEx( $model,'id_empleado', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
			        'model'=>$model,
			        'attribute'=>'id_empleado',
			        'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
							'options' => array('width' => '100%',),
			)); ?>

	<?php echo $form->textFieldGroup($model,'fecha',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5',
	'value'=>date('Y-m-d'),'readOnly'=>'readOnly','maxlength'=>255)))); ?>




		<?php echo $form->labelEx( $model,'id_departamento', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
			        'model'=>$model,
			        'attribute'=>'id_departamento',
			        'data'=>CHtml::listData(Departamentos::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
							'options' => array(
			                    'width' => '100%',),
			)); ?>

	<?php echo $form->textFieldGroup($model,'objeto',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255)))); ?>

	<?php echo $form->textAreaGroup($model,'diagnostico', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>

	<?php echo $form->textAreaGroup($model,'solucion', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8')))); ?>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
