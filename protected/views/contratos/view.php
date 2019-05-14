<?php
$this->breadcrumbs=array(
	'Contratos'=>array('admin'),
	$model->id,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('jefe_RRHH')){
	$this->menu=array(
	//	array('label'=>'Listar Contratos','icon'=>'list-alt','url'=>array('index')),
		array('label'=>'Crear Contratos','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Contratos','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Contratos','icon'=>'refresh','url'=>array('update','id'=>$model->id)),
		array('label'=>'Buscar Contratos','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('recep')){
	$this->menu=array(
		//array('label'=>'Listar Contratos','icon'=>'list-alt','url'=>array('index')),
		array('label'=>'Buscar Contratos','icon'=>'search','url'=>array('admin')),
		);
}


?>

<h1>Vista Contratos #<?php echo $model->id; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		 array(
		 'name'=>'tipo',
		 'value'=>$model->tipo0->nombre,
		 ),
		 array(
	 		'name'=>'empleado',
			'value'=>$model->empleado0->nombre,
	 		 ),
		'fecha_inicio',
		array(
		 'name'=>'horario',
		 'value'=>$model->horario0->nombre,
			),
			array(
 	 		'name'=>'puesto_trabajo',
 			'value'=>$model->puestoTrabajo->titulo,
 	 		 ),
		'observaciones',
		array(
			'name' => 'firma_RH',
			'value'=> function($model){
					if ($model->firma_RH == 0) {	$result = "Espera";	}
					if ($model->firma_RH == 1) {	$result = "Aprovado";	}
					if ($model->firma_RH == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
				array(
					'name' => 'firma_gerencia',
					'value'=> function($model){
							if ($model->firma_gerencia == 0) {	$result = "Espera";	}
							if ($model->firma_gerencia == 1) {	$result = "Aprovado";	}
							if ($model->firma_gerencia == 2) {	$result = "Denegado";	}
													return $result;

									}
						),
),
)); ?>
