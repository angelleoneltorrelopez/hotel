<?php
$this->breadcrumbs=array(
	'Solicitud Vacaciones'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Firmar',
);

	$this->menu=array(
	array('label'=>'Vista Solicitud Vacaciones','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Solicitud Vacaciones','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Firmar Solicitud Vacaciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form_rh',array('model'=>$model)); ?>
