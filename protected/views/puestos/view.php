<?php
$this->breadcrumbs=array(
	'Puestos'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Puestos','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Puestos','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Puestos','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
		array('label'=>'Buscar Puestos','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Buscar Puestos','icon'=>'search','url'=>array('admin')),
		);
}

?>

<h1>Vista Puestos #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	     'id',
		 'titulo',
		 array(
			'name'=>'departamento',
			'value'=>$model->departamento0->nombre,
			 ),
		'salario_min',
		'salario_max',
		'bono',
		'descripcion',
),
)); ?>
