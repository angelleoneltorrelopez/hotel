<?php
$this->breadcrumbs=array(
	'Detalle Solicitud Compras'=>array('index'),
	$model->id_detalle_solicitud_compra=>array('view','id'=>$model->id_detalle_solicitud_compra),
	'Actualizar',
);

	$this->menu=array(
	//array('label'=>'Listar DetalleSolicitudCompra','icon'=>'list-alt','url'=>array('index')),
	//array('label'=>'Crear DetalleSolicitudCompra','icon'=>'plus-sign','url'=>array('create')),
	//array('label'=>'Vista DetalleSolicitudCompra','icon'=>'eye-open','url'=>array('view','id'=>$model->id_detalle_solicitud_compra)),
	//array('label'=>'Buscar DetalleSolicitudCompra','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Detalle Solicitud Compra <?php echo $model->id_detalle_solicitud_compra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
