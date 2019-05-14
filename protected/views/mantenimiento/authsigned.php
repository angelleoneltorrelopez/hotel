<?php
$this->breadcrumbs=array(
	'mantenimiento'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Firmar',
);

	$this->menu=array(
	array('label'=>'Vista Mantenimiento','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Mantenimiento','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Firmar Solicitud Mantenimiento #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_rh',array('model'=>$model)); ?>
