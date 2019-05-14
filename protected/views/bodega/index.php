<?php
$this->breadcrumbs=array(
	'Bodega',
);

$this->menu=array(
array('label'=>'Crear Bodega','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Bodega</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
