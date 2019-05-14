<?php
$this->breadcrumbs=array(
	'Mantenimientos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	//array('label'=>'Listar Mantenimiento','icon'=>'list-alt','url'=>array('index')),
	array('label'=>'Crear Mantenimiento','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Mantenimiento','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Mantenimiento','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Mantenimiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
