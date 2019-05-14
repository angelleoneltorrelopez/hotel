<?php
$this->breadcrumbs=array(
	'Tipo Permisos',
);
$user=Yii::app()->user;

if($user->checkAccess("gerente")||$user->checkAccess("jefe_RRHH")){
	$this->menu=array(
		array('label'=>'Crear Tipo Permiso','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Buscar Tipo Permiso','icon'=>'search','url'=>array('admin')),
		);

}
if($user->checkAccess("recep")){
	$this->menu=array(
		array('label'=>'Buscar Tipo Permiso','icon'=>'search','url'=>array('admin')),
		);

}


?>

<h1>Tipo Permisos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
