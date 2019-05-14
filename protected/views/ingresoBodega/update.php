<?php
$this->breadcrumbs=array(
	'Ingreso Bodegas'=>array('admin'),
	$model->id_ingreso=>array('view','id'=>$model->id_ingreso),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Ingreso Bodega','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Ingreso Bodega','icon'=>'eye-open','url'=>array('view','id'=>$model->id_ingreso)),
	array('label'=>'Buscar Ingreso Bodega','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Ingreso Bodega <?php echo $model->id_ingreso; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
