<?php
$this->breadcrumbs=array(
	'Disponibilidads'=>array('index'),
	$model->id_detalle,
);

$this->menu=array(
array('label'=>'Listar Disponibilidad','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Crear Disponibilidad','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Disponibilidad','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_detalle),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Disponibilidad','icon'=>'refresh','url'=>array('update','id'=>$model->id_detalle)),
array('label'=>'Buscar Disponibilidad','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Disponibilidad #<?php echo $model->id_detalle; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_detalle',
		'entrada',
		'salida',
		'tipo_habitacion',
		'habitacion',
),
)); ?>
