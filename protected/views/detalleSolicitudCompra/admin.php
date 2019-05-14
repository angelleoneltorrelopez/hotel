<?php
$this->breadcrumbs=array(
	'Detalle Solicitud Compras'=>array('index'),
	'Buscar',
);

$this->menu=array(
array('label'=>'Listar DetalleSolicitudCompra','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Crear DetalleSolicitudCompra', 'icon'=>'plus-sign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('detalle-solicitud-compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Detalle Solicitud Compras</h1>

<p>
	Opcionalmente puede ingresar un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	o <b>=</b>) al comienzo de cada uno de sus valores de búsqueda para especificar cómo se debe hacer la comparación.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-solicitud-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_detalle_solicitud_compra',
		'id_solicitud_compra',
		array(
		'name'=>'id_articulo',
		'value'=>'$data->idArticulo->nombre_articulo',
		),
		'cantidad',
		'total',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
