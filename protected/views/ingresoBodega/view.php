
<?php
$this->breadcrumbs=array(
	'Ingreso Bodegas'=>array('admin'),
	$model->id_ingreso,
);

$this->menu=array(
array('label'=>'Crear Ingreso Bodega','icon'=>'plus-sign','url'=>array('create')),
array('label'=>'Borrar Ingreso Bodega','icon'=>'remove-sign','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_ingreso),'confirm'=>'¿Seguro que quieres eliminar este elemento?')),
array('label'=>'Actualizar Ingreso Bodega','icon'=>'refresh','url'=>array('update','id'=>$model->id_ingreso)),
array('label'=>'Buscar Ingreso Bodega','icon'=>'search','url'=>array('admin')),
);
?>

<h1>Vista Ingreso Bodega #<?php echo $model->id_ingreso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	'id_ingreso',
		 array(
 			'name'=>'id_proveedor',
 			'value'=>$model->idProveedor->nombre_proveedor,
 			 ),
			 array(
	 			'name'=>'id_solicitud_compra',
	 			'value'=>$model->idSolicitudCompra->id_solicitud_compra,
	 			 ),
		'numero_factura',
		'fecha_factura',
		'fecha_ingreso',
		'total',
),
)); ?>
<?php
$detalle= new DetalleCompra;
?>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'detalle-compra-form',
	'action' => ['DetalleCompra/create'],
	'enableAjaxValidation'=>true,
)); ?>

<p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

<?php echo $form->errorSummary($detalle); ?>
<?php $detalle->id_ingreso_bodega=$model->id_ingreso;?>

<table>
<tr>
	<td>
	<?php echo $form->textFieldGroup($detalle,'id_ingreso_bodega',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','readonly'=>'readonly','style'=>'margin-top: 14px;')))); ?>
	</td>
	<td>
		<?php echo $form->labelEx( $detalle,'id_articulo', array('label'=>'Articulo','class'=>'className') ); ?>
				<?php $this->widget('bootstrap.widgets.TbSelect2',array(
				        'model'=>$detalle,
				        'attribute'=>'id_articulo',
				        'data'=>CHtml::listData(Articulos::model()->findAll(array('order'=>'nombre_articulo')), 'id_articulo', 'nombre_articulo'),
								'options' => array(
				                    'width' => '100%' ),
				)); ?>
	</td>
	<td>
	<?php echo $form->textFieldGroup($detalle,'precio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style'=>'margin-top: 14px;')))); ?>

	</td>
	<td>
	<?php echo $form->textFieldGroup($detalle,'cantidad',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','style'=>'margin-top: 14px;')))); ?>

	</td>

</tr>
</table>




<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$detalle->isNewRecord ? 'Crear' : 'Actualizar',
			'icon'=>$detalle->isNewRecord ? 'plus-sign' : 'refresh',
		)); ?>
</div>

<?php $this->endWidget(); ?>
<?php
$modelo= new DetalleCompra;
?>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'detalle-compra-grid',
'dataProvider'=>$modelo->search2($model->id_ingreso),
//'filter'=>$model,
'enablePagination'=>false,
'columns'=>array(
		'id_detalle_compra',
		'id_ingreso_bodega',
		array(
		'name'=>'id_articulo',
		'value'=>'$data->idArticulo->nombre_articulo',
		),
		'precio',
		'cantidad',
		'total',
array(
'class'=>'booster.widgets.TbButtonColumn',
'buttons'=>array(
	'view'=>array(
		'visible'=>'false',
	),
	'delete'=>array(
		'url'=>'Yii::app()->createUrl("/detalleCompra/delete", array("id"=>$data["id_detalle_compra"]))',

	),
	'update'=>array(

		'url'=>'Yii::app()->createUrl("/detalleCompra/update", array("id"=>$data["id_detalle_compra"]))',

	),

),
),
),
)); ?>
