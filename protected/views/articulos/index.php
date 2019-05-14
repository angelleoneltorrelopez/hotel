<?php
$this->breadcrumbs=array(
	'Articulos',
);

$this->menu=array(
array('label'=>'Crear Articulos','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Articulos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Articulos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
