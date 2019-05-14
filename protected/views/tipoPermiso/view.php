<?php
$this->breadcrumbs=array(
	'Tipo Permisos'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;

if($user->checkAccess("gerente")||$user->checkAccess("jefe_RRHH")){
	$this->menu=array(
		array('label'=>'Crear Tipo Permiso','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Tipo Permiso','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Tipo Permiso','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
		array('label'=>'Buscar Tipo Permiso','icon'=>'search','url'=>array('admin')),
		);

}
if($user->checkAccess("recep")){
	$this->menu=array(
		array('label'=>'Buscar Tipo Permiso','icon'=>'search','url'=>array('admin')),
		);
}

?>

<h1>Vista Tipo de Permiso #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'nombre',
),
)); ?>
