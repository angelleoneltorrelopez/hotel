<?php
$this->breadcrumbs=array(
	'Detalle Solicitud Compras'=>array('index'),
	$model->id_detalle_solicitud_compra,
);

$this->menu=array(
array('label'=>'Listar DetalleSolicitudCompra','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Crear DetalleSolicitudCompra','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar DetalleSolicitudCompra','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_detalle_solicitud_compra),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar DetalleSolicitudCompra','icon'=>'refresh','url'=>array('update','id'=>$model->id_detalle_solicitud_compra)),
array('label'=>'Buscar DetalleSolicitudCompra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Detalle Solicitud Compra #<?php echo $model->id_detalle_solicitud_compra; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_detalle_solicitud_compra',
		'id_solicitud_compra',
		array(
		 'name'=>'id_articulo',
		 'value'=>$model->idArticulo->nombre_articulo,
			),
		'cantidad',
		'total',
),
)); ?>
