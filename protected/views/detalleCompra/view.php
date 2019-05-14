<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id_detalle_compra,
);


?>

<h1>Vista DetalleCompra #<?php echo $model->id_detalle_compra; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_detalle_compra',
		'id_ingreso_bodega',
		array(
		'name'=>'id_articulo',
		'value'=>$model->idArticulo->nombre_articulo,
		),
		'precio',
		'cantidad',
		'total',
),
)); ?>
