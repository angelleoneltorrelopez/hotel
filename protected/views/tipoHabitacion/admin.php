<?php
$this->breadcrumbs=array(
	'Tipo Habitacion',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
$this->menu=array(
array('label'=>'Crear Tipo Habitacion', 'icon'=>'plus-sign', 'url'=>array('create')),
);
}
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-habitacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Tipo Habitacion</h1>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-habitacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	    'id_tipo_habitacion',
		'tipo_habitacioncol',
		'tarifa',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); }?>

<?php
if($user->checkAccess('enc_hab')){
	$this->widget('booster.widgets.TbGridView',array(
	'id'=>'tipo-habitacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
			'id_tipo_habitacion',
			'tipo_habitacioncol',
			'tarifa',
	array(
	'class'=>'booster.widgets.TbButtonColumn',
	'buttons'=>array(

		'delete'=>array(
			'visible'=>'false',

		),
		'update'=>array(
					'visible'=>'false',

		),

	),
	),
	),
	)); }?>
