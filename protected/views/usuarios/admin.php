<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
$this->menu=array(
	array('label'=>'Crear Usuarios', 'icon'=>'plus-sign','url'=>array('create')),
);}


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('usuarios-grid', {
data: $(this).serialize()
});
return false;
});
");

?>


<h1>Busqueda Usuarios</h1>

<?php
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){

$this->widget('booster.widgets.TbGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		'password',
		array(
				 'name'=>'id_empleado',
				 'value'=>'$data->idEmpleado->nombre',
				),
		'email',
		'role',
		array(
			'class'=>'booster.widgets.TbButtonColumn',
		),
	),
));} ?>

<?php
if($user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'username',
		array(
				 'name'=>'id_empleado',
				 'value'=>'$data->idEmpleado->nombre',
				),
		'email',
		'role',
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
