<?php
$this->breadcrumbs=array(
	'Contratos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Contratos','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Contratos','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Contratos','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Contratos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
