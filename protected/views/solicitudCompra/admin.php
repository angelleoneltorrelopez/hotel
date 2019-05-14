<?php
$this->breadcrumbs=array(
	'Solicitud Compras',
	'Buscar',
);

$this->menu=array(
array('label'=>'Crear Solicitud Compra', 'icon'=>'plus-sign', 'url'=>array('create'),
'visible'=>Yii::app()->user->checkAccess("enc_bod") || Yii::app()->user->checkAccess("gerente")),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('solicitud-compra-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Busqueda Solicitud de Compras</h1>
<?php echo CHtml::link(CHtml::image(Yii::app()->baseUrl."/images/pdf.png",'PDF',array("title"=>"Exportar a PDF")),array("generarpdf"));?>
<p>
	Exportar a PDF.
</p>
<?php
//****************************************** AUXILIAR DE BODEGA ************************************************
if(Yii::app()->user->checkAccess("aux_bod")){
$this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	     'id_solicitud_compra',
	array(
			 'name'=>'id_empleado',
			 'value'=>'$data->empleado0->nombre',
			),
		'fecha_solicitud',
		'total_estimado',
		'fecha_creacion',
		array(
			'name' => 'firma_encargado_almacen',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_encargado_almacen == 0) {	$result = "Espera";	}
					if ($model->firma_encargado_almacen == 1) {	$result = "Aprovado";	}
					if ($model->firma_encargado_almacen == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),
				array(

				'class'=>'booster.widgets.TbButtonColumn',
				'buttons'=>array(
					'view'=>array(
						'url'=>'Yii::app()->createUrl("/solicitudCompra/view2", array("id"=>$data["id_solicitud_compra"]))',
					),
					'delete'=>array(
						'visible'=>'false',

					),
					'update'=>array(

						'visible'=>'false',

					),

				),
				),
),
));}

//****************************************** ENCARGADO DE BODEGA ************************************************
if(Yii::app()->user->checkAccess("enc_bod")){
$this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	     'id_solicitud_compra',
	array(
			 'name'=>'id_empleado',
			 'value'=>'$data->empleado0->nombre',
			),
		'fecha_solicitud',
		'total_estimado',
		'fecha_creacion',
		array(
			'name' => 'firma_encargado_almacen',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_encargado_almacen == 0) {	$result = "Espera";	}
					if ($model->firma_encargado_almacen == 1) {	$result = "Aprovado";	}
					if ($model->firma_encargado_almacen == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{signed}',
'buttons' => array(
	'signed' => array(

		'label' => 'Autorizar/Rechazar',     // text label of the button
		'url'=>'Yii::app()->createUrl("/solicitudCompra/authsigned", array("id"=>$data["id_solicitud_compra"]))',
		'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
	  ),
  ),
),
),
));}

//****************************************** ENCARGADO DE BODEGA ************************************************
if(Yii::app()->user->checkAccess("gerente")){
$this->widget('booster.widgets.TbGridView',array(
'id'=>'solicitud-compra-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
	     'id_solicitud_compra',
	array(
			 'name'=>'id_empleado',
			 'value'=>'$data->empleado0->nombre',
			),
		'fecha_solicitud',
		'total_estimado',
		'fecha_creacion',
		array(
			'name' => 'firma_encargado_almacen',
			'filter' => array('0'=>'Espera','1'=>'Aprovado','2'=>'Denegado'),
			'value'=> function($model){
					if ($model->firma_encargado_almacen == 0) {	$result = "Espera";	}
					if ($model->firma_encargado_almacen == 1) {	$result = "Aprovado";	}
					if ($model->firma_encargado_almacen == 2) {	$result = "Denegado";	}
                      return $result;

              }
		    ),
				array(

				'class'=>'booster.widgets.TbButtonColumn',
				'buttons'=>array(
					'view'=>array(
						'url'=>'Yii::app()->createUrl("/solicitudCompra/view2", array("id"=>$data["id_solicitud_compra"]))',
					),
					'delete'=>array(
						'url'=>'Yii::app()->createUrl("/solicitudCompra/delete", array("id"=>$data["id_solicitud_compra"]))',

					),
					'update'=>array(

						'url'=>'Yii::app()->createUrl("/solicitudCompra/view", array("id"=>$data["id_solicitud_compra"]))',

					),

				),
				),
array(
'class'=>'booster.widgets.TbButtonColumn',
'template' => '{signed}',
'buttons' => array(
	'signed' => array(

		'label' => 'Autorizar/Rechazar',     // text label of the button
		'url'=>'Yii::app()->createUrl("/solicitudCompra/authsigned", array("id"=>$data["id_solicitud_compra"]))',
		'options' => array('class'=>'btn btn-danger btn-sm'), // HTML options for the button tag
	  ),
  ),
),
),
));}
 ?>
