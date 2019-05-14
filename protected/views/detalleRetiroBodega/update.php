<?php
$this->breadcrumbs=array(
	'Detalle Retiro Bodegas'=>array('index'),
	$model->id_detalle_retiro_bodega=>array('view','id'=>$model->id_detalle_retiro_bodega),
	'Actualizar',
);

	$this->menu=array(
	//array('label'=>'Listar DetalleRetiroBodega','icon'=>'list-alt','url'=>array('index')),
	//array('label'=>'Crear DetalleRetiroBodega','icon'=>'plus-sign','url'=>array('create')),
	//array('label'=>'Vista DetalleRetiroBodega','icon'=>'eye-open','url'=>array('view','id'=>$model->id_detalle_retiro_bodega)),
	//array('label'=>'Buscar DetalleRetiroBodega','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Detalle Retiro Bodega <?php echo $model->id_detalle_retiro_bodega; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
