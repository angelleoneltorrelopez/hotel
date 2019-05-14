<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id_detalle_compra=>array('view','id'=>$model->id_detalle_compra),
	'Actualizar',
);

	?>

	<h1>Actualizar DetalleCompra <?php echo $model->id_detalle_compra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
