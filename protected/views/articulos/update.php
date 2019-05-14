<?php
$this->breadcrumbs=array(
	'Articulos'=>array('admin'),
	$model->id_articulo=>array('view','id'=>$model->id_articulo),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Articulos','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Articulos','icon'=>'eye-open','url'=>array('view','id'=>$model->id_articulo)),
	array('label'=>'Buscar Articulos','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Articulos <?php echo $model->id_articulo; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
