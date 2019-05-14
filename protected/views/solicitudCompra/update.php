<?php
$this->breadcrumbs=array(
	'Solicitud Compras'=>array('admin'),
	$model->id_solicitud_compra=>array('view2','id'=>$model->id_solicitud_compra),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Solicitud Compra','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Solicitud Compra','icon'=>'eye-open','url'=>array('view2','id'=>$model->id_solicitud_compra)),
	array('label'=>'Buscar Solicitud Compra','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Solicitud de Compra <?php echo $model->id_solicitud_compra; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
