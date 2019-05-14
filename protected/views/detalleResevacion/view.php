<?php
$this->breadcrumbs=array(
	'Detalle Resevacion'=>array('index'),
	$model->id,
);


?>

<h1>Vista Detalle Resevacion #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'id_reservacion',
		array(
		'name'=>'tipo_habitacion',
		'value'=>$model->tipoHabitacion->tipo_habitacioncol,
		),
		'cantidad',
		'total',
),
)); ?>
