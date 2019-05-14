<?php
$this->breadcrumbs=array(
	'Detalle Retiro Bodegas'=>array('index'),
	$model->id_detalle_retiro_bodega,
);

?>

<h1>Vista Detalle Retiro Bodega #<?php echo $model->id_detalle_retiro_bodega; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_detalle_retiro_bodega',
		'id_retiro_bodega',
		array(
		'name'=>'id_articulo',
		'value'=>$model->idArticulo->nombre_articulo,
		),
		'cantidad',
		'fecha_retiro',
),
)); ?>
