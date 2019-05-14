<?php
$this->breadcrumbs=array(
	'Solicitud de Compras'=>array('admin'),
	$model->id_solicitud_compra=>array('view2','id'=>$model->id_solicitud_compra),
	'Firmar',
);

	$this->menu=array(
	array('label'=>'Vista Solicitud de Compras','icon'=>'eye-open','url'=>array('view2','id'=>$model->id_solicitud_compra)),
	array('label'=>'Buscar Solicitud de Compras','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Firmar Solicitud de Compras #<?php echo $model->id_solicitud_compra; ?></h1>
	
<?php echo $this->renderPartial('_form_rh',array('model'=>$model)); ?>
