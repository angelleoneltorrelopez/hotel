<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-permiso-form',
	'type' => 'vertical',
	'htmlOptions' => array('class' => 'well'),
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="form-row">
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
		<?php echo $form->labelEx( $model,'tipo', array('class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
								'model'=>$model,
								'attribute'=>'tipo',
								'data'=>CHtml::listData(TipoPermiso::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
								'options' => array('width' => '100%'),
								'disabled' => true,
				)); ?>
</div>
<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha_solicitud',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),
	'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
</div>
</div>
<div class="form-row">
		<div class="form-input col-md-12">
	<?php echo $form->textAreaGroup($model,'motivo', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'span15','readonly'=>'readonly')))); ?>
</div>
</div>
	<div class="form-row">
	    <div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
<div class="form-group col-md-4">
	<?php echo $form->datePickerGroup($model,'fecha_fin',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
<div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'cantidad_dias',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span12','readonly'=>'readonly')))); ?>
</div>
</div>

<!--**************************************** JEFE INMEDIATO ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_inme")){ ?>
		<div class="form-row">
	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>

	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>

	</div>
	<?php } ?>
<!--**************************************** RECURSOS HUMANOS ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_RRHH")){ ?>
		<div class="form-row">
		<div class="form-group col-md-4">
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>
</div>
	<div class="form-group col-md-4">
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>
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
