<?php
$this->breadcrumbs=array(
	'Mantenimientos'=>array('admin'),
	'Crear',
);

$this->menu=array(
//array('label'=>'Listar Mantenimiento','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Busqueda Mantenimiento','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Mantenimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
