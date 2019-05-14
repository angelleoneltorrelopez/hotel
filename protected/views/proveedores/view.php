<?php
$this->breadcrumbs=array(
	'Proveedores'=>array('admin'),
	$model->id_proveedor,
);

$this->menu=array(
array('label'=>'Crear Proveedores','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Proveedores','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proveedor),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Proveedores','icon'=>'refresh','url'=>array('update','id'=>$model->id_proveedor)),
array('label'=>'Buscar Proveedores','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Proveedores #<?php echo $model->id_proveedor; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_proveedor',
		'nombre_proveedor',
		'nit_proveedor',
		'direccion_proveedor',
		'telefono',
		'fecha_creacion',
),
)); ?>
