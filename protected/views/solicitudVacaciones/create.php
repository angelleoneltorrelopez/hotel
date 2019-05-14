<?php
$this->breadcrumbs=array(
	'Solicitud Vacaciones'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Solicitud Vacaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Solicitud de Vacaciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
