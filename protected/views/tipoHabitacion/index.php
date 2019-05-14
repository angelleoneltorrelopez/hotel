<?php
$this->breadcrumbs=array(
	'Tipo Habitacion',
);

$this->menu=array(
array('label'=>'Crear Tipo Habitacion','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Tipo Habitacion','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Tipo Habitacion</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
