<?php
$this->breadcrumbs=array(
	'Puestos',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Puestos', 'icon'=>'plus-sign', 'url'=>array('create')),
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
$.fn.yiiGridView.update('puestos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Puestos</h1>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'puestos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	        'id',
			'titulo',
			array(
					 'name'=>'departamento',
					 'value'=>'$data->departamento0->nombre',
					),
		'salario_min',
		'salario_max',
		'bono',
		/*
		'descripcion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); }?>
<?php
if($user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'puestos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	        'id',
			'titulo',
			array(
					 'name'=>'departamento',
					 'value'=>'$data->departamento0->nombre',
					),
		'salario_min',
		'salario_max',
		'bono',
		/*
		'descripcion',
		*/
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
