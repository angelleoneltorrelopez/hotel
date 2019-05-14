<?php
$this->breadcrumbs=array(
	'Solicitud Compras',
);

$this->menu=array(
array('label'=>'Crear Solicitud Compra','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Solicitud Compra','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Solicitud de Compras</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
