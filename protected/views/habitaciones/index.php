<?php
$this->breadcrumbs=array(
	'Habitaciones',
);

$this->menu=array(
array('label'=>'Crear Habitaciones','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Habitaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Habitaciones</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
