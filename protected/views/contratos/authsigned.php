<?php
$this->breadcrumbs=array(
	'Solicitud Permisos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Firmar',
);

	$this->menu=array(
	array('label'=>'Vista SolicitudPermiso','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar SolicitudPermiso','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Firmar Solicitud Permiso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_rh',array('model'=>$model)); ?>
