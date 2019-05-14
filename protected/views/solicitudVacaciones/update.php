<?php
$this->breadcrumbs=array(
	'Solicitud Vacaciones'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Solicitud Vacaciones','icon'=>'plus-sign','url'=>array('create'),
	'visible'=>Yii::app()->user->checkAccess("recep") || Yii::app()->user->checkAccess("gerente")),
	array('label'=>'Vista Solicitud Vacaciones','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Solicitud Vacaciones','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Solicitud de Vacaciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
