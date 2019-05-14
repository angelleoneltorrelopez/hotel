<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'solicitud-compra-form',
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
	<?php echo $form->datePickerGroup($model,'fecha_solicitud',array('widgetOptions'=>array('options'=>array('language' =>'es','format'=>'yyyy-mm-dd'),
	'htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')), 'prepend'=>'<i class="glyphicon glyphicon-calendar"></i>')); ?>
</div>

<div class="form-group col-md-4">
	<?php echo $form->textFieldGroup($model,'total_estimado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly')))); ?>
</div>
</div>

<div class="form-row">
	<div class="form-group col-md-12">
<?php
$modelo= new DetalleSolicitudCompra;
?>

<?php $this->widget('booster.widgets.TbGridView',array(
//'id'=>'detalle-solicitud-compra-grid',
'dataProvider'=>$modelo->search2($model->id_solicitud_compra),
//'filter'=>$model,
'enablePagination'=>false,
//'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		array(
		'name'=>'id_articulo',
		'value'=>'$data->idArticulo->nombre_articulo',
		),
		'cantidad',
		'total',

),
));?>
</div>
</div>

<?php $this->endWidget(); ?>
