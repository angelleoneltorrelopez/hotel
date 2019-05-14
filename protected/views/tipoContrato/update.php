<?php
$this->breadcrumbs=array(
	'Tipo Contratos'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Crear Tipo Contrato','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Vista Tipo Contrato','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'Buscar Tip oContrato','icon'=>'search','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Tipo de Contrato <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
