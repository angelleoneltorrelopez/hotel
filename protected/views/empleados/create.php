<?php
$this->breadcrumbs=array(
	'Empleados'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Empleados','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Empleados</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
