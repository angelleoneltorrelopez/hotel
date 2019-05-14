<?php
$this->breadcrumbs=array(
	'Reservaciones'=>array('admin'),
	$model->id_reservacion=>array('view','id'=>$model->id_reservacion),
	'Actualizar',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Crear Reservaciones','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Vista Reservaciones','icon'=>'eye-open','url'=>array('view','id'=>$model->id_reservacion)),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('enc_hab')){
	$this->menu=array(
		array('label'=>'Vista Reservaciones','icon'=>'eye-open','url'=>array('view','id'=>$model->id_reservacion)),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
	}


	?>

	<h1>Actualizar Reservaciones <?php echo $model->id_reservacion; ?></h1>

<?php echo $this->renderPartial('_form2',array('model'=>$model)); ?>
