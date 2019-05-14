<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'reservaciones-form',
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->datePickerGroup($model,'fecha_ingreso',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	</div>
	<div class="form-group col-md-3">

	<?php echo $form->datePickerGroup($model,'fecha_salida',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
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

	<?php echo $form->textFieldGroup($model,'total',array('prepend' => 'Q','widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45,'readonly'=>'readonly','prepend'=>'Q.')))); ?>
	</div>
<div class="form-group col-md-9">

	<?php echo $form->labelEx($model,'observaciones',$htmloptions=array('style'=>'font-size:14px;')); ?>
	<?php echo $form->textArea($model,'observaciones',$htmloptions=array('class'=>'form-control'),array('rows'=>30, 'cols'=>50)); ?>
	<?php echo $form->error($model,'observaciones',$htmloptions=array('class'=>'text-danger')); ?>
</div>

	</div>
	<?php //echo $form->textFieldGroup($model,'total',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45,'readonly'=>'readonly')))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$model->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<br>
<br>
<?php
$detalle= new DetalleResevacion;
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-resevacion-form',
	'action' => ['DetalleResevacion/create'],
	'enableAjaxValidation'=>true,
)); ?>

<?php echo $form->errorSummary($detalle); ?>
<?php $detalle->id_reservacion=$model->id_reservacion;?>

<div class="row">
	<div class="form-group col-md-3">

	<?php echo $form->textFieldGroup($detalle,'id_reservacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','style'=>'')))); ?>
	</div>

	<div class="form-group col-md-5">

	<?php echo $form->labelEx( $detalle,'tipo_habitacion', array('label'=>'Tipo Habitacion','class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$detalle,
				        'attribute'=>'tipo_habitacion',
				        'data'=>CHtml::listData(TipoHabitacion::model()->findAll(array('order'=>'tipo_habitacioncol')), 'id_tipo_habitacion', 'tipo_habitacioncol'),
								'options' => array(
									'width' => '100%', ),
				)); ?>
	</div>
	<div class="form-group col-md-4">

	<?php echo $form->textFieldGroup($detalle,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style'=>'')))); ?>
	</div>
	

</div>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$detalle->isNewRecord ? 'Agregar' : 'Actualizar',
			'icon'=>$detalle->isNewRecord ? 'plus-sign' : 'refresh',
		));
		?>
</div>

<?php $this->endWidget(); ?>

<?php
$modelo= new DetalleResevacion;
?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-resevacion-grid',
'dataProvider'=>$modelo->search2($model->id_reservacion),
//'filter'=>$modelo,
'enablePagination'=>false,
	'columns'=>array(
			'id',
			'id_reservacion',
			array(
		    'name'=>'tipo_habitacion',
			'value'=>'$data->tipoHabitacion->tipo_habitacioncol',
			),
			'cantidad',
			'total',
		array(
		'class'=>'booster.widgets.TbButtonColumn',
			'buttons'=>array(
				'view'=>array(
					//'url'=>DetalleResevacionController/delete,
					'visible'=>'false',
				),
				'delete'=>array(
					//'url'=>DetalleResevacionController/delete,
					//'url'=>'Yii::app()->createUrl("detalleResevacion/delete")',
					'url'=>'Yii::app()->createUrl("/detalleResevacion/delete", array("id"=>$data["id"]))',

				),
				'update'=>array(
					//'url'=>DetalleResevacionController/delete,
					//'url'=>'Yii::app()->createUrl("detalleResevacion/delete")',
					'visible'=>'false',
					'url'=>'Yii::app()->createUrl("/detalleResevacion/update", array("id"=>$data["id"]))',

				),

			),
			//call the function 'renderButtons' from the current controller


		),

	),
)); ?>

