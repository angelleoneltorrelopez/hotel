<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){

$this->menu=array(
array('label'=>'Crear Usuarios','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Usuarios','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Usuarios','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
array('label'=>'Buscar Usuarios','icon'=>'search','url'=>array('admin')),
);
}

if($user->checkAccess('recep')){
	$this->menu=array(
	array('label'=>'Buscar Usuarios','icon'=>'search','url'=>array('admin')),
		);
}?>



<h1>Vista Usuarios #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		 'id',
		 'username',
	     'password',
			 array(
				'name'=>'id_empleado',
				'value'=>$model->idEmpleado->nombre,
				 ),

		'email',
		'role',
),
)); ?>
