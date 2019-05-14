<?php
$this->breadcrumbs=array(
	'Bodega'=>array('admin'),
	$model->id_articulo=>array('view','id'=>$model->id_articulo),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Bodega','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Bodega','icon'=>'eye-open','url'=>array('view','id'=>$model->id_articulo)),
	array('label'=>'Buscar Bodega','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Bodega <?php echo $model->id_articulo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
