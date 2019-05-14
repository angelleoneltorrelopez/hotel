<?php
$this->breadcrumbs=array(
	'Retiro Bodega',
	'Buscar',
);

$this->menu=array(
array('label'=>'Crear Retiro Bodega', 'icon'=>'plus-sign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('retiro-bodega-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Retiro Bodega</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'retiro-bodega-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	     'id_retiro_bodega',
			array(
					 'name'=>'id_empleado',
					 'value'=>'$data->idEmpleado->nombre',
					),
		'fecha_solicitud',
		'destino',

array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
