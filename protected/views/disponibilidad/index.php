<?php
$this->breadcrumbs=array(
	'Disponibilidads',
);

$this->menu=array(
array('label'=>'Crear Disponibilidad','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Disponibilidad','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Disponibilidads</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
