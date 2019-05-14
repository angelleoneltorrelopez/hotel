<?php
$this->breadcrumbs=array(
	'Ingreso Bodegas',
);

$this->menu=array(
array('label'=>'Crear Ingreso Bodega','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Ingreso Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Ingreso Bodegas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
