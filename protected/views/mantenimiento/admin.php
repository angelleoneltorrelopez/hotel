<?php
$this->breadcrumbs=array(
	'Mantenimiento',
	'Buscar',
);
$user=Yii::app()->user;
if($user->checkAccess("gerente")||$user->checkAccess("jefe_mant")||$user->checkAccess("enc_edif")){
	$this->menu=array(
		array('label'=>'Crear Mantenimiento', 'icon'=>'plus-sign', 'url'=>array('create')),
		);
}

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('mantenimiento-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Mantenimientos</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>

<?php if(Yii::app()->user->checkAccess("enc_edif")){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'mantenimiento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	'id',
	array(
				 'name'=>'id_empleado',
				 'value'=>'$data->idEmpleado->nombre',
				),
		'fecha',
		array(
				 'name'=>'id_departamento',
				 'value'=>'$data->idDepartamento->nombre',
				),
		'objeto',
		'diagnostico',
		/*
		'solucion',*/
		array(
			'name' => 'autorizacion_jefe',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->autorizacion_jefe == 0) {	$result = "Espera";	}
					if ($model->autorizacion_jefe == 1) {	$result = "Aprovado";	}
					if ($model->autorizacion_jefe == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),

		array(
		'class'=>'booster.widgets.TbButtonColumn',
		'buttons'=>array(
			'view'=>array(
				'url'=>'Yii::app()->createUrl("/mantenimiento/view", array("id"=>$data["id"]))',

			),
			'delete'=>array(
				'visible'=>'false',
			),
			'update'=>array(

				'visible'=>'false',
			),
		),
		),//fin de botones
),
)); }


if(Yii::app()->user->checkAccess("gerente") || Yii::app()->user->checkAccess("jefe_mant")){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'mantenimiento-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	'id',
	array(
				 'name'=>'id_empleado',
				 'value'=>'$data->idEmpleado->nombre',
				),
		'fecha',
		array(
				 'name'=>'id_departamento',
				 'value'=>'$data->idDepartamento->nombre',
				),
		'objeto',
		'diagnostico',
		/*
		'solucion',
		*/
		array(
			'name' => 'autorizacion_jefe',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->autorizacion_jefe == 0) {	$result = "Espera";	}
					if ($model->autorizacion_jefe == 1) {	$result = "Aprovado";	}
					if ($model->autorizacion_jefe == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),

		array(
		'class'=>'booster.widgets.TbButtonColumn',
		),//fin de botones
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			// Template to set order of buttons
				'template' => '{signed}',
			'buttons' => array(
				'signed' => array(

					'label' => 'Autorizar/Rechazar',     // text label of the button
					'url'=>'Yii::app()->createUrl("/mantenimiento/authsigned", array("id"=>$data["id"]))',
					'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
					),

			),
		),//fin botones
),
)); }



?>
