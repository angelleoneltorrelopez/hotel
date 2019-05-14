<?php
$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Empleados','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Empleados','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Empleados','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Empleados <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
