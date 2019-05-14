<?php
$this->breadcrumbs=array(
	'Retiro Bodega'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Retiro Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Retiro Bodega</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
