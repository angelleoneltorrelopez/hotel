<?php
$this->breadcrumbs=array(
	'Puestos',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
	array('label'=>'Crear Puestos','icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Buscar Puestos','icon'=>'search','url'=>array('admin')),
	);
}
if($user->checkAccess('recep')){
	$this->menu=array(
	array('label'=>'Buscar Puestos','icon'=>'search','url'=>array('admin')),
	);
}
?>

<h1>Puestos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
