<?php
$this->breadcrumbs=array(
	'Retiro Bodega'=>array('admin'),
	$model->id_retiro_bodega=>array('view','id'=>$model->id_retiro_bodega),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Retiro Bodega','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Retir oBodega','icon'=>'eye-open','url'=>array('view','id'=>$model->id_retiro_bodega)),
	array('label'=>'Buscar Retiro Bodega','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Retiro Bodega <?php echo $model->id_retiro_bodega; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
