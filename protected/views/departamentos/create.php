<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Departamentos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Departamentos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
