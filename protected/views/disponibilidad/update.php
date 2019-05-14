<?php
$this->breadcrumbs=array(
	'Disponibilidads'=>array('index'),
	$model->id_detalle=>array('view','id'=>$model->id_detalle),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Disponibilidad','icon'=>'list-alt','url'=>array('index')),
	array('label'=>'Crear Disponibilidad','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Disponibilidad','icon'=>'eye-open','url'=>array('view','id'=>$model->id_detalle)),
	array('label'=>'Buscar Disponibilidad','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Disponibilidad <?php echo $model->id_detalle; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>