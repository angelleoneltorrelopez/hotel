<?php
$this->breadcrumbs=array(
	'Horarios',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Horarios', 'icon'=>'plus-sign', 'url'=>array('create')),
		);
}
if($user->checkAccess('recep')){
	$this->menu=array(
		);
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('horarios-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Horarios</h1>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'horarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
		'fin',
		'inicio',
		'dias_semana',
		'horas_semanales',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));} ?>

<?php
if($user->checkAccess('recep')){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'horarios-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
		'fin',
		'inicio',
		'dias_semana',
		'horas_semanales',
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
));} ?>
