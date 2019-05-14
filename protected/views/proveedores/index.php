<?php
$this->breadcrumbs=array(
	'Proveedores',
);

$this->menu=array(
array('label'=>'Crear Proveedores','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Proveedores','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Proveedores</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
