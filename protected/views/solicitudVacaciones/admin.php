<?php
$this->breadcrumbs=array(
	'Solicitud Vacaciones',
	'Buscar',
);

$this->menu=array(
array('label'=>'Crear Solicitud Vacaciones', 'icon'=>'plus-sign', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess("recep")
 || Yii::app()->user->checkAccess("gerente")),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('solicitud-vacaciones-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Solicitud de Vacaciones</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>

<?php
//****************************************** RECEPCIONISTA ************************************************
if(Yii::app()->user->checkAccess("recep")){
	$this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-vacaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	  'id',
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_solicitud',
		'fecha_inicio',
		'fecha_fin',
		'dias_totales',
	
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

array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
));}

//***************************************** JEFE INMEDIATO ********************************
if(Yii::app()->user->checkAccess("jefe_inme")){ $this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-vacaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	  'id',
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_solicitud',
		'fecha_inicio',
		'fecha_fin',
		'dias_totales',
		array(
			'name' => 'firma_jefe_inmediato',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_jefe_inmediato == 0) {	$result = "Espera";	}
					if ($model->firma_jefe_inmediato == 1) {	$result = "Aprovado";	}
					if ($model->firma_jefe_inmediato == 2) {	$result = "Denegado";	}
                      return $result;
              }
		    ),
array(
'class'=>'booster.widgets.TbButtonColumn',
// Template to set order of buttons
'template' => '{signed}',
'buttons' => array(
	'signed' => array(

		'label' => 'Autorizar/Rechazar',     // text label of the button
		'url'=>'Yii::app()->createUrl("/solicitudVacaciones/authsigned", array("id"=>$data["id"]))',
		'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
	  ),
  ),
),
),
));}

//****************************************** RERCURSOS HUMANOS ************************************************
if(Yii::app()->user->checkAccess("jefe_RRHH")){ $this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-vacaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	  'id',
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_solicitud',
		'fecha_inicio',
		'fecha_fin',
		'dias_totales',
		array(
			'name' => 'firma_RH',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_RH == 0) {	$result = "Espera";	}
					if ($model->firma_RH == 1) {	$result = "Aprovado";	}
					if ($model->firma_RH == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),array(
				'class'=>'booster.widgets.TbButtonColumn',
			),

array(
'class'=>'booster.widgets.TbButtonColumn',
// Template to set order of buttons
'template' => '{signed}',
'buttons' => array(
	'signed' => array(

		'label' => 'Autorizar/Rechazar',     // text label of the button
		'url'=>'Yii::app()->createUrl("/solicitudVacaciones/authsigned", array("id"=>$data["id"]))',
		'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
		),
	),
),
),
));}

//****************************************** GERENTE ************************************************
if(Yii::app()->user->checkAccess("gerente")){ $this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-vacaciones-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	  'id',
		array(
		'name'=>'empleado',
		'value'=>'$data->empleado0->nombre',
		),
		'fecha_solicitud',
		'fecha_inicio',
		'fecha_fin',
		'dias_totales',

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
		'url'=>'Yii::app()->createUrl("/solicitudVacaciones/authsigned", array("id"=>$data["id"]))',
		'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
		),
	),
),
),
));}
 ?>
