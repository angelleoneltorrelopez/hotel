<?php
$this->breadcrumbs=array(
	'Bodega'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Bodega</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
