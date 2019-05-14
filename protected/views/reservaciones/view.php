<?php

$this->breadcrumbs=array(
	'Reservaciones'=>array('admin'),
	$model->id_reservacion,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Crear Reservaciones','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Reservaciones','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reservacion),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Reservaciones','icon'=>'refresh','url'=>array('update','id'=>$model->id_reservacion)),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('enc_hab')){
	$this->menu=array(
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
	);
}

?>

<h1>Vista Reservaciones #<?php echo $model->id_reservacion; ?></h1>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(

)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">

	
	<div class="form-group col-md-3">
	<?php echo $form->datePickerGroup($model,'fecha_ingreso',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>

	</div>
	<div class="form-group col-md-1">
	</div>
	<div class="form-group col-md-3">

	<?php echo $form->datePickerGroup($model,'fecha_salida',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
	</div>
	
</div>

<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'id_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
	</div>
	<div class="form-group col-md-5">
	<?php echo $form->textFieldGroup($model,'nombre_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255,'readonly'=>'readonly')))); ?>
	</div>
	<div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'correo_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>255,'readonly'=>'readonly')))); ?>
	</div>

</div>

<div class="row">
	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'tel_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>

	</div>
	<div class="form-group col-md-5">
	<?php echo $form->textFieldGroup($model,'nacionalidad_huesped',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45,'readonly'=>'readonly')))); ?>

	</div>
	<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'cantidad_infantes',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>

	</div>
	<div class="form-group col-md-2">
	<?php echo $form->textFieldGroup($model,'cantidad_adultos',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>

	</div>
</div>
<div class="row">

	<div class="form-group col-md-3">
	<?php echo $form->textFieldGroup($model,'total',array('prepend' => 'Q','widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>45,'readonly'=>'readonly')))); ?>

	</div>
	<div class="form-group col-md-9">

	<?php echo $form->labelEx($model,'observaciones',$htmloptions=array('style'=>'font-size:14px;')); ?>
	<?php echo $form->textArea($model,'observaciones',$htmloptions=array('class'=>'form-control','readonly'=>'readonly'),array('rows'=>30, 'cols'=>50)); ?>
	
	</div>
</div>

<?php $this->endWidget(); ?>


<?php

$modelo= new DetalleResevacion;
?>


<?php 

$this->widget('booster.widgets.TbGridView',array(
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
	

	),
)); ?>
