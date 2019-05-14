<?php
$this->breadcrumbs=array(
	'Departamentos'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')){
$this->menu=array(
array('label'=>'Crear Departamentos','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Departamentos','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Departamentos','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
array('label'=>'Buscar Departamentos','icon'=>'search','url'=>array('admin')),
);
}
if($user->checkAccess('jefe_RRHH')||$user->checkAccess('jefe_mant')||$user->checkAccess('enc_edif')||$user->checkAccess('recep')){
	$this->menu=array(
	array('label'=>'Buscar Departamentos','icon'=>'search','url'=>array('admin')),
	);
	}
?>

<h1>Vista Departamentos #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
),
)); ?>
