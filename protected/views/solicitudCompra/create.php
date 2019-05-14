<?php
$this->breadcrumbs=array(
	'Solicitud Compras'=>array('admin'),
	'Crear',
);

$this->menu=array(
array('label'=>'Busqueda Solicitud Compra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Solicitud de Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
