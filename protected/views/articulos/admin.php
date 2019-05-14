<?php
$this->breadcrumbs=array(
	'Articulos',
	'Buscar',
);
$user=Yii::app()->user;

$this->menu=array(
array('label'=>'Crear Articulos', 'icon'=>'plus-sign', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('articulos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Articulos</h1>

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'articulos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	    'id_articulo',
	    'nombre_articulo',
	    'codigo_articulo',
		  'precio',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
