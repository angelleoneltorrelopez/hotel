<?php
$this->breadcrumbs=array(
	'Departamentos',
);

$this->menu=array(
array('label'=>'Crear Departamentos','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Departamentos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Departamentos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
