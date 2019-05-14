<?php
$this->breadcrumbs=array(
	'Bodega',
	'Buscar',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('bodega-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Bodega</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'bodega-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	  array(
	  'name'=>'id_articulo',
	  'value'=>'$data->idArticulo->nombre_articulo',
	  ),
		'cantidad',
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(
	'view'=>array(

	),
	'delete'=>array(
		'visible'=>'false',

	),
	'update'=>array(
		'visible'=>'false',
	),

),
),
),
)); ?>
