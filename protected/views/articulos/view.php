<?php
$this->breadcrumbs=array(
	'Articulos'=>array('admin'),
	$model->id_articulo,
);

$this->menu=array(
array('label'=>'Crear Articulos','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Articulos','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_articulo),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Articulos','icon'=>'refresh','url'=>array('update','id'=>$model->id_articulo)),
array('label'=>'Buscar Articulos','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Articulos #<?php echo $model->id_articulo; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	    'id_articulo',
	    'nombre_articulo',
	    'codigo_articulo',
		  'precio',
),
)); ?>
