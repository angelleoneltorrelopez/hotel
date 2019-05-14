<?php
$this->breadcrumbs=array(
	'Tipo Permisos',
	'Buscar',
);

$user=Yii::app()->user;

if($user->checkAccess("gerente")||$user->checkAccess("jefe_RRHH")){
	$this->menu=array(
		array('label'=>'Crear Tipo Permiso', 'icon'=>'plus-sign', 'url'=>array('create')),
		);

}
if($user->checkAccess("recep")){
	$this->menu=array(
		);

}


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-permiso-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Tipo Permisos</h1>

<?php
if($user->checkAccess("gerente")||$user->checkAccess("jefe_RRHH")){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-permiso-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));} ?>

<?php
if($user->checkAccess("recep")){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-permiso-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
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
