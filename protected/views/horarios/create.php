<?php
$this->breadcrumbs=array(
	'Horarios'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Horarios','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Horarios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
