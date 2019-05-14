<?php
$this->breadcrumbs=array(
	'Solicitud Permisos',
);

$this->menu=array(
array('label'=>'Crear Solicitud Permiso','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Solicitud Permiso','icon'=>'search','url'=>array('admin')),

);
?>

<h1>Solicitud Permisos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
