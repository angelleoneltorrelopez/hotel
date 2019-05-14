<?php
$this->breadcrumbs=array(
	'Mantenimientos'=>array('admin'),
	$model->id,
);

$this->menu=array(
//array('label'=>'Listar Mantenimiento','icon'=>'list-alt','url'=>array('index')),
array('label'=>'Crear Mantenimiento','icon'=>'plus-sign','url'=>array('create')),

array('label'=>'Borrar Mantenimiento','icon'=>'remove-sign','url'=>'#','linkOptions'=>

array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?'),
'visible'=>Yii::app()->user->checkAccess("jefe_mant") || Yii::app()->user->checkAccess("gerente")),

array('label'=>'Actualizar Mantenimiento','icon'=>'refresh','url'=>array('update','id'=>$model->id),
'visible'=>Yii::app()->user->checkAccess("jefe_mant") || Yii::app()->user->checkAccess("gerente")),

array('label'=>'Buscar Mantenimiento','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Mantenimiento #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		array(
		'name'=>'id_empleado',
		'value'=>$model->idEmpleado->nombre,
		),
		'fecha',
		array(
		'name'=>'id_departamento',
		'value'=>$model->idDepartamento->nombre,
		),
		'objeto',
		'diagnostico',
		'solucion',
		array(
			'name' => 'autorizacion_jefe',
			'value'=> function($model){
					if ($model->autorizacion_jefe == 0) {	$result = "Espera";	}
					if ($model->autorizacion_jefe == 1) {	$result = "Aprovado";	}
					if ($model->autorizacion_jefe == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
),
)); ?>
