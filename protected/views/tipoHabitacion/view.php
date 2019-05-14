<?php
$this->breadcrumbs=array(
	'Tipo Habitacion'=>array('admin'),
	$model->id_tipo_habitacion,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
$this->menu=array(
array('label'=>'Crear Tipo Habitacion','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Tipo Habitacion','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_habitacion),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Tipo Habitacion','icon'=>'refresh','url'=>array('update','id'=>$model->id_tipo_habitacion)),
array('label'=>'Buscar Tipo Habitacion','icon'=>'search','url'=>array('admin')),
);
}

if($user->checkAccess('enc_hab')){
	$this->menu=array(
	array('label'=>'Buscar Tipo Habitacion','icon'=>'search','url'=>array('admin')),
	);
	}
?>

<h1>Vista Tipo de Habitacion #<?php echo $model->id_tipo_habitacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	    'id_tipo_habitacion',
	    'tipo_habitacioncol',
		  'tarifa',
),
)); ?>
