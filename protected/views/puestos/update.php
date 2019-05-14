<?php
$this->breadcrumbs=array(
	'Puestos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Puestos','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Puestos','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Puestos','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Puestos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
