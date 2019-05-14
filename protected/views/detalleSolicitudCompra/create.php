<?php
$this->breadcrumbs=array(
	'Detalle Solicitud Compras'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar DetalleSolicitudCompra','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Busqueda DetalleSolicitudCompra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Crear Detalle Solicitud Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
