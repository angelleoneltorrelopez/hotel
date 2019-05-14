<?php
$this->breadcrumbs=array(
	'Detalle Solicitud Compras',
);

$this->menu=array(
array('label'=>'Crear DetalleSolicitudCompra','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar DetalleSolicitudCompra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Detalle Solicitud Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
