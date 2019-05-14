<?php
$this->breadcrumbs=array(
	'Solicitud Permisos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Solicitud Permiso','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Solicitud de Permiso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
