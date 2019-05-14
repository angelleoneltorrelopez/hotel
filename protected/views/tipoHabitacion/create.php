<?php
$this->breadcrumbs=array(
	'Tipo Habitacion'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Tipo Habitacion','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Tipo de Habitacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
