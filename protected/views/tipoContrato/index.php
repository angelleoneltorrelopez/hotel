<?php
$this->breadcrumbs=array(
	'Tipo Contratos',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
		array('label'=>'Crear Tipo Contrato','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Buscar Tipo Contrato','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Buscar Tipo Contrato','icon'=>'search','url'=>array('admin')),
		);
}

?>

<h1>Tipo Contratos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
