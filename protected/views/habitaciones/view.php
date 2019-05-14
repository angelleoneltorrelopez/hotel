

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
   // 'block'=>true,
)); ?>

<?php
$this->breadcrumbs=array(
	'Habitaciones'=>array('admin'),
	$model->id_habitacion,
);

$this->menu=array(
array('label'=>'Crear Habitaciones','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Habitaciones','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_habitacion),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Habitaciones','icon'=>'refresh','url'=>array('update','id'=>$model->id_habitacion)),
array('label'=>'Buscar Habitaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Habitaciones #<?php echo $model->id_habitacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id_habitacion',
		array(
			'name'=>'tipo_habitacion',
			'value'=>$model->tipoHabitacion->tipo_habitacioncol,
			 ),
		'numero',
),
)); ?>
