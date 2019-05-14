<?php
$this->breadcrumbs=array(
	'Detalle Resevacion'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	?>

	<h1>Actualizar Detalle Resevacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>