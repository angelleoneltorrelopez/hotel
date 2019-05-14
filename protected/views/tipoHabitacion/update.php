<?php
$this->breadcrumbs=array(
	'Tipo Habitacion'=>array('admin'),
	$model->id_tipo_habitacion=>array('view','id'=>$model->id_tipo_habitacion),
	'Actualizar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){

	$this->menu=array(
	array('label'=>'Crear Tipo Habitacion','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Tipo Habitacion','icon'=>'eye-open','url'=>array('view','id'=>$model->id_tipo_habitacion)),
	array('label'=>'Buscar Tipo Habitacion','icon'=>'search','url'=>array('admin')),
	);
}
if($user->checkAccess('enc_hab')){

	$this->menu=array(

	array('label'=>'Vista Tipo Habitacion','icon'=>'eye-open','url'=>array('view','id'=>$model->id_tipo_habitacion)),
	array('label'=>'Buscar Tipo Habitacion','icon'=>'search','url'=>array('admin')),
	);
}
	?>

	<h1>Actualizar Tipo de Habitacion <?php echo $model->id_tipo_habitacion; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
