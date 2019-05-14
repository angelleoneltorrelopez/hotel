<?php
$this->breadcrumbs=array(
	'Habitaciones'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Habitaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Habitaciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
