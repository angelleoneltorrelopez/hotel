<?php
$this->breadcrumbs=array(
	'Disponibilidads'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Disponibilidad','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Busqueda Disponibilidad','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Disponibilidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>