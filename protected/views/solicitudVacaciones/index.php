<?php
$this->breadcrumbs=array(
	'Solicitud Vacaciones',
);

$this->menu=array(
array('label'=>'Crear Solicitud Vacaciones','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Solicitud Vacaciones','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Solicitud Vacaciones</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
