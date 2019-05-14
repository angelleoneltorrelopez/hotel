<?php
$this->breadcrumbs=array(
	'Ingreso Bodegas',
	'Buscar',
);

$this->menu=array(
array('label'=>'Crear Ingreso Bodega', 'icon'=>'plus-sign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('ingreso-bodega-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Ingreso Bodegas</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'ingreso-bodega-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	'id_ingreso',
		array(
				 'name'=>'id_proveedor',
				 'value'=>'$data->idProveedor->nombre_proveedor',
				),
				array(
						 'name'=>'id_solicitud_compra',
						 'value'=>'$data->idSolicitudCompra->id_solicitud_compra',
						),
		'numero_factura',
		'fecha_factura',
		'fecha_ingreso',

		'total',
		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
