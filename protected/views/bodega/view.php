<?php
$this->breadcrumbs=array(
	'Bodega'=>array('admin'),
	$model->id_articulo,
);

$this->menu=array(
/*
array('label'=>'Crear Bodega','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Bodega','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_articulo),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Bodega','icon'=>'refresh','url'=>array('update','id'=>$model->id_articulo)),
*/
array('label'=>'Buscar Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Bodega #<?php echo $model->id_articulo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	  array(
	  'name'=>'id_articulo',
	  'value'=>$model->idArticulo->nombre_articulo,
		),
		'cantidad',
),
)); ?>
