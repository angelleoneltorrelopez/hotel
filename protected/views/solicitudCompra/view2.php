<?php
$this->breadcrumbs=array(
	'Solicitud de Compras'=>array('admin'),
	'Vista',
);

	$this->menu=array(
	array('label'=>'Buscar Solicitud de Compras','icon'=>'search','url'=>array('admin')),
	array('label'=>'Actualizar Solicitud Compras','icon'=>'refresh','url'=>array('view','id'=>$model->id_solicitud_compra),
	'visible'=>Yii::app()->user->checkAccess("enc_bod") || Yii::app()->user->checkAccess("gerente")),
	);
	?>

	<h1>Solicitud de Compras #<?php echo $model->id_solicitud_compra; ?></h1>

<?php echo $this->renderPartial('_form_2',array('model'=>$model)); ?>
