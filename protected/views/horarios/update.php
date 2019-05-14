<?php
$this->breadcrumbs=array(
	'Horarios'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Horarios','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Horarios','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Horarios','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Horarios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
