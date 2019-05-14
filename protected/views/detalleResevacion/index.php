<?php
$this->breadcrumbs=array(
	'Detalle Resevacion',
);

$this->menu=array(
//array('label'=>'Crear DetalleResevacion','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar DetalleResevacion','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Detalle Resevacion</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
