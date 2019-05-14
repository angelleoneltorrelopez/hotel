<?php
$this->breadcrumbs=array(
	'Horarios'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Horarios','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Horarios','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Horarios','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
		array('label'=>'Buscar Horarios','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Buscar Horarios','icon'=>'search','url'=>array('admin')),
		);
}

?>

<h1>Vista Horarios #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
		'fin',
		'inicio',
		'dias_semana',
		'horas_semanales',
),
)); ?>
