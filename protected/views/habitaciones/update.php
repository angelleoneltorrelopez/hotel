<?php
$this->breadcrumbs=array(
	'Habitaciones'=>array('admin'),
	$model->id_habitacion=>array('view','id'=>$model->id_habitacion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Habitaciones','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Habitaciones','icon'=>'eye-open','url'=>array('view','id'=>$model->id_habitacion)),
	array('label'=>'Buscar Habitaciones','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Habitaciones <?php echo $model->id_habitacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
