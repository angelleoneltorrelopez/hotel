<?php
$this->breadcrumbs=array(
	'Departamentos',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')){
$this->menu=array(
array('label'=>'Crear Departamentos', 'icon'=>'plus-sign', 'url'=>array('create')),
);
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('departamentos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Departamentos</h1>

<?php
if($user->checkAccess('gerente')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'departamentos-grid',
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
if($user->checkAccess('jefe_RRHH')||$user->checkAccess('jefe_mant')||$user->checkAccess('enc_edif')||$user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'departamentos-grid',
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
));} ?>
