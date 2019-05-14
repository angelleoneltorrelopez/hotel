<?php
$this->breadcrumbs=array(
	'Habitaciones',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Crear Habitaciones', 'icon'=>'plus-sign', 'url'=>array('create')),
		);
}


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('habitaciones-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Habitaciones</h1>

<?php if($user->checkAccess('gerente')||$user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'habitaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	'id_habitacion',
		array(
				 'name'=>'tipo_habitacion',
				 'value'=>'$data->tipoHabitacion->tipo_habitacioncol',
				),
		'numero',
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(
	/*'view'=>array(
		'visible'=>'false',
	),
	'delete'=>array(

	),
	'update'=>array(
	),*/

),
),
),
)); }
?>
<?php if($user->checkAccess('enc_hab')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'habitaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	'id_habitacion',
		array(
				 'name'=>'tipo_habitacion',
				 'value'=>'$data->tipoHabitacion->tipo_habitacioncol',
				),
		'numero',
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
)); }
?>
