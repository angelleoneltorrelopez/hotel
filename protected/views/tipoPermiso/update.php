<?php
$this->breadcrumbs=array(
	'Tipo Permisos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Tipo Permiso','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Tipo Permiso','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Tipo Permiso','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Tipo de Permiso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
