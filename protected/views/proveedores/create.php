<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Proveedores','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Proveedores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
