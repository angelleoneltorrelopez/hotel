

<?php

$this->breadcrumbs=array(
	'Reservaciones'=>array('index'),
	$model->id_reservacion,
);
$user=Yii::app()->user;
if($user->checkAccess('gerente')||$user->checkAccess('recep')){
	$this->menu=array(
		array('label'=>'Listar Reservaciones','icon'=>'list-alt','url'=>array('index')),
		array('label'=>'Crear Reservaciones','icon'=>'plus-sign','url'=>array('create')),
		array('label'=>'Borrar Reservaciones','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_reservacion),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
		array('label'=>'Actualizar Reservaciones','icon'=>'refresh','url'=>array('update','id'=>$model->id_reservacion)),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
		);
}
if($user->checkAccess('enc_hab')){
	$this->menu=array(
		array('label'=>'Listar Reservaciones','icon'=>'list-alt','url'=>array('index')),
		array('label'=>'Buscar Reservaciones','icon'=>'search','url'=>array('admin')),
	);
}

?>

<h1>Vista Reservaciones #<?php echo $model->id_reservacion; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_reservacion',
		'nombre_huesped',
		'id_huesped',
		'fecha_reservacion',
		'fecha_ingreso',
		'fecha_salida',
		'correo_huesped',
		'nacionalidad_huesped',
		'tel_huesped',
		'cantidad_infantes',
		'cantidad_adultos',
		'total',
),
)); 


?>
<?php if($user->checkAccess('gerente')||$user->checkAccess('recep')):?>
<?php
$detalle= new DetalleResevacion;
?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-resevacion-form',
	'action' => ['DetalleResevacion/create'],
	'enableAjaxValidation'=>true,
)); ?>
<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($detalle); ?>
<?php $detalle->id_reservacion=$model->id_reservacion;?>

<table>
<tr>
	<td><?php echo $form->textFieldGroup($detalle,'id_reservacion',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','style'=>'margin-top: 14px;')))); ?>
	</td>

	<td><?php echo $form->labelEx( $detalle,'tipo_habitacion', array('label'=>'Tipo Habitacion','class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$detalle,
				        'attribute'=>'tipo_habitacion',
				        'data'=>CHtml::listData(TipoHabitacion::model()->findAll(array('order'=>'tipo_habitacioncol')), 'id_tipo_habitacion', 'tipo_habitacioncol'),
								'options' => array(
				                    'width' => '100%' ),
				)); ?>
	</td>
	<td>	<?php echo $form->textFieldGroup($detalle,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style'=>'margin-top: 14px;')))); ?>
	</td>


</tr>
</table>


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$detalle->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$detalle->isNewRecord ? 'plus-sign' : 'refresh',
		)); 
		?>
</div>

<?php $this->endWidget(); ?>
<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('detalle-resevacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php
$modelo= new DetalleResevacion;
?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-resevacion-grid',
'dataProvider'=>$modelo->search2($model->id_reservacion),
//'filter'=>$modelo,
'enablePagination'=>false,
	'columns'=>array(
			'id',
			'id_reservacion',
			array(
		    'name'=>'tipo_habitacion',
			'value'=>'$data->tipoHabitacion->tipo_habitacioncol',
			),
			'cantidad',
			'total',
		array(
		'class'=>'booster.widgets.TbButtonColumn',
			'buttons'=>array(
				'view'=>array(
					//'url'=>DetalleResevacionController/delete,
					'visible'=>'false',
				),
				'delete'=>array(
					//'url'=>DetalleResevacionController/delete,
					//'url'=>'Yii::app()->createUrl("detalleResevacion/delete")',
					'url'=>'Yii::app()->createUrl("/detalleResevacion/delete", array("id"=>$data["id"]))',
					
				),
				'update'=>array(
					//'url'=>DetalleResevacionController/delete,
					//'url'=>'Yii::app()->createUrl("detalleResevacion/delete")',
					'url'=>'Yii::app()->createUrl("/detalleResevacion/update", array("id"=>$data["id"]))',
					
				),

			),	
			//call the function 'renderButtons' from the current controller
			

		),

	),
)); ?>

<?php endif;?>
