<?php
$this->breadcrumbs=array(
	'Ingreso Bodegas'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Ingreso Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Ingreso Bodega</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
