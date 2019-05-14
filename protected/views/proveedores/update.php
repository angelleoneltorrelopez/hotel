<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('admin'),
	$model->id_proveedor=>array('view','id'=>$model->id_proveedor),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Proveedores','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Proveedores','icon'=>'eye-open','url'=>array('view','id'=>$model->id_proveedor)),
	array('label'=>'Buscar Proveedores','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Proveedores <?php echo $model->id_proveedor; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
