<?php
$this->breadcrumbs=array(
	'Solicitud Permisos'=>array('admin'),
	$model->id,
);

$this->menu=array(
array('label'=>'Crear Solicitud Permiso','icon'=>'plus-sign','url'=>array('create'),
'visible'=>Yii::app()->user->checkAccess("recep")
|| Yii::app()->user->checkAccess("gerente")),

array('label'=>'Borrar Solicitud Permiso','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),
'confirm'=>'¿Seguro que quieres eliminar este elemento?'),'visible'=>Yii::app()->user->checkAccess("recep")
|| Yii::app()->user->checkAccess("gerente")),

array('label'=>'Actualizar Solicitud Permiso','icon'=>'refresh','url'=>array('update','id'=>$model->id),
'visible'=>Yii::app()->user->checkAccess("recep") || Yii::app()->user->checkAccess("gerente")),
array('label'=>'Buscar Solicitud Permiso','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Solicitud de Permiso #<?php echo $model->id; ?></h1>

<?php
//************************************** RECEPCIONISTA ***********************************************
if(Yii::app()->user->checkAccess("recep")){
$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id',
		 array(
 			'name'=>'empleado',
 			'value'=>$model->empleado0->nombre,
 			 ),
			 array(
	 			'name'=>'tipo',
	 			'value'=>$model->tipo0->nombre,
	 			 ),
		'fecha_solicitud',
		'motivo',
		'fecha_inicio',
		'fecha_fin',
		'cantidad_dias',
		
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
));
}
//************************************** JEFE INMEDIATO ***********************************************
if(Yii::app()->user->checkAccess("jefe_inme")){
$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id',
		 array(
 			'name'=>'empleado',
 			'value'=>$model->empleado0->nombre,
 			 ),
			 array(
	 			'name'=>'tipo',
	 			'value'=>$model->tipo0->nombre,
	 			 ),
		'fecha_solicitud',
		'motivo',
		'fecha_inicio',
		'fecha_fin',
		'cantidad_dias',
		array(
			'name' => 'firma_jefe_inmediato',
			'value'=> function($model){
					if ($model->firma_jefe_inmediato == 0) {	$result = "Espera";	}
					if ($model->firma_jefe_inmediato == 1) {	$result = "Aprovado";	}
					if ($model->firma_jefe_inmediato == 2) {	$result = "Denegado";	}
											return $result;

							}
				),

),
));
}

//************************************** RECURSOS HUMANOS ***********************************************
if(Yii::app()->user->checkAccess("jefe_RRHH")){
$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id',
		 array(
 			'name'=>'empleado',
 			'value'=>$model->empleado0->nombre,
 			 ),
			 array(
	 			'name'=>'tipo',
	 			'value'=>$model->tipo0->nombre,
	 			 ),
		'fecha_solicitud',
		'motivo',
		'fecha_inicio',
		'fecha_fin',
		'cantidad_dias',
		array(
			'name' => 'firma_RH',
			'value'=> function($model){
					if ($model->firma_RH == 0) {	$result = "Espera";	}
					if ($model->firma_RH == 1) {	$result = "Aprovado";	}
					if ($model->firma_RH == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
),
));
}

//************************************** GERENTE ***********************************************
if(Yii::app()->user->checkAccess("gerente")){
$this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id',
		 array(
 			'name'=>'empleado',
 			'value'=>$model->empleado0->nombre,
 			 ),
			 array(
	 			'name'=>'tipo',
	 			'value'=>$model->tipo0->nombre,
	 			 ),
		'fecha_solicitud',
		'motivo',
		'fecha_inicio',
		'fecha_fin',
		'cantidad_dias',
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
));
}

 ?>
