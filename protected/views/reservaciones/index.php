<?php
$this->breadcrumbs=array(
	'Reservaciones',
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Crear Reservaciones','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('enc_hab')){
	$this->menu=array(
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
	}

?>

<h1>Reservaciones</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
