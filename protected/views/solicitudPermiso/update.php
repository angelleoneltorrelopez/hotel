<?php
$this->breadcrumbs=array(
	'Solicitud Permisos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Solicitud Permiso','icon'=>'plus-sign','url'=>array('create'),
	'visible'=>Yii::app()->user->checkAccess("recep") || Yii::app()->user->checkAccess("gerente")),
	array('label'=>'Vista Solicitud Permiso','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Solicitud Permiso','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Solicitud de Permiso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
