<?php
$this->breadcrumbs=array(
	'Mantenimientos',
);
$user=Yii::app()->user;
if($user->checkAccess("gerente")||$user->checkAccess("jefe_mant")||$user->checkAccess("enc_edif")){
$this->menu=array(
array('label'=>'Crear Mantenimiento','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Buscar Mantenimiento','icon'=>'search','url'=>array('admin')),
);
}
?>

<h1>Mantenimientos</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
