<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	'Crear',
);

?>

<h1>Crear Detalle Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
