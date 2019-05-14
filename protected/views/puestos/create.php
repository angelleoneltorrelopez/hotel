<?php
$this->breadcrumbs=array(
	'Puestos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Puestos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Puestos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
