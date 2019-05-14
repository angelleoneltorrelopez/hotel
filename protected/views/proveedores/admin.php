<?php
$this->breadcrumbs=array(
	'Proveedores',
	'Buscar',
);

$this->menu=array(
array('label'=>'Crear Proveedores', 'icon'=>'plus-sign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('proveedores-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Proveedores</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'proveedores-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_proveedor',
		'nombre_proveedor',
		'nit_proveedor',
		'direccion_proveedor',
		'telefono',
		'fecha_creacion',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
