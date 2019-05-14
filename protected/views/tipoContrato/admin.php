<?php
$this->breadcrumbs=array(
	'Tipo Contratos',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Tipo Contrato', 'icon'=>'plus-sign', 'url'=>array('create')),
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
$.fn.yiiGridView.update('tipo-contrato-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Tipo Contratos</h1>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-contrato-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'nombre',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));
} ?>

<?php
if($user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-contrato-grid',
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
