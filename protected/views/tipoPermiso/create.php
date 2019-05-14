<?php
$this->breadcrumbs=array(
	'Tipo Permisos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Tipo Permiso','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Tipo de Permiso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
