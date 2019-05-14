<?php
$this->breadcrumbs=array(
	'Contratos'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Contratos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Contratos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
