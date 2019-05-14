<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'contratos-form',
	'type' => 'vertical',
	'htmlOptions' => array('class' => 'well', 'style'=>'background-color:rgba(150, 154, 182, 0.29)'),
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="row">
	<div class="form-group col-md-4">
	<?php echo $form->labelEx( $model,'tipo', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'tipo',
								'data'=>CHtml::listData(TipoContrato::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%'),
								'disabled' => true,
				)); ?>
</div>

<div class="form-group col-md-4">
	<?php echo $form->labelEx( $model,'empleado', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'empleado',
								'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%'),
								'disabled' => true,
				)); ?>
</div>


<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>
	array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')),
	'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

</div>
</div>

<div class="row">
	<div class="form-group col-md-6">
<?php echo $form->labelEx( $model,'horario', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'horario',
							'data'=>CHtml::listData(Horarios::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
							'options' => array('width' => '100%'),
							'disabled' => true,
			)); ?>
</div>

<div class="form-group col-md-6">
<?php echo $form->labelEx( $model,'puesto_trabajo', array('class'=>'className') ); ?>
			<?php $this->widget('bootstrap.widgets.TbSelect2',array(
							'model'=>$model,
							'attribute'=>'puesto_trabajo',
							'data'=>CHtml::listData(Puestos::model()->findAll(array('order'=>'titulo')), 'id', 'titulo'),
							'options' => array('width' => '100%'),
							'disabled' => true,
			)); ?>
</div>
</div>

<div class="row">
	<div class="form-group col-md-12">
<?php echo $form->textAreaGroup($model,'observaciones', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span8','readonly'=>'readonly')))); ?>
</div>
</div>

<!--**************************************** RECURSOS HUMANOS ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_RRHH")){ ?>
		<div class="row">
	<div class="col-md-4 col-md-offset-1">
		<label class="form-check-label" for="exampleCheck1">Aprovar</label>
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)); ?>
	</div>

	<div class="col-md-4 col-md-offset-1">
		<label class="form-check-label" for="exampleCheck1">Denegar</label>
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>2,'class'=>'form-check-input','uncheckValue'=>null));?>
	</div>
	</div>
	<?php } ?>

	<!--**************************************** GERENTE ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("gerente")){ ?>

		<div class="row">
	<div class="col-md-4 col-md-offset-1">
		<label class="form-check-label" for="exampleCheck1">Aprovar</label>
	<?php echo $form->radioButton($model,'firma_gerencia',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)); ?>
	</div>

	<div class="col-md-4 col-md-offset-1">
		<label class="form-check-label" for="exampleCheck1">Denegar</label>
	<?php echo $form->radioButton($model,'firma_gerencia',array('value'=>2,'class'=>'form-check-input','uncheckValue'=>null));?>
	</div>
	</div>
	<?php } ?>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear' : 'Confirmar',
				'icon'=>$model->isNewRecord ? 'plus-sign' : 'folder_close',
			)); ?>
	</div>

<?php $this->endWidget(); ?>
