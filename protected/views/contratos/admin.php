<?php
$this->breadcrumbs=array(
	'Contratos',
	'Buscar',
);
$user=Yii::app()->user;

$this->menu=array(
array('label'=>'Crear Contratos', 'icon'=>'plus-sign', 'url'=>array('create'),
'visible'=>Yii::app()->user->checkAccess("jefe_RRHH")
|| Yii::app()->user->checkAccess("gerente")),
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('contratos-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Contratos</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>

<?php
if($user->checkAccess('gerente')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'contratos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(
		'name'=>'tipo',
		'value'=>'$data->tipo0->nombre',
		),
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_inicio',
		array(
		'name'=>'horario',
		'value'=>'$data->horario0->nombre',
		),
		array(
		'name'=>'puesto_trabajo',
		'value'=>'$data->puestoTrabajo->titulo',
		),
		array(
			'name' => 'firma_gerencia',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_gerencia == 0) {	$result = "Espera";	}
					if ($model->firma_gerencia == 1) {	$result = "Aprovado";	}
					if ($model->firma_gerencia == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
		/*
		'observaciones',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
array(
	'class'=>'booster.widgets.TbButtonColumn',
	// Template to set order of buttons
		'template' => '{signed}',
	  'buttons' => array(
		'signed' => array(

			'label' => 'Autorizar/Rechazar',     // text label of the button
			'url'=>'Yii::app()->createUrl("/contratos/authsigned", array("id"=>$data["id"]))',
			'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
			),

	),
),
),
));} ?>


<?php
if($user->checkAccess('jefe_RRHH')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'contratos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(
		'name'=>'tipo',
		'value'=>'$data->tipo0->nombre',
		),
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_inicio',
		array(
		'name'=>'horario',
		'value'=>'$data->horario0->nombre',
		),
		array(
		'name'=>'puesto_trabajo',
		'value'=>'$data->puestoTrabajo->titulo',
		),
		array(
			'name' => 'firma_RH',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_RH == 0) {	$result = "Espera";	}
					if ($model->firma_RH == 1) {	$result = "Aprovado";	}
					if ($model->firma_RH == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
		/*
		'observaciones',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
array(
	'class'=>'booster.widgets.TbButtonColumn',
	// Template to set order of buttons
		'template' => '{signed}',
	  'buttons' => array(
		'signed' => array(

			'label' => 'Autorizar/Rechazar',     // text label of the button
			'url'=>'Yii::app()->createUrl("/contratos/authsigned", array("id"=>$data["id"]))',
			'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
			),

	),
),
),
));} ?>
<?php
if($user->checkAccess('recep')){

$this->widget('booster.widgets.TbGridView',array(
'id'=>'contratos-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		array(
		'name'=>'tipo',
		'value'=>'$data->tipo0->nombre',
		),
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_inicio',
		array(
		'name'=>'horario',
		'value'=>'$data->horario0->nombre',
		),
		array(
		'name'=>'puesto_trabajo',
		'value'=>'$data->puestoTrabajo->titulo',
		),
		array(
			'name' => 'firma_RH',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_RH == 0) {	$result = "Espera";	}
					if ($model->firma_RH == 1) {	$result = "Aprovado";	}
					if ($model->firma_RH == 2) {	$result = "Denegado";	}
											return $result;

							}
				),
				array(
					'name' => 'firma_gerencia',
					'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
					'value'=> function($model){
							if ($model->firma_gerencia == 0) {	$result = "Espera";	}
							if ($model->firma_gerencia == 1) {	$result = "Aprovado";	}
							if ($model->firma_gerencia == 2) {	$result = "Denegado";	}
													return $result;

									}
						),
		/*
		'observaciones',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(

	'delete'=>array(
		'visible'=>'false',

	),
	'update'=>array(
				'visible'=>'false',

	),

),
),
),
));} ?>
