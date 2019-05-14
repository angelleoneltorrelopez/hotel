<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-vacaciones-form',
	'type' => 'vertical',
	'htmlOptions' => array('class' => 'well', 'style'=>'background-color:rgba(150, 154, 182, 0.29)'),
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($model); ?>
<div class="form-row">
    <div class="form-group col-md-6">
<?php echo $form->labelEx( $model,'empleado', array('class'=>'className') ); ?>
		<?php $this->widget('bootstrap.widgets.TbSelect2',array(
						'model'=>$model,
						'attribute'=>'empleado',
						'data'=>CHtml::listData(Empleados::model()->findAll(array('order'=>'nombre')), 'id', 'nombre'),
						'options' => array('width' => '100%'),
						'disabled' => true,
		)); ?>

	</div>
	<div class="form-group col-md-6">
	<?php echo $form->datePickerGroup($model,'fecha_solicitud',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),
	'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
	<?php echo $form->datePickerGroup($model,'fecha_inicio',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
<div class="form-group col-md-6">

	<?php echo $form->datePickerGroup($model,'fecha_fin',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>
</div>

<div class="form-row">
<div class="form-group col-md-6">
	<?php echo $form->textFieldGroup($model,'dias_totales',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
</div>
<div class="form-group col-md-6">
<!--**************************************** JEFE INMEDIATO ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_inme")){ ?>
	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>
	<br>
	<?php echo $form->radioButton($model,'firma_jefe_inmediato',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>
	<br>
	<?php } ?>
<!--**************************************** RECURSOS HUMANOS ********************************************************************-->
	<?php if(Yii::app()->user->checkAccess("jefe_RRHH")){ ?>
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)).' Autorizar   '; ?>
	<br>
	<?php echo $form->radioButton($model,'firma_RH',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null)).' Rechazar';?>
	<br>
	<?php } ?>
<!--**************************************** GERENTE ********************************************************************-->
<?php if(Yii::app()->user->checkAccess("gerente")){ ?>
<?php echo $form->radioButton($model,'firma_gerencia',array('value'=>1,'class'=>'form-check-input','uncheckValue'=>null)); ?>
<label class="form-check-label" for="exampleCheck1">Autorizar</label>
<br>
<?php echo $form->radioButton($model,'firma_gerencia',array('value'=>2, 'class'=>'form-check-input','uncheckValue'=>null));?>
<label class="form-check-label" for="exampleCheck2">Denegar</label>
<br>
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
