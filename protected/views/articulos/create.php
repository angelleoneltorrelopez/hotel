<?php
$this->breadcrumbs=array(
	'Articulos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Articulos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Articulos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
